<?php
/**
 * Post Type Portfolio Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_PostType_Portfolio' ) ) :

	/**
	 * Post Type Portfolio Class
	 */
	class NREC_PostType_Portfolio {

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
				'name'               => esc_html__( 'Portfolio', 'nandotess-resume-extra-content' ),
				'singular_name'      => esc_html__( 'Portfolio', 'nandotess-resume-extra-content' ),
				'add_new'            => esc_html__( 'Add New', 'nandotess-resume-extra-content' ),
				'add_new_item'       => esc_html__( 'Add New Portfolio', 'nandotess-resume-extra-content' ),
				'edit_item'          => esc_html__( 'Edit Portfolio', 'nandotess-resume-extra-content' ),
				'new_item'           => esc_html__( 'New Portfolio', 'nandotess-resume-extra-content' ),
				'view_item'          => esc_html__( 'View Portfolio', 'nandotess-resume-extra-content' ),
				'search_items'       => esc_html__( 'Search Portfolio', 'nandotess-resume-extra-content' ),
				'not_found'          => esc_html__( 'No Portfolio found', 'nandotess-resume-extra-content' ),
				'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash', 'nandotess-resume-extra-content' ),
				'parent_item_colon'  => '',
				'all_items'          => esc_html__( 'All Portfolio', 'nandotess-resume-extra-content' ),
				'menu_name'          => esc_html__( 'Portfolio', 'nandotess-resume-extra-content' ),
			);

			$args = array(
				'menu_icon'          => 'dashicons-portfolio',
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

			register_post_type( 'portfolio', $args );
		}

		/**
		 * Add custom meta boxes
		 */
		public function metaboxes( array $meta_boxes ) {
			$fields = array();

			$fields[] = array(
				'id'       => 'portfolio-external-link',
				'name'     => esc_html__( 'External Link', 'nandotess-resume-extra-content' ),
				'type'     => 'text_url',
			);

			$meta_boxes[] = array(
				'title'    => 'Portfolio',
				'fields'   => $fields,
				'pages'    => 'portfolio',
				'context'  => 'normal',
				'priority' => 'high',
				'desc'     => esc_html__( 'Portfolio details.', 'nandotess-resume-extra-content' ),
			);

			return $meta_boxes;
		}

	}

endif;

return new NREC_PostType_Portfolio();
