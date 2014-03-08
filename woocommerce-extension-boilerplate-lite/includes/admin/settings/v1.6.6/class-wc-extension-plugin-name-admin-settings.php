<?php
/**
 * WooCommerce Extension Boilerplate First Tab Settings
 *
 * @author 		Your Name / Your Company Name
 * @category 	Admin
 * @package 	WooCommerce Extension Boilerplate/Admin
 * @version 	1.0.0
 */

if(!defined('ABSPATH')) exit; // Exit if accessed directly

if(!class_exists('WC_Extend_Plugin_Name_Admin_Settings')) {

/**
 * WC_Extend_Plugin_Name_Admin_Settings
 */
class WC_Extend_Plugin_Name_Admin_Settings {

	/**
	 * Constructor.
	 */
	public function __construct(){
		$this->id 		= WC_EXTEND_PLUGIN_NAME_PAGE;
		$this->label 	= apply_filters( 'wc_extend_plugin_name_settings_tab_label', __( 'Your Settings', 'wc_extend_plugin_name' ) );

		add_filter('woocommerce_settings_tabs_array', array( &$this, 'add_settings_tab' ) );
		add_action('woocommerce_settings_tabs_' . $this->id, array( &$this, 'output' ) );
		add_action('woocommerce_update_options_' . $this->id, array( &$this, 'save' ) );
	}

	/**
	 * Get settings array
	 *
	 * @return array
	 */
	public function get_settings(){

		return apply_filters( 'wc_extend_' . $this->id . '_settings', array(

			array(
				'name' 		=> __( 'Settings Title', 'wc_extend_plugin_name' ), 
				'type' 		=> 'title', 
				'desc' 		=> __( 'The settings title is also used to put your settings into sections making it easy for the admin to identify the area they want to alter. You can even place a description here like this one.', 'wc_extend_plugin_name' ), 
				'id' 		=> $this->id . '_options'
			),

			array(
				'name' 		=> __( 'Select Country', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'This gives you a list of countries. Only one can be selected.', 'wc_extend_plugin_name' ),
				'id' 		=> 'country_list',
				'css' 		=> 'min-width:350px;',
				'std'		=> 'GB',
				'type' 		=> 'single_select_country',
				'desc_tip'	=> true,
			),

			array(
				'name' 		=> __( 'Multi Select Countries', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'This allows you to select more than one country.' ,'wc_extend_plugin_name' ),
				'id' 		=> 'multi_countries',
				'css' 		=> 'min-width: 350px;',
				'std'		=> '',
				'type' 		=> 'multi_select_countries',
				'desc_tip'	=> true,
			),

			array(
				'name' 		=> __( 'Single Page', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'You can select a page to be used for either a single shortcode or to be redirected to when called.', 'wc_extend_plugin_name' ),
				'id' 		=> 'single_page_id',
				'type' 		=> 'single_select_page',
				'std'		=> '',
				'class'		=> 'chosen_select_nostd',
				'css' 		=> 'min-width:300px;',
				'desc_tip'	=> true,
			),

			array(
				'name' 		=> __( 'Single Select', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'If you not using the other select field types you can just use a standard select.', 'wc_extend_plugin_name' ),
				'id' 		=> 'select',
				'std'		=> 'no',
				'type' 		=> 'select',
				'class'		=> 'chosen_select',
				'desc_tip'	=> true,
				'options' 	=> array(
					'no'  	=> __( 'No', 'wc_extend_plugin_name' ),
					'yes' 	=> __( 'Yes', 'wc_extend_plugin_name' )
				)
			),

			array(
				'name' 		=> __( 'Single Checkbox', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Can come in handy to display more options.', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkbox',
				'std'		=> 'no',
				'type' 		=> 'checkbox'
			),

			array(
				'name' 		=> __( 'Single Input (Text) ', 'wc_extend_plugin_name' ),
				'desc' 		=> '',
				'id' 		=> 'input_text',
				'std'		=> __( 'This admin setting and other imput types can be hidden via a checkbox using some javascript.', 'wc_extend_plugin_name' ),
				'type' 		=> 'text',
				'css' 		=> 'min-width:300px;',
				'autoload' 	=> false
			),

			array(
				'name' 		=> __( 'Single Textarea ', 'wc_extend_plugin_name' ),
				'desc' 		=> '',
				'id' 		=> 'input_textarea',
				'std'		=> __( 'You can allow the user to use this field to enter their own CSS or HTML code.', 'wc_extend_plugin_name' ),
				'type' 		=> 'textarea',
				'css' 		=> 'min-width:300px;',
				'autoload' 	=> false
			),

			array(
				'name' 		=> __( 'Checkbox Group', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Checkbox one', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkgroup_option_one',
				'std'		=> 'yes',
				'desc_tip'	=> __( 'You can group your checkbox options together also if you like.', 'wc_extend_plugin_name' ),
				'type' 		=> 'checkbox',
				'checkboxgroup'		=> 'start'
			),

			array(
				'desc' 		=> __( 'Checkbox two', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkgroup_option_two',
				'std'		=> 'no',
				'type' 		=> 'checkbox',
				'checkboxgroup'		=> '',
				'desc_tip'	=> __( 'Checkbox two', 'wc_extend_plugin_name' ),
				'autoload' 	=> false
			),

			array(
				'desc' 		=> __( 'Checkbox three', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkgroup_option_three',
				'std'		=> 'yes',
				'type' 		=> 'checkbox',
				'checkboxgroup'		=> 'end',
				'desc_tip'	=> __( 'End checkbox.', 'wc_extend_plugin_name' ),
				'autoload' 	=> false
			),

			array(
				'name' 		=> __( 'Radio', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Radio, Radio! Which one do I choose?', 'wc_extend_plugin_name' ),
				'id' 		=> 'radio_options',
				'std'		=> 'happy',
				'type' 		=> 'radio',
				'options' 	=> array(
					'happy' => __( 'Happy', 'wc_extend_plugin_name' ),
					'sad'	=> __( 'Sad', 'wc_extend_plugin_name' ),
				),
				'desc_tip'	=>  true,
				'autoload' 	=> false
			),

			array(
				'name' 		=> __( 'Colour', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'You can set a colour. std <code>#ffffff</code>.', 'wc_extend_plugin_name' ),
				'id' 		=> 'color',
				'type' 		=> 'color',
				'css' 		=> 'width:6em;',
				'std'		=> '#ffffff',
				'autoload'  => false
			),

			array(
				'name' 		=> __( 'Images', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'If you need to add your own image sizes then use this field.', 'wc_extend_plugin_name' ),
				'id' 		=> 'images',
				'css' 		=> '',
				'type' 		=> 'image_width',
				'std'		=> '150',
				'crop'		=> false,
				'desc_tip'	=>  true,
			),

			array( 'type' => 'sectionend', 'id' => $this->id . '_options'),

		)); // End of your settings

	}

	/**
	 * Add a tab to the settings page of WooCommerce for Product Reviews Plus.
	 *
	 * @access public
	 * @return void
	 */
	public function add_settings_tab( $tabs ){
		$tabs[$this->id] = $this->label;

		return $tabs;
	}

	/**
	 * Output the settings
	 */
	public function output(){
		$settings = $this->get_settings();

		woocommerce_admin_fields($settings);
	}

	/**
	 * Save settings
	 */
	public function save(){
		global $woocommerce;

		include_once($woocommerce->plugin_path.'/admin/settings/settings-save.php');

		$settings = $this->get_settings();

		woocommerce_update_options($settings);
	}

}

} // end if class exists.

?>