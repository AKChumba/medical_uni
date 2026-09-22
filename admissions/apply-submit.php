<?php
session_start();
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/programmes-data.php';

function fail_back($errors, $old) {
    $_SESSION['apply_errors'] = $errors;
    $_SESSION['apply_old'] = $old;
    header('Location: apply.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit;
}

// CSRF check.
$token = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    fail_back(['Your session expired before the form was submitted. Please try again.'], $_POST);
}

// Honeypot: silently accept-and-drop bot submissions instead of showing them an error.
if (!empty($_POST['website'])) {
    header('Location: confirmation.php?bot=1');
    exit;
}

$old = [
    'full_name'   => trim($_POST['full_name'] ?? ''),
    'email'       => trim($_POST['email'] ?? ''),
    'phone'       => trim($_POST['phone'] ?? ''),
    'dob'         => trim($_POST['dob'] ?? ''),
    'nationality' => trim($_POST['nationality'] ?? ''),
    'category'    => trim($_POST['category'] ?? ''),
    'programme'   => trim($_POST['programme'] ?? ''),
    'notes'       => trim($_POST['notes'] ?? ''),
];

$errors = [];

if ($old['full_name'] === '' || mb_strlen($old['full_name']) < 2) {
    $errors[] = 'Please enter your full name.';
}
if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address.';
}
if ($old['phone'] === '' || !preg_match('/^[0-9+ ()-]{7,20}$/', $old['phone'])) {
    $errors[] = 'Please enter a valid phone number.';
}
if ($old['dob'] === '' || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $old['dob'])) {
    $errors[] = 'Please enter your date of birth.';
} else {
    $dobTime = strtotime($old['dob']);
    if ($dobTime === false || $dobTime > time()) {
        $errors[] = 'Please enter a valid date of birth.';
    }
}
if ($old['nationality'] === '') {
    $errors[] = 'Please enter your nationality.';
}
if (!in_array($old['category'], ['Undergraduate', 'Postgraduate', 'Diploma', 'Certificate'], true)) {
    $errors[] = 'Please select a programme category.';
}
$validProgrammeNames = array_map(fn($p) => $p['name'], get_programmes());
if (!in_array($old['programme'], $validProgrammeNames, true)) {
    $errors[] = 'Please select the programme you are applying for.';
}

// File uploads.
$allowedExt = ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx'];
$maxFileSize = 5 * 1024 * 1024; // 5 MB
$maxFiles = 8;
$uploadedFiles = [];

if (empty($_FILES['documents']) || empty($_FILES['documents']['name'][0])) {
    $errors[] = 'Please upload at least one supporting document.';
} else {
    $names = $_FILES['documents']['name'];
    $tmp = $_FILES['documents']['tmp_name'];
    $errs = $_FILES['documents']['error'];
    $sizes = $_FILES['documents']['size'];
    $count = count($names);

    if ($count > $maxFiles) {
        $errors[] = "Please upload no more than {$maxFiles} files.";
    }

    for ($i = 0; $i < $count; $i++) {
        if ($errs[$i] === UPLOAD_ERR_NO_FILE) continue;
        if ($errs[$i] !== UPLOAD_ERR_OK) {
            $errors[] = "There was a problem uploading \"{$names[$i]}\". Please try again.";
            continue;
        }
        $ext = strtolower(pathinfo($names[$i], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowedExt, true)) {
            $errors[] = "\"{$names[$i]}\" is not an accepted file type.";
            continue;
        }
        if ($sizes[$i] > $maxFileSize) {
            $errors[] = "\"{$names[$i]}\" is larger than the 5 MB limit.";
            continue;
        }
        $uploadedFiles[] = [
            'original' => $names[$i],
            'tmp' => $tmp[$i],
            'size' => $sizes[$i],
        ];
    }
    if (empty($uploadedFiles) && empty($errors)) {
        $errors[] = 'Please upload at least one supporting document.';
    }
}

if ($errors) {
    fail_back($errors, $old);
}

// --- All valid: persist the application ---

$reference = generate_reference();
ensure_dir(APPLICATIONS_DATA_DIR);

$fileDir = APPLICATIONS_UPLOAD_DIR . '/' . $reference;
ensure_dir($fileDir);

$savedFiles = [];
foreach ($uploadedFiles as $file) {
    $safeName = safe_upload_filename($file['original']);
    $dest = $fileDir . '/' . $safeName;
    if (move_uploaded_file($file['tmp'], $dest)) {
        $savedFiles[] = ['original' => $file['original'], 'stored' => $safeName, 'size' => $file['size']];
    }
}

$record = [
    'reference'    => $reference,
    'submitted_at' => date('c'),
    'full_name'    => $old['full_name'],
    'email'        => $old['email'],
    'phone'        => $old['phone'],
    'dob'          => $old['dob'],
    'nationality'  => $old['nationality'],
    'category'     => $old['category'],
    'programme'    => $old['programme'],
    'notes'        => $old['notes'],
    'files'        => $savedFiles,
    'ip'           => $_SERVER['REMOTE_ADDR'] ?? '',
];

// One file per application (easy to look up by reference)...
@file_put_contents(
    APPLICATIONS_DATA_DIR . '/' . $reference . '.json',
    json_encode($record, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);
// ...and one append-only log line (easy to review all applications at once).
@file_put_contents(
    APPLICATIONS_DATA_DIR . '/applications.log',
    json_encode($record, JSON_UNESCAPED_SLASHES) . "\n",
    FILE_APPEND | LOCK_EX
);

// --- Email notifications (best-effort; failure never blocks confirmation) ---
if (MAIL_ENABLED && function_exists('mail')) {
    $subject = "New Application {$reference} — {$old['programme']}";
    $body = "A new application has been received.\n\n"
          . "Reference: {$reference}\n"
          . "Name: {$old['full_name']}\n"
          . "Email: {$old['email']}\n"
          . "Phone: {$old['phone']}\n"
          . "Programme: {$old['programme']} ({$old['category']})\n"
          . "Notes: {$old['notes']}\n";
    $headers = "From: " . SITE_NAME . " Website <" . SITE_EMAIL . ">\r\nReply-To: {$old['email']}";
    @mail(SITE_ADMISSIONS_EMAIL, $subject, $body, $headers);

    $applicantSubject = "Your WMU application — Reference {$reference}";
    $applicantBody = "Dear {$old['full_name']},\n\n"
        . "Thank you for applying to " . SITE_NAME . ".\n\n"
        . "Your application reference number is: {$reference}\n"
        . "Programme: {$old['programme']}\n\n"
        . "Our admissions team will review your application and contact you within 48 hours. "
        . "Please keep your reference number for any follow-up enquiries.\n\n"
        . "Regards,\nAdmissions Office\n" . SITE_NAME . "\n" . SITE_PHONE . " | " . SITE_EMAIL;
    $applicantHeaders = "From: " . SITE_NAME . " Admissions <" . SITE_ADMISSIONS_EMAIL . ">";
    @mail($old['email'], $applicantSubject, $applicantBody, $applicantHeaders);
}

unset($_SESSION['csrf_token']);
header('Location: confirmation.php?ref=' . urlencode($reference));
exit;
