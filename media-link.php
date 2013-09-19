<?php
/**
 * The template for displaying posts in the Link post format.
 *
 * @package seo vietnam
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'media-single' ); ?>>
	<div class="media-single-wrapper">
		<header class="entry-header">
			<h1 class="entry-title">
				<a href="<?php echo esc_url( get_link_url() ); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<div class="thumbnail">
				<a href="<?php echo esc_url( get_link_url() ); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div><!-- .thumbnail -->
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->
	</div><!-- .media-single-wrapper -->
	<footer class="entry-meta">
		<?php seo_vietnam_posted_on(); ?>
		<?php edit_post_link( __( 'Edit', 'seo-vietnam' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->