<?php
$root = '';
$pageTitle = 'International Partners';
$pageDescription = 'Windhoek Medical University\'s international university partnerships.';
$activeSection = 'about';
$pageHeader = [
    'eyebrow' => 'International Partnerships',
    'title' => 'International & Partner Institutions',
    'intro' => 'Our degree and foundation programmes are delivered in partnership with universities beyond Namibia\'s borders.',
    'image' => 'windhoek.png',
];
$breadcrumb = [['label' => 'International Partners']];
require __DIR__ . '/includes/header.php';
$uniImg = $root . 'uni/images/';

$partners = [
    'Kaduna State University',
    'American University of Moldova',
    'USPEE',
    'Girne American University',
];
?>

<section class="section">
  <div class="container" style="max-width:820px">
    <p class="eyebrow">Why We Partner</p>
    <h2>Studying Locally, Connected Globally</h2>
    <p>Our degree and foundation programmes are delivered in partnership with universities in Moldova, Cyprus and Nigeria. Studying with WMU can be more financially accessible than studying abroad directly, while still giving students access to a broader international academic network and recognised qualification pathways.</p>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Our Partner Universities</p>
      <h2>Delivered in Partnership With</h2>
      <div class="section-rule"></div>
    </div>

    <div class="programme-table">
      <?php foreach ($partners as $partner): ?>
      <div class="programme-row reveal">
        <div class="content" style="padding-left:4px">
          <h3><?= e($partner) ?></h3>
          <p>Partnership details for this institution's collaborative programmes are being finalised for publication here.</p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <p class="eyebrow eyebrow-light">Have Questions About Our Partnerships?</p>
    <h2>Contact Our Admissions Team</h2>
    <div class="btn-row">
      <a href="<?= e($root) ?>contact.php" class="btn btn-outline-light btn-large">Contact Us</a>
      <a href="<?= e($root) ?>admissions/apply.php" class="btn btn-primary btn-large">Apply Now</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
