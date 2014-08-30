<?php
/**
 * WooCommerce Extension Boilerplate Lite Template Hooks
 *
 * Action/filter hooks used for WooCommerce Extension Boilerplate Lite functions/templates
 *
 * @author 		Your Name / Your Company Name
 * @package 	WooCommerce Extension Boilerplate Lite/Templates
 * @version 	1.0.2
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