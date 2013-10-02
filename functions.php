<?php
/**
 * seo vietnam functions and definitions
 *
 * @package seo vietnam
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'seo_vietnam_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function seo_vietnam_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on seo vietnam, use a find and replace
	 * to change 'seo-vietnam' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'seo-vietnam', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'seo-vietnam' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'seo_vietnam_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add image sizes
	add_image_size( 'home-slide', 1000, 9999, false );
	add_image_size( 'people-thumb', 170, 170, false );
	add_image_size( 'logo-slide', 125, 113, false );
	add_image_size( 'testimonial', 80, 80, false );
}
endif; // seo_vietnam_setup
add_action( 'after_setup_theme', 'seo_vietnam_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function seo_vietnam_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'seo-vietnam' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'seo_vietnam_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function seo_vietnam_scripts() {
	wp_enqueue_style( 'bxslider-style', get_stylesheet_directory_uri().'/bower_components/bxslider-4/jquery.bxslider.css');
	wp_enqueue_style( 'seo-vietnam-style', get_stylesheet_directory_uri().'/css/main.css');

	wp_enqueue_script( 'seo-vietnam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'seo-vietnam-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri().'/bower_components/bxslider-4/jquery.bxslider.min.js', array('jquery'),'4.1.1', true);
	wp_enqueue_script( 'fitvids', get_template_directory_uri().'/bower_components/fitvids/jquery.fitvids.js', array('jquery'),'1.0.3', true);

	wp_enqueue_script( 'seo-js', get_template_directory_uri().'/js/seo.js',array('jquery', 'underscore', 'bxslider'),'0.1', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'seo-vietnam-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'seo_vietnam_scripts' );

function seo_cpt() {
	if ( ! class_exists( 'Super_Custom_Post_Type' ) )
			return;

	$slideshow = new Super_Custom_Post_Type( 'slideshow', 'Slide', 'Slides', array(
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')
	));
	$slideshow->set_icon( 'sort' );

	// # Taxonomy test, should be like tags
	// $tax_tags = new Super_Custom_Taxonomy( 'tax-tag' );
	//
	// # Taxonomy test, should be like categories
	// $tax_cats = new Super_Custom_Taxonomy( 'tax-cat', 'Tax Cat', 'Tax Cats', 'category' );
	//
	// # Connect both of the above taxonomies with the post type
	// connect_types_and_taxes( $demo_posts, array( $tax_tags, $tax_cats ) );

	$testimonial = new Super_Custom_Post_Type( 'testimonial' );
	$testimonial->set_icon( 'thumbs-up' );

	$testi_cat = new Super_Custom_Taxonomy( 'testi_category', 'Category', 'Categories', 'category' );
	$testi_cat->connect_post_types( 'testimonial' );

	$people = new Super_Custom_Post_Type('people', 'Person', 'People', array(
		'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies' => array('organization')
	));
	$people->set_icon('user');

	$organization = new Super_Custom_Taxonomy('organization', 'Organization', 'Organizations', 'category');
	$organization->connect_post_types('people');

	$partner = new Super_Custom_Post_Type('partner','Partner', 'Partners', array(
		'supports' => array('title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes')
	));
	$partner->set_icon('group');

	$program = new Super_Custom_Post_Type('program','Program', 'Programs', array(
		'supports' => array('title','editor', 'thumbnail', 'revisions', 'page-attributes')
	));
	$program->set_icon('windows');

	$project = new Super_Custom_Post_Type('project', 'Project', 'Projects', array(
		'supports' => array('title','editor', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies' => array('category')
	));
	$project->set_icon('cogs');
}
add_action( 'after_setup_theme', 'seo_cpt' );

/**
 * Returns the URL from the post.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @return string The Link format URL.
 */
function get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

