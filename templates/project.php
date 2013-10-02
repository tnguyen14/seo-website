<div class="project-single">
	<h2 class="title"><?php the_title(); ?></h2>
	<div class="feature-wrap">
		<div class="feature-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="status">
			<h3 class="title">Project Status</h3>
			<?php if ( get_field( 'progress' ) ) : ?>
				<h4 class="status-title">Progress</h4>
				<span class="details"><?php the_field( 'progress' ); ?>%</span>
				<div class="progress">
					<div class="progress-bar" data-progress="<?php the_field( 'progress' ); ?>" data-goal="100"></div>
				</div>
			<?php endif; ?>

			<?php if ( get_field( 'funding_goal' ) && get_field( 'funding_progress' ) ): ?>
				<h4 class="status-title">Funding</h4>
				<span class="details">$<?php the_field( 'funding_progress' );?> out of $<?php the_field( 'funding_goal' );?> funded</span>
				<div class="progress">
					<div class="progress-bar" data-progress="<?php the_field( 'funding_progress' );?>" data-goal="<?php the_field( 'funding_goal' ); ?>"></div>
				</div>
			<?php endif; ?>
			<h3 class="title">Make a donation</h3>
			<?php get_template_part( 'templates/paypal' ); ?>
		</div><!-- .status -->
	</div>
	<div class="description">
		<?php the_content(); ?>
	</div>
</div><!-- .project-single -->