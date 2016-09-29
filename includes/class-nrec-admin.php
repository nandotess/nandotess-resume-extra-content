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
	 * The nandotess's resume extra content Admin Class
	 */
	class NREC_Admin {

		/**
		 * Setup class
		 */
		public function __construct() {}

	}

endif;

return new NREC_Admin();
