<?php
/**
 * Template for main blog layout - standard
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
while ( have_posts() ) : the_post(); 
	$current = $wp_query->current_post + 1;
	if ( true == olyve_get_theme_option( 'olyve_first_full_post_enable', false ) && $current == 1 && ! is_paged() ) { 
		get_template_part( '/template-parts/post/entry/entry-layout' ); 
	} else {  
		get_template_part( '/template-parts/post/entry/entry-layout' ); 
	} 
endwhile;