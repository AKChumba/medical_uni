<?php
$root = '../';
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

$pageTitle = 'Application Received';
$pageDescription = 'Your application to Windhoek Medical University has been received.';
$activeSection = 'admissions';
require __DIR__ . '/../includes/header.php';

$ref = $_GET['ref'] ?? '';
$isBot = isset($_GET['bot']);
$record = null;

// Reference numbers only ever look like WMU-YYYYMMDD-XXXXX — reject anything else
// before it ever touches the filesystem.
if (!$isBot && preg_match('/^WMU-\d{8}-[A-F0-9]{5,10}$/', $ref)) {
    $path = APPLICATIONS_DATA_DIR . '/' . $ref . '.json';
    if (is_file($path)) {
        $record = json_decode(file_get_contents($path), true);
    }
}
?>

<section class="section">
  <div class="container" style="max-width:720px">

    <?php if ($isBot): ?>
    <div class="confirmation-box reveal">
      <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
      <h1>Thank You</h1>
      <p>Your submission has been received.</p>
    </div>

    <?php elseif ($record): ?>
    <div class="confirmation-box reveal">
      <div class="icon"><i class="fa-solid fa-circle-check"></i></div>
      <h1>Application Received</h1>
      <p>Thank you, <?= e($record['full_name']) ?>. Your application to <strong><?= e($record['programme']) ?></strong> has been submitted successfully.</p>
      <div class="reference-number"><?= e($record['reference']) ?></div>
      <p style="color:var(--muted);font-size:14.5px">Please keep this reference number for any follow-up enquiries with our admissions team.</p>
      <p style="margin-top:24px">A confirmation has been sent to <strong><?= e($record['email']) ?></strong> where email delivery is available. Our admissions team will review your application and contact you within 48 hours.</p>
      <p style="margin-top:24px">
        <a href="<?= e($root) ?>index.php" class="btn btn-outline">Return Home</a>
        <a href="<?= e($root) ?>downloads.php" class="btn btn-primary">View Downloads</a>
      </p>
    </div>

    <?php else: ?>
    <div class="alert">
      <strong>We couldn't find that application reference.</strong>
      <p style="margin:8px 0 0">If you just submitted an application and reached this page in error, please <a href="apply.php">try submitting again</a>, or contact <a href="mailto:<?= e(SITE_ADMISSIONS_EMAIL) ?>"><?= e(SITE_ADMISSIONS_EMAIL) ?></a> with your details.</p>
    </div>
    <?php endif; ?>

  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
