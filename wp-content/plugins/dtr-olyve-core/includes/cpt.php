<?php
// custom post types
/**
 * Registers portfolio post type
 * @since  1.0.0
 */
add_action( 'init', 'olyve_register_portfolio_posttype' );
function olyve_register_portfolio_posttype() {
	
    global $olyve_theme_mod;
	$portfolio_slug = '';
    $portfolio_slug = isset($olyve_theme_mod['olyve_portfolio_slug_text']) ? $olyve_theme_mod['olyve_portfolio_slug_text'] : 'portfolio';

	$labels = array(
		'name'               	=> _x( 'Portfolio', 'post type general name', 'olyve' ),
		'singular_name'      	=> _x( 'Portfolio Item', 'post type singular name', 'olyve' ),
		'all_items'          	=> __( 'Portfolio Items', 'olyve' ),
		'add_new'            	=> __( 'Add New', 'olyve' ),
		'add_new_item'       	=> __( 'Add New Portfolio Item', 'olyve' ),
		'edit_item'          	=> __( 'Edit Portfolio Item', 'olyve' ),
		'new_item'           	=> __( 'New Portfolio Item', 'olyve' ),
		'view_item'          	=> __( 'View Portfolio Item', 'olyve' ),
		'search_items'       	=> __( 'Search Portfolio Items', 'olyve' ),
		'not_found'          	=> __( 'No Portfolio Items found', 'olyve' ),
		'not_found_in_trash'	=> __( 'No Portfolio Items found in Trash', 'olyve' ),
    );
	$args = array(
		'labels'          	=> $labels,
	    'public'          	=> true,  
        'show_ui'         	=> true,  
        'capability_type'	=> 'post',  
        'hierarchical'    	=> false,  
        'can_export'      	=> true,
        'has_archive'     	=> false,
		'menu_icon'       	=> 'dashicons-portfolio',
        'rewrite'         	=> array( 'slug'	=> $portfolio_slug ),
        'supports'        	=> array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'dtr_portfolio', $args );
}

/**
 * Register custom taxonomy for portfolio items.
 * @since  1.0.0
 */
add_action( 'init', 'olyve_register_portfolio_taxonomy' );
function olyve_register_portfolio_taxonomy() {
    $labels = array(
        'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'olyve' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'olyve' ),
        'search_items'      => __( 'Search Portfolio Categories', 'olyve' ),
        'all_items'         => __( 'All Portfolio Categories', 'olyve' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'olyve' ),
		'view_item'         => __( 'View Portfolio Category', 'olyve' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'olyve' ),
        'parent_item_colon'	=> __( 'Parent Portfolio Category:', 'olyve' ),
        'update_item'       => __( 'Update Portfolio Category', 'olyve' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'olyve' ),
        'new_item_name'     => __( 'New Portfolio Category Name', 'olyve' ),
    );
    $args = array(
        'hierarchical'	=> true,
        'labels'       	=> $labels,
        'show_ui'      	=> true,
        'rewrite'      	=> true,
    );
    register_taxonomy( 'dtr_portfoliotags', array( 'dtr_portfolio' ), $args );
}

/**
 * Registers testimonial post type
 * @since  1.0.0
 */
add_action( 'init', 'olyve_register_testimonial_posttype' );
function olyve_register_testimonial_posttype() {
    
    global $olyve_theme_mod;
	$testimonial_slug = '';
    $testimonial_slug = isset($olyve_theme_mod['olyve_testimonial_slug_text']) ? $olyve_theme_mod['olyve_testimonial_slug_text'] : 'testimonial';

	$labels = array(
		'name'               => _x( 'Testimonial', 'post type general name', 'olyve' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name', 'olyve' ),
		'all_items'          => __( 'Testimonials', 'olyve' ),
		'add_new'            => __( 'Add New', 'olyve' ),
		'add_new_item'       => __( 'Add New Testimonial', 'olyve' ),
		'edit_item'          => __( 'Edit Testimonial', 'olyve' ),
		'new_item'           => __( 'New Testimonial', 'olyve' ),
		'view_item'          => __( 'View Testimonial', 'olyve' ),
		'search_items'       => __( 'Search Testimonials', 'olyve' ),
		'not_found'          => __( 'No Testimonials found', 'olyve' ),
		'not_found_in_trash' => __( 'No Testimonials found in Trash', 'olyve' ),
    );
	$args = array(
		'labels'          => $labels,
	    'public'          => true,  
        'show_ui'         => true,  
        'capability_type' => 'post',  
        'hierarchical'    => false,  
        'has_archive'     => false,
		'menu_icon'       => 'dashicons-star-filled',
        'rewrite'         => array( 'slug'	=> $testimonial_slug ),
        'supports'        => array( 'title', 'editor', 'thumbnail' ),
	);
	register_post_type( 'dtr_testimonial', $args );
}