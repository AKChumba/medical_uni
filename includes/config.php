<?php
/**
 * Site-wide constants. Edit this file to update institutional details
 * that appear across every page (nav, footer, contact page, emails).
 */

define('SITE_NAME', 'Windhoek Medical University');
define('SITE_SHORT_NAME', 'WMU');
define('SITE_TAGLINE', 'Windhoek, Namibia');

define('SITE_PHONE', '+264 81 464 2621');
define('SITE_PHONE_HREF', '+264814642621');
define('SITE_EMAIL', 'info@wmu.com.na');
define('SITE_ADMISSIONS_EMAIL', 'admissions@wmu.com.na');
define('SITE_ADDRESS_LINE1', '165 Paul Van Harte Street');
define('SITE_ADDRESS_LINE2', 'Khomas Grove Mall, Windhoek, Namibia');

define('SITE_YEAR', date('Y'));

// Base URL path of the site relative to the web root, used to build
// absolute-from-root links that work no matter how deep the current
// page is nested (e.g. /programmes/nursing.php).
// Change this if the site is deployed in a sub-folder.
define('BASE_URL', '/');

// Where application uploads and submission records are written.
// Both directories carry a .htaccess that denies all direct web access.
define('APPLICATIONS_DATA_DIR', __DIR__ . '/../data/applications');
define('APPLICATIONS_UPLOAD_DIR', __DIR__ . '/../uploads/applications');

// Toggle to true once an SMTP-capable mail setup is confirmed on the
// production server. Left false-safe: the application still records
// and confirms successfully even if mail() is unavailable.
define('MAIL_ENABLED', true);
