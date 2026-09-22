<?php
$root = '../';
$pageTitle = 'Student Support';
$pageDescription = 'Student support services at Windhoek Medical University — library, portal, academic calendar and enquiries.';
$activeSection = 'students';
$pageHeader = [
    'eyebrow' => 'Students',
    'title' => 'Student Support',
    'intro' => 'Resources and services to support you throughout your studies at WMU.',
    'image' => 'library.jpg',
];
$breadcrumb = [['label' => 'Students']];
require __DIR__ . '/../includes/header.php';
$uniImg = $root . 'uni/images/';
?>

<section class="section">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">Support Services</p>
      <h2>Resources for Current Students</h2>
      <div class="section-rule"></div>
    </div>

    <div class="programme-table">
      <div class="programme-row reveal">
        <div class="thumb"><img src="<?= e($uniImg) ?>library.jpg" alt="University library"></div>
        <div class="content">
          <h3>Library Access</h3>
          <p>Access study spaces, reference materials and the university's e-library resources. Details and login access for the online library are being finalised.</p>
        </div>
      </div>

      <div class="programme-row reveal">
        <div class="thumb"><img src="<?= e($uniImg) ?>students.jpg" alt="Students on campus"></div>
        <div class="content">
          <h3>myWMU Student Portal</h3>
          <p>The student portal for registration, results and timetables is in development. Current students should contact the registrar's office for portal access in the meantime.</p>
        </div>
      </div>

      <div class="programme-row reveal">
        <div class="thumb"><img src="<?= e($uniImg) ?>banner2.jpg" alt="Academic calendar"></div>
        <div class="content">
          <h3>Academic Calendar</h3>
          <p>Semester dates, registration windows and examination periods. Available in the <a href="<?= e($root) ?>downloads.php">downloads section</a>.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Need Help?</p>
      <h2>Get in Touch with Student Affairs</h2>
      <p>For registration, academic or wellbeing support, reach the relevant office directly.</p>
      <div class="section-rule"></div>
    </div>

    <div class="split reveal" style="align-items:flex-start">
      <div class="text">
        <h3>Academic &amp; Registration Enquiries</h3>
        <p>For module registration, transcripts and academic record queries, contact the Registrar's Office.</p>
        <p><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a> &middot; <a href="tel:<?= e(SITE_PHONE_HREF) ?>"><?= e(SITE_PHONE) ?></a></p>
      </div>
      <div class="text">
        <h3>Chat with Us on WhatsApp</h3>
        <p>For quick questions about student life, clinical placements or campus services, message our team directly.</p>
        <p><a href="https://wa.me/264814642621" target="_blank" rel="noopener">Start a WhatsApp chat &rarr;</a></p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
