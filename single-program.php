<?php
/**
 * The Template for displaying all single posts.
 *
 * @package seo vietnam
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		<?php if ( have_posts() ): ?>
			<div class="program-single">
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="page-title"><i class="icon-windows"></i><?php the_title(); ?>
				</h1>
				<div class="content-wrapper">
					<div class="stats">
						<?php $stats = ['alumni', 'partner', 'guest_speakers', 'training_sessions', 'community_services']; ?>
						<?php foreach( $stats as $stat ): ?>
							<div class="stat">
							<?php if (get_field( $stat )): ?>
								<span class="label">
								<?php echo get_field_object( $stat )['label']; ?>: </span>
								<?php the_field( $stat ); ?>
							<?php endif; ?>
							</div><!-- .stat -->
						<?php endforeach; ?>
					</div><!-- .stats -->
					<?php the_content(); ?>
				</div><!-- .content-wrap -->

				<div class="secondary-wrapper">
				<?php if ( get_field( 'speakers' ) ): ?>
					<div class="speakers">
						<h2 class="page-title"><i class="icon-microphone"></i>Speakers</h2>
						<?php while ( has_sub_field( 'speakers' )): ?>
						<div class="speaker">
							<?php $speaker = get_sub_field('people');?>
							<h4 class="speaker-name"><?php echo $speaker->post_title; ?></h4>
							<p><?php the_field( 'credits', $speaker->ID ); ?></p>
						</div><!-- .speaker -->
					<?php endwhile; // while speakers ?>
					</div><!-- .speakers -->
				<?php endif; // if get field speakers ?>
				</div><!-- .speakers-wrapper -->

				<?php // Testimonials ?>
				<?php
				$args = array(
					'post_type'	=> 'testimonial',
					'posts_per_page'	=> -1,
					'tax_query' => array(
						'taxonomy'	=> 'program',
						'field'		=> 'slug',
						'term'		=> $post->post_name
					);
				);
				$testimonials = new WP_Query( $args );
				if ( $testimonials->have_posts() ) : ?>
				<div class="testimonials">
				<?php
					while ( $testimonials->have_posts() ): $testimonials->the_post();
					endwhile;
				endif;
				?>
				</div><!-- .testimonials -->
			<?php endwhile; // end of the loop. ?>
			</div><!-- .program-single -->
		<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>