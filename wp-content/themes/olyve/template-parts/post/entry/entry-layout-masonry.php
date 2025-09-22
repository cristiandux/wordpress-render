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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="clearfix">
        <?php if ( has_post_thumbnail() ) { ?>
        <?php if ( ! post_password_required() ) { 
				get_template_part( '/template-parts/post/media/entry-thumb' ); 
			} ?>
        <?php  } ?>
        <header class="dtr-entry-header entry-header">
            <?php
				get_template_part( '/template-parts/post/meta/blog-meta' );
				get_template_part( '/template-parts/post/title/entry-title' );
				  ?>
        </header>
        <?php get_template_part( '/template-parts/post/content/entry-content' );             
			if ( true == olyve_get_theme_option( 'olyve_read_more_enable', true ) ) { olyve_read_more(); } ?>
    </div>
</article>