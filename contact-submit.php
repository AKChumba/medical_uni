<?php
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

function contact_fail($errors, $old) {
    $_SESSION['contact_errors'] = $errors;
    $_SESSION['contact_old'] = $old;
    header('Location: contact.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

$token = $_POST['csrf_token'] ?? '';
if (empty($_SESSION['contact_csrf']) || !hash_equals($_SESSION['contact_csrf'], $token)) {
    contact_fail(['Your session expired before the form was submitted. Please try again.'], $_POST);
}

// Honeypot.
if (!empty($_POST['website'])) {
    header('Location: contact.php?sent=1');
    exit;
}

$old = [
    'name'    => trim($_POST['name'] ?? ''),
    'email'   => trim($_POST['email'] ?? ''),
    'subject' => trim($_POST['subject'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];

$errors = [];
if ($old['name'] === '') $errors[] = 'Please enter your name.';
if ($old['email'] === '' || !filter_var($old['email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';
if ($old['subject'] === '') $errors[] = 'Please enter a subject.';
if ($old['message'] === '' || mb_strlen($old['message']) < 5) $errors[] = 'Please enter a message.';

if ($errors) {
    contact_fail($errors, $old);
}

ensure_dir(APPLICATIONS_DATA_DIR . '/../enquiries');
$record = [
    'submitted_at' => date('c'),
    'name' => $old['name'],
    'email' => $old['email'],
    'subject' => $old['subject'],
    'message' => $old['message'],
    'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
];
@file_put_contents(
    APPLICATIONS_DATA_DIR . '/../enquiries/enquiries.log',
    json_encode($record, JSON_UNESCAPED_SLASHES) . "\n",
    FILE_APPEND | LOCK_EX
);

if (MAIL_ENABLED && function_exists('mail')) {
    $subject = "Website Enquiry: {$old['subject']}";
    $body = "New enquiry from the WMU website contact form.\n\n"
          . "Name: {$old['name']}\nEmail: {$old['email']}\n\nMessage:\n{$old['message']}\n";
    $headers = "From: " . SITE_NAME . " Website <" . SITE_EMAIL . ">\r\nReply-To: {$old['email']}";
    @mail(SITE_EMAIL, $subject, $body, $headers);
}

unset($_SESSION['contact_csrf']);
header('Location: contact.php?sent=1');
exit;
