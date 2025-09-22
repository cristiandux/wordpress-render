<?php
/**
 * Layouts
 */
// Layout Classes
if ( ! function_exists( 'olyve_get_layout_class' ) ) {
	function olyve_get_layout_class() {
		
		// Vars
		$class = 'dtr-fullwidth';

		// Single Post Layout
		if ( is_single() ) {
			$olyve_single_post_layout = olyve_get_theme_option( 'olyve_single_post_layout', 'dtr-right-sidebar' );
			$page_setting = get_post_meta( get_the_ID(), '_olyve_page_layout_meta', true );
			if ( $page_setting !== '' ) {
				$class = $page_setting;
			} else {
				$class = $olyve_single_post_layout;
			}		
		}
		
		// Blog / Archive Layout
		$olyve_blog_layout = olyve_get_theme_option( 'olyve_blog_layout', 'dtr-right-sidebar' );
		if ( is_archive() || is_author() || is_home() ) {
			$class = $olyve_blog_layout;
		}

        // Page Layout
		if ( is_page() ) {
			if ( class_exists( 'Redux_Framework_Plugin' )  ){
				$olyve_page_layout = olyve_get_theme_option( 'olyve_page_layout' );
			} else { 
				$olyve_page_layout = 'dtr-right-sidebar';
			}
			$page_setting = get_post_meta( get_the_ID(), '_olyve_page_layout_meta', true );
			if ( $page_setting !== '' ) {
				$class = $page_setting;
			} else {
				$class = $olyve_page_layout;
			}		
		}

		return $class;
	} 
}