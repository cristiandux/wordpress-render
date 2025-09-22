<?php
/**
 * Template for displaying archive content
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<?php if ( true == olyve_get_theme_option( 'olyve_blog_page_excerpt_enable', true ) ) { ?>
<div class="dtr-entry-excerpt clearfix">
    <?php olyve_excerpt( array(
		'length' => olyve_archive_excerpt_length(),
	) ); ?>
</div>
<?php } ?>
<?php 
	// page numbers
	wp_link_pages( array(
		'before'      => '<span class="clearfix"></span><div class="dtr-page-links">' . esc_html__( 'Pages:', 'olyve' ),
		'after'       => '</div>',
		'link_before' => '<span class="dtr-page-number">',
		'link_after'  => '</span>',
	) );