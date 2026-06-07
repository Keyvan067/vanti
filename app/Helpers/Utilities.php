<?php
/**
 * Utilities Helper Class
 * 
 * General utility functions for VANTI theme
 * 
 * @package VANTI\Helpers
 */

namespace VANTI\Helpers;

class Utilities {

	/**
	 * Get theme option from customizer
	 * 
	 * @param string $option Option name
	 * @param mixed  $default Default value
	 * @return mixed
	 */
	public static function get_option( $option, $default = '' ) {
		return get_option( 'vanti_' . $option, $default );
	}

	/**
	 * Update theme option
	 * 
	 * @param string $option Option name
	 * @param mixed  $value Option value
	 * @return bool
	 */
	public static function update_option( $option, $value ) {
		return update_option( 'vanti_' . $option, $value );
	}

	/**
	 * Get asset URL
	 * 
	 * @param string $path Asset path relative to public folder
	 * @return string
	 */
	public static function get_asset_url( $path ) {
		return VANTI_URL . '/public/' . ltrim( $path, '/' );
	}

	/**
	 * Get asset path
	 * 
	 * @param string $path Asset path relative to public folder
	 * @return string
	 */
	public static function get_asset_path( $path ) {
		return VANTI_PATH . '/public/' . ltrim( $path, '/' );
	}

	/**
	 * Check if WooCommerce is active
	 * 
	 * @return bool
	 */
	public static function is_woocommerce_active() {
		return class_exists( 'WooCommerce' );
	}

	/**
	 * Check if Elementor is active
	 * 
	 * @return bool
	 */
	public static function is_elementor_active() {
		return did_action( 'elementor/loaded' );
	}

	/**
	 * Safely output HTML
	 * 
	 * @param string $html HTML to output
	 * @return void
	 */
	public static function output_html( $html ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo wp_kses_post( $html );
	}

	/**
	 * Get template part with variables
	 * 
	 * @param string $slug Template slug
	 * @param string $name Template name
	 * @param array  $args Variables to pass to template
	 * @return void
	 */
	public static function get_template( $slug, $name = '', $args = [] ) {
		$template = '';

		if ( $name ) {
			$template = "{$slug}-{$name}";
		} else {
			$template = $slug;
		}

		$template_path = VANTI_PATH . '/templates/' . $template . '.php';

		if ( file_exists( $template_path ) ) {
			// Extract array to variables for use in template
			extract( $args ); // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
			include $template_path;
		}
	}
}
