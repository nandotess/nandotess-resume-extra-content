<?php
/**
 * Frontend class
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
	 * Frontend class
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
			wp_enqueue_style( 'nandotess-resume-extra-content-style', nandotess_resume_extra_content()->plugin_url . 'assets/css/nandotess-resume-extra-content.css', array( 'nandotess-resume-style' ), nandotess_resume_extra_content()->version, 'all' );
			wp_style_add_data( 'nandotess-resume-extra-content-style', 'rtl', 'replace' );
		}

		/**
		 * Homepage section about - Buttons
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_about_buttons() {
			$mail         = get_theme_mod( 'nr_mail', 'mail@mail.com' );
			$file_resume  = get_post_meta( get_the_id(), 'file-resume', true );
			?>

				<div class="row row-buttons">

					<?php if ( ! empty( $file_resume ) ) : ?>

						<?php $file_resume = wp_get_attachment_url( $file_resume ); ?>

						<div class="col-xs-12 col-sm-6 col-button col-button-cv">
							<a href="<?php echo esc_url( $file_resume ) ?>" target="_blank" class="btn btn-default btn-lg">Download CV <span class="fa fa-download" aria-hidden="true"></span></a>
						</div>

					<?php endif; ?>

					<div class="<?php echo empty( $file_resume ) ? 'col-xs-12' : 'col-xs-12 col-sm-6'; ?> col-button col-button-contact">
						<a href="mailto:<?php echo esc_attr( $mail ); ?>" class="btn btn-primary btn-lg">Contact me <span class="fa fa-send" aria-hidden="true"></span></a>
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
			$args = array(
				'taxonomy'   => 'skill-category',
				'hide_empty' => false,
			);

			$categories = get_terms( $args );

			if ( count( $categories ) > 0 ) :
				?>

					<section id="skills" class="section skills">
						<div class="container">
							<div class="row row-title">
								<div class="col-md-12">
									<h2 class="title"><span class="fa fa-cogs" aria-hidden="true"></span> Relevant Skills</h2>
								</div>
							</div>

							<div class="row row-content">
								<div class="box-container">

									<?php
										foreach ( $categories as $category ) :
										$category_badge = get_term_meta( $category->term_id, 'skill-badge', true );

										if ( empty( $category_badge ) ) {
											$category_badge = 'fa-cog';
											}

										$args_tax_query = array(
										'taxonomy' => 'skill-category',
										'field'    => 'slug',
										'terms'    => $category->slug,
									);

									$args = array(
									'post_type'      => 'skill',
									'posts_per_page' => 99,
									'tax_query'      => array( $args_tax_query ),
									);

									$skills = get_posts( $args );

									if ( count( $skills ) > 0 ) :
										?>

										<div class="col-sm-12 col-md-4">
											<h3 class="subtitle"><span class="fa <?php echo esc_attr( $category_badge ); ?>" aria-hidden="true"></span> <?php echo esc_html( $category->name ); ?></h3>

											<?php
												global $post;

												foreach ( $skills as $post ) :
												setup_postdata( $post );
												$skill_proficiency = get_post_meta( get_the_id(), 'skill-proficiency', true );
												?>

											<div class="progress">
												<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $skill_proficiency ) ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo esc_attr( $skill_proficiency ) ?>%">
												<span class="skill"><?php the_title(); ?></span>
												</div>
											</div>

												<?php
														endforeach;
												wp_reset_postdata();
											?>

											</div>

											<?php
											endif;
										endforeach;
									?>

								</div>
							</div>
						</div>
					</section>

				<?php
			endif;
		}

		/**
		 * Homepage section works
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_works() {
			$args = array(
				'post_type'      => 'work-experience',
				'posts_per_page' => 99,
			);

			$works = get_posts( $args );

			if ( count( $works ) > 0 ) :
				?>

					<section id="works" class="section works">
						<div class="container">
							<div class="row row-title">
								<div class="col-md-12">
									<h2 class="title"><span class="fa fa-suitcase" aria-hidden="true"></span> Work Experience</h2>
								</div>
							</div>

							<div class="timeline">

								<?php
									global $post;

									foreach ( $works as $post ) :
									setup_postdata( $post );

									$work_company     = get_post_meta( get_the_id(), 'work-company', true );
									$work_location    = get_post_meta( get_the_id(), 'work-location', true );
									$work_time_period = get_post_meta( get_the_id(), 'work-time-period', true );
									$work_date_from   = '';
									$work_date_to     = '';

									if ( ! empty( $work_time_period['work-date-from'] ) ) {
										$work_date_from = $work_time_period['work-date-from'];
										$work_date_from = strtotime( $work_date_from );
										$work_date_from = date( 'F Y', $work_date_from );
										}

									if ( ! empty( $work_time_period['work-current'] ) ) {
										$work_date_to = esc_html__( 'Present', 'nandotess-resume-extra-content' );
										} elseif ( ! empty( $work_time_period['work-date-to'] ) ) {
										$work_date_to = $work_time_period['work-date-to'];
										$work_date_to = strtotime( $work_date_to );
										$work_date_to = date( 'F Y', $work_date_to );
										}
									?>

									<div class="row row-content">
									<span class="fa fa-circle" aria-hidden="true"></span>

									<div class="col-sm-6">
									<div class="box">
									<h3 class="subtitle"><?php the_title(); ?></h3>

									<div class="full-description">
									<?php if ( ! empty( $work_company ) ) : ?>
															<p class="meta"><?php echo esc_html( $work_company ); ?></p>
														<?php endif; ?>

									<?php if ( ! empty( $work_location ) ) : ?>
															<p class="meta"><?php echo esc_html( $work_location ); ?></p>
														<?php endif; ?>

									<?php if ( ! empty( $work_date_from ) && ! empty( $work_date_to ) ) : ?>
															<p class="meta"><?php echo esc_html( $work_date_from . ' - ' . $work_date_to ); ?></p>
														<?php endif; ?>

									<div class="content">
									<?php the_content(); ?>
									</div>
									</div>
									</div>
									</div>
									</div>

									<?php
									endforeach;
									wp_reset_postdata();
								?>

							</div>
						</div>
					</section>

				<?php
			endif;
		}

		/**
		 * Homepage section portfolio
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function homepage_section_portfolio() {
			$args = array(
				'post_type'      => 'portfolio',
				'posts_per_page' => 99,
			);

			$portfolio = get_posts( $args );

			if ( count( $portfolio ) > 0 ) :
				?>

					<section id="portfolio" class="section portfolio">
						<div class="container">
							<div class="row row-title">
								<div class="col-md-12">
									<h2 class="title"><span class="fa fa-th-list" aria-hidden="true"></span> Portfolio</h2>
								</div>
							</div>

							<div class="row row-content">
								<div class="box-container">

									<?php
										global $post;

										foreach ( $portfolio as $post ) :
										setup_postdata( $post );
										$portfolio_external_link = get_post_meta( get_the_id(), 'portfolio-external-link', true );
										?>

										<div class="col-xs-12 col-sm-6 col-md-4">
										<div class="box">
										<a href="<?php echo esc_url( $portfolio_external_link ); ?>" target="_blank" rel="nofollow">
										<figure>

										<?php if ( has_post_thumbnail() ) : ?>
																<?php the_post_thumbnail( 'large', array(
																	'class' => 'img-responsive',
																) ); ?>
															<?php else : ?>
																<img src="https://placeholdit.imgix.net/~text?txtsize=100&amp;w=1024&amp;h=1024" class="img-responsive">
															<?php endif; ?>

												<figcaption>
													<div class="figcaption-content">
														<h3 class="subtitle"><?php the_title(); ?></h3>

														<div class="full-description">
															<?php the_content(); ?>
														</div>
													</div>
												</figcaption>
											</figure>
										</a>
									</div>
									</div>

									<?php
										endforeach;
										wp_reset_postdata();
									?>

								</div>
							</div>
						</div>
					</section>

				<?php
			endif;
		}

	}

endif;

return new NREC_Frontend();
