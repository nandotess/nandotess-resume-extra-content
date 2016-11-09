<?php
/**
 * Plugin Name:	nandotess resume extra content
 * Plugin URI: #
 * Description:	A WordPress plugin to add extra content to nandotess resume WordPress theme
 * Version:	1.1.0
 * Author: Fernando Tessmann
 * Author URI: http://www.fernandotessmann.com
 * License: GPL-3.0
 *
 * Text Domain: nandotess-resume-extra-content
 * Domain Path: /languages/
 *
 * @package nandotess-resume-extra-content
 * @author  Fernando Tessmann
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns the main instance of NandotessResume_Extra_Content to prevent the need to use globals
 *
 * @since  1.0.0
 * @return object NandotessResume_Extra_Content
 */
function nandotess_resume_extra_content() {
	return NandotessResume_Extra_Content::instance();
}

nandotess_resume_extra_content();

/**
 * Main Class
 *
 * @class NandotessResume_Extra_Content
 * @since 1.0.0
 * @package nandotess-resume-extra-content
 */
final class NandotessResume_Extra_Content {

	/**
	 * NandotessResume_Extra_Content The single instance of NandotessResume_Extra_Content
	 *
	 * @var 	object
	 * @access  private
	 * @since 	1.0.0
	 */
	private static $_instance = null;

	/**
	 * The token
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $token;

	/**
	 * The plugin url
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $plugin_url;

	/**
	 * The plugin path
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $plugin_path;

	/**
	 * The version number
	 *
	 * @var     string
	 * @access  public
	 * @since   1.0.0
	 */
	public $version;

	/**
	 * Constructor function
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function __construct() {
		$this->token		= 'nandotess-resume-extra-content';
		$this->plugin_url	= plugin_dir_url( __FILE__ );
		$this->plugin_path	= plugin_dir_path( __FILE__ );
		$this->version		= '1.1.0';

		register_activation_hook( __FILE__, array( $this, 'install' ) );

		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		$this->setup();
	}

	/**
	 * Main NandotessResume_Extra_Content Instance
	 *
	 * Ensures only one instance of NandotessResume_Extra_Content is loaded or can be loaded
	 *
	 * @since 1.0.0
	 * @static
	 * @see NandotessResume_Extra_Content()
	 * @return Main NandotessResume_Extra_Content instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Load the localisation file
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'nandotess-resume-extra-content', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Installation
	 * Runs on activation
	 * Logs the version number and assigns a notice message to a WordPress option
	 *
	 * @access  public
	 * @since   1.0.0
	 * @return  void
	 */
	public function install() {
		$this->_log_version_number();
	}

	/**
	 * Log the plugin version number
	 *
	 * @access  private
	 * @since   1.0.0
	 * @return  void
	 */
	private function _log_version_number() {
		update_option( $this->token . '-version', $this->version );
	}

	/**
	 * Include all the necessary files
	 *
	 * @access  public
	 * @since   1.0.0
	 */
	public function setup() {
		$theme = wp_get_theme();

		if ( ! function_exists( 'cmb_init' ) ) {
			if ( is_file( $this->plugin_path . 'vendor/humanmade/Custom-Meta-Boxes/custom-meta-boxes.php' ) ) {
				include_once( $this->plugin_path . 'vendor/humanmade/Custom-Meta-Boxes/custom-meta-boxes.php' );
			}
		}

		include_once( $this->plugin_path . 'includes/class-nrec-admin.php' );

		if ( 'nandotess resume' === $theme->name ) {
			include_once( $this->plugin_path . 'includes/class-nrec-customizer.php' );
			include_once( $this->plugin_path . 'includes/class-nrec-frontend.php' );
		}
	}

}
