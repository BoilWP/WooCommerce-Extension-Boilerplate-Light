<?php
/**
 * Display notices in admin.
 *
 * @author 		Your Name / Your Company Name
 * @category 	Admin
 * @package 	WooCommerce Extension Boilerplate Lite/Admin
 * @version 	1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WC_Extend_Plugin_Name_Admin_Notices' ) ) {

/**
 * WC_Extend_Plugin_Name_Admin_Notices Class
 */
class WC_Extend_Plugin_Name_Admin_Notices {

	/**
	 * Hook in tabs.
	 */
	public function __construct() {
		add_action( 'admin_print_styles', array( &$this, 'add_notices' ) );
	}

	/**
	 * Add notices + styles if needed.
	 */
	public function add_notices() {
		if ( get_option( '_wc_extend_plugin_name_needs_update' ) == 1 ) {
			add_action( 'admin_notices', array( &$this, 'install_notice' ) );
		}

		$template = get_option( 'template' );

		include( 'wc-extension-plugin-name-theme-support.php' );

		if ( ! current_theme_supports( 'wc_extend_plugin_name' ) && ! in_array( $template, $themes_supported ) ) {

			if ( ! empty( $_GET['hide_wc_extend_plugin_name_theme_support_check'] ) ) {
				update_option( 'wc_extend_plugin_name_theme_support_check', $template );
				return;
			}

			if ( get_option( 'wc_extend_plugin_name_theme_support_check' ) !== $template ) {
				add_action( 'admin_notices', array( $this, 'theme_check_notice' ) );
			}
		}
	}

	/**
	 * Show the install notices
	 */
	function install_notice() {

		// If we need to update, include a message with the update button
		if ( get_option( '_wc_extend_plugin_name_needs_update' ) == 1 ) {
			include( 'views/html-notice-update.php' );
		}

	}

	/**
	 * Show the Theme Check notice
	 */
	function theme_check_notice() {
		include( 'views/html-notice-theme-support.php' );
	}
}

} // end if class exists.

return new WC_Extend_Plugin_Name_Admin_Notices();

?>