<?php
/**
 * Template for displaying content - archive
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
// thumb
if ( ! has_post_thumbnail() ) {
	$no_thumb = 'dtr-has-no-thumb';	
} else { 
	$no_thumb = ''; 
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="clearfix <?php echo esc_attr ( $no_thumb ) ?>">
        <?php if ( has_post_thumbnail() ) { ?>
            <?php if ( ! post_password_required() ) { 
				get_template_part( '/template-parts/post/media/entry-thumb' ); 
			} ?>
        <?php  } ?>
        
                <?php 
				get_template_part( '/template-parts/post/meta/blog-meta' );
				get_template_part( '/template-parts/post/title/entry-title' );
                get_template_part( '/template-parts/post/content/entry-content' );  
                if ( true == olyve_get_theme_option( 'olyve_read_more_enable', true ) ) { olyve_read_more(); } ?>
           
    </div>
    <?php if( !( $wp_query->post_count == $wp_query->current_post+1 ) ) : ?>
    <span class="dtr-post-divider clearfix"></span>
    <?php endif; ?>
</article>