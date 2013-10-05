<div class="testimonial">
	<div class="testimonial-content">
		<?php if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'testimonial' );
		endif; ?>
		<?php the_content(); ?>
	</div>
	<div class="testimonial-meta">
		<span class="name"><?php the_title(); ?>,</span>
		<?php if (get_field( 'credits' )): ?>
			<span class="credits">
			<?php the_field( 'credits' ); ?>
			</span>
		<?php endif; ?>
	</div><!-- .testimonial-meta -->
</div>