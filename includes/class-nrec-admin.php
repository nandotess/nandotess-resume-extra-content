<?php
/**
 * Admin Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_Admin' ) ) :

	/**
	 * Admin Class
	 */
	class NREC_Admin {

		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'init', array( $this, 'require_post_type_classes' ), 1 );
		}

		/**
		 * Requires the post type classes
		 */
		public function require_post_type_classes() {
			$plugin_path = nandotess_resume_extra_content()->plugin_path;

			include_once( $plugin_path . 'includes/class-nrec-page-homepage.php' );
			include_once( $plugin_path . 'includes/class-nrec-post-type-skill.php' );
			include_once( $plugin_path . 'includes/class-nrec-post-type-work-experience.php' );
			include_once( $plugin_path . 'includes/class-nrec-post-type-portfolio.php' );
		}

	}

endif;

return new NREC_Admin();
