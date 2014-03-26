<?php
/*
 * Plugin Name: WooCommerce Extension Boilerplate Lite
 * Plugin URI: https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite
 * Description: This is a lighter version of the best WooCommerce extension boilerplate you will ever need to develop extensions for WooCommerce.
 * Version: 1.0.1
 * Author: Sebs Studio
 * Author URI: http://www.sebs-studio.com
 * Author Email: sebastien@sebs-studio.com
 * Requires at least: 3.8
 * Tested up to: 3.8.1
 *
 * Text Domain: wc_extend_plugin_name
 * Domain Path: /languages/
 * Network: false
 *
 * Copyright: (c) 2014 Sebs Studio. (sebastien@sebs-studio.com)
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package WC_Extend_Plugin_Name
 * @author Your Name / Your Company Name
 * @category Core
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WC_Extend_Plugin_Name' ) ) {

/**
 * Main WooCommerce Extension Boilerplate Class
 *
 * @class WC_Extend_Plugin_Name
 * @version 1.0.1
 */
final class WC_Extend_Plugin_Name {

	/**
	 * Constants
	 */

	// Slug
	const slug = 'wc_extend_plugin_name';

	// Text Domain
	const text_domain = 'wc_extend_plugin_name';

	/**
	 * Global Variables
	 */

	/**
	 * The Plug-in name.
	 *
	 * @var string
	 */
	public $name = "WooCommerce Extension Boilerplate Lite";

	/**
	 * The Plug-in version.
	 *
	 * @var string
	 */
	public $version = "1.0.1";

	/**
	 * The WordPress version the plugin requires minumum.
	 *
	 * @var string
	 */
	public $wp_version_min = "3.7.1";

	/**
	 * The WooCommerce version this extension requires minimum.
	 *
	 * Set this to the minimum version your 
	 * extension works with WooCommerce.
	 *
	 * @var string
	 */
	public $woo_version_min = "2.1.6";

	/**
	 * The single instance of the class
	 *
	 * @var WooCommerce Extension Boilerplate
	 */
	protected static $_instance = null;

	/**
	 * The Plug-in URL.
	 *
	 * @var string
	 */
	public $web_url = "http://www.sebs-studio.com/boilerplates/woocommerce-extension-lite/";

	/**
	 * The Plug-in documentation URL.
	 *
	 * @var string
	 */
	public $doc_url = "https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite/wiki/";

	/**
	 * The WordPress Plug-in URL.
	 *
	 * @var string
	 */
	public $wp_plugin_url = "http://wordpress.org/plugins/woocommerce-extension-boilerplate-lite";

	/**
	 * The WordPress Plug-in Support URL.
	 *
	 * @var string
	 */
	public $wp_plugin_support_url = "http://wordpress.org/support/plugin/woocommerce-extension-boilerplate-lite";

	/**
	 * GitHub Username
	 *
	 * @var string
	 */
	public $github_username = "seb86";

	/**
	 * GitHub Repo URL
	 *
	 * @var string
	 */
	public $github_repo_url = "https://github.com/username/WooCommerce-Extension-Boilerplate-Lite/";

	/**
	 * The Plug-in manage plugin name.
	 *
	 * @var string
	 */
	public $manage_plugin = "manage_woocommerce";

	/**
	 * Main WooCommerce Extension Boilerplate Instance
	 *
	 * Ensures only one instance of WooCommerce Extension Boilerplate is loaded or can be loaded.
	 *
	 * @access public static
	 * @see WC_Extend_Plugin_Name()
	 * @return WooCommerce Extension Boilerplate - Main instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @access public
	 */
	public function __construct() {
		// Define constants
		$this->define_constants();

		// Include required files
		$this->includes();

		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( &$this, 'action_links' ) );

		// Check plugin requirements
		add_action( 'admin_init', array( &$this, 'check_requirements' ) );

		// Initiate plugin
		add_action( 'init', array( &$this, 'init_wc_extend_plugin_name' ), 0 );

