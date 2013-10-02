<?php
/**
 * The template for Help Us Page.
 *
 * @package seo vietnam
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="page-title"><i class="icon-heart"></i><?php the_title();?></h1>
				<section class="help-us">
				<?php if ( get_field( 'open_testimonial' ) ):
					$open_test = get_post( get_field( 'open_testimonial' ) );

					global $post;
					$post = $open_test;
					setup_postdata( $post );

					get_template_part( 'templates/testimonial' );

					wp_reset_postdata();

				endif; ?>

				<?php // PROJECTS
					$seo_args = array(
						'post_type'	=> 'project',
						'tax_query'	=> array(
							array(
								'taxonomy' => 'project_tax',
								'field'		=> 'slug',
								'terms'		=> 'seo-vietnam-projects'
							)
						)
					);

					$seo_projects = new WP_Query( $seo_args );
					if ( $seo_projects->have_posts() ): ?>
						<div class="project-container">
						<?php
							while ( $seo_projects->have_posts() ): $seo_projects->the_post();
								get_template_part( 'templates/project' );
							endwhile;
						?>
						</div><!-- .container -->

					<?php endif;

					wp_reset_postdata();
				?>
				</section><!-- .help-us -->
			<?php endwhile; // end of the loop. ?>

			<?php get_template_part( 'templates/partners' ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
