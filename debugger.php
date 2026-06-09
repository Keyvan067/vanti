<?php
/**
 * VANTI Debug Panel
 * Shows all VANTI-related logs in a structured way
 */

define('WP_USE_THEMES', false);
require_once __DIR__ . '/../../../../wp-load.php'; // مسیر وردپرس تا ریشه

// فقط ادمین می‌تواند دسترسی داشته باشد
if (!current_user_can('manage_options')) {
    wp_die('Access denied');
}

// مسیر لاگ وردپرس
$log_file = WP_CONTENT_DIR . '/debug.log';

echo "<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<title>VANTI Debug Panel</title>
<style>
body { font-family: monospace; background: #111; color: #0f0; padding: 20px; }
h1 { color: #0ff; }
pre { background: #222; padding: 15px; border-radius: 5px; overflow-x: auto; }
.log-entry { margin-bottom: 10px; }
.time { color: #ff0; }
.error { color: #f33; }
.notice { color: #0ff; }
</style>
</head>
<body>
<h1>VANTI Debug Panel</h1>
";

if (file_exists($log_file)) {
    $lines = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $class = strpos($line, '[VANTI ERROR]') !== false ? 'error' : 'notice';
        $time = date('Y-m-d H:i:s');
        echo "<div class='log-entry'><span class='time'>[$time]</span> <span class='$class'>$line</span></div>";
    }
} else {
    echo "<p>No log file found.</p>";
}

echo "</body></html>";