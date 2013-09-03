<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package seo vietnam
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php

				// Outputting the slideshow
				$slideArg = array(
					'post_type' => 'slideshow',
					'orderby'	=> 'menu_order',
					'order'		=> 'ASC'
				);

				$slideshow = new WP_Query($slideArg);
				?>

				<div class="homepage-slider bxslider container">

				<?php
					while($slideshow->have_posts()) :
						$slideshow->the_post();
				?>
						<div class="homepage-slide">
							<h2 class="slide-text"><?php echo get_the_content();?></h2>

							<?php
								if (has_post_thumbnail()) :
									the_post_thumbnail('home-slide');
								endif;
							?>
						</div><!-- .homepage-slide -->
				<?php
					endwhile; //end of slideshow while loop
				?>
				</div>
				<?php
				wp_reset_postdata();
				?>
				<div class="container section">
				<?php
					the_content();
				?>
				</div>

				<div class="container">
					<div id="about_us" class="section">
						<?php $about_us = get_page_by_title( 'About Us' );?>
						<h3 class="section-title">
							<?php echo $about_us->post_title; ?>
						</h3>
						<div class="section-content">
							<?php  echo $about_us->post_content;?>
						</div>
					</div><!-- #about_us-->

					<div id="informercial" class="section">
						<h3 class="section-title">Informercial</h3>
						<div class="section-content">
							<?php  ?>
						</div>
					</div><!-- #informercial-->

					<div id="vision" class="section">
						<?php $vision = get_page_by_title( 'Vision' );?>
						<h3 class="section-title">
							<?php echo $vision->post_title; ?>
						</h3>
						<div class="section-content">
							<?php  echo $vision->post_content;?>
						</div>
					</div><!-- #vision-->

					<div id="mission" class="section">
						<?php $mission = get_page_by_title( 'Mission' );?>
						<h3 class="section-title">
							<?php echo $mission->post_title; ?>
						</h3>
						<div class="section-content">
							<?php  echo $mission->post_content;?>
						</div>
					</div><!-- #mission-->

					<div id="values" class="section">
						<?php $values = get_page_by_title( 'Values' );?>
						<h3 class="section-title">
							<?php echo $values->post_title; ?>
						</h3>
						<div class="section-content">
							<?php  echo $values->post_content;?>
						</div>
					</div><!-- #values-->

				</div><!-- .container-->


				<?php
				// Outputting the Testimonials
				$testArg = array(
					'post_type' => 'testimonial',
					'orderby'   => 'rand'
				);

				$testimonial = new WP_Query($testArg);
				while ($testimonial->have_posts()) :
					$testimonial->the_post();

					?>
					<div class="testimonial-content">
						<?php the_content(); ?>
					</div>
					<div class="testimonial-meta">
						<span class="name"><?php the_title(); ?></span>
						<span class="school"><?php echo get_post_meta(get_the_ID(),'school', true); ?></span>
						<span class="class-year"><?php echo get_post_meta(get_the_ID(),'class', true); ?></span>
					</div><!-- .testimonial-meta -->
				<?php
				endwhile;
				wp_reset_postdata();
				?>

				<h2 class="title">Our Partners</h2>
					<?php

					// Outputting the slideshow
						$partnerArg = array(
							'post_type' => 'partner'
						);

						$partner = new WP_Query($partnerArg);
					?>

					<div id="partners">

						<?php
							while($partner->have_posts()){
								$partner->the_post();
						?>

						<div class="partner_image">
							<?php
								$meta = get_post_meta(get_the_ID(), 'image');
								$image = wp_get_attachment_image($meta[0], array(150,150));
								echo $image;
							?>
						</div> <!-- End of partner_image -->


						<?php
							} //end of partners while loop

					wp_reset_postdata();
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
