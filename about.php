<?php
$root = '';
$pageTitle = 'About';
$pageDescription = 'About Windhoek Medical University — our mission, vision, values and leadership.';
$activeSection = 'about';
$pageHeader = [
    'eyebrow' => 'About WMU',
    'title' => 'About Windhoek Medical University',
    'intro' => 'Advancing healthcare education for Namibia and beyond.',
    'image' => 'banner2.jpg',
];
$breadcrumb = [['label' => 'About']];
require __DIR__ . '/includes/header.php';
$uniImg = $root . 'uni/images/';
?>

<section class="section" id="overview">
  <div class="container">
    <div class="split reveal">
      <div class="media"><img src="<?= e($uniImg) ?>laboratory.jpg" alt="Students working in a teaching laboratory"></div>
      <div class="text">
        <p class="eyebrow">Who We Are</p>
        <h2>Transforming Healthcare Education in Namibia</h2>
        <p>Windhoek Medical University (WMU) is dedicated to advancing healthcare education, training highly skilled professionals who can respond to the region's growing medical needs through applied clinical practice, research and community engagement.</p>
        <p>We combine structured academic training, laboratory-based practicals and clinical placements with community health outreach, so graduates leave academically and practically prepared for the healthcare sector.</p>
      </div>
    </div>
  </div>
</section>

<div class="stat-row">
  <div class="container">
    <div class="stat"><strong>15+</strong><span>Accredited Programmes</span></div>
    <div class="stat"><strong>3,500+</strong><span>Graduates Trained</span></div>
    <div class="stat"><strong>20+</strong><span>Clinical Partner Hospitals</span></div>
    <div class="stat"><strong>4</strong><span>International Partner Universities</span></div>
  </div>
</div>

<section class="section section-alt" id="mission">
  <div class="container">
    <div class="split reverse reveal">
      <div class="media"><img src="<?= e($uniImg) ?>banner2.jpg" alt="Lecture theatre at Windhoek Medical University"></div>
      <div class="text">
        <p class="eyebrow">Our Foundation</p>
        <h2>Mission, Vision &amp; Values</h2>
        <p><strong>Mission —</strong> To meet and exceed our learners' expectations by continuously improving the skills, resources and training methods needed for demand-driven "Education, Training and Development towards Reflective Health Practice".</p>
        <p><strong>Vision —</strong> To be a premier African medical university known for excellence in teaching, research and community health innovation.</p>
        <ul>
          <li>Integrity &amp; Professionalism</li>
          <li>Innovation &amp; Research</li>
          <li>Compassionate Care</li>
          <li>Excellence in Education</li>
          <li>Service to Community</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="section" id="leadership">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Leadership</p>
      <h2>A Message from Our Vice Chancellor</h2>
      <div class="section-rule"></div>
    </div>
    <div class="quote-block reveal">
      <i class="fa-solid fa-quote-left"></i>
      <blockquote>At Windhoek Medical University, we are committed to reshaping healthcare through education, research, and innovation. Our programmes are designed to produce healthcare professionals who embody excellence, compassion, and integrity. We welcome you to be part of a transformative journey.</blockquote>
      <div class="signee">Prof. Kaoko Fria</div>
      <div class="role">Vice Chancellor, Windhoek Medical University</div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Governance</p>
      <h2>Institutional Structure</h2>
      <p>WMU is governed by a University Council and academic Senate, with day-to-day leadership provided by University Management. Full governance documentation, including the organisational structure and Board's message, is being prepared for publication here.</p>
      <div class="section-rule"></div>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <p class="eyebrow eyebrow-light">Ready to Take the Next Step?</p>
    <h2>Explore Our Programmes</h2>
    <p>Find the qualification that matches where you want your healthcare career to go.</p>
    <div class="btn-row">
      <a href="programmes/" class="btn btn-outline-light btn-large">Explore Programmes</a>
      <a href="admissions/apply.php" class="btn btn-primary btn-large">Apply Now</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
