<?php
$root = '';
require_once __DIR__ . '/includes/programmes-data.php';

$pageTitle = 'Downloads';
$pageDescription = 'Download forms, the academic calendar and programme information from Windhoek Medical University.';
$activeSection = 'downloads';
$pageHeader = [
    'eyebrow' => 'Resources',
    'title' => 'Downloads',
    'intro' => 'Forms, policies and programme information. Items marked "Coming Soon" are being finalised for publication.',
    'image' => 'library.jpg',
];
$breadcrumb = [['label' => 'Downloads']];
require __DIR__ . '/includes/header.php';
?>

<section class="section">
  <div class="container" style="max-width:900px">

    <div class="accordion-item reveal">
      <div class="accordion-head" data-toggle-target="acc-prospectus" onclick="toggleSection('acc-prospectus')">
        <h3>University Prospectus</h3>
        <button class="accordion-toggle" aria-expanded="false"><i class="fa-solid fa-plus"></i></button>
      </div>
      <div class="accordion-body open" id="acc-prospectus">
        <div class="accordion-body-inner">
          <div class="download-item">
            <i class="fa-solid fa-file-pdf"></i>
            <div class="text"><h4>2026 Full University Prospectus</h4><p>Complete guide to all programmes and requirements</p></div>
            <span class="btn btn-outline disabled">Coming Soon</span>
          </div>
          <div class="download-item">
            <i class="fa-solid fa-file-pdf"></i>
            <div class="text"><h4>Nursing Department Mini Prospectus</h4><p>Details for nursing programmes only</p></div>
            <span class="btn btn-outline disabled">Coming Soon</span>
          </div>
        </div>
      </div>
    </div>

    <div class="accordion-item reveal">
      <div class="accordion-head" data-toggle-target="acc-forms" onclick="toggleSection('acc-forms')">
        <h3>Application Forms &amp; Policies</h3>
        <button class="accordion-toggle" aria-expanded="false"><i class="fa-solid fa-plus"></i></button>
      </div>
      <div class="accordion-body" id="acc-forms">
        <div class="accordion-body-inner">
          <div class="download-item">
            <i class="fa-solid fa-file-signature"></i>
            <div class="text"><h4>Apply Online</h4><p>The paper application form has been replaced by our online application system</p></div>
            <a class="btn btn-primary" href="admissions/apply.php">Apply Now</a>
          </div>
          <div class="download-item">
            <i class="fa-solid fa-file-pdf"></i>
            <div class="text"><h4>Nondiscrimination Policy</h4><p>Our policy on educational access and equal opportunity</p></div>
            <span class="btn btn-outline disabled">Coming Soon</span>
          </div>
          <div class="download-item">
            <i class="fa-solid fa-file-pdf"></i>
            <div class="text"><h4>Academic Calendar</h4><p>Semester dates, registration windows and examination periods</p></div>
            <span class="btn btn-outline disabled">Coming Soon</span>
          </div>
        </div>
      </div>
    </div>

    <div class="accordion-item reveal">
      <div class="accordion-head" data-toggle-target="acc-outlines" onclick="toggleSection('acc-outlines')">
        <h3>Programme &amp; Course Information</h3>
        <button class="accordion-toggle" aria-expanded="false"><i class="fa-solid fa-plus"></i></button>
      </div>
      <div class="accordion-body" id="acc-outlines">
        <div class="accordion-body-inner">
          <?php foreach (get_programmes() as $p): ?>
          <div class="download-item">
            <i class="fa-solid fa-book-open"></i>
            <div class="text"><h4><?= e($p['name']) ?></h4><p>Full curriculum, entry requirements and career outcomes</p></div>
            <a class="btn btn-outline" href="programmes/<?= e($p['slug']) ?>.php">View Programme</a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
