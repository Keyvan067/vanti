<?php
/**
 * VANTI Theme Entry Point
 * 
 * @package VANTI
 */

// Define theme constants
define( 'VANTI_PATH', get_template_directory() );
define( 'VANTI_URL', get_template_directory_uri() );
define( 'VANTI_VERSION', '1.0.0' );

// Load Composer autoloader
if ( file_exists( VANTI_PATH . '/vendor/autoload.php' ) ) {
	require_once VANTI_PATH . '/vendor/autoload.php';
}

// Load manual autoloader fallback if Composer not installed
if ( ! function_exists( 'vanti_autoloader' ) ) {
	function vanti_autoloader( $class ) {
		$prefix   = 'VANTI\\';
		$base_dir = VANTI_PATH . '/app/';

		// Check if class uses VANTI namespace
		if ( strpos( $class, $prefix ) !== 0 ) {
			return;
		}

		// Remove prefix and convert to file path
		$relative_class = substr( $class, strlen( $prefix ) );
		$file           = $base_dir . str_replace( '\\', '/', $relative_class ) . '.php';

		// Load file if exists
		if ( file_exists( $file ) ) {
			require_once $file;
		}
	}

	spl_autoload_register( 'vanti_autoloader' );
}

// Initialize theme
add_action( 'after_setup_theme', function() {
	// Theme support
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	] );

	// WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Load textdomain
	load_theme_textdomain( 'vanti', VANTI_PATH . '/languages' );
} );

// Load theme modules
require_once VANTI_PATH . '/app/Bootstrap.php';

// Initialize bootstrap
$bootstrap = new \VANTI\Bootstrap();
$bootstrap->init();
