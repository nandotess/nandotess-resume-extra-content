<?php
/**
 * Post Type Work Experience Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_Post_Type_Work_Experience' ) ) :

	/**
	 * Post Type Work Experience Class
	 */
	class NREC_Post_Type_Work_Experience {

		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'init',           array( $this, 'register_post_types' ) );
			add_filter( 'cmb_meta_boxes', array( $this, 'metaboxes' ) );
		}

		/**
		 * Register post type
		 */
		public function register_post_types() {
			$labels = array(
				'name'               => esc_html__( 'Work Experiences', 'nandotess-resume-extra-content' ),
				'singular_name'      => esc_html__( 'Work Experience', 'nandotess-resume-extra-content' ),
				'add_new'            => esc_html__( 'Add New', 'nandotess-resume-extra-content' ),
				'add_new_item'       => esc_html__( 'Add New Work Experience', 'nandotess-resume-extra-content' ),
				'edit_item'          => esc_html__( 'Edit Work Experience', 'nandotess-resume-extra-content' ),
				'new_item'           => esc_html__( 'New Work Experience', 'nandotess-resume-extra-content' ),
				'view_item'          => esc_html__( 'View Work Experience', 'nandotess-resume-extra-content' ),
				'search_items'       => esc_html__( 'Search Work Experiences', 'nandotess-resume-extra-content' ),
				'not_found'          => esc_html__( 'No work experiences found', 'nandotess-resume-extra-content' ),
				'not_found_in_trash' => esc_html__( 'No work experiences found in Trash', 'nandotess-resume-extra-content' ),
				'parent_item_colon'  => '',
				'all_items'          => esc_html__( 'All Work Experiences', 'nandotess-resume-extra-content' ),
				'menu_name'          => esc_html__( 'Experiences', 'nandotess-resume-extra-content' ),
			);

			$args = array(
				'menu_icon'          => 'dashicons-hammer',
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => false,
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => false,
				'supports'           => array( 'title', 'editor' ),
			);

			register_post_type( 'work-experience', $args );
		}

		/**
		 * Add custom meta boxes
		 *
		 * @param array $meta_boxes meta boxes.
		 */
		public function metaboxes( $meta_boxes ) {
			$fields = array();

			$fields[] = array(
				'id'       => 'work-company',
				'name'     => esc_html__( 'Company name', 'nandotess-resume-extra-content' ),
				'type'     => 'text',
			);

			$fields[] = array(
				'id'       => 'work-location',
				'name'     => esc_html__( 'Location', 'nandotess-resume-extra-content' ),
				'type'     => 'text',
			);

			$fields_work_time_period = array();

			$fields_work_time_period[] = array(
				'id'       => 'work-date-from',
				'name'     => esc_html__( 'Date from', 'nandotess-resume-extra-content' ),
				'type'     => 'date',
			);

			$fields_work_time_period[] = array(
				'id'       => 'work-date-to',
				'name'     => esc_html__( 'Date to', 'nandotess-resume-extra-content' ),
				'type'     => 'date',
			);

			$fields_work_time_period[] = array(
				'id'       => 'work-current',
				'name'     => esc_html__( 'I currently work here', 'nandotess-resume-extra-content' ),
				'type'     => 'checkbox',
			);

			$fields[] = array(
				'id'       => 'work-time-period',
				'name'     => esc_html__( 'Time period', 'nandotess-resume-extra-content' ),
				'type'     => 'group',
				'fields'   => $fields_work_time_period,
			);

			$meta_boxes[] = array(
				'title'    => 'Work Experience',
				'fields'   => $fields,
				'pages'    => 'work-experience',
				'context'  => 'normal',
				'priority' => 'high',
				'desc'     => esc_html__( 'Work experience details.', 'nandotess-resume-extra-content' ),
			);

			return $meta_boxes;
		}

	}

endif;

return new NREC_Post_Type_Work_Experience();
