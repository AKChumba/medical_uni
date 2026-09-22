<?php
/** Shared helper functions used across pages. */

/** Escape a string for safe HTML output. */
function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Generate a human-friendly, reasonably unique application reference number. */
function generate_reference() {
    $date = date('Ymd');
    $rand = strtoupper(substr(bin2hex(random_bytes(3)), 0, 5));
    return "WMU-{$date}-{$rand}";
}

/** Ensure a directory exists (best-effort, silent if it already does). */
function ensure_dir($path) {
    if (!is_dir($path)) {
        @mkdir($path, 0755, true);
    }
}

/** Produce a safe, unique filename for an uploaded document. */
function safe_upload_filename($originalName) {
    $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $ext = preg_replace('/[^a-z0-9]/', '', $ext);
    $base = bin2hex(random_bytes(8));
    return $ext !== '' ? "{$base}.{$ext}" : $base;
}

/** Format bytes as a short human string, e.g. 2.4 MB. */
function format_bytes($bytes) {
    if ($bytes >= 1048576) return round($bytes / 1048576, 1) . ' MB';
    if ($bytes >= 1024) return round($bytes / 1024, 1) . ' KB';
    return $bytes . ' B';
}
