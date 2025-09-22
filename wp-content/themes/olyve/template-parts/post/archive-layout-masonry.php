<?php
/**
 * Template for main blog layout - grid / masonry
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}  ?>
<?php
$current = $wp_query->current_post + 1;
if ( false == olyve_get_theme_option( 'olyve_first_full_post_enable', false ) || $current == 0 && is_paged() ) { ?>
<div class="dtr-post-grid">
<?php }
	while ( have_posts() ) : the_post(); 
		$current = $wp_query->current_post + 1;
		if ( true == olyve_get_theme_option( 'olyve_first_full_post_enable', false ) && $current == 1 && !is_paged() ) {  
		get_template_part( '/template-parts/post/entry/entry-layout-masonry', get_post_format() ); ?>
<div class="dtr-post-grid">
	<?php } else {  ?>
	<div class="dtr-post-item">
    <div class="dtr-post-item__content-wrapper">
		<?php get_template_part( '/template-parts/post/entry/entry-layout-masonry', get_post_format() ); ?>
        </div>
        
        <?php if( !( $wp_query->post_count == $wp_query->current_post+1 ) ) : ?>
    <span class="dtr-post-divider clearfix"></span>
    <?php endif; ?>
	</div>
	<?php } 
endwhile; ?>
</div>