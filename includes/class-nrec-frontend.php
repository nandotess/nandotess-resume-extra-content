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
			
			add_action( 'nr_homepage', array( $this, 'homepage_section_skills' ), 30 );
			add_action( 'nr_homepage', array( $this, 'homepage_section_works' ), 40 );
			add_action( 'nr_homepage', array( $this, 'homepage_section_portfolio' ), 50 );
			add_action( 'nr_homepage', array( $this, 'homepage_section_education' ), 60 );
			add_action( 'nr_homepage', array( $this, 'homepage_section_contact' ), 70 );
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
				<a href="#" class="btn btn-default btn-lg">Download CV <span class="fa fa-download" aria-hidden="true"></span></a>
				<a href="#" class="btn btn-primary btn-lg">Contact me <span class="fa fa-send" aria-hidden="true"></span></a>
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
			<section id="skills" class="section skills">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="title">Skills</h2>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non augue eleifend, placerat nulla eget, sollicitudin nisl. Mauris auctor porttitor est, ut tempus risus sodales id. Morbi suscipit in arcu id tempor. Nam eleifend lobortis elit, vitae pellentesque neque ultricies sed. In sed magna interdum, dapibus neque non, pharetra lorem. Nullam venenatis libero nec fermentum convallis. Aenean posuere tortor ultricies risus feugiat, id placerat risus pharetra. Quisque porta ipsum id sodales rhoncus.</p>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

		/**
		 * Homepage section works
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_works() {
			?>
			<section id="works" class="section works">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="title">Works</h2>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non augue eleifend, placerat nulla eget, sollicitudin nisl. Mauris auctor porttitor est, ut tempus risus sodales id. Morbi suscipit in arcu id tempor. Nam eleifend lobortis elit, vitae pellentesque neque ultricies sed. In sed magna interdum, dapibus neque non, pharetra lorem. Nullam venenatis libero nec fermentum convallis. Aenean posuere tortor ultricies risus feugiat, id placerat risus pharetra. Quisque porta ipsum id sodales rhoncus.</p>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

		/**
		 * Homepage section portfolio
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_portfolio() {
			?>
			<section id="portfolio" class="section portfolio">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="title">Portfolio</h2>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non augue eleifend, placerat nulla eget, sollicitudin nisl. Mauris auctor porttitor est, ut tempus risus sodales id. Morbi suscipit in arcu id tempor. Nam eleifend lobortis elit, vitae pellentesque neque ultricies sed. In sed magna interdum, dapibus neque non, pharetra lorem. Nullam venenatis libero nec fermentum convallis. Aenean posuere tortor ultricies risus feugiat, id placerat risus pharetra. Quisque porta ipsum id sodales rhoncus.</p>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

		/**
		 * Homepage section education
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_education() {
			?>
			<section id="education" class="section education">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="title">Education</h2>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non augue eleifend, placerat nulla eget, sollicitudin nisl. Mauris auctor porttitor est, ut tempus risus sodales id. Morbi suscipit in arcu id tempor. Nam eleifend lobortis elit, vitae pellentesque neque ultricies sed. In sed magna interdum, dapibus neque non, pharetra lorem. Nullam venenatis libero nec fermentum convallis. Aenean posuere tortor ultricies risus feugiat, id placerat risus pharetra. Quisque porta ipsum id sodales rhoncus.</p>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

		/**
		 * Homepage section contact
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_contact() {
			?>
			<section id="contact" class="section contact">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2 class="title">Contact</h2>
							<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non augue eleifend, placerat nulla eget, sollicitudin nisl. Mauris auctor porttitor est, ut tempus risus sodales id. Morbi suscipit in arcu id tempor. Nam eleifend lobortis elit, vitae pellentesque neque ultricies sed. In sed magna interdum, dapibus neque non, pharetra lorem. Nullam venenatis libero nec fermentum convallis. Aenean posuere tortor ultricies risus feugiat, id placerat risus pharetra. Quisque porta ipsum id sodales rhoncus.</p>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

	}

endif;

return new NREC_Frontend();
