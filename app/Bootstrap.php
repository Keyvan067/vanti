<?php
/**
 * Bootstrap Class
 * 
 * Main class for initializing all theme modules
 * 
 * @package VANTI
 */

namespace VANTI;

class Bootstrap {

	/**
	 * Initialize all modules
	 */
	public function init() {
		$this->load_modules();
	}

	/**
	 * Load all theme modules
	 */
	private function load_modules() {
		// Load Assets module
		if ( class_exists( 'VANTI\\Assets\\Manager' ) ) {
			new Assets\\Manager();
		}

		// Load WooCommerce module
		if ( class_exists( 'VANTI\\WooCommerce\\Manager' ) ) {
			new WooCommerce\\Manager();
		}

		// Load Admin module
		if ( class_exists( 'VANTI\\Admin\\Manager' ) ) {
			new Admin\\Manager();
		}
	}
}
