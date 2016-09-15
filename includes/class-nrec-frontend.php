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
			add_action( 'wp_enqueue_scripts',      array( $this, 'enqueue_frontend_scripts' ), 9999 );
			add_action( 'nr_section_about_bottom', array( $this, 'homepage_section_about_buttons' ) );
			add_action( 'nr_homepage',             array( $this, 'homepage_section_skills' ), 30 );
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

		/**
		 * Homepage section about - Buttons
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_about_buttons() {
			?>
			<div class="section-buttons">
				<a href="#" class="btn btn-default btn-lg">Download CV</a>
				<a href="#" class="btn btn-primary btn-lg">Contact me</a>
			</div>
			<?php
		}

		/**
		 * Homepage section skills
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_skills() {
			?>
			<section id="about" class="section skills">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							Skills...
						</div>
					</div>
				</div>
			</section>
			<?php
		}

	}

endif;

return new NREC_Frontend();
