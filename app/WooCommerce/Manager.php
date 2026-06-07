<?php
/**
 * WooCommerce Manager Class
 * 
 * Handles WooCommerce specific functionality and customizations
 * 
 * @package VANTI\WooCommerce
 */

namespace VANTI\WooCommerce;

use VANTI\Helpers\Utilities;

class Manager {

	/**
	 * Constructor - Initialize hooks
	 */
	public function __construct() {
		if ( ! Utilities::is_woocommerce_active() ) {
			return;
		}

		$this->init_hooks();
	}

	/**
	 * Initialize WooCommerce hooks
	 */
	private function init_hooks() {
		// Remove default WooCommerce styles if needed
		add_action( 'wp_enqueue_scripts', [ $this, 'dequeue_default_styles' ], 99 );

		// Custom product hooks
		add_filter( 'woocommerce_product_get_rating_html', [ $this, 'custom_rating_html' ] );

		// Custom shop page
		add_filter( 'body_class', [ $this, 'add_shop_body_classes' ] );
	}

	/**
	 * Dequeue default WooCommerce styles
	 */
	public function dequeue_default_styles() {
		wp_dequeue_style( 'woocommerce-general' );
		wp_dequeue_style( 'woocommerce-layout' );
		wp_dequeue_style( 'woocommerce-smallscreen' );
	}

	/**
	 * Custom product rating HTML
	 * 
	 * @param string $html Rating HTML
	 * @return string
	 */
	public function custom_rating_html( $html ) {
		return $html;
	}

	/**
	 * Add custom body classes for shop pages
	 * 
	 * @param array $classes Body classes
	 * @return array
	 */
	public function add_shop_body_classes( $classes ) {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			$classes[] = 'vanti-shop';
		}

		if ( is_product() ) {
			$classes[] = 'vanti-single-product';
		}

		return $classes;
	}
}
