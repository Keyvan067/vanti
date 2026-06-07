<?php
/**
 * Assets Manager Class
 * 
 * Handles loading CSS and JS assets for the theme
 * 
 * @package VANTI\Assets
 */

namespace VANTI\Assets;

class Manager {

	/**
	 * Constructor - Initialize hooks
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
	}

	/**
	 * Enqueue frontend assets
	 */
	public function enqueue_frontend_assets() {
		// Main stylesheet
		wp_enqueue_style(
			'vanti-main',
			$this->get_asset_url( 'css/main.css' ),
			[],
			VANTI_VERSION
		);

		// Main script
		wp_enqueue_script(
			'vanti-main',
			$this->get_asset_url( 'js/main.js' ),
			[ 'jquery' ],
			VANTI_VERSION,
			true
		);

		// Localize script with data
		wp_localize_script(
			'vanti-main',
			'vantiData',
			[
				'ajaxUrl'     => admin_url( 'admin-ajax.php' ),
				'nonce'       => wp_create_nonce( 'vanti_nonce' ),
				'themeUrl'    => VANTI_URL,
				'restUrl'     => rest_url( 'vanti/v1/' ),
			]
		);
	}

	/**
	 * Enqueue admin assets
	 * 
	 * @param string $hook_suffix The current admin page hook
	 */
	public function enqueue_admin_assets( $hook_suffix ) {
		// Admin stylesheet
		wp_enqueue_style(
			'vanti-admin',
			$this->get_asset_url( 'css/admin.css' ),
			[],
			VANTI_VERSION
		);

		// Admin script
		wp_enqueue_script(
			'vanti-admin',
			$this->get_asset_url( 'js/admin.js' ),
			[ 'jquery' ],
			VANTI_VERSION,
			true
		);
	}

	/**
	 * Get asset URL
	 * 
	 * @param string $path Asset path
	 * @return string
	 */
	private function get_asset_url( $path ) {
		return VANTI_URL . '/public/' . ltrim( $path, '/' );
	}
}
