<?php
/**
 * Blog functions
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
 
/**
 * Modify tag cloud widget 
 */
if ( ! function_exists( 'olyve_tag_cloud_widget' ) ) :
add_filter('wp_generate_tag_cloud', 'olyve_tag_cloud_widget',10,1);
function olyve_tag_cloud_widget($input){
  return preg_replace('/ style=("|\')(.*?)("|\')/','',$input);  
}
endif;

/**
 * Blog classes
 */
if ( ! function_exists( 'olyve_blog_classes' ) ) :
	function olyve_blog_classes( $classes = NULL ) {
		if ( 'dtr-blog-grid-masonry' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-masonry';
		} elseif ( 'dtr-blog-grid-masonry-3col' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-3col dtr-blog-grid-masonry';
		} elseif ( 'dtr-blog-grid-fitrows-3col' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-3col dtr-blog-grid-fitrows';
		} elseif ( 'dtr-blog-grid-fitrows' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-grid dtr-blog-grid-fitrows';
		} elseif ( 'dtr-blog-left-thumb' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
			$classes = 'dtr-blog-left-thumb';
		} else {
			$classes = 'dtr-blog-default';
		}
		return $classes;
	}
endif;

/**
 * First post class
 */
add_filter( 'post_class', 'olyve_mark_first_post' );
if ( ! function_exists( 'olyve_mark_first_post' ) ) :
function olyve_mark_first_post( $classes ) {
    global $wp_query;
    if( 0 == $wp_query->current_post )
        $classes[] = 'dtr-first-post';
        return $classes;
}
endif;

/**
 * First Post
 */
if ( ! function_exists( 'olyve_first_post_classes' ) ) :
	function olyve_first_post_classes( $classes = NULL ) {
		if ( true == olyve_get_theme_option( 'olyve_first_full_post_enable', false ) ) {
			$classes = 'has-full-first-post';
		} else {
			$classes = '';
		}
		return $classes;
	}
endif;