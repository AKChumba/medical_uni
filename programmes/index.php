<?php
$root = '../';
require_once __DIR__ . '/../includes/programmes-data.php';

$pageTitle = 'Academic Programmes';
$pageDescription = 'Browse undergraduate, postgraduate, diploma and certificate programmes offered at Windhoek Medical University.';
$activeSection = 'academics';
$pageHeader = [
    'eyebrow' => 'Academics',
    'title' => 'Academic Programmes',
    'intro' => 'Undergraduate, postgraduate, diploma and certificate pathways in nursing, pharmacy, medicine and allied health.',
    'image' => 'laboratory.jpg',
];
$breadcrumb = [['label' => 'Programmes']];
require __DIR__ . '/../includes/header.php';
$uniImg = $root . 'uni/images/';

$levels = [
    'undergraduate' => ['label' => 'Undergraduate Programmes', 'match' => 'Undergraduate'],
    'postgraduate'  => ['label' => 'Postgraduate Programmes', 'match' => 'Postgraduate'],
    'diploma'       => ['label' => 'Diploma Programmes', 'match' => 'Diploma'],
    'certificate'   => ['label' => 'Certificate Programmes', 'match' => 'Certificate'],
];
?>

<section class="section">
  <div class="container">

    <div class="filter-bar">
      <div class="filter-field">
        <label for="programmeSearch">Search Programmes</label>
        <input type="text" id="programmeSearch" placeholder="e.g. Nursing, Pharmacy, Public Health…">
      </div>
      <div class="filter-field">
        <label for="programmeLevel">Qualification Level</label>
        <select id="programmeLevel">
          <option value="all">All Levels</option>
          <option value="Undergraduate">Undergraduate</option>
          <option value="Postgraduate">Postgraduate</option>
          <option value="Diploma">Diploma</option>
          <option value="Certificate">Certificate</option>
        </select>
      </div>
    </div>

    <?php foreach ($levels as $anchor => $meta):
      $items = get_programmes($meta['match']);
      if (!$items) continue;
    ?>
    <div class="level-group" id="<?= e($anchor) ?>" data-level-group="<?= e($meta['match']) ?>">
      <div class="level-group-head">
        <h2><?= e($meta['label']) ?></h2>
        <span><?= count($items) ?> programme<?= count($items) === 1 ? '' : 's' ?></span>
      </div>
      <div class="programme-table">
        <?php foreach ($items as $p): ?>
        <div class="programme-row" data-programme-card data-name="<?= e($p['name']) ?>" data-level="<?= e($p['level']) ?>">
          <div class="thumb"><img src="<?= e($uniImg . $p['image']) ?>" alt="<?= e($p['name']) ?>"></div>
          <div class="content">
            <h3><a href="<?= e($p['slug']) ?>.php"><?= e($p['name']) ?></a></h3>
            <div class="meta">
              <span><i class="fa-solid fa-certificate"></i><?= e($p['qualification']) ?></span>
              <span><i class="fa-regular fa-clock"></i><?= e($p['duration']) ?></span>
            </div>
            <p><?= e($p['summary']) ?></p>
          </div>
          <div class="action"><a href="<?= e($p['slug']) ?>.php" class="btn btn-outline">View Programme</a></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</section>

<section class="cta-band">
  <div class="container">
    <p class="eyebrow eyebrow-light">Not Sure Which Programme Is Right for You?</p>
    <h2>Talk to Our Admissions Team</h2>
    <p>We'll help you match your interests and qualifications to the right programme.</p>
    <div class="btn-row">
      <a href="<?= e($root) ?>contact.php" class="btn btn-outline-light btn-large">Contact Admissions</a>
      <a href="<?= e($root) ?>admissions/apply.php" class="btn btn-primary btn-large">Apply Now</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
