<?php
/**
 * Shared programme detail template. Not meant to be requested
 * directly — each programme's own thin file (e.g. nursing.php)
 * sets $slug and includes this.
 */

$root = '../';
require_once __DIR__ . '/../includes/programmes-data.php';

if (empty($slug) || !($programme = get_programme($slug))) {
    header('Location: ' . '/programmes/');
    exit;
}

$pageTitle = $programme['name'];
$pageDescription = $programme['summary'];
$activeSection = 'academics';
$breadcrumb = [
    ['label' => 'Programmes', 'url' => 'index.php'],
    ['label' => $programme['name']],
];
// No generic $pageHeader — this page builds its own programme hero.
require __DIR__ . '/../includes/header.php';
$uniImg = $root . 'uni/images/';
?>

<section class="section-tight">
  <div class="container">
    <nav class="breadcrumb" style="color:var(--muted);margin-bottom:24px">
      <a href="index.php" style="color:var(--muted)">Programmes</a>
      <span class="sep">/</span>
      <span aria-current="page" style="color:var(--ink)"><?= e($programme['name']) ?></span>
    </nav>

    <div class="programme-hero reveal">
      <div class="media" style="background-image:url('<?= e($uniImg . $programme['image']) ?>')"></div>
      <div class="info">
        <span class="qual-tag"><?= e($programme['level']) ?></span>
        <h1><?= e($programme['name']) ?></h1>
        <p><?= e($programme['overview']) ?></p>
        <dl class="fact-list">
          <div><dt>Qualification</dt><dd><?= e($programme['qualification']) ?></dd></div>
          <div><dt>Duration</dt><dd><?= e($programme['duration']) ?></dd></div>
        </dl>
      </div>
    </div>

    <div class="prog-layout">
      <div class="prog-main">

        <section>
          <h2>Programme Overview</h2>
          <p><?= e($programme['overview']) ?></p>
        </section>

        <section>
          <h2>Entry Requirements</h2>
          <ul style="padding-left:20px">
            <?php foreach ($programme['entry_requirements'] as $req): ?>
            <li style="margin-bottom:8px;list-style:disc"><?= e($req) ?></li>
            <?php endforeach; ?>
          </ul>
        </section>

        <section>
          <h2>Curriculum</h2>
          <?php foreach ($programme['curriculum'] as $yearLabel => $modules): ?>
          <div class="curriculum-year">
            <h4><?= e($yearLabel) ?></h4>
            <ul>
              <?php foreach ($modules as $module): ?>
              <li><?= e($module) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endforeach; ?>
        </section>

        <section>
          <h2>Career Opportunities</h2>
          <ul class="career-list">
            <?php foreach ($programme['careers'] as $career): ?>
            <li><i class="fa-solid fa-briefcase-medical"></i><?= e($career) ?></li>
            <?php endforeach; ?>
          </ul>
        </section>

      </div>

      <aside class="prog-sidebar">
        <div class="sidebar-card">
          <h4>Apply for This Programme</h4>
          <p style="font-size:14px;color:var(--muted);margin-bottom:16px">Start your application online — our admissions team will guide you through the rest.</p>
          <a href="<?= e($root) ?>admissions/apply.php?programme=<?= e(urlencode($programme['name'])) ?>" class="btn btn-primary btn-block">Apply Now</a>
        </div>
        <div class="sidebar-card">
          <h4>Related Information</h4>
          <ul>
            <li><a href="<?= e($root) ?>admissions/#requirements">General Entry Requirements</a></li>
            <li><a href="<?= e($root) ?>admissions/#fees">Fees &amp; Payment Plans</a></li>
            <li><a href="<?= e($root) ?>downloads.php">Downloads &amp; Forms</a></li>
            <li><a href="<?= e($root) ?>contact.php">Contact Admissions</a></li>
          </ul>
        </div>
      </aside>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
