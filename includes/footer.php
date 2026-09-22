</main>

<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-about">
      <img src="<?= e($uniImg) ?>logo.png" alt="<?= e(SITE_SHORT_NAME) ?> crest" class="footer-logo">
      <p class="footer-name"><?= e(SITE_NAME) ?></p>
      <p>Training healthcare professionals who serve communities across Namibia and the wider region.</p>
      <div class="socials">
        <a aria-label="Facebook" href="#"><i class="fab fa-facebook-f"></i></a>
        <a aria-label="Twitter / X" href="#"><i class="fab fa-x-twitter"></i></a>
        <a aria-label="Instagram" href="#"><i class="fab fa-instagram"></i></a>
        <a aria-label="LinkedIn" href="#"><i class="fab fa-linkedin"></i></a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Academics</h4>
      <ul>
        <li><a href="<?= e($root) ?>programmes/#undergraduate">Undergraduate</a></li>
        <li><a href="<?= e($root) ?>programmes/#postgraduate">Postgraduate</a></li>
        <li><a href="<?= e($root) ?>programmes/#diploma">Diplomas</a></li>
        <li><a href="<?= e($root) ?>programmes/#certificate">Certificates</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Admissions</h4>
      <ul>
        <li><a href="<?= e($root) ?>admissions/#how-to-apply">How to Apply</a></li>
        <li><a href="<?= e($root) ?>admissions/#requirements">Entry Requirements</a></li>
        <li><a href="<?= e($root) ?>admissions/#fees">Fees</a></li>
        <li><a href="<?= e($root) ?>admissions/apply.php">Apply Now</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Institution</h4>
      <ul>
        <li><a href="<?= e($root) ?>about.php">About WMU</a></li>
        <li><a href="<?= e($root) ?>partners.php">International Partners</a></li>
        <li><a href="<?= e($root) ?>students/">Student Support</a></li>
        <li><a href="<?= e($root) ?>downloads.php">Downloads</a></li>
      </ul>
    </div>

    <div class="footer-col footer-contact-col">
      <h4>Contact</h4>
      <ul class="footer-contact">
        <li><i class="fa-solid fa-location-dot"></i><?= e(SITE_ADDRESS_LINE1) ?>, <?= e(SITE_ADDRESS_LINE2) ?></li>
        <li><i class="fa-solid fa-phone"></i><a href="tel:<?= e(SITE_PHONE_HREF) ?>"><?= e(SITE_PHONE) ?></a></li>
        <li><i class="fa-solid fa-envelope"></i><a href="mailto:<?= e(SITE_EMAIL) ?>"><?= e(SITE_EMAIL) ?></a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container">
      <span>&copy; <?= e(SITE_YEAR) ?> <?= e(SITE_NAME) ?>. All Rights Reserved.</span>
      <span><a href="#">Privacy Policy</a> &middot; <a href="#">Nondiscrimination Policy</a></span>
    </div>
  </div>
</footer>

<a class="floating-whatsapp" href="https://wa.me/264814642621" aria-label="Chat on WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>

<script src="<?= e($root) ?>js/main.js"></script>
</body>
</html>
