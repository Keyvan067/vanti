<?php
/**
 * Admin Manager Class
 * 
 * Handles admin panel customizations and functionality
 * 
 * @package VANTI\Admin
 */

namespace VANTI\Admin;

class Manager {

	/**
	 * Constructor - Initialize hooks
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'add_admin_menu' ] );
		add_action( 'admin_init', [ $this, 'register_settings' ] );
	}

	/**
	 * Add custom admin menu
	 */
	public function add_admin_menu() {
		add_menu_page(
			'VANTI Settings',
			'VANTI',
			'manage_options',
			'vanti-settings',
			[ $this, 'render_settings_page' ],
			'dashicons-art',
			30
		);
	}

	/**
	 * Register theme settings
	 */
	public function register_settings() {
		register_setting( 'vanti-settings', 'vanti_settings' );
	}

	/**
	 * Render settings page
	 */
	public function render_settings_page() {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'VANTI Theme Settings', 'vanti' ); ?></h1>
			<form method="post" action="options.php">
				<?php settings_fields( 'vanti-settings' ); ?>
				<table class="form-table">
					<tr>
						<th scope="row">
							<label for="vanti-logo"><?php esc_html_e( 'Logo', 'vanti' ); ?></label>
						</th>
						<td>
							<input type="text" id="vanti-logo" name="vanti_logo" value="" />
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}
