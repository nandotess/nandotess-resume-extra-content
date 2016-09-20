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
			<div class="row row-buttons">
				<div class="col-xs-12 col-sm-6 col-button-cv">
					<a href="#" class="btn btn-default btn-lg">Download CV <span class="fa fa-download" aria-hidden="true"></span></a>
				</div>
				<div class="col-xs-12 col-sm-6 col-button-contact">
					<a href="#" class="btn btn-primary btn-lg">Contact me <span class="fa fa-send" aria-hidden="true"></span></a>
				</div>
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
					<div class="row row-title">
						<div class="col-md-12">
							<h2 class="title"><span class="fa fa-cogs" aria-hidden="true"></span> Relevant Skills</h2>
						</div>
					</div>
					<div class="row row-content">
						<div class="box">
							<div class="col-sm-12 col-md-4">
								<h3 class="subtitle"><span class="fa fa-code" aria-hidden="true"></span> Front-end</h3>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
										<span class="skill">JavaScript</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
										<span class="skill">HTML</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
										<span class="skill">CSS</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
										<span class="skill">Sass</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
										<span class="skill">jQuery</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
										<span class="skill">Bootstrap</span>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<h3 class="subtitle"><span class="fa fa-terminal" aria-hidden="true"></span> Back-end</h3>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
										<span class="skill">LAMP</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
										<span class="skill">WordPress</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
										<span class="skill">Smarty</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
										<span class="skill">CodeIgniter</span>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4">
								<h3 class="subtitle"><span class="fa fa-desktop" aria-hidden="true"></span> Dev</h3>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
										<span class="skill">Bower, Gulp, Composer</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
										<span class="skill">Responsive Web Design</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
										<span class="skill">Single-Page Applications</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width:85%">
										<span class="skill">SEO</span>
									</div>
								</div>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
										<span class="skill">High Performance Web Sites</span>
									</div>
								</div>
							</div>
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
					<div class="row row-title">
						<div class="col-md-12">
							<h2 class="title"><span class="fa fa-suitcase" aria-hidden="true"></span> Work Experience</h2>
						</div>
					</div>
					<div class="timeline">
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">Senior Front-end and WordPress Developer</h3>
									<div class="full-description">
										<p class="meta">LightSpeed<br>Jun 2016 - Present<br>Cape Town, South Africa (remote)</p>
										<p>Code WordPress themes and plugins. Update/maintain products. Provide support. Skills: LAMP, WordPress, JavaScript/jQuery, HTML5, CSS3, Bootstrap, Sass, Gulp.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">Front-end and WordPress Developer</h3>
									<div class="full-description">
										<p class="meta">Themify<br>Mar 2016 - Jun 2016<br>Toronto, Canada (remote)</p>
										<p>Code WordPress themes and plugins. Update/maintain products. Provide support. Skills: LAMP, WordPress, JavaScript/jQuery, HTML5, CSS3.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">Co-founder and Technical Lead</h3>
									<div class="full-description">
										<p class="meta">SantoPixel Design &amp; Code<br>Oct 2012 - Mar 2016<br>Brazil (remote)</p>
										<p>Code WordPress themes and plugins. Update/maintain products. Provide support. Skills: LAMP, WordPress, JavaScript/jQuery, HTML5, CSS3.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">IT Manager</h3>
									<div class="full-description">
										<p class="meta">Convertiva Mobile Marketing<br>May 2012 - Jun 2013<br>Brazil</p>
										<p>Code CodeIgnter sites. Update/maintain products. Provide support. Skills: HTML5, CSS3, JavaScript/jQuery, LAMP, CodeIgniter, Memcached, Apache Solr.</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">Technical Lead</h3>
									<div class="full-description">
										<p class="meta">RBS Group<br>May 2010 - May 2012<br>Brazil</p>
										<p>Technical lead, web analyst and front-end developer (JSTL, XSL, JavaScript/jQuery).</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">Senior Web Developer</h3>
									<div class="full-description">
										<p class="meta">RBS Group<br>Mar 2007 - May 2010<br>Brazil</p>
										<p>Front-end developer (JSTL, XSL, JavaScript).</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-content">
							<span class="fa fa-circle" aria-hidden="true"></span>
							<div class="col-sm-6">
								<div class="box">
									<h3 class="subtitle">Web Developer</h3>
									<div class="full-description">
										<p class="meta">SulSoftware Systems<br>Aug 2006 - Feb 2007<br>Brazil</p>
										<p>UI designer, web standards developer (XHTML, CSS) and ASP programmer.</p>
									</div>
								</div>
							</div>
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
					<div class="row row-title">
						<div class="col-md-12">
							<h2 class="title"><span class="fa fa-th-list" aria-hidden="true"></span> Portfolio</h2>
						</div>
					</div>
					<div class="row row-content">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="https://github.com/nandotess/nandotess-resume" target="_blank" rel="nofollow">
									<h3 class="subtitle">nandotess's resume</h3>
									<div class="full-description">
										<p>WordPress Theme, Front-end</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="https://github.com/nandotess/nandotess-resume-extra-content" target="_blank" rel="nofollow">
									<h3 class="subtitle">nandotess's resume extra content</h3>
									<div class="full-description">
										<p>WordPress Plugin, Front-end</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="https://github.com/nandotess/jquery.typer.js" target="_blank" rel="nofollow">
									<h3 class="subtitle">jQuery Typer</h3>
									<div class="full-description">
										<p>Front-end</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="https://github.com/nandotess/really-simple-resume" target="_blank" rel="nofollow">
									<h3 class="subtitle">Really Simple Resumé</h3>
									<div class="full-description">
										<p>Front-end</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="http://unisinos.fm/" target="_blank" rel="nofollow">
									<h3 class="subtitle">Unisinos.fm</h3>
									<div class="full-description">
										<p>WordPress Theme, WordPress Plugin, Audio Streaming, JW Player</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="http://www.aniksuzuki.com.br/" target="_blank" rel="nofollow">
									<h3 class="subtitle">ANK</h3>
									<div class="full-description">
										<p>WordPress Theme</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="http://dc.clicrbs.com.br/sc/" target="_blank" rel="nofollow">
									<h3 class="subtitle">Diário Catarinense</h3>
									<div class="full-description">
										<p>Front-end, JSTL, XSL</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="http://comercial.gruporbs.com.br/" target="_blank" rel="nofollow">
									<h3 class="subtitle">RBS Group Commercial</h3>
									<div class="full-description">
										<p>WordPress Theme</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="https://cobrancafacil.gruporbs.com.br/" target="_blank" rel="nofollow">
									<h3 class="subtitle">RBS Group Collection</h3>
									<div class="full-description">
										<p>WordPress Theme, WS, SOAP</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="http://www.conexaoverao.com.br/" target="_blank" rel="nofollow">
									<h3 class="subtitle">Conexão Verão</h3>
									<div class="full-description">
										<p>WordPress Theme, WordPress Plugin</p>
									</div>
								</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="box">
								<a href="http://atl.clicrbs.com.br/pretinhobasico/" target="_blank" rel="nofollow">
									<h3 class="subtitle">Blogs Atlântida</h3>
									<div class="full-description">
										<p>WordPress Theme, WordPress Plugin</p>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
		}

	}

endif;

return new NREC_Frontend();