		// Loaded action
		do_action( 'wc_extend_plugin_name_loaded' );
	}

	/**
	 * Define Constants
	 *
	 * @access private
	 */
	private function define_constants() {
		// TODO: change 'WC_EXTEND_PLUGIN_NAME' to the name of the plugin.
		define( 'WC_EXTEND_PLUGIN_NAME', $this->name );
		define( 'WC_EXTEND_PLUGIN_NAME_FILE', __FILE__ );
		define( 'WC_EXTEND_PLUGIN_NAME_VERSION', $this->version );
		define( 'WC_EXTEND_PLUGIN_NAME_WP_VERSION_REQUIRE', $this->wp_version_min );
		define( 'WC_EXTEND_PLUGIN_NAME_WOO_VERSION_REQUIRE', $this->woo_version_min );
		define( 'WC_EXTEND_PLUGIN_NAME_PAGE', str_replace('_', '-', self::slug) );

		define( 'WC_EXTEND_TEMPLATE_PATH', $this->template_path() );

		define( 'WC_EXTEND_PLUGIN_NAME_README_FILE', 'http://plugins.svn.wordpress.org/woocommerce-extension-plugin-name/trunk/readme.txt' );

		define( 'GITHUB_USERNAME', $this->github_username );
		define( 'GITHUB_REPO_URL' , str_replace( 'username', GITHUB_USERNAME, $this->github_repo_url ) );

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		define( 'WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE', $suffix );
	}

	/**
	 * Plugin action links.
	 *
	 * @access public
	 * @param mixed $links
	 * @param string $file plugin file path and name being processed
	 * @return void
	 */
	public function action_links( $links ) {
		// List your action links
		if( current_user_can( $this->manage_plugin ) ) {
			if(version_compare(WC_EXTEND_WOOVERSION, "2.0.20", '<=')){
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=woocommerce_settings&tab=' . WC_EXTEND_PLUGIN_NAME_PAGE ) . '">' . __( 'Settings', self::text_domain ) . '</a>',
				);
			}
			else{
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=' . WC_EXTEND_PLUGIN_NAME_PAGE ) . '">' . __( 'Settings', self::text_domain ) . '</a>',
				);
			}
		}

		return array_merge( $links, $plugin_links );
	}

	/**
	 * Checks that the WordPress setup meets the plugin requirements.
	 *
	 * @access private
	 * @global string $wp_version
	 * @global string $woocommerce
	 * @return boolean
	 */
	private function check_requirements() {
		global $wp_version, $woocommerce;

		$woo_version_installed = get_option('woocommerce_version');
		if( empty( $woo_version_installed ) ) { $woo_version_installed = WOOCOMMERCE_VERSION; }
		define( 'WC_EXTEND_WOOVERSION', $woo_version_installed );

		if (!version_compare($wp_version, WC_EXTEND_PLUGIN_NAME_WP_VERSION_REQUIRE, '>=')) {
			add_action('admin_notices', array( &$this, 'display_req_notice' ) );
			return false;
		}

		if ( !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			add_action('admin_notices', array( &$this, 'display_req_woo_not_active_notice' ) );
			return false;
		}
		else{
			if( version_compare(WC_EXTEND_WOOVERSION, WC_EXTEND_PLUGIN_NAME_WOO_VERSION_REQUIRE, '<' ) ) {
				add_action('admin_notices', array( &$this, 'display_req_woo_notice' ) );
				return false;
			}
		}

		return true;
	}

	/**
	 * Display the WordPress requirement notice.
	 *
	 * @access static
	 */
	static function display_req_notice() {
		echo '<div id="message" class="error"><p>';
		echo sprintf( __('Sorry, <strong>%s</strong> requires WordPress ' . WC_EXTEND_PLUGIN_NAME_WP_VERSION_REQUIRE . ' or higher. Please upgrade your WordPress setup', self::text_domain), WC_EXTEND_PLUGIN_NAME );
		echo '</p></div>';
	}

	/**
	 * Display the WooCommerce requirement notice.
	 *
	 * @access static
	 */
	static function display_req_woo_not_active_notice() {
		echo '<div id="message" class="error"><p>';
		echo sprintf( __('Sorry, <strong>%s</strong> requires WooCommerce to be installed and activated first. Please <a href="%s">install WooCommerce</a> first.', self::text_domain), WC_EXTEND_PLUGIN_NAME, admin_url('plugin-install.php?tab=search&type=term&s=WooCommerce') );
		echo '</p></div>';
	}

	/**
	 * Display the WooCommerce requirement notice.
	 *
	 * @access static
	 */
	static function display_req_woo_notice() {
		echo '<div id="message" class="error"><p>';
		echo sprintf( __('Sorry, <strong>%s</strong> requires WooCommerce ' . WC_EXTEND_PLUGIN_NAME_WOO_VERSION_REQUIRE . ' or higher. Please update WooCommerce for %s to work.', self::text_domain), WC_EXTEND_PLUGIN_NAME, WC_EXTEND_PLUGIN_NAME );
		echo '</p></div>';
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 *
	 * @access public
	 * @return void
	 */
	public function includes() {
		include_once( 'includes/wc-extension-plugin-name-core-functions.php' ); // Contains core functions for the front/back end.

		if ( is_admin() ) {
			$this->admin_includes();
		}

		if ( defined('DOING_AJAX') ) {
			$this->ajax_includes();
		}

		if ( ! is_admin() || defined('DOING_AJAX') ) {
			$this->frontend_includes();
		}

	}

	/**
	 * Include required admin files.
	 *
	 * @access public
	 * @return void
	 */
	public function admin_includes() {

		// Load WooCommerce class if they exist.
		if( version_compare(WC_EXTEND_WOOVERSION, '1.6.6', '>' ) ) {
			// Include the settings page to add our own settings.
			include_once( $this->wc_plugin_path() . 'includes/admin/settings/class-wc-settings-page.php' );
			$this->wc_settings_page = new WC_Settings_Page(); // Call the settings page for WooCommerce.
		}

		include_once( 'includes/wc-extension-plugin-name-hooks.php' ); // Hooks used in the admin
		include_once( 'includes/admin/class-wc-extension-plugin-name-install.php' ); // Install plugin
		include_once( 'includes/admin/class-wc-extension-plugin-name-admin.php' ); // Admin section
	}

	/**
	 * Include required ajax files.
	 *
	 * @access public
	 * @return void
	 */
	public function ajax_includes() {
		include_once( 'includes/wc-extension-plugin-name-ajax.php' ); // Ajax functions for admin and the front-end
	}

	/**
	 * Include required frontend files.
	 *
	 * @access public
	 * @return void
	 */
	public function frontend_includes() {
		// Functions
		include_once( 'includes/wc-extension-plugin-name-template-hooks.php' ); // Include template hooks for themes to remove/modify them
		include_once( 'includes/wc-extension-plugin-name-functions.php' ); // Contains functions for various front-end events
	}

	/**
	 * Runs when the plugin is initialized.
	 *
	 * @access public
	 */
	public function init_wc_extend_plugin_name() {
		// Before init action
		do_action( 'before_wc_extend_plugin_name_init' );

		// Set up localisation
		$this->load_plugin_textdomain();

		// Load JavaScript and stylesheets
		$this->register_scripts_and_styles();

		// This will run on the frontend and for ajax requests
		if ( ! is_admin() || defined('DOING_AJAX') ) {
		}

		// Init action
		do_action( 'wc_extend_plugin_name_init' );
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any 
	 * following ones if the same translation is present.
	 *
	 * @access public
	 * @return void
	 */
	public function load_plugin_textdomain() {
		$locale = apply_filters( 'plugin_locale', get_locale(), self::text_domain );

		load_textdomain( self::text_domain, WP_LANG_DIR . "/".self::slug."/" . $locale . ".mo" );

		// Set Plugin Languages Directory
		// Plugin translations can be filed in the woocommerce-extension-boilerplate-lite/languages/ directory
		// Wordpress translations can be filed in the wp-content/languages/ directory
		load_plugin_textdomain( self::text_domain, false, dirname( plugin_basename( __FILE__ ) ) . "/languages" );
	}

	/** Helper functions ******************************************************/

	/**
	 * Get the plugin url.
	 *
	 * @access public
	 * @return string
	 */
	public function plugin_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 *
	 * @access public
	 * @return string
	 */
	public function plugin_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

	/**
	 * Get the plugin path for WooCommerce.
	 *
	 * @access public
	 * @return string
	 */
	public function wc_plugin_path() {
		return untrailingslashit( plugin_dir_path( plugin_dir_path( __FILE__ ) ) ) . '/woocommerce/';
	}

	/**
	 * Get the template path.
	 *
	 * @return string
	 */
	public function template_path() {
		return apply_filters( 'WC_EXTEND_TEMPLATE_PATH', $this->plugin_path() . '/templates/' );
	}

	/**
	 * Registers and enqueues stylesheets and javascripts 
	 * for the administration panel and the front of the site.
	 *
	 * @access private
	 */
	private function register_scripts_and_styles() {
		global $wp_locale;

		if ( is_admin() ) {
			// Main Plugin Javascript
			$this->load_file( self::slug . '_admin_script', '/assets/js/admin/woocommerce-extension-plugin-name' . WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE . '.js', true, array('jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip'), WC_Extend_Plugin_Name()->version );

			// Variables for Admin JavaScripts
			wp_localize_script( self::slug . '_admin_script', 'wc_extend_plugin_name_admin_params', apply_filters( 'wc_extend_plugin_name_admin_params', array(
				'plugin_url' => $this->plugin_url(),
				)
			) );

			// Admin Stylesheets
			$this->load_file( self::slug . '_admin_style', '/assets/css/admin/wc-extension-plugin-name.css' );
		}
		else {
			$this->load_file( self::slug . '-script', '/assets/js/frontend/wc-extension-plugin-name' . WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE . '.js', true );

			// WooCommerce Extension Boilerplate Stylesheet
			$this->load_file( self::slug . '-style', '/assets/css/wc-extension-plugin-name.css' );

			// Variables for JS scripts
			wp_localize_script( self::slug . '-script', 'wc_extend_plugin_name_params', apply_filters( 'wc_extend_plugin_name_params', array(
				'plugin_url' => $this->plugin_url(),
				)
			) );

		} // end if/else
	} // end register_scripts_and_styles

	/**
	 * Helper function for registering and enqueueing scripts and styles.
	 *
	 * @name	The 	ID to register with WordPress
	 * @file_path		The path to the actual file
	 * @is_script		Optional argument for if the incoming file_path is a JavaScript source file.
	 *
	 * @access private
	 */
	private function load_file( $name, $file_path, $is_script = false, $support = array(), $version = '' ) {
		global $wp_version;

		$url = $this->plugin_url() . $file_path;
		$file = $this->plugin_path() . $file_path;

		if( file_exists( $file ) ) {
			if( $is_script ) {
				wp_register_script( $name, $url, $support, $version );
				wp_enqueue_script( $name );
			}
			else {
				wp_register_style( $name, $url );
				wp_enqueue_style( $name );
			} // end if
		} // end if
	} // end load_file

} // end class

} // end if class exists

/**
 * Returns the main instance of WC_Extend_Plugin_Name to prevent the need to use globals.
 *
 * @return WooCommerce Extension Boilerplate
 */
function WC_Extend_Plugin_Name() {
	return WC_Extend_Plugin_Name::instance();
}

// Global for backwards compatibility.
$GLOBALS['wc_extend_plugin_name'] = WC_Extend_Plugin_Name();

?>