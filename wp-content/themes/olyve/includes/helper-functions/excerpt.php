<?php
/**
 * Custom Excerpt
 */
 
/**
 * Get the excerpt
 */
if ( ! function_exists( 'olyve_excerpt' ) ) {
	function olyve_excerpt( $args ) {
		echo olyve_get_the_excerpt( $args );
	}
} // olyve_excerpt

/**
 * Generate the custom excerpt
 */
if ( ! function_exists( 'olyve_get_the_excerpt' ) ) {
	function olyve_get_the_excerpt( $args = array() ) {
		$defaults = array(
			'output'          => '',
			'length'          => '40',
			'custom_excerpts' => true,
		);
		$args = wp_parse_args( $args, $defaults );
		extract( $args );
	
		// If length is empty or zero return
		if ( empty( $length ) || '0' == $length ) {
			return;
		}
	
		// Get post and post data
		$post = get_post();
		$post_content = $post->post_content;
		$post_excerpt = $custom_excerpts ? $post->post_excerpt : '';

		// If password protected post
		if ( $post->post_password ) {
			$output = '<p class="dtr-protected-msg">'. esc_html__( 'This is a password protected post.', 'olyve' ) .'</p>';
			return $output;
		}

		// default excerpt if provided
		if ( $post_excerpt ) :
			$output = $post_excerpt;
		// build custom excerpt
		else :
			// excerpt - complete post
			if ( '1' == $length ) {
				return apply_filters( 'the_content', $post_content );
				
			// excerpt - more tag
			} elseif ( '999' == $length ) {
				return apply_filters( 'the_content', get_the_content( '', '&hellip;' ) );
		
			// excerpt - custom length 
			} else { 	
				$content = wp_trim_words( $post_content, absint( $length ) );
				$output = $content;
			}
		endif;
		// return excerpt	
		return $output;
	}
}
	
/**
 * Custom excerpt length for archives
 */
if ( ! function_exists( 'olyve_archive_excerpt_length' ) ) {
	function olyve_archive_excerpt_length() {
		$length = olyve_get_theme_option( 'olyve_get_archive_excerpt_length', '40' );
		if ( $length ) {
			return intval( $length );
		} else {
			return 40; 	
		}
	}
} // olyve_archive_excerpt_length

/**
 * Get read more link
 */
if ( ! function_exists( 'olyve_read_more' ) ) {
	function olyve_read_more() {
		echo olyve_get_read_more();
	}
} // olyve_read_more

/**
 * Generate read more link
 */
if ( ! function_exists( 'olyve_get_read_more' ) ) {
	function olyve_get_read_more() {
	
		$output = $readmore = $class = '';
		$post = get_post();
		$post_id = $post->ID;

		$readmore = olyve_get_theme_option( 'olyve_read_more_text', esc_html__( 'Continue Reading', 'olyve') );
		$output .= '<p class="dtr-post__button-wrap"><a href="'. get_permalink( $post_id ) .'" class="dtr-post__button" title="'. esc_attr( $readmore ) .'" rel="bookmark">'. esc_attr( $readmore ) .'</a></p>';
		// return read more link	
		return $output;
	}
}