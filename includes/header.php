<?php
/**
 * Shared page head + header. Include after setting:
 *   $root            '' for top-level pages, '../' for one level deep
 *   $pageTitle        string, required
 *   $pageDescription  string, required
 *   $activeSection    one of: home, about, academics, admissions, students, partners, downloads, contact
 * Optional page-banner (skip entirely on the homepage, which builds its own hero):
 *   $pageHeader = ['eyebrow' => '', 'title' => '', 'intro' => '', 'image' => 'library.jpg']
 *   $breadcrumb = [['label' => 'Programmes', 'url' => $root.'programmes/'], ['label' => 'Nursing']]
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$root = $root ?? '';
$uniImg = $root . 'uni/images/';
$activeSection = $activeSection ?? '';

$navItems = [
    'about' => [
        'label' => 'About',
        'url' => $root . 'about.php',
        'children' => [
            ['label' => 'Overview & Mission', 'url' => $root . 'about.php#overview'],
            ['label' => 'Vision & Values', 'url' => $root . 'about.php#mission'],
            ['label' => 'Leadership Message', 'url' => $root . 'about.php#leadership'],
            ['label' => 'International Partners', 'url' => $root . 'partners.php'],
        ],
    ],
    'academics' => [
        'label' => 'Academics',
        'url' => $root . 'programmes/',
        'children' => [
            ['label' => 'All Programmes', 'url' => $root . 'programmes/'],
            ['label' => 'Undergraduate Degrees', 'url' => $root . 'programmes/#undergraduate'],
            ['label' => 'Postgraduate Degrees', 'url' => $root . 'programmes/#postgraduate'],
            ['label' => 'Diplomas', 'url' => $root . 'programmes/#diploma'],
            ['label' => 'Certificates', 'url' => $root . 'programmes/#certificate'],
        ],
    ],
    'admissions' => [
        'label' => 'Admissions',
        'url' => $root . 'admissions/',
        'children' => [
            ['label' => 'How to Apply', 'url' => $root . 'admissions/#how-to-apply'],
            ['label' => 'Entry Requirements', 'url' => $root . 'admissions/#requirements'],
            ['label' => 'Fees', 'url' => $root . 'admissions/#fees'],
            ['label' => 'Apply Now', 'url' => $root . 'admissions/apply.php'],
        ],
    ],
    'students' => [
        'label' => 'Students',
        'url' => $root . 'students/',
        'children' => [],
    ],
    'downloads' => [
        'label' => 'Downloads',
        'url' => $root . 'downloads.php',
        'children' => [],
    ],
    'contact' => [
        'label' => 'Contact',
        'url' => $root . 'contact.php',
        'children' => [],
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= e($pageTitle) ?> | <?= e(SITE_NAME) ?></title>
<meta name="description" content="<?= e($pageDescription) ?>">
<link rel="icon" href="<?= e($uniImg) ?>logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:opsz,wght@8..60,500;8..60,600;8..60,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="<?= e($root) ?>style.css">
</head>
<body>

<a class="skip-link" href="#main">Skip to main content</a>

<div class="utility-bar">
  <div class="container">
    <ul class="utility-links">
      <li><a href="<?= e($root) ?>downloads.php">Forms &amp; Documents</a></li>
      <li><a href="#">Library</a></li>
      <li><a href="#">Vacancies</a></li>
      <li><a href="#">myWMU Portal</a></li>
    </ul>
    <div class="utility-contact">
      <a href="tel:<?= e(SITE_PHONE_HREF) ?>"><i class="fa-solid fa-phone"></i><?= e(SITE_PHONE) ?></a>
      <a href="mailto:<?= e(SITE_EMAIL) ?>"><i class="fa-solid fa-envelope"></i><?= e(SITE_EMAIL) ?></a>
    </div>
  </div>
</div>

<header class="site-header">
  <div class="container site-header-inner">
    <a class="brand" href="<?= e($root) ?>index.php">
      <img src="<?= e($uniImg) ?>logo.png" alt="<?= e(SITE_SHORT_NAME) ?> crest">
      <span class="brand-text">
        <span class="brand-name"><?= e(SITE_NAME) ?></span>
        <span class="brand-sub"><?= e(SITE_TAGLINE) ?></span>
      </span>
    </a>

    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="primaryNav">
      <i class="fa-solid fa-bars"></i>
      <span class="sr-only">Menu</span>
    </button>

    <nav class="primary-nav" id="primaryNav" aria-label="Primary">
      <div class="nav-panel-head">
        <a class="brand" href="<?= e($root) ?>index.php">
          <img src="<?= e($uniImg) ?>logo.png" alt="<?= e(SITE_SHORT_NAME) ?> crest">
          <span class="brand-text"><span class="brand-name"><?= e(SITE_NAME) ?></span></span>
        </a>
        <button class="nav-close" id="navClose" aria-label="Close menu"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <ul class="nav-list">
        <li><a href="<?= e($root) ?>index.php" class="<?= $activeSection === 'home' ? 'active' : '' ?>">Home</a></li>
        <?php foreach ($navItems as $key => $item): ?>
        <li class="nav-item<?= $item['children'] ? ' has-children' : '' ?>">
          <div class="nav-link-row">
            <a href="<?= e($item['url']) ?>" class="<?= $activeSection === $key ? 'active' : '' ?>"><?= e($item['label']) ?></a>
            <?php if ($item['children']): ?>
            <button type="button" class="nav-caret-btn" aria-expanded="false" aria-label="Toggle <?= e($item['label']) ?> submenu">
              <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
            </button>
            <?php endif; ?>
          </div>
          <?php if ($item['children']): ?>
          <ul class="nav-dropdown">
            <?php foreach ($item['children'] as $child): ?>
            <li><a href="<?= e($child['url']) ?>"><?= e($child['label']) ?></a></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>

      <div class="nav-cta-wrap">
        <a href="<?= e($root) ?>admissions/apply.php" class="btn btn-primary">Apply Now</a>
      </div>
    </nav>
  </div>
</header>
<div class="nav-backdrop" id="navBackdrop"></div>

<?php if (!empty($pageHeader)): ?>
<section class="page-banner" style="background-image:url('<?= e($uniImg . ($pageHeader['image'] ?? 'library.jpg')) ?>');">
  <div class="container">
    <?php if (!empty($breadcrumb)): ?>
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e($root) ?>index.php">Home</a>
      <?php foreach ($breadcrumb as $crumb): ?>
        <span class="sep">/</span>
        <?php if (!empty($crumb['url'])): ?>
          <a href="<?= e($crumb['url']) ?>"><?= e($crumb['label']) ?></a>
        <?php else: ?>
          <span aria-current="page"><?= e($crumb['label']) ?></span>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>
    <?php endif; ?>
    <?php if (!empty($pageHeader['eyebrow'])): ?><p class="eyebrow eyebrow-light"><?= e($pageHeader['eyebrow']) ?></p><?php endif; ?>
    <h1><?= e($pageHeader['title']) ?></h1>
    <?php if (!empty($pageHeader['intro'])): ?><p class="page-banner-intro"><?= e($pageHeader['intro']) ?></p><?php endif; ?>
  </div>
</section>
<?php endif; ?>

<main id="main">
