<?php
/**
 * WooCommerce Extension Boilerplate Template Hooks
 *
 * Action/filter hooks used for WooCommerce Extension Boilerplate functions/templates
 *
 * @author 		Your Name / Your Company Name
 * @package 	WooCommerce Extension Boilerplate/Templates
 * @version 	1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Templates
 *
 * Override template files for the products.
 * @see wc_extend_plugin_name_locate_template()
 */
add_filter( 'woocommerce_locate_template', 'wc_extend_plugin_name_locate_template', 10, 3 );

?>