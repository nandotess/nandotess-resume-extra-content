<?php
/**
 * Post Type Skill Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_PostType_Skill' ) ) :

	/**
	 * Post Type Skill Class
	 */
	class NREC_PostType_Skill {

		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'init',                            array( $this, 'register_post_types' ) );
			add_action( 'init',                            array( $this, 'register_taxonomies' ) );

			add_filter( 'cmb_meta_boxes',                  array( $this, 'metaboxes' ) );

			add_action( 'skill-category_add_form_fields',  array( $this, 'add_taxonomies_fields' ) );
			add_action( 'skill-category_edit_form_fields', array( $this, 'add_taxonomies_fields' ) );

			add_action( 'create_skill-category',         array( $this, 'save_taxonomies_fields' ) );
			add_action( 'edited_skill-category',           array( $this, 'save_taxonomies_fields' ) );
		}

		/**
		 * Register post type
		 */
		public function register_post_types() {
			$labels = array(
				'name'               => esc_html__( 'Skills', 'nandotess-resume-extra-content' ),
				'singular_name'      => esc_html__( 'Skill', 'nandotess-resume-extra-content' ),
				'add_new'            => esc_html__( 'Add New', 'nandotess-resume-extra-content' ),
				'add_new_item'       => esc_html__( 'Add New Skill', 'nandotess-resume-extra-content' ),
				'edit_item'          => esc_html__( 'Edit Skill', 'nandotess-resume-extra-content' ),
				'new_item'           => esc_html__( 'New Skill', 'nandotess-resume-extra-content' ),
				'view_item'          => esc_html__( 'View Skill', 'nandotess-resume-extra-content' ),
				'search_items'       => esc_html__( 'Search Skills', 'nandotess-resume-extra-content' ),
				'not_found'          => esc_html__( 'No skills found', 'nandotess-resume-extra-content' ),
				'not_found_in_trash' => esc_html__( 'No skills found in Trash', 'nandotess-resume-extra-content' ),
				'parent_item_colon'  => '',
				'all_items'          => esc_html__( 'All Skills', 'nandotess-resume-extra-content' ),
				'menu_name'          => esc_html__( 'Skills', 'nandotess-resume-extra-content' ),
			);

			$args = array(
				'menu_icon'          => 'dashicons-star-half',
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
				'supports'           => array( 'title' ),
			);

			register_post_type( 'skill', $args );
		}

		/**
		 * Register taxonomy
		 */
		public function register_taxonomies() {
			$labels = array(
				'name'              => esc_html__( 'Skill Categories', 'nandotess-resume-extra-content' ),
				'singular_name'     => esc_html__( 'Skill Category', 'nandotess-resume-extra-content' ),
				'menu_name'         => esc_html__( 'Categories', 'nandotess-resume-extra-content' ),
				'all_items'         => esc_html__( 'Skill Categories', 'nandotess-resume-extra-content' ),
				'edit_item'         => esc_html__( 'Edit Skill Category', 'nandotess-resume-extra-content' ),
				'view_item'         => esc_html__( 'View Skill Category', 'nandotess-resume-extra-content' ),
				'update_item'       => esc_html__( 'Update Skill Category', 'nandotess-resume-extra-content' ),
				'add_new_item'      => esc_html__( 'Add New Skill Category', 'nandotess-resume-extra-content' ),
				'new_item_name'     => esc_html__( 'New Skill Category', 'nandotess-resume-extra-content' ),
				'parent_item'       => esc_html__( 'Parent', 'nandotess-resume-extra-content' ),
				'search_items'      => esc_html__( 'Search Skill Categories', 'nandotess-resume-extra-content' ),
			);

			$args = array(
				'hierarchical'        => false,
				'labels'              => $labels,
				'show_ui'             => true,
				'public'              => true,
				'show_in_nav_menus'   => false,
				'show_tagcloud'       => false,
				'exclude_from_search' => true,
				'show_admin_column'   => true,
				'query_var'           => true,
				'rewrite'             => false,
			);

			register_taxonomy( 'skill-category', nandotess_resume_extra_content()->token, $args );
			register_taxonomy_for_object_type( 'skill-category', 'skill' );
		}

		/**
		 * Add custom fields in taxonomies
		 */
		public function add_taxonomies_fields( $term = false ) {
			$value = false;

			if ( is_object( $term ) ) {
				$value = get_term_meta( $term->term_id, 'skill-badge', true );
			}

			wp_nonce_field( 'nrec_skill_category', '_nrec_nonce' );
			?>

				<tr class="form-field term-skill-badge-wrap">
					<th scope="row">
						<label for="skill-badge"><?php esc_html_e( 'Badge', 'nandotess-resume-extra-content' ); ?></label>
					</th>

					<td>
						<input name="skill-badge" id="skill-badge" type="text" value="<?php echo esc_attr( $value ); ?>" size="40">
						<p class="description"><?php esc_html_e( 'Icon slug/badget from FontAwesome Icons, example: fa-cog.', 'nandotess-resume-extra-content' ); ?></p>
					</td>
				</tr>

			<?php
		}

		/**
		 * Save custom fields in taxonomies
		 */
		public function save_taxonomies_fields( $term_id = 0 ) {
			check_admin_referer( 'nrec_skill_category', '_nrec_nonce' );
			
			$meta = sanitize_text_field( wp_unslash( $_POST['skill-badge'] ) );
			$meta = ! empty( $meta ) ? $meta : '';

			if ( empty( $meta ) ) {
				delete_term_meta( $term_id, 'skill-badge' );
			} else {
				update_term_meta( $term_id, 'skill-badge', $meta );
			}
		}

		/**
		 * Add custom meta boxes
		 */
		public function metaboxes( array $meta_boxes ) {
			$fields = array();

			$fields[] = array(
				'id'       => 'skill-proficiency',
				'name'     => esc_html__( 'Proficiency', 'nandotess-resume-extra-content' ),
				'type'     => 'number',
				'desc'     => esc_html__( 'Number from 0 to 100.', 'nandotess-resume-extra-content' ),
			);

			$meta_boxes[] = array(
				'title'    => 'Skill',
				'fields'   => $fields,
				'pages'    => 'skill',
				'context'  => 'normal',
				'priority' => 'high',
				'desc'     => esc_html__( 'Skill details.', 'nandotess-resume-extra-content' ),
			);

			return $meta_boxes;
		}

	}

endif;

return new NREC_PostType_Skill();
