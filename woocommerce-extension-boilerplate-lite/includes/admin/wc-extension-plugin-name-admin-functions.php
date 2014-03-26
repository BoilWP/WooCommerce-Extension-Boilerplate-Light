<?php
/**
 * WooCommerce Extension Boilerplate Admin Functions
 *
 * @author 		Your Name / Your Company Name
 * @category 	Core
 * @package 	WooCommerce Extension Boilerplate/Admin/Functions
 * @version 	1.0.1
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Get all WooCommerce Extension Boilerplate screen ids
 *
 * @return array
 */
function wc_extend_plugin_name_get_screen_ids() {
	$menu_name = strtolower( str_replace ( ' ', '-', WC_EXTEND_PLUGIN_NAME_PAGE ) );

	$wc_extend_plugin_name_screen_id = strtolower( str_replace ( ' ', '-', WC_EXTEND_PLUGIN_NAME ) );

	return apply_filters( 'wc_extend_plugin_name_screen_ids', array(
		'toplevel_page_' . $wc_extend_plugin_name_screen_id,
		'woocommerce_page_wc_settings',
		'woocommerce_page_wc-settings',
		'woocommerce_page_woocommerce_settings',
		'woocommerce_page_woocommerce-settings'
	) );
}

/**
 * Get a setting from the settings API.
 *
 * @param mixed $option
 * @return string
 */
function wc_extend_plugin_name_settings_get_option( $option_name, $default = '' ) {
	if ( ! class_exists( 'WC_Extend_Plugin_Name_Admin_Settings' ) ) {
		include 'class-wc-extension-plugin-name-admin-settings.php';
	}

	return WC_Extend_Plugin_Name_Admin_Settings::get_option( $option_name, $default );
}

?>