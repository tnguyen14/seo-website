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
			<h1 class="page-title"><i class="icon-globe"></i>Our Partners</h1>
		<?php
		$args = array(
			'post_type'	=> 'partner',
			'orderby'	=> 'menu_order',
			'order'		=> 'ASC',
			'posts_per_page'	=> -1
		);
		$partners = new WP_Query( $args );
		if ( $partners->have_posts() ) : ?>
			<div class="partners-wrapper">
			<?php /* Start the Loop */ ?>
				<?php while ( $partners->have_posts() ) : $partners->the_post(); ?>
					<div class="partner-single">
						<div class="image">
							<?php the_post_thumbnail(); ?>
						</div> <!-- End of image -->
						<h2 class="title partner-title">
							<?php the_title(); ?>
						</h2>
						<div class="description">
							<?php the_content(); ?>
						</div> <!-- End of description -->
					</div> <!-- .partner -->
				<?php endwhile; ?>
				<?php wp_reset_postdata();?>
			</div><!-- .container -->
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->


<?php get_footer(); ?>