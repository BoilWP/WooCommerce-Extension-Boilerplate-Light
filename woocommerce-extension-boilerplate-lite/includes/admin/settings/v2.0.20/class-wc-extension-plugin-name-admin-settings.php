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
				'title' 	=> __( 'Settings Title', 'wc_extend_plugin_name' ), 
				'type' 		=> 'title', 
				'desc' 		=> __( 'The settings title is also used to put your settings into sections making it easy for the admin to identify the area they want to alter. You can even place a description here like this one.', 'wc_extend_plugin_name' ), 
				'id' 		=> $this->id . '_options'
			),

			array(
				'title' 	=> __( 'Select Country', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'This gives you a list of countries. Only one can be selected.', 'wc_extend_plugin_name' ),
				'id' 		=> 'country_list',
				'css' 		=> 'min-width:350px;',
				'default'	=> 'GB',
				'type' 		=> 'single_select_country',
				'desc_tip'	=> true,
			),

			array(
				'title' 	=> __( 'Multi Select Countries', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'This allows you to select more than one country.' ,'wc_extend_plugin_name' ),
				'id' 		=> 'multi_countries',
				'css' 		=> 'min-width: 350px;',
				'default'	=> '',
				'type' 		=> 'multi_select_countries',
				'desc_tip'	=> true,
			),

			array(
				'title' 	=> __( 'Single Page', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'You can select a page to be used for either a single shortcode or to be redirected to when called.', 'wc_extend_plugin_name' ),
				'id' 		=> 'single_page_id',
				'type' 		=> 'single_select_page',
				'default'	=> '',
				'class'		=> 'chosen_select_nostd',
				'css' 		=> 'min-width:300px;',
				'desc_tip'	=> true,
			),

			array(
				'title' => __( 'Single Select', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'If you not using the other select field types you can just use a standard select.', 'wc_extend_plugin_name' ),
				'id' 		=> 'select',
				'default'	=> 'no',
				'type' 		=> 'select',
				'class'		=> 'chosen_select',
				'desc_tip'	=> true,
				'options' => array(
					'no'  => __( 'No', 'wc_extend_plugin_name' ),
					'yes' => __( 'Yes', 'wc_extend_plugin_name' )
				)
			),

			array(
				'title' => __( 'Multi Select', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Select more than one option. Useful for when you are using array() in your functions.', 'wc_extend_plugin_name' ),
				'id' 		=> 'multi_select',
				'default'	=> 'no',
				'type' 		=> 'multiselect',
				'class'		=> 'chosen_select',
				'desc_tip'	=> true,
				'options' => array(
					'no'  => __( 'No', 'wc_extend_plugin_name' ),
					'yes' => __( 'Yes', 'wc_extend_plugin_name' )
				)
			),

			array(
				'title' 	=> __( 'Single Checkbox', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Can come in handy to display more options.', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkbox',
				'default'	=> 'no',
				'type' 		=> 'checkbox'
			),

			array(
				'title' 	=> __( 'Single Input (Text) ', 'wc_extend_plugin_name' ),
				'desc' 		=> '',
				'id' 		=> 'input_text',
				'default'	=> __( 'This admin setting and other imput types can be hidden via a checkbox using some javascript.', 'wc_extend_plugin_name' ),
				'type' 		=> 'text',
				'css' 		=> 'min-width:300px;',
				'autoload' 	=> false
			),

			array(
				'title' 	=> __( 'Single Input (Email) ', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'As you can see the default text placed in this field shows you that it is not a valid email address.', 'wc_extend_plugin_name' ),
				'id' 		=> 'input_email',
				'default'	=> __( 'Use this field only for emails.', 'wc_extend_plugin_name' ),
				'type' 		=> 'email',
				'desc_tip'	=> true,
				'css' 		=> 'min-width:300px;',
				'autoload' 	=> false
			),

			array(
				'title' 	=> __( 'Single Input (Password) ', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Use this field only for passwords.', 'wc_extend_plugin_name' ),
				'id' 		=> 'input_password',
				'type' 		=> 'password',
				'css' 		=> 'min-width:300px;',
				'autoload' 	=> false
			),

			array(
				'title' 	=> __( 'Single Input (Number) ', 'wc_extend_plugin_name' ),
				'desc' 		=> '',
				'id' 		=> 'input_number',
				'default'	=> '5',
				'type' 		=> 'number',
				'custom_attributes' => array(
					'min' 	=> 0,
					'step' 	=> 1
				),
				'css' 		=> 'min-width:100px;',
				'autoload' 	=> false
			),

			array(
				'title' 	=> __( 'Single Textarea ', 'wc_extend_plugin_name' ),
				'desc' 		=> '',
				'id' 		=> 'input_textarea',
				'default'	=> __( 'You can allow the user to use this field to enter their own CSS or HTML code.', 'wc_extend_plugin_name' ),
				'type' 		=> 'textarea',
				'css' 		=> 'min-width:300px;',
				'autoload' 	=> false
			),

			array(
				'title' 	=> __( 'Checkbox Group', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Checkbox one', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkgroup_option_one',
				'default'	=> 'yes',
				'desc_tip'	=> __( 'You can group your checkbox options together also if you like.', 'wc_extend_plugin_name' ),
				'type' 		=> 'checkbox',
				'checkboxgroup'		=> 'start'
			),

			array(
				'desc' 		=> __( 'Checkbox two', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkgroup_option_two',
				'default'	=> 'no',
				'type' 		=> 'checkbox',
				'checkboxgroup'		=> '',
				'desc_tip'	=> __( 'Checkbox two', 'wc_extend_plugin_name' ),
				'autoload' 	=> false
			),

			array(
				'desc' 		=> __( 'Checkbox three', 'wc_extend_plugin_name' ),
				'id' 		=> 'checkgroup_option_three',
				'default'	=> 'yes',
				'type' 		=> 'checkbox',
				'checkboxgroup'		=> 'end',
				'desc_tip'	=> __( 'End checkbox.', 'wc_extend_plugin_name' ),
				'autoload' 	=> false
			),

			array(
				'title' 	=> __( 'Radio', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'Radio, Radio! Which one do I choose?', 'wc_extend_plugin_name' ),
				'id' 		=> 'radio_options',
				'default'	=> 'happy',
				'type' 		=> 'radio',
				'options' => array(
					'happy' => __( 'Happy', 'wc_extend_plugin_name' ),
					'sad'	=> __( 'Sad', 'wc_extend_plugin_name' ),
				),
				'desc_tip'	=>  true,
				'autoload' 	=> false
			),

			array(
				'title' => __( 'Colour', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'You can set a colour. Default <code>#ffffff</code>.', 'wc_extend_plugin_name' ),
				'id' 		=> 'color',
				'type' 		=> 'color',
				'css' 		=> 'width:6em;',
				'default'	=> '#ffffff',
				'autoload'  => false
			),

			array(
				'title' => __( 'Images', 'wc_extend_plugin_name' ),
				'desc' 		=> __( 'If you need to add your own image sizes then use this field.', 'wc_extend_plugin_name' ),
				'id' 		=> 'images',
				'css' 		=> '',
				'type' 		=> 'image_width',
				'default'	=> array(
					'width' 	=> '350',
					'height'	=> '150',
					'crop'		=> false
				),
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