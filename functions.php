<?php

defined('ABSPATH') || exit;

/*
|--------------------------------------------------------------------------
| Constants
|--------------------------------------------------------------------------
*/

define('VANTI_PATH', get_template_directory());
define('VANTI_URL', get_template_directory_uri());
define('VANTI_VERSION', '1.0.0');

/*
|--------------------------------------------------------------------------
| Composer
|--------------------------------------------------------------------------
*/

if (file_exists(VANTI_PATH . '/vendor/autoload.php')) {
    require_once VANTI_PATH . '/vendor/autoload.php';
}

/*
|--------------------------------------------------------------------------
| Err Handler
|--------------------------------------------------------------------------
*/

set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    error_log("[VANTI PHP ERROR] $errstr in $errfile:$errline");
    return true; // جلوگیری از crash
});

set_exception_handler(function ($e) {
    error_log("[VANTI EXCEPTION] " . $e->getMessage());
});

/*
|--------------------------------------------------------------------------
| Bootstrap
|--------------------------------------------------------------------------
*/

VANTI\Bootstrap::boot();