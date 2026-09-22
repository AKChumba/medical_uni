<?php
session_start();
$root = '../';
require_once __DIR__ . '/../includes/programmes-data.php';

$pageTitle = 'Apply Now';
$pageDescription = 'Apply for admission to Windhoek Medical University.';
$activeSection = 'admissions';
$pageHeader = [
    'eyebrow' => 'Admissions',
    'title' => 'Apply for Admission',
    'intro' => 'Start your journey toward becoming a healthcare professional.',
    'image' => 'students.jpg',
];
$breadcrumb = [['label' => 'Admissions', 'url' => 'index.php'], ['label' => 'Apply']];
require __DIR__ . '/../includes/header.php';

// CSRF token for the form.
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(24));
}

// Preserve submitted values and errors after a failed submission
// (apply-submit.php stashes these in the session before redirecting back).
$old = $_SESSION['apply_old'] ?? [];
$errors = $_SESSION['apply_errors'] ?? [];
unset($_SESSION['apply_old'], $_SESSION['apply_errors']);

$preselectedProgramme = $_GET['programme'] ?? ($old['programme'] ?? '');

function old_val($old, $key, $default = '') {
    return e($old[$key] ?? $default);
}
?>

<section class="section">
  <div class="container" style="max-width:900px">

    <?php if ($errors): ?>
    <div class="alert">
      <strong>Please correct the following before submitting:</strong>
      <ul>
        <?php foreach ($errors as $err): ?><li><?= e($err) ?></li><?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <div class="form-section reveal">
      <div class="form-section-head">
        <h2>Application Form</h2>
        <p>Complete the form below. Our admissions team will contact you within 48 hours of receiving your application.</p>
      </div>
      <div class="form-section-body">
        <form action="apply-submit.php" method="POST" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf_token']) ?>">
          <!-- Honeypot: real visitors never fill this in. -->
          <div style="position:absolute;left:-9999px" aria-hidden="true">
            <label for="website">Leave this field blank</label>
            <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
          </div>

          <fieldset>
            <legend>Personal Information</legend>
            <div class="form-grid">
              <div class="field">
                <label for="fullName">Full Name <span class="required-mark">*</span></label>
                <input type="text" id="fullName" name="full_name" value="<?= old_val($old, 'full_name') ?>" required>
              </div>
              <div class="field">
                <label for="email">Email Address <span class="required-mark">*</span></label>
                <input type="email" id="email" name="email" value="<?= old_val($old, 'email') ?>" required>
              </div>
              <div class="field">
                <label for="phone">Phone Number <span class="required-mark">*</span></label>
                <input type="tel" id="phone" name="phone" value="<?= old_val($old, 'phone') ?>" required>
              </div>
              <div class="field">
                <label for="dob">Date of Birth <span class="required-mark">*</span></label>
                <input type="date" id="dob" name="dob" value="<?= old_val($old, 'dob') ?>" required>
              </div>
              <div class="field full">
                <label for="nationality">Nationality <span class="required-mark">*</span></label>
                <input type="text" id="nationality" name="nationality" value="<?= old_val($old, 'nationality') ?>" required>
              </div>
            </div>
          </fieldset>

          <fieldset>
            <legend>Programme Selection</legend>
            <div class="form-grid">
              <div class="field">
                <label for="category">Programme Category <span class="required-mark">*</span></label>
                <select id="category" name="category" required>
                  <option value="">Select Category</option>
                  <?php foreach (['Undergraduate', 'Postgraduate', 'Diploma', 'Certificate'] as $cat): ?>
                  <option <?= (($old['category'] ?? '') === $cat) ? 'selected' : '' ?>><?= e($cat) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="field">
                <label for="programme">Programme Applying For <span class="required-mark">*</span></label>
                <select id="programme" name="programme" required>
                  <option value="">Select Programme</option>
                  <?php foreach (get_programmes() as $p): ?>
                  <option <?= ($preselectedProgramme === $p['name']) ? 'selected' : '' ?>><?= e($p['name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </fieldset>

          <fieldset>
            <legend>Required Documents</legend>
            <p style="color:var(--muted);font-size:14.5px">Please upload clear copies of the following. Accepted formats: PDF, JPG, PNG, DOC, DOCX — 5&nbsp;MB max per file.</p>
            <ul style="margin:0 0 16px 20px;color:var(--muted);font-size:14.5px">
              <li>ID / Passport</li>
              <li>Grade 12 Certificate / Highest Qualification</li>
              <li>Transcripts (if available)</li>
              <li>Proof of English proficiency (if required)</li>
            </ul>
            <div class="upload-box">
              <label for="documents"><strong>Upload Documents <span class="required-mark">*</span></strong></label><br><br>
              <input type="file" id="documents" name="documents[]" multiple required
                     accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
              <ul class="upload-list" id="documentsList"></ul>
            </div>
          </fieldset>

          <fieldset>
            <legend>Additional Information</legend>
            <div class="field">
              <label for="notes">Additional Notes / Questions</label>
              <textarea id="notes" name="notes" placeholder="Optional"><?= old_val($old, 'notes') ?></textarea>
            </div>
          </fieldset>

          <button type="submit" class="btn btn-primary btn-large btn-block">Submit Application</button>
        </form>
      </div>
    </div>

  </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
