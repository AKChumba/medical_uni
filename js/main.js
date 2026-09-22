/* ==========================================================
   WMU — shared site behaviour. Every block guards for the
   element(s) it needs, so this one file works unmodified on
   every page in the site.
   ========================================================== */

/* ---------- Mobile nav (off-canvas) ---------- */
(function () {
  const toggle = document.getElementById('navToggle');
  const close = document.getElementById('navClose');
  const nav = document.getElementById('primaryNav');
  const backdrop = document.getElementById('navBackdrop');
  if (!toggle || !nav) return;

  function openNav() {
    nav.classList.add('open');
    toggle.setAttribute('aria-expanded', 'true');
    if (backdrop) backdrop.classList.add('open');
    document.body.classList.add('nav-open');
  }
  function closeNav() {
    nav.classList.remove('open');
    toggle.setAttribute('aria-expanded', 'false');
    if (backdrop) backdrop.classList.remove('open');
    document.body.classList.remove('nav-open');
    nav.querySelectorAll('.nav-item.open').forEach(li => li.classList.remove('open'));
  }

  toggle.addEventListener('click', () => {
    nav.classList.contains('open') ? closeNav() : openNav();
  });
  if (close) close.addEventListener('click', closeNav);
  if (backdrop) backdrop.addEventListener('click', closeNav);
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeNav();
  });
})();

/* ---------- Dropdown submenus (desktop hover/click + mobile accordion) ---------- */
(function () {
  const items = document.querySelectorAll('.nav-item.has-children');
  if (!items.length) return;

  function isMobile() { return window.matchMedia('(max-width: 900px)').matches; }

  items.forEach(item => {
    const btn = item.querySelector('.nav-caret-btn');
    if (!btn) return;

    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const willOpen = !item.classList.contains('open');

      if (!isMobile()) {
        // Desktop: only one dropdown open at a time.
        items.forEach(other => {
          if (other !== item) {
            other.classList.remove('open');
            const ob = other.querySelector('.nav-caret-btn');
            if (ob) ob.setAttribute('aria-expanded', 'false');
          }
        });
      }

      item.classList.toggle('open', willOpen);
      btn.setAttribute('aria-expanded', String(willOpen));
    });
  });

  // Desktop: close dropdown when clicking elsewhere.
  document.addEventListener('click', (e) => {
    if (isMobile()) return;
    items.forEach(item => {
      if (!item.contains(e.target)) {
        item.classList.remove('open');
        const b = item.querySelector('.nav-caret-btn');
        if (b) b.setAttribute('aria-expanded', 'false');
      }
    });
  });
})();

/* ---------- Sticky header shadow on scroll ---------- */
(function () {
  const header = document.querySelector('.site-header');
  if (!header) return;
  const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 8);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
})();

/* ---------- Reveal on scroll ---------- */
(function () {
  const reveals = document.querySelectorAll('.reveal');
  if (!reveals.length) return;
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('inview');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(r => io.observe(r));
})();

/* ---------- Accordions (programme catalogue / downloads) ---------- */
function toggleSection(id) {
  const section = document.getElementById(id);
  if (!section) return;
  section.classList.toggle('open');
  const btn = document.querySelector(`[data-toggle-target="${id}"]`);
  if (btn) btn.setAttribute('aria-expanded', String(section.classList.contains('open')));
}

/* ---------- Programme catalogue filter (programmes/index.php only) ---------- */
(function () {
  const search = document.getElementById('programmeSearch');
  const levelSelect = document.getElementById('programmeLevel');
  const cards = document.querySelectorAll('[data-programme-card]');
  if (!search && !levelSelect) return;
  if (!cards.length) return;

  function applyFilter() {
    const term = (search?.value || '').trim().toLowerCase();
    const level = levelSelect?.value || 'all';
    let anyVisibleInGroup = {};

    cards.forEach(card => {
      const name = (card.dataset.name || '').toLowerCase();
      const cardLevel = card.dataset.level || '';
      const matchesTerm = term === '' || name.includes(term);
      const matchesLevel = level === 'all' || cardLevel === level;
      const visible = matchesTerm && matchesLevel;
      card.style.display = visible ? '' : 'none';
      if (visible) anyVisibleInGroup[cardLevel] = true;
    });

    document.querySelectorAll('[data-level-group]').forEach(group => {
      const groupLevel = group.dataset.levelGroup;
      group.style.display = anyVisibleInGroup[groupLevel] ? '' : 'none';
    });
  }

  search?.addEventListener('input', applyFilter);
  levelSelect?.addEventListener('change', applyFilter);
})();

/* ---------- Application form: file size / type feedback (admissions/apply.php) ---------- */
(function () {
  const input = document.getElementById('documents');
  const list = document.getElementById('documentsList');
  if (!input || !list) return;

  input.addEventListener('change', () => {
    list.innerHTML = '';
    Array.from(input.files).forEach(file => {
      const li = document.createElement('li');
      const sizeKb = Math.round(file.size / 1024);
      li.textContent = `${file.name} (${sizeKb} KB)`;
      list.appendChild(li);
    });
  });
})();
