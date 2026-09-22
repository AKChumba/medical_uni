<?php
$root = '';
require_once __DIR__ . '/includes/programmes-data.php';

$pageTitle = 'Home';
$pageDescription = 'Windhoek Medical University trains Namibia\'s nurses, pharmacists, doctors and allied health professionals through accredited undergraduate, diploma and certificate programmes.';
$activeSection = 'home';
// No $pageHeader — the homepage builds its own hero below.
require __DIR__ . '/includes/header.php';

$uniImg = $root . 'uni/images/';
$featured = ['nursing', 'pharmacy', 'medicine', 'master-public-health'];
?>

<!-- HERO -->
<section class="hero" style="background-image:url('<?= e($uniImg) ?>banner2.jpg');">
  <div class="container">
    <p class="eyebrow">January 2026 Intake Now Open</p>
    <h1>Training Namibia's Next Generation of Healthcare Professionals</h1>
    <p class="lead">Accredited nursing, pharmacy, medicine and allied-health programmes, built on clinical placement, applied research and community practice.</p>
    <div class="hero-ctas">
      <a href="admissions/apply.php" class="btn btn-primary btn-large">Apply Now</a>
      <a href="programmes/" class="btn btn-outline-light btn-large">Explore Programmes</a>
    </div>
  </div>
</section>

<!-- QUICK LINKS -->
<section class="quicklinks">
  <div class="container">
    <a href="admissions/apply.php"><i class="fa-solid fa-file-signature"></i> Apply for Admission</a>
    <a href="admissions/#fees"><i class="fa-solid fa-coins"></i> Fees &amp; Funding</a>
    <a href="downloads.php"><i class="fa-solid fa-download"></i> Prospectus &amp; Forms</a>
    <a href="#"><i class="fa-solid fa-right-to-bracket"></i> myWMU Portal</a>
  </div>
</section>

<!-- ABOUT WMU -->
<section class="section">
  <div class="container">
    <div class="split reveal">
      <div class="media"><img src="<?= e($uniImg) ?>laboratory.jpg" alt="Students in a teaching laboratory at Windhoek Medical University"></div>
      <div class="text">
        <p class="eyebrow">About WMU</p>
        <h2>An Institution Built Around Clinical Practice</h2>
        <p>Windhoek Medical University (WMU) trains healthcare professionals for Namibia and the wider region, combining classroom instruction with hands-on laboratory work and structured hospital placements from an early stage of study.</p>
        <p>Our programmes are delivered in partnership with international universities, giving students access to a broader academic network while training locally, close to the communities they will go on to serve.</p>
        <p><a href="about.php">Read more about WMU &rarr;</a></p>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stat-row">
  <div class="container">
    <div class="stat"><strong>15+</strong><span>Accredited Programmes</span></div>
    <div class="stat"><strong>3,500+</strong><span>Graduates Trained</span></div>
    <div class="stat"><strong>20+</strong><span>Clinical Partner Hospitals</span></div>
    <div class="stat"><strong>4</strong><span>International Partner Universities</span></div>
  </div>
</div>

<!-- PROGRAMMES -->
<section class="section section-alt" id="programmes">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">Academic Programmes</p>
      <h2>What You Can Study at WMU</h2>
      <p>From foundational certificates to postgraduate degrees, across nursing, pharmacy, medicine and public health.</p>
      <div class="section-rule"></div>
    </div>

    <div class="programme-table">
      <?php foreach ($featured as $slug): $p = get_programme($slug); ?>
      <div class="programme-row reveal">
        <div class="thumb"><img src="<?= e($uniImg . $p['image']) ?>" alt="<?= e($p['name']) ?>"></div>
        <div class="content">
          <h3><a href="programmes/<?= e($slug) ?>.php"><?= e($p['name']) ?></a></h3>
          <div class="meta">
            <span><i class="fa-solid fa-graduation-cap"></i><?= e($p['level']) ?></span>
            <span><i class="fa-regular fa-clock"></i><?= e($p['duration']) ?></span>
          </div>
          <p><?= e($p['summary']) ?></p>
        </div>
        <div class="action"><a href="programmes/<?= e($slug) ?>.php" class="btn btn-outline">View Programme</a></div>
      </div>
      <?php endforeach; ?>
    </div>

    <p style="text-align:center;margin-top:36px"><a href="programmes/" class="btn btn-secondary">View All Programmes</a></p>
  </div>
</section>

<!-- STUDENT OPPORTUNITIES -->
<section class="section">
  <div class="container">
    <div class="split reverse reveal">
      <div class="media"><img src="<?= e($uniImg) ?>library.jpg" alt="Student studying in the WMU library"></div>
      <div class="text">
        <p class="eyebrow">Student Life</p>
        <h2>More Than a Classroom</h2>
        <p>Beyond lectures and clinical placements, WMU students take part in community health outreach, peer study groups and campus support services designed to help every student succeed academically and personally.</p>
        <ul>
          <li>Structured clinical and fieldwork placements from early years of study</li>
          <li>Community health outreach and public health campaigns</li>
          <li>Academic support and study skills guidance</li>
          <li>Access to library resources and study spaces</li>
        </ul>
        <p><a href="students/">Explore student support &rarr;</a></p>
      </div>
    </div>
  </div>
</section>

<!-- WHY STUDY HERE -->
<section class="section section-navy">
  <div class="container">
    <div class="section-head center">
      <p class="eyebrow">Why Study at WMU</p>
      <h2>Education Grounded in Practice</h2>
      <div class="section-rule"></div>
    </div>
    <div class="split reveal" style="align-items:flex-start">
      <div class="text">
        <h3 style="color:#fff">Accredited, Practice-Ready Programmes</h3>
        <p>Every qualification is structured around the skills employers and clinical settings actually require, with placement hours built into the curriculum rather than treated as an afterthought.</p>
      </div>
      <div class="text">
        <h3 style="color:#fff">A Faculty of Practising Professionals</h3>
        <p>Students learn from lecturers with direct clinical and laboratory experience, not from theory alone — bringing real cases and current practice into the classroom.</p>
      </div>
    </div>
  </div>
</section>

<!-- PARTNERS -->
<section class="partner-strip">
  <div class="container">
    <div class="label">Delivered in Partnership With</div>
    <div class="logos">
      <span>Kaduna State University</span>
      <span>American University of Moldova</span>
      <span>USPEE</span>
      <span>Girne American University</span>
    </div>
  </div>
  <p style="text-align:center;margin:18px 0 0;font-size:13.5px"><a href="partners.php">Learn more about our international partnerships &rarr;</a></p>
</section>

<!-- LEADERSHIP QUOTE -->
<section class="section">
  <div class="container">
    <div class="quote-block reveal">
      <i class="fa-solid fa-quote-left"></i>
      <blockquote>At Windhoek Medical University, we are committed to reshaping healthcare through education, research, and innovation. Our programmes are designed to produce healthcare professionals who embody excellence, compassion, and integrity.</blockquote>
      <div class="signee">Prof. Kaoko Fria</div>
      <div class="role">Vice Chancellor, Windhoek Medical University</div>
    </div>
  </div>
</section>

<!-- ADMISSIONS CTA -->
<section class="cta-band">
  <div class="container">
    <p class="eyebrow eyebrow-light">Applications Open</p>
    <h2>Apply for the 2026 January Intake</h2>
    <p>Places are limited across all programmes — start your application today.</p>
    <div class="btn-row">
      <a href="admissions/apply.php" class="btn btn-primary btn-large">Start Your Application</a>
      <a href="contact.php" class="btn btn-outline-light btn-large">Talk to Admissions</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
