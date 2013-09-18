<?php
/**
 * @package seo vietnam
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'media-single' ); ?>>
	<div class="media-single-wrapper">
		<header class="entry-header">
			<h1 class="entry-title">
				<?php // no need for link
				/* <a href="<?php the_permalink(); ?>" rel="bookmark"> */ ?>
					<?php the_title(); ?>
				<?php // </a> ?>
			</h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'seo-vietnam' ) ); ?>
		</div><!-- .entry-content -->
	</div><!-- .media-single-wrapper -->
	<footer class="entry-meta">
		<?php seo_vietnam_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'seo-vietnam' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
