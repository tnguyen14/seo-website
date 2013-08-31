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

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
          Our Partners
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
        <div class="partner">
        <div class="image">
          <?php
          $meta = get_post_meta(get_the_ID(), 'image');
          $image = wp_get_attachment_image($meta[0], array(200,200));
          echo $image;
          ?>
          
        </div> <!-- End of image -->

        <h2 class="post_title">
          <?php the_title(); ?>
          </h2>

         
          <div class="description">
            <?php 
            echo get_post_meta(get_the_ID(),'about')[0];
           ?>
          </div> <!-- End of description -->
        </div> <!-- End of partner -->
			<?php endwhile; ?>



		<?php else : ?>

			<?php get_template_part( 'no-results', 'archive' ); ?>

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->


<?php get_footer(); ?>