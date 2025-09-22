<?php
/**
 * The Title for entry post 
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
the_title( sprintf( '<h2 class="dtr-archive-post-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' );