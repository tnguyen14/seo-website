<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package seo vietnam
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="page-title"><?php the_title();?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content();?>
		<div id="meta">
			<?php the_meta(); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
