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
					$project_tax = 'project_tax';
					$seo_slug = 'seo-vietnam-projects';
					$seo_term = get_term_by( 'slug', $seo_slug, $project_tax );
					$seo_args = array(
						'post_type'	=> 'project',
						'tax_query'	=> array(
							array(
								'taxonomy' 	=> $project_tax,
								'field'		=> 'slug',
								'terms'		=> $seo_slug
							)
						)
					);
					$seo_projects = new WP_Query( $seo_args );
					if ( $seo_projects->have_posts() ): ?>
						<h2 class="page-title"><?php echo $seo_term->name; ?></h2>
						<div class="project-container">
						<?php
							while ( $seo_projects->have_posts() ): $seo_projects->the_post();
								get_template_part( 'templates/project' );
							endwhile;
						?>
						</div><!-- .project-container -->

					<?php endif;

					wp_reset_postdata();

					$alumni_slug = 'alumni-projects';
					$alumni_term = get_term_by( 'slug', $alumni_slug, $project_tax );
					$alumni_args = array(
						'post_type'	=> 'project',
						'tax_query' => array(
							array(
								'taxonomy'	=> $project_tax,
								'field'		=> 'slug',
								'terms'		=> $alumni_slug
							)
						)
					);
					$alumni_projects = new WP_Query( $alumni_args );
					if ( $alumni_projects->have_posts() ): ?>
						<h2 class="page-title"><?php echo $alumni_term->name; ?></h2>
						<div class="project-container">
						<?php
							while ( $alumni_projects->have_posts() ): $alumni_projects->the_post();
								get_template_part( 'templates/project');
							endwhile;
						?>
						</div><!-- .project-container -->
					<?php endif;
					wp_reset_postdata();
					?>
				</section><!-- .help-us -->
			<?php endwhile; // end of the loop. ?>

			<?php get_template_part( 'templates/partners' ); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
