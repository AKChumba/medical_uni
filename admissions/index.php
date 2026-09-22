<?php
$root = '../';
$pageTitle = 'Admissions';
$pageDescription = 'How to apply, entry requirements, fees and the grading system at Windhoek Medical University.';
$activeSection = 'admissions';
$pageHeader = [
    'eyebrow' => 'Admissions',
    'title' => 'Admissions',
    'intro' => 'Everything you need to know before you apply — how to apply, entry requirements and fees.',
    'image' => 'students.jpg',
];
$breadcrumb = [['label' => 'Admissions']];
require __DIR__ . '/../includes/header.php';
$uniImg = $root . 'uni/images/';
?>

<section class="section" id="how-to-apply">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">Getting Started</p>
      <h2>How to Apply</h2>
      <div class="section-rule"></div>
    </div>

    <div class="split reveal">
      <div class="text">
        <ol style="padding-left:20px;margin:0">
          <li style="margin-bottom:14px"><strong>Choose your programme</strong> — browse the <a href="<?= e($root) ?>programmes/">academic programmes</a> and confirm you meet the entry requirements.</li>
          <li style="margin-bottom:14px"><strong>Complete the online application</strong> — fill in your personal, academic and programme details.</li>
          <li style="margin-bottom:14px"><strong>Upload your documents</strong> — ID/passport, Grade 12 certificate or highest qualification, and transcripts where available.</li>
          <li style="margin-bottom:14px"><strong>Receive your reference number</strong> — you'll get an application reference immediately, and a confirmation email where possible.</li>
          <li style="margin-bottom:0"><strong>Admissions review</strong> — our admissions team reviews your application and contacts you regarding next steps, including any offer conditions.</li>
        </ol>
        <p style="margin-top:24px"><a href="apply.php" class="btn btn-primary btn-large">Start Your Application</a></p>
      </div>
      <div class="media"><img src="<?= e($uniImg) ?>students.jpg" alt="Prospective students on campus"></div>
    </div>
  </div>
</section>

<section class="section section-alt" id="requirements">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">Before You Apply</p>
      <h2>General Entry Requirements</h2>
      <p>Specific requirements vary by programme — see each programme page for exact subject and point requirements.</p>
      <div class="section-rule"></div>
    </div>

    <div class="table-wrap">
      <table class="data-table">
        <thead>
          <tr><th>Qualification Level</th><th>Typical Minimum Requirement</th></tr>
        </thead>
        <tbody>
          <tr><td>Certificate Programmes</td><td>Grade 10 or Grade 12 / NSSCO, with a pass in English</td></tr>
          <tr><td>Diploma Programmes</td><td>Grade 12 / NSSCO with 20+ points, relevant subject passes</td></tr>
          <tr><td>Undergraduate Degrees</td><td>Grade 12 / NSSCO with 25+ points, relevant science subject passes</td></tr>
          <tr><td>Bachelor of Medicine &amp; Surgery (MBChB)</td><td>Grade 12 / NSSCO with 32+ points, Biology, Chemistry, Physics &amp; Mathematics, competitive interview</td></tr>
          <tr><td>Postgraduate Degrees</td><td>A recognised Bachelor's degree in a relevant field</td></tr>
        </tbody>
      </table>
    </div>
    <p style="margin-top:16px;font-size:14px;color:var(--muted)">Clinical and laboratory-based programmes also require a medical fitness certificate and, where relevant, a police clearance certificate before placement.</p>
  </div>
</section>

<section class="section" id="fees">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">Investing in Your Education</p>
      <h2>Fees Structure</h2>
      <p>Windhoek Medical University does not discriminate on the basis of race, colour, national or ethnic origin in its educational policies, admissions or scholarships.</p>
      <div class="section-rule"></div>
    </div>

    <h3 style="font-size:18px">Undergraduate &amp; Diploma Programmes</h3>
    <div class="table-wrap" style="margin-bottom:40px">
      <table class="data-table">
        <thead>
          <tr><th>Programme</th><th>Equip. Fee</th><th>Namibian (per year)</th><th>Foreign (per year)</th><th>Duration</th></tr>
        </thead>
        <tbody>
          <tr><td>Bachelor of Nursing</td><td>N$ 11,999</td><td>N$ 69,360</td><td>N$ 104,040</td><td>4 years</td></tr>
          <tr><td>Bachelor of Pharmacy</td><td>N$ 11,999</td><td>N$ 88,360</td><td>N$ 132,540</td><td>4 years</td></tr>
          <tr><td>Bachelor of General Medicine and Surgery</td><td>N$ 11,999</td><td>N$ 91,908</td><td>N$ 134,862</td><td>6 years</td></tr>
          <tr><td>Diploma in Nursing</td><td>N$ 11,999</td><td>N$ 60,360</td><td>N$ 83,040</td><td>3 years</td></tr>
          <tr><td>Diploma in Environmental Health Technology</td><td>N$ 11,999</td><td>N$ 55,360</td><td>N$ 83,040</td><td>3 years</td></tr>
        </tbody>
      </table>
    </div>

    <h3 style="font-size:18px">Certificate Programmes</h3>
    <div class="table-wrap">
      <table class="data-table">
        <thead>
          <tr><th>Programme</th><th>Equip. Fee</th><th>Namibian</th><th>Non-Namibian</th><th>Duration</th></tr>
        </thead>
        <tbody>
          <tr><td>Certificate in Community Health</td><td>N$ 2,999</td><td>N$ 17,600</td><td>N$ 23,699</td><td>1 year</td></tr>
          <tr><td>Certificate in Emergency &amp; Trauma Care</td><td>N$ 2,999</td><td>N$ 13,600</td><td>N$ 23,699</td><td>1 year</td></tr>
          <tr><td>Certificate in Health Promotion</td><td>N$ 2,999</td><td>N$ 13,600</td><td>N$ 23,699</td><td>1 year</td></tr>
        </tbody>
      </table>
    </div>
    <p style="margin-top:16px;font-size:14px;color:var(--muted)">A deposit of 25% (Namibian students) or 35% (international students) secures registration. Full fee schedules for every programme are available in the <a href="<?= e($root) ?>downloads.php">downloads section</a>.</p>
  </div>
</section>

<section class="section section-alt" id="grading">
  <div class="container">
    <div class="section-head">
      <p class="eyebrow">Assessment</p>
      <h2>Grading System</h2>
      <div class="section-rule"></div>
    </div>
    <div class="table-wrap">
      <table class="data-table">
        <thead><tr><th>Grade</th><th>Percentage Range</th><th>Description</th></tr></thead>
        <tbody>
          <tr><td>A</td><td>80–100%</td><td>Outstanding</td></tr>
          <tr><td>B</td><td>70–79%</td><td>Very Good</td></tr>
          <tr><td>C</td><td>60–69%</td><td>Good</td></tr>
          <tr><td>D</td><td>50–59%</td><td>Satisfactory</td></tr>
          <tr><td>E</td><td>45–49%</td><td>Pass</td></tr>
          <tr><td>F</td><td>Below 45%</td><td>Fail</td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="container">
    <p class="eyebrow eyebrow-light">Ready to Apply?</p>
    <h2>Start Your Application Today</h2>
    <p>Have a question first? Our admissions team is ready to help.</p>
    <div class="btn-row">
      <a href="<?= e($root) ?>contact.php" class="btn btn-outline-light btn-large">Contact Admissions</a>
      <a href="apply.php" class="btn btn-primary btn-large">Apply Now</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
