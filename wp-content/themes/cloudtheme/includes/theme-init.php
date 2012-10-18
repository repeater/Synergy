<?php

add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):

function my_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 178, 136, true ); // Normal post thumbnails
		add_image_size( 'post-thumbnail-xl', 565, 268, true ); // Post Extra Large Thumbnail
		add_image_size( 'slider-post-thumbnail', 940, 380, true ); // Slider Thumbnail
		add_image_size( 'portfolio-post-thumbnail', 290, 208, true ); // Portfolio Thumbnail
		add_image_size( 'portfolio-post-thumbnail-small', 210, 164, true ); // Portfolio Small Thumbnail
		add_image_size( 'portfolio-post-thumbnail-large', 450, 248, true ); // Portfolio Large Thumbnail
		add_image_size( 'portfolio-post-thumbnail-xl', 550, 268, true ); // Portfolio Extra Large Thumbnail
		add_image_size( 'small-post-thumbnail', 125, 118, true ); // Small Thumbnail
		add_image_size( 'testi-thumbnail', 120, 120, true ); // Testimonial Thumbnail
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu',
	  		  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}
}
endif;


/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
                array( 
				'label' => __('Slides'), 
				'singular_label' => __('Slide', 'my_framework'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array(
					'slug' => 'slide-view',
					'with_front' => FALSE,
				),
				'query_var' => "slide", // This goes to the WP_Query schema
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_slides.png',
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_slider');



/* Products */
function my_post_type_portfolio() {
	register_post_type( 'portfolio',
                array( 
				'label' => __('Products'), 
				'singular_label' => __('Product Item', 'my_framework'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite' => array(
					'slug' => 'product-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						'comments')
					) 
				);
	register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Product Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_portfolio');




/* Clients */
function my_post_type_clients() {
	register_post_type( 'clients',
                array( 
				'label' => __('Clients'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'clients-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'editor',
						'excerpt')
					)
				);
}

add_action('init', 'my_post_type_clients');



/* Extra posts */
function my_post_type_extra() {
	register_post_type( 'extra',
                array( 
				'label' => __('Extra posts'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'extra-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'editor',
						'excerpt')
					)
				);
}

add_action('init', 'my_post_type_extra');



?>