<?php
/*
 * Plugin Name: WooCommerce Extension Boilerplate Lite
 * Plugin URI: https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite
 * Description: This is a lighter version of the best WooCommerce extension boilerplate you will ever need to develop extensions for WooCommerce.
 * Version: 1.0.2
 * Author: Sebastien Dumont
 * Author URI: http://www.sebastiendumont.com
 * Author Email: mailme@sebastiendumont.com
 * Requires at least: 3.8
 * Tested up to: 4.0
 * Text Domain: wc-extend-plugin-name
 * Domain Path: languages
 * Network: false
 * GitHub Plugin URI: https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite
 *
 * WooCommerce Extension Boilerplate Lite is distributed under the terms of the 
 * GNU General Public License as published by the Free Software Foundation, 
 * either version 2 of the License, or any later version.
 *
 * WooCommerce Extension Boilerplate Lite is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WooCommerce Extension Boilerplate Lite. If not, see <http://www.gnu.org/licenses/>.
 *
 * @TODO Replace 'WC_Extens_Plugin_Name' with the name of your plugin class.
 * @package WC_Extend_Plugin_Name
 * @author Your Name / Your Company Name
 * @category Core
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'WC_Extend_Plugin_Name' ) ) {

/**
 * Main WooCommerce Extension Boilerplate Class
 *
 * @TODO Replace 'WC_Extend_Plugin_Name' with the name of your plugin class.
 * @class WC_Extend_Plugin_Name
 * @version 1.0.2
 */
final class WC_Extend_Plugin_Name {

	/**
	 * The single instance of the class
	 *
	 * @var WooCommerce Extension Boilerplate
	 */
	protected static $_instance = null;

	/**
	 * Global Variables
	 * TODO: change variables to what you want them to be.
	 */

	/**
	 * Slug
	 *
	 * @TODO Rename the plugin slug to your own.
	 * @var string
	 */
	public $plugin_slug = 'wc_extend_plugin_name';

	/**
	 * Text Domain
	 *
	 * @TODO Rename the text domain to match the name of your plugin.
	 * @var string
	 */
	public $text_domain = 'wc-extend-plugin-name';

	/**
	 * The Plugin Name.
	 *
	 * @TODO Rename the plugin name to your own.
	 * @var string
	 */
	public $name = "WooCommerce Extension Boilerplate Lite";

	/**
	 * The Plugin Version.
	 *
	 * @var string
	 */
	public $version = "1.0.2";

	/**
	 * The WordPress version the plugin requires minumum.
	 *
	 * @var string
	 */
	public $wp_version_min = "3.8";

	/**
	 * The WooCommerce version this extension requires minimum.
	 *
	 * Set this to the minimum version your 
	 * extension works with WooCommerce.
	 *
	 * @var string
	 */
	public $woo_version_min = "2.1.12";

	/**
	 * The Plugin URL.
	 *
	 * @TODO Replace the url
	 * @var string
	 */
	public $web_url = "http://www.sebs-studio.com/boilerplates/woocommerce-extension-lite/";

	/**
	 * The Plugin documentation URL.
	 *
	 * @TODO Replace the url
	 * @var string
	 */
	public $doc_url = "https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite/wiki/";

	/**
	 * The WordPress.org Plugin URL.
	 *
	 * @TODO Replace the url ex. 'http://wordpress.org/plugins/your-plugin-name'
	 * @var string
	 */
	public $wp_plugin_url = "http://wordpress.org/plugins/woocommerce-extension-boilerplate-lite";

	/**
	 * The WordPress.org Plugin Support URL.
	 *
	 * @TODO Replace the url ex. 'http://wordpress.org/support/plugin/your-plugin-name'
	 * @var string
	 */
	public $wp_plugin_support_url = "http://wordpress.org/support/plugin/woocommerce-extension-boilerplate-lite";

	/**
	 * GitHub Repo URL
	 *
	 * @TODO Replace the url with your own repository
	 * @var string
	 */
	public $github_repo_url = "https://github.com/seb86/WooCommerce-Extension-Boilerplate-Lite/";

