<?php
/**
 * WooCommerce Extension Boilerplate Lite Admin Settings Class.
 *
 * @author 		Your Name / Your Company Name
 * @category 	Admin
 * @package 	WooCommerce Extension Boilerplate Lite/Admin
 * @version 	1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WC_Extend_Plugin_Name_Admin_Settings' ) ) {

/**
 * WC_Extend_Plugin_Name_Admin_Settings
 */
class WC_Extend_Plugin_Name_Admin_Settings {

	private static $settings = array();

	/**
	 * Include the settings page classes
	 */
	public static function get_settings_pages( ) {
		if( version_compare(WC_EXTEND_WOOVERSION, "2.0.20", '<=') ) {

			if(version_compare(WC_EXTEND_WOOVERSION, "1.6.6", '<=')){
				$settings[] = include( 'settings/v1.6.6/class-wc-extension-plugin-name-admin-settings.php' );
			}
			else if(version_compare(WC_EXTEND_WOOVERSION, "2.0.20", '<=')){
				$settings[] = include( 'settings/v2.0.20/class-wc-extension-plugin-name-admin-settings.php' );
			}
		}
		else{
			$settings[] = include( 'settings/class-wc-extension-plugin-name-settings.php' );
		}

		return $settings;
	}

	/**
	 * Save the settings
	 */
	public static function save() {
		global $current_section, $current_tab;

		if ( empty( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'woocommerce-settings' ) ) {
			die( __( 'Action failed. Please refresh the page and retry.', 'wc_extend_plugin_name' ) );
		}

	}

}

} // end if class exists.

?>