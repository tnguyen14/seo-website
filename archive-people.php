<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package seo vietnam
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<h1 class="page-title"><i class="icon-group"></i>Our People</h1>
			<section class="container people-group">
				<?php
				$term_slug = 'bod';
				$term = get_term_by( 'slug', $term_slug, 'organization' );
				if ( have_posts() ) : ?>
					<h1 class="title"><?php echo $term->name; ?></h1>
					<div class="people">
						<?php $args = array(
							'post_type'		=> 'people',
							'posts_per_page'	=> -1,
							'organization'	=> $term->slug
						);
						$people = get_posts( $args );
						foreach( $people as $post ):
							setup_postdata( $post );
						?>
							<div class="person">
								<?php the_post_thumbnail( 'people-thumb' );?>
								<h1><?php the_title(); ?> </h1>
								<div class="credits">
									<?php the_field( 'credits' ); ?>
								</div><!-- .credits -->
								<a class="collapse">More</a>
								<div class="description">
									<?php the_content(); ?>
								</div><!-- .description -->
							</div><!-- .person -->
						<?php endforeach;
						wp_reset_postdata();
						?>
					</div><!-- .people -->
				<?php endif; ?>
			</section><!-- .people-grid .bod -->

			<?php get_template_part('templates/partners'); ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>