<?php
/**
 * nandotess's resume extra content Customizer Class
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
	 * The nandotess's resume extra content Customizer class
	 */
	class NREC_Customizer {
		
		/**
		 * Setup class
		 */
		public function __construct() {
			add_action( 'customize_register',              array( $this, 'customize_register' ), 20 );

			add_filter( 'nandotess_resume_sass_variables', array( $this, 'sass_variables' ) );
			add_filter( 'nandotess_resume_sass_content',   array( $this, 'sass_content' ) );
		}

		/**
		 * Customizer Controls and Settings
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object
		 * @since 1.0.0
		 */
		public function customize_register( $wp_customize ) {
			/**
			 * Section Skills
			 */
			$wp_customize->add_section( 'nandotess_resume_section_skills' , array(
				'title'      			=> __( 'Section Skills', 'nandotess-resume-extra-content' ),
				'priority'   			=> 29,
			) );

			/**
			 * Section Skills: Background Color
			 */
			$wp_customize->add_setting( 'nandotess_resume_section_skills_background_color', array(
				'default'           	=> '#2196f3',
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nandotess_resume_section_skills_background_color', array(
				'label'	   				=> __( 'Background color', 'nandotess-resume-extra-content' ),
				'section'  				=> 'nandotess_resume_section_skills',
				'settings' 				=> 'nandotess_resume_section_skills_background_color',
				'priority' 				=> 1,
			) ) );

			/**
			 * Section Skills: Text Color
			 */
			$wp_customize->add_setting( 'nandotess_resume_section_skills_text_color', array(
				'default'           	=> '#ffffff',
				'sanitize_callback' 	=> 'sanitize_hex_color',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nandotess_resume_section_skills_text_color', array(
				'label'	   				=> __( 'Text color', 'nandotess-resume-extra-content' ),
				'section'  				=> 'nandotess_resume_section_skills',
				'settings' 				=> 'nandotess_resume_section_skills_text_color',
				'priority' 				=> 2,
			) ) );
		}

		/**
		 * 
		 *
		 * @param array $theme_mods Theme mods array
		 * @since 1.0.0
		 */
		public function sass_variables( $theme_mods ) {
			$theme_mods['section_skills_background_color'] = get_theme_mod( 'nandotess_resume_section_skills_background_color' );
			$theme_mods['section_skills_text_color']       = get_theme_mod( 'nandotess_resume_section_skills_text_color' );
			return $theme_mods;
		}

		/**
		 * 
		 *
		 * @param string $scss css content
		 * @since 1.0.0
		 */
		public function sass_content( $scss ) {
			global $wp_filesystem;

			$scss_file = NandotessResume_Extra_Content()->plugin_url .'assets/css/scss/nandotess-resume-extra-content-customizer.scss';
			
			if ( file_exists( $scss_file ) ) {
				if ( empty( $wp_filesystem ) ) {
					require_once( ABSPATH .'/wp-admin/includes/file.php' );
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
