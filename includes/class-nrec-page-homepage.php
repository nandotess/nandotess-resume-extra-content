<?php
/**
 * Page Homepage Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_Page_Homepage' ) ) :

	/**
	 * Page Homepage Class
	 */
	class NREC_Page_Homepage {

		/**
		 * Setup class
		 */
		public function __construct() {
			add_filter( 'cmb_meta_boxes', array( $this, 'metaboxes' ) );
		}

		/**
		 * Add custom meta boxes
		 *
		 * @param array $meta_boxes meta boxes.
		 */
		public function metaboxes( $meta_boxes ) {
			$fields = array();

			$fields[] = array(
				'id'       => 'file-resume',
				'name'     => esc_html__( 'Resume', 'nandotess-resume-extra-content' ),
				'type'     => 'file',
			);

			$meta_boxes[] = array(
				'title'    => 'Homepage',
				'fields'   => $fields,
				'pages'    => 'page',
				'show_on'  => array( 'page-template' => 'templates/template-front-page.php' ),
				'context'  => 'normal',
				'priority' => 'high',
				'desc'     => esc_html__( 'Homepage extra content.', 'nandotess-resume-extra-content' ),
			);

			return $meta_boxes;
		}

	}

endif;

return new NREC_Page_Homepage();
