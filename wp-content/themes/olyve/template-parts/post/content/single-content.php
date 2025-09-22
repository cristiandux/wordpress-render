<?php
/**
 * Template for displaying single post content
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>
<div class="dtr-blog-content clearfix">
	<?php the_content(); ?>
</div>
<?php 
// page numbers
wp_link_pages( array(
    'before'      => '<span class="clearfix"></span><div class="dtr-page-links">' . esc_html__( 'Pages:', 'olyve' ),
    'after'       => '</div>',
    'link_before' => '<span class="dtr-page-number">',
    'link_after'  => '</span>',
) );