<?php
/**
 * Customizer Class
 *
 * @author   Fernando Tessmann
 * @since    1.0.0
 * @package  nandotess-resume-extra-content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'NREC_Customizer' ) ) :

	/**
	 * Customizer Class
	 */
	class NREC_Customizer {

		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customize_register' ), 20 );

			add_filter( 'nr_sass_variables',  array( $this, 'sass_variables' ) );
			add_filter( 'nr_sass_content',    array( $this, 'sass_content' ) );
		}

		/**
		 * Customizer Controls and Settings
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object
		 * @since 1.0.0
		 */
		public function customize_register( $wp_customize ) {
			/**
			 * Section About: Button CV Background Color
			 */
			$wp_customize->add_setting( 'nrec_section_about_button_cv_background_color', array(
				'default'           => '#2196f3',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_about_button_cv_background_color', array(
				'label'             => esc_html__( 'Button CV background color', 'nandotess-resume' ),
				'section'           => 'nr_section_about',
				'settings'          => 'nrec_section_about_button_cv_background_color',
				'priority'          => 4,
			) ) );

			/**
			 * Section About: Button CV Link Color
			 */
			$wp_customize->add_setting( 'nrec_section_about_button_cv_link_color', array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_about_button_cv_link_color', array(
				'label'             => esc_html__( 'Button CV link color', 'nandotess-resume' ),
				'section'           => 'nr_section_about',
				'settings'          => 'nrec_section_about_button_cv_link_color',
				'priority'          => 5,
			) ) );

			/**
			 * Section About: Button Contact Background Color
			 */
			$wp_customize->add_setting( 'nrec_section_about_button_contact_background_color', array(
				'default'           => '#38de8a',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_about_button_contact_background_color', array(
				'label'             => esc_html__( 'Button contact background color', 'nandotess-resume' ),
				'section'           => 'nr_section_about',
				'settings'          => 'nrec_section_about_button_contact_background_color',
				'priority'          => 6,
			) ) );

			/**
			 * Section About: Button Contact Link Color
			 */
			$wp_customize->add_setting( 'nrec_section_about_button_contact_link_color', array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_about_button_contact_link_color', array(
				'label'             => esc_html__( 'Button contact link color', 'nandotess-resume' ),
				'section'           => 'nr_section_about',
				'settings'          => 'nrec_section_about_button_contact_link_color',
				'priority'          => 7,
			) ) );

			/**
			 * Section Skills
			 */
			$wp_customize->add_section( 'nrec_section_skills' , array(
				'title'             => esc_html__( 'Section Skills', 'nandotess-resume-extra-content' ),
				'priority'          => 29,
			) );

			/**
			 * Section Skills: Title Color
			 */
			$wp_customize->add_setting( 'nrec_section_skills_title_color', array(
				'default'           => '#5f5f5f',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_skills_title_color', array(
				'label'             => esc_html__( 'Title color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_skills',
				'settings'          => 'nrec_section_skills_title_color',
				'priority'          => 1,
			) ) );

			/**
			 * Section Skills: Subtitle Color
			 */
			$wp_customize->add_setting( 'nrec_section_skills_subtitle_color', array(
				'default'           => '#5f5f5f',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_skills_subtitle_color', array(
				'label'             => esc_html__( 'Subtitle color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_skills',
				'settings'          => 'nrec_section_skills_subtitle_color',
				'priority'          => 2,
			) ) );

			/**
			 * Section Skills: Skill Background Color
			 */
			$wp_customize->add_setting( 'nrec_section_skills_skill_background_color', array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_skills_skill_background_color', array(
				'label'             => esc_html__( 'Skill background color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_skills',
				'settings'          => 'nrec_section_skills_skill_background_color',
				'priority'          => 3,
			) ) );

			/**
			 * Section Skills: Skill Text Color
			 */
			$wp_customize->add_setting( 'nrec_section_skills_skill_text_color', array(
				'default'           => '#727272',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_skills_skill_text_color', array(
				'label'             => esc_html__( 'Skill text color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_skills',
				'settings'          => 'nrec_section_skills_skill_text_color',
				'priority'          => 4,
			) ) );

			/**
			 * Section Works
			 */
			$wp_customize->add_section( 'nrec_section_works' , array(
				'title'             => esc_html__( 'Section Works', 'nandotess-resume-extra-content' ),
				'priority'          => 30,
			) );

			/**
			 * Section Works: Background Color
			 */
			$wp_customize->add_setting( 'nrec_section_works_background_color', array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_works_background_color', array(
				'label'             => esc_html__( 'Background color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_works',
				'settings'          => 'nrec_section_works_background_color',
				'priority'          => 1,
			) ) );

			/**
			 * Section Works: Title Color
			 */
			$wp_customize->add_setting( 'nrec_section_works_title_color', array(
				'default'           => '#5f5f5f',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_works_title_color', array(
				'label'             => esc_html__( 'Title color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_works',
				'settings'          => 'nrec_section_works_title_color',
				'priority'          => 2,
			) ) );

			/**
			 * Section Works: Subtitle Color
			 */
			$wp_customize->add_setting( 'nrec_section_works_subtitle_color', array(
				'default'           => '#5f5f5f',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_works_subtitle_color', array(
				'label'             => esc_html__( 'Subtitle color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_works',
				'settings'          => 'nrec_section_works_subtitle_color',
				'priority'          => 3,
			) ) );

			/**
			 * Section Works: Text Color
			 */
			$wp_customize->add_setting( 'nrec_section_works_text_color', array(
				'default'           => '#727272',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_works_text_color', array(
				'label'             => esc_html__( 'Text color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_works',
				'settings'          => 'nrec_section_works_text_color',
				'priority'          => 4,
			) ) );

			/**
			 * Section Works: Date Color
			 */
			$wp_customize->add_setting( 'nrec_section_works_meta_color', array(
				'default'           => '#2196f3',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_works_meta_color', array(
				'label'             => esc_html__( 'Date color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_works',
				'settings'          => 'nrec_section_works_meta_color',
				'priority'          => 5,
			) ) );

			/**
			 * Section Portfolio
			 */
			$wp_customize->add_section( 'nrec_section_portfolio' , array(
				'title'             => esc_html__( 'Section Portfolio', 'nandotess-resume-extra-content' ),
				'priority'          => 30,
			) );

			/**
			 * Section Portfolio: Title Color
			 */
			$wp_customize->add_setting( 'nrec_section_portfolio_title_color', array(
				'default'           => '#5f5f5f',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_portfolio_title_color', array(
				'label'             => esc_html__( 'Title color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_portfolio',
				'settings'          => 'nrec_section_portfolio_title_color',
				'priority'          => 1,
			) ) );

			/**
			 * Section Portfolio: Background Text Color
			 */
			$wp_customize->add_setting( 'nrec_section_portfolio_background_text_color', array(
				'default'           => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_portfolio_background_text_color', array(
				'label'             => esc_html__( 'Background Text color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_portfolio',
				'settings'          => 'nrec_section_portfolio_background_text_color',
				'priority'          => 2,
			) ) );

			/**
			 * Section Portfolio: Text Color
			 */
			$wp_customize->add_setting( 'nrec_section_portfolio_text_color', array(
				'default'           => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nrec_section_portfolio_text_color', array(
				'label'             => esc_html__( 'Text color', 'nandotess-resume-extra-content' ),
				'section'           => 'nrec_section_portfolio',
				'settings'          => 'nrec_section_portfolio_text_color',
				'priority'          => 3,
			) ) );
		}

		/**
		 * ????
		 *
		 * @param array $theme_mods Theme mods array
		 * @since 1.0.0
		 */
		public function sass_variables( $theme_mods ) {
			return array_merge( $theme_mods, array(
				'section_about_button_cv_background_color'      => get_theme_mod( 'nrec_section_about_button_cv_background_color', '#2196f3' ),
				'section_about_button_cv_link_color'            => get_theme_mod( 'nrec_section_about_button_cv_link_color', '#ffffff' ),
				'section_about_button_contact_background_color' => get_theme_mod( 'nrec_section_about_button_contact_background_color', '#38de8a' ),
				'section_about_button_contact_link_color'       => get_theme_mod( 'nrec_section_about_button_contact_link_color', '#ffffff' ),

				'section_skills_title_color'                    => get_theme_mod( 'nrec_section_skills_title_color', '#5f5f5f' ),
				'section_skills_subtitle_color'                 => get_theme_mod( 'nrec_section_skills_subtitle_color', '#5f5f5f' ),
				'section_skills_skill_background_color'         => get_theme_mod( 'nrec_section_skills_skill_background_color', '#ffffff' ),
				'section_skills_skill_text_color'               => get_theme_mod( 'nrec_section_skills_skill_text_color', '#727272' ),

				'section_works_background_color'                => get_theme_mod( 'nrec_section_works_background_color', '#ffffff' ),
				'section_works_title_color'                     => get_theme_mod( 'nrec_section_works_title_color', '#5f5f5f' ),
				'section_works_subtitle_color'                  => get_theme_mod( 'nrec_section_works_subtitle_color', '#5f5f5f' ),
				'section_works_text_color'                      => get_theme_mod( 'nrec_section_works_text_color', '#727272' ),
				'section_works_meta_color'                      => get_theme_mod( 'nrec_section_works_meta_color', '#2196f3' ),

				'section_portfolio_title_color'                 => get_theme_mod( 'nrec_section_portfolio_title_color', '#5f5f5f' ),
				'section_portfolio_background_text_color'       => get_theme_mod( 'nrec_section_portfolio_background_text_color', '#000000' ),
				'section_portfolio_text_color'                  => get_theme_mod( 'nrec_section_portfolio_text_color', '#ffffff' ),
			) );
		}

		/**
		 * ??
		 *
		 * @param string $scss css content
		 * @since 1.0.0
		 */
		public function sass_content( $scss ) {
			global $wp_filesystem;

			$scss_file = nandotess_resume_extra_content()->plugin_path . 'assets/css/scss/nandotess-resume-extra-content-customizer.scss';

			if ( file_exists( $scss_file ) ) {
				if ( empty( $wp_filesystem ) ) {
					require_once( ABSPATH . '/wp-admin/includes/file.php' );
					WP_Filesystem();
				}

				if ( $wp_filesystem ) {
					$scss .= "\n\n";
					$scss .= $wp_filesystem->get_contents( $scss_file );
				}
			}

			return $scss;
		}

	}

endif;

return new NREC_Customizer();
