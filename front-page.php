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

				<div class="homepage-slider bxslider">

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
				<div class="info container">
					Please consult a list of <a href="#">Frequently Asked Questions</a> to find out more about our program. For question or inquiry, please contact <a href="mailto:recruitment@seo-vietnam.org">recruitment@seo-vietnam.org</a>
				</div>

				<div class="container">
					<div class="inner-container">
						<div id="about_us" class="section">
							<?php $about_us = get_page_by_title( 'About Us' );?>
							<h3 class="title">
								<?php echo $about_us->post_title; ?>
							</h3>
							<div class="section-content">
								<?php  echo $about_us->post_content;?>
							</div>
						</div><!-- #about_us-->

						<div id="informercial" class="section">
							<h3 class="title">Informercial</h3>
							<iframe class="youtube-embed" type="text/html" width="560" height="315"  src="//www.youtube.com/embed/BT4XtwV0ndw" frameborder="0"></iframe>
						</div><!-- #informercial-->
					</div>
					<div class="inner-container">
						<div id="vision" class="section">
							<?php $vision = get_page_by_title( 'Vision' );?>
							<h3 class="title">
								<?php echo $vision->post_title; ?>
							</h3>
							<div class="section-content">
								<?php  echo $vision->post_content;?>
							</div>
						</div><!-- #vision-->

						<div id="mission" class="section">
							<?php $mission = get_page_by_title( 'Mission' );?>
							<h3 class="title">
								<?php echo $mission->post_title; ?>
							</h3>
							<div class="section-content">
								<?php  echo $mission->post_content;?>
							</div>
						</div><!-- #mission-->

						<div id="values" class="section">
							<?php $values = get_page_by_title( 'Values' );?>
							<h3 class="title">
								<?php echo $values->post_title; ?>
							</h3>
							<div class="section-content">
								<?php  echo $values->post_content;?>
							</div>
							<?php wp_reset_postdata(); ?>
						</div><!-- #values-->
					</div>

				</div><!-- .container-->

				<div class="container section testimonials">
					<h3 class="title">Testimonials</h3>
				<?php
				// Outputting the Testimonials
				$testArg = array(
					'post_type' => 'testimonial',
					'orderby'   => 'rand'
				);

				$testimonial = new WP_Query($testArg);
				if ($testimonial->have_posts()):
				?>
					<div class="bxslider">
				<?php
				endif;

				while ($testimonial->have_posts()) :
					$testimonial->the_post();

					?>
					<div class="testimonial">
						<div class="testimonial-content">
							<?php the_content(); ?>
						</div>
						<div class="testimonial-meta">
							<span class="name"><?php the_title(); ?>,</span>
							<?php if (get_field('school')): ?>
								<span class="school"><?php the_field('school'); ?></span>
								<?php if(get_field('class')): ?>
								<span class="class-year">(Class of <?php the_field('class'); ?>)</span>
								<?php endif; ?>
							<?php endif; ?>
						</div><!-- .testimonial-meta -->
					</div>
				<?php
				endwhile;
				if ($testimonial->have_posts()):
				?>
					</div><!-- .testimonials -->
				<?php
				endif;
				wp_reset_postdata();
				?>
				</div><!-- .container -->

				<?php get_template_part('templates/partners'); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
