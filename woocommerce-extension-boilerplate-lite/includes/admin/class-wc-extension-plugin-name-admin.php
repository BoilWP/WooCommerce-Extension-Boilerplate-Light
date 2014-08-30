<?php
/**
 * WooCommerce Extension Boilerplate Lite Admin.
 *
 * @author 		Your Name / Your Company Name
 * @category 	Admin
 * @package 	WooCommerce Extension Boilerplate Lite/Admin
 * @version 	1.0.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WC_Extend_Plugin_Name_Admin' ) ) {

class WC_Extend_Plugin_Name_Admin {

	/**
	 * Constructor
	 */
	public function __construct() {
		// Actions
		add_action( 'init', array( &$this, 'includes' ) );
		add_action( 'current_screen', array( &$this, 'conditonal_includes' ) );
	}

	/**
	 * Include any classes we need within admin.
	 */
	public function includes() {
		// Functions
		include( 'wc-extension-plugin-name-admin-functions.php' );

		// Classes we only need if the ajax is not-ajax
		if ( ! is_ajax() ) {
			include( 'class-wc-extension-plugin-name-admin-notices.php' );

			// Help
			if ( apply_filters( 'wc_extend_plugin_name_enable_admin_help_tab', true ) ) {
				include( 'class-wc-extension-plugin-name-admin-help.php' );
			}
		}
	}

	/**
	 * Include admin files conditionally
	 */
	public function conditonal_includes() {
		$screen = get_current_screen();

		switch ( $screen->id ) {

			case 'dashboard' :
				break;

			case 'products':
				break;

			case 'users' :
			case 'user' :
			case 'profile' :
			case 'user-edit' :
				break;

		} // end switch
	}

}

} // end if class exists

return new WC_Extend_Plugin_Name_Admin();

?>