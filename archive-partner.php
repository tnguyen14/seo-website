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
			<header class="page-header">
				<h1 class="page-title">Our Partners</h1>
			</header><!-- .page-header -->
		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="partner">
						<div class="image">
							<?php the_post_thumbnail(); ?>
						</div> <!-- End of image -->
						<h2 class="post_title">
							<?php the_title(); ?>
						</h2>
						<div class="description">
							<?php the_content(); ?>
						</div> <!-- End of description -->
					</div> <!-- .partner -->
				<?php endwhile; ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->


<?php get_footer(); ?>