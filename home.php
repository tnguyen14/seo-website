<?php
/**
 * Home - blog page is used for Media Announcement
 *
 * @package seo vietnam
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<h1 class="page-title"><i class="icon-facetime-video"></i>Media Coverage</h1>

			<div class="media-wrapper">
			<?php /* Start the Loop */ ?>
			<?php $args = array(
				"category"	=> 4,
				"posts_per_page"	=> -1
			);

			$posts = get_posts( $args );

			foreach( $posts as $post ):
				setup_postdata( $post );

				get_template_part( 'media', get_post_format() );

			endforeach;
			wp_reset_postdata(); ?>
			</div><!-- .media-wrapper -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>