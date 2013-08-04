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
      
      //Outputting the About Section
      ?>
      
      <div id="about_section">
        <div id="about_us">
            <?php $about_us = get_post(76);?>
          <h2 class="post_title">          
            <?php echo $about_us->post_title; ?>
          </h2>
          <div class="post_content">
            <p>
            <?php  echo $about_us->post_content;?>
            </p>
          </div> <!-- End of post_content -->
              
        </div><!-- End of about_us-->
        
        <div id="informercial">
          <?php $informercial = get_post(78);?>
        <h2 class="post_title">          
          <?php echo $informercial->post_title; ?>
        </h2>
        <div class="post_content">
          <?php  echo $informercial->post_content;?>
        </div> <!-- End of post_content -->
        
        </div> <!-- End of informercial -->
        
        <div id="vision">
          
          <?php $vision = get_post(81);?>
        <h2 class="post_title">          
          <?php echo $vision->post_title; ?>
        </h2>
        <div class="post_content">
          <?php  echo $vision->post_content;?>
        </div> <!-- End of post_content -->
          
        </div> <!-- End of vision -->
        
        <div id="mission">
          
          <?php $mission = get_post(83);?>
        <h2 class="post_title">          
          <?php echo $mission->post_title; ?>
        </h2>
        <div class="post_content">
          <?php  echo $mission->post_content;?>
        </div> <!-- End of post_content -->
          
        </div> <!-- End of mission -->
        
        <div id="values">
          
          <?php $values = get_post(85);?>
        <h2 class="post_title">          
          <?php echo $values->post_title; ?>
        </h2>
        <div class="post_content">
          <?php  echo $values->post_content;?>
        </div> <!-- End of post_content -->
          
        </div> <!-- End of values -->

      </div><!-- End of About Section-->
      

            
            <div class="test"></div>
            <?php            
          
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
