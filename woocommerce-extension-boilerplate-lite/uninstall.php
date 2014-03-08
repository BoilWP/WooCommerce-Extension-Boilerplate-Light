<?php
/**
 * WooCommerce Extension Boilerplate Uninstall
 *
 * Uninstalling WooCommerce Extension Boilerplate deletes e.g. user roles, options, tables, and pages.
 *
 * @author 		Your Name / Your Company Name
 * @category 	Core
 * @package 	WooCommerce Extension Boilerplate/Uninstaller
 * @version 	1.0.0
 */
if( !defined('WP_UNINSTALL_PLUGIN') ) exit();

// For Single site
if ( !is_multisite() ) {

	// Your uninstall code goes here.
	// List each option to delete here.
	delete_option( 'single_select_country' );
	delete_option( 'multi_select_countries' );
	delete_option( 'single_select_page' );
	delete_option( 'single_select' );
	delete_option( 'multi_select' );
	delete_option( 'checkbox' );
	delete_option( 'input_text' );
	delete_option( 'input_email' );
	delete_option( 'input_password' );
	delete_option( 'input_number' );
	delete_option( 'input_textarea' );
	delete_option( 'checkgroup_option_one' );
	delete_option( 'checkgroup_option_two' );
	delete_option( 'checkgroup_option_three' );
	delete_option( 'radio_options' );
	delete_option( 'color' );
	delete_option( 'image_width' );
} 
// For Multisite
else {
	global $wpdb;

	$blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
	$original_blog_id = get_current_blog_id();

	foreach ( $blog_ids as $blog_id ) {
		switch_to_blog( $blog_id );

		// Your uninstall code goes here.
		// List each option to delete here.
		delete_site_option( 'single_select_country' );
		delete_site_option( 'multi_select_countries' );
		delete_site_option( 'single_select_page' );
		delete_site_option( 'single_select' );
		delete_site_option( 'multi_select' );
		delete_site_option( 'checkbox' );
		delete_site_option( 'input_text' );
		delete_site_option( 'input_email' );
		delete_site_option( 'input_password' );
		delete_site_option( 'input_number' );
		delete_site_option( 'input_textarea' );
		delete_site_option( 'checkgroup_option_one' );
		delete_site_option( 'checkgroup_option_two' );
		delete_site_option( 'checkgroup_option_three' );
		delete_site_option( 'radio_options' );
		delete_site_option( 'color' );
		delete_site_option( 'image_width' );
	}

	switch_to_blog( $original_blog_id );
}
?>