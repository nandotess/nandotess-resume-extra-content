<?php
/**
 * nandotess's resume extra content Frontend class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_Frontend' ) ) :

	/**
	 * The nandotess's resume extra content Frontend class
	 */
	class NREC_Frontend {
		
		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts' ), 9999 );
		}

		/**
		 * Enqueue frontend scripts
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function enqueue_frontend_scripts() {
			wp_enqueue_style( 'nandotess-resume-extra-content-style', NandotessResume_Extra_Content()->plugin_url . 'assets/css/nandotess-resume-extra-content.css', array(), NandotessResume_Extra_Content()->version, 'all' );
		}

	}

endif;

return new NREC_Frontend();
