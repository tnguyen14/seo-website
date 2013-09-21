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
			<h1 class="page-title"><i class="icon-windows"></i>Our Programs</h1>
			<section class="">
				<?php
				if ( have_posts() ) : ?>
					<div class="programs-wrapper">
					<?php while ( have_posts() ): the_post();?>
						<a href="<?php the_permalink(); ?>">
						<div class="program-preview">
							<h2 class="program-title title"><?php the_title(); ?></h2>
							<?php the_excerpt();?>
						</div><!-- .program-preview -->
						</a>
					<?php endwhile;?>
					</div><!-- .program-wrapper -->
				<?php endif; // if have_posts ?>
			</section><!-- .people-grid .bod -->

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>