<?php
session_start();
$root = '';
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$pageTitle = 'Contact';
$pageDescription = 'Contact Windhoek Medical University — admissions enquiries, campus location and contact details.';
$activeSection = 'contact';
$pageHeader = [
    'eyebrow' => 'Get in Touch',
    'title' => 'Contact Us',
    'intro' => 'Have a question about admissions, programmes or campus life? We\'d love to hear from you.',
    'image' => 'windhoek.png',
];
$breadcrumb = [['label' => 'Contact']];
require __DIR__ . '/includes/header.php';

if (empty($_SESSION['contact_csrf'])) {
    $_SESSION['contact_csrf'] = bin2hex(random_bytes(24));
}
$contactSent = isset($_GET['sent']);
$contactErrors = $_SESSION['contact_errors'] ?? [];
$contactOld = $_SESSION['contact_old'] ?? [];
unset($_SESSION['contact_errors'], $_SESSION['contact_old']);
?>

<section class="section">
  <div class="container">
    <div class="split reveal" style="align-items:flex-start">

      <div class="text">
        <p class="eyebrow">Our Details</p>
        <h2>Reach Us Directly</h2>
        <p style="color:var(--muted)">Or use the enquiry form and our admissions team will respond within 48 hours.</p>

        <ul class="footer-contact" style="margin-top:24px">
          <li style="margin-bottom:16px"><i class="fa-solid fa-location-dot"></i><?= e(SITE_ADDRESS_LINE1) ?>, <?= e(SITE_ADDRESS_LINE2) ?></li>
          <li style="margin-bottom:16px"><i class="fa-solid fa-phone"></i><a href="tel:<?= e(SITE_PHONE_HREF) ?>"><?= e(SITE_PHONE) ?></a> &middot; Monday to Saturday, 8AM&ndash;6PM</li>
          <li><i class="fa-solid fa-envelope"></i><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></li>
        </ul>
      </div>

      <div class="form-section" style="flex:1 1 420px">
        <div class="form-section-body">
          <h3 style="margin-bottom:18px">Send Us a Message</h3>

          <?php if ($contactSent): ?>
          <div class="alert alert-success">Thank you — your message has been sent. Our team will respond within 48 hours.</div>
          <?php endif; ?>

          <?php if ($contactErrors): ?>
          <div class="alert">
            <strong>Please correct the following:</strong>
            <ul><?php foreach ($contactErrors as $err): ?><li><?= e($err) ?></li><?php endforeach; ?></ul>
          </div>
          <?php endif; ?>

          <form action="contact-submit.php" method="post" novalidate>
            <input type="hidden" name="csrf_token" value="<?= e($_SESSION['contact_csrf']) ?>">
            <div style="position:absolute;left:-9999px" aria-hidden="true">
              <label for="hp_website">Leave this field blank</label>
              <input type="text" id="hp_website" name="website" tabindex="-1" autocomplete="off">
            </div>
            <div class="field">
              <label for="cName">Your Name</label>
              <input type="text" id="cName" name="name" value="<?= e($contactOld['name'] ?? '') ?>" required>
            </div>
            <div class="field">
              <label for="cEmail">Email Address</label>
              <input type="email" id="cEmail" name="email" value="<?= e($contactOld['email'] ?? '') ?>" required>
            </div>
            <div class="field">
              <label for="cSubject">Subject</label>
              <input type="text" id="cSubject" name="subject" value="<?= e($contactOld['subject'] ?? '') ?>" required>
            </div>
            <div class="field">
              <label for="cMessage">Message</label>
              <textarea id="cMessage" name="message" rows="6" required><?= e($contactOld['message'] ?? '') ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-large btn-block">Send Message</button>
          </form>
        </div>
      </div>
    </div>

    <div style="margin-top:56px;border:1px solid var(--border)" class="reveal">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.738990197946!2d17.05438237402929!3d-22.55144817950678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1c0b1b2c0c5c2283%3A0x794da44f919f8d64!2sWindhoek%20Medical%20University!5e0!3m2!1sen!2sna!4v1763312215089!5m2!1sen!2sna" width="100%" height="380" style="border:0;display:block" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="WMU campus location"></iframe>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