	/**
	 * Manage Plugin.
	 *
	 * @TODO Replace the 'manage_plugin_name' with the 
	 * level control the user must have to control the plugin.
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
			self::$_instance = new WC_Extend_Plugin_Name;
		}
		return self::$_instance;
	}

	/**
	 * Throw error on object clone
	 *
	 * The whole idea of the singleton design pattern is that there is a single
	 * object therefore, we don't want the object to be cloned.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	public function __clone() {
		// Cloning instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', $this->text_domain ), $this->version );
	}

	/**
	 * Disable unserializing of the class
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	public function __wakeup() {
		// Unserializing instances of the class is forbidden
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', $this->text_domain ), $this->version );
	}

	/**
	 * Constructor
	 *
	 * @access public
	 */
	public function __construct() {
		// Define constants
		$this->define_constants();

		// Check plugin requirements
		$this->check_requirements();

		// Include required files
		$this->includes();

		// Hooks
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( &$this, 'action_links' ) );

		// Initiate plugin
		add_action( 'init', array( &$this, 'init_wc_extend_plugin_name' ), 0 );

		// Loaded action
		do_action( 'wc_extend_plugin_name_loaded' );
	}

	/**
	 * Plugin action links.
	 *
	 * @access public
	 * @param mixed $links
	 * @return void
	 */
	public function action_links( $links ) {
		// List your action links
		if( current_user_can( $this->manage_plugin ) ) {
			if(version_compare(WC_EXTEND_WOOVERSION, "2.0.20", '<=')){
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=woocommerce_settings&tab=' . WC_EXTEND_PLUGIN_NAME_PAGE ) . '">' . __( 'Settings', $this->text_domain ) . '</a>',
				);
			}
			else{
				$plugin_links = array(
					'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=' . WC_EXTEND_PLUGIN_NAME_PAGE ) . '">' . __( 'Settings', $this->text_domain ) . '</a>',
				);
			}
		}

		$support = array(
					'<a href="http://www.sebastiendumont.com/support/forum/woocommerce-extension-boilerplate/" target="_blnak">' . __( 'Support', $this->text_domain ) . '</a>',
		);
		$plugin_links = array_merge( $plugin_links, $support );

		return array_merge( $plugin_links, $links );
	}

	/**
	 * Define Constants
	 *
	 * @access private
	 */
	private function define_constants() {
		// TODO: change 'WC_EXTEND_PLUGIN_NAME' to the name of the plugin.
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME' ) ) define( 'WC_EXTEND_PLUGIN_NAME', $this->name );
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_FILE' ) ) define( 'WC_EXTEND_PLUGIN_NAME_FILE', __FILE__ );
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_VERSION' ) ) define( 'WC_EXTEND_PLUGIN_NAME_VERSION', $this->version );
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_WP_VERSION_REQUIRE' ) ) define( 'WC_EXTEND_PLUGIN_NAME_WP_VERSION_REQUIRE', $this->wp_version_min );
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_WOO_VERSION_REQUIRE' ) ) define( 'WC_EXTEND_PLUGIN_NAME_WOO_VERSION_REQUIRE', $this->woo_version_min );
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_PAGE' ) ) define( 'WC_EXTEND_PLUGIN_NAME_PAGE', str_replace('_', '-', $this->plugin_slug) );

		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_TEMPLATE_PATH' ) ) define( 'WC_EXTEND_PLUGIN_NAME_TEMPLATE_PATH', $this->template_path() );

		// TODO: change 'woocommerce-extension-plugin-name' with the plugin slug of your plugin on "WordPress.org"
		if ( ! defined( 'WC_EXTEND_PLUGIN_NAME_README_FILE' ) ) define( 'WC_EXTEND_PLUGIN_NAME_README_FILE', 'http://plugins.svn.wordpress.org/woocommerce-extension-plugin-name/trunk/readme.txt' );

		if ( ! defined( 'GITHUB_REPO_URL' ) ) define( 'GITHUB_REPO_URL', $this->github_repo_url );

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		define( 'WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE', $suffix );
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

		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
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
		echo sprintf( __('Sorry, <strong>%s</strong> requires WordPress ' . WC_EXTEND_PLUGIN_NAME_WP_VERSION_REQUIRE . ' or higher. Please upgrade your WordPress setup', $this->text_domain), WC_EXTEND_PLUGIN_NAME );
		echo '</p></div>';
	}

	/**
	 * Display the WooCommerce requirement notice.
	 *
	 * @access static
	 */
	static function display_req_woo_not_active_notice() {
		echo '<div id="message" class="error"><p>';
		echo sprintf( __('Sorry, <strong>%s</strong> requires WooCommerce to be installed and activated first. Please <a href="%s">install WooCommerce</a> first.', $this->text_domain), WC_EXTEND_PLUGIN_NAME, admin_url('plugin-install.php?tab=search&type=term&s=WooCommerce') );
		echo '</p></div>';
	}

	/**
	 * Display the WooCommerce requirement notice.
	 *
	 * @access static
	 */
	static function display_req_woo_notice() {
		echo '<div id="message" class="error"><p>';
		echo sprintf( __('Sorry, <strong>%s</strong> requires WooCommerce ' . WC_EXTEND_PLUGIN_NAME_WOO_VERSION_REQUIRE . ' or higher. Please update WooCommerce for %s to work.', $this->text_domain), WC_EXTEND_PLUGIN_NAME, WC_EXTEND_PLUGIN_NAME );
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

		if ( ! is_admin() || !defined('DOING_AJAX') ) {
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
			include_once( 'includes/admin/class-wc-extension-plugin-name-admin-settings.php' );
			$this->wc_settings_page = new WC_Extend_Plugin_Name_Admin_Settings(); // Call the settings page for WooCommerce.
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
		// Set filter for plugin's languages directory
		$lang_dir = dirname( plugin_basename( WC_EXTEND_PLUGIN_NAME_FILE ) ) . '/languages/';
		$lang_dir = apply_filters( 'wc_extend_plugin_name_languages_directory', $lang_dir );

		// Traditional WordPress plugin locale filter
		$locale = apply_filters( 'plugin_locale',  get_locale(), $this->text_domain );
		$mofile = sprintf( '%1$s-%2$s.mo', $this->text_domain, $locale );

		// Setup paths to current locale file
		$mofile_local  = $lang_dir . $mofile;
		$mofile_global = WP_LANG_DIR . '/' . $this->text_domain . '/' . $mofile;

		if ( file_exists( $mofile_global ) ) {
			// Look in global /wp-content/languages/wc-extend-plugin-name/ folder
			load_textdomain( $this->text_domain, $mofile_global );
		}
		elseif ( file_exists( $mofile_local ) ) {
			// Look in local /wp-content/plugins/wc-extend-plugin-name/languages/ folder
			load_textdomain( $this->text_domain, $mofile_local );
		}
		else {
			// Load the default language files
			load_plugin_textdomain( $this->text_domain, false, $lang_dir );
		}
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
		return apply_filters( 'WC_EXTEND_PLUGIN_NAME_TEMPLATE_PATH', $this->plugin_path() . '/templates/' );
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
			$this->load_file( $this->plugin_slug . '_admin_script', '/assets/js/admin/woocommerce-extension-plugin-name' . WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE . '.js', true, array('jquery', 'jquery-blockui', 'jquery-ui-sortable', 'jquery-ui-widget', 'jquery-ui-core', 'jquery-tiptip'), WC_Extend_Plugin_Name()->version );

			// Variables for Admin JavaScripts
			wp_localize_script( $this->plugin_slug . '_admin_script', 'wc_extend_plugin_name_admin_params', apply_filters( 'wc_extend_plugin_name_admin_params', array(
				'plugin_url' => $this->plugin_url(),
				)
			) );

			// Admin Stylesheets
			$this->load_file( $this->plugin_slug . '_admin_style', '/assets/css/admin/wc-extension-plugin-name' . WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE . '.css' );
		}
		else {
			$this->load_file( $this->plugin_slug . '-script', '/assets/js/frontend/wc-extension-plugin-name' . WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE . '.js', true );

			// WooCommerce Extension Boilerplate Stylesheet
			$this->load_file( $this->plugin_slug . '-style', '/assets/css/wc-extension-plugin-name' . WC_EXTEND_PLUGIN_NAME_SCRIPT_MODE . '.css' );

			// Variables for JS scripts
			wp_localize_script( $this->plugin_slug . '-script', 'wc_extend_plugin_name_params', apply_filters( 'wc_extend_plugin_name_params', array(
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
