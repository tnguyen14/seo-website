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
            'post_type' => 'slideshow'
          );
        
          $slideshow = new WP_Query($slideArg);
        ?>
        
        <div id="homepage_slider">
          <ul class="bxslider">
          <?php
            while($slideshow->have_posts()){
              $slideshow->the_post();
          
          ?>
          <li>
          <h2 class="post_title"><?php the_title();?></h2>
          
          <?php 
            $meta = get_post_meta(get_the_ID(), 'image');
            $image = wp_get_attachment_image($meta[0], array(1500,400));
            echo $image;
          ?>
          </li>
        
          <?php
            } //end of slideshow while loop
            ?>
          </ul>
        </div>
        <?php
        
        // Outputting the announcements
          
        $announArg= array(
          'category_name' => 'announcement'
          
        );
        
          $announcement = new WP_Query($announArg);
          while($announcement->have_posts()){
            $announcement->the_post();
        ?>
        
          <div id="announcement">
            <h2 class="post_title"><?php the_title();?></h2>
            <div class="content">
              <?php
              echo get_post_field('post_content', get_the_ID());
              ?>
            </div>
          </div>  
        <?php
        // end of announcement loop
      }
          
          $homepage = new WP_Query('name= about us');
            $homepage->the_post();
            the_content();
            
          
          // Outputting the Testimonials
          $testArg = array(
            'post_type' => 'testimonial',
            'orderby'   => 'rand'
          );
          
          $testimonial = new WP_Query($testArg);
            $testimonial->the_post();
            
            ?>
            <h2 class="post_title"><?php the_title();?></h2>
            <div class="content">
              <?php
              echo get_post_field('post_content', get_the_ID());
              ?>
            </div>
            <div class="school">
              <?php echo get_post_meta(get_the_ID(),'school')[0]; ?>
            </div>
            <div class="class_year"></div>
            <?php
              echo get_post_meta(get_the_ID(),'class')[0];
              ?>
            </div>
            
            <?php
            
          wp_reset_postdata();
        ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
