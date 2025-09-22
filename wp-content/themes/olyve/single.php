<?php
/**
 * The template file for single post
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
get_header(); 
if( is_active_sidebar('widgets-blog') ) {
	$olyve_default_layout_class = olyve_get_layout_class(); 
} else { 
 	$olyve_default_layout_class = 'dtr-fullwidth';  
} 
$tags_title	= olyve_get_theme_option( 'olyve_tags_title_text', '' );
?>
<div id="dtr-main-wrapper" class="container clearfix <?php echo esc_attr( $olyve_default_layout_class ) ?>">
    <main id="dtr-primary-section" class="dtr-content-area">
        <?php 
		while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if ( ! post_password_required() ) : 
			if ( has_post_thumbnail() ) {
				get_template_part( '/template-parts/post/media/single-thumb' ); 
			} 	endif;  ?>
        <?php get_template_part( '/template-parts/post/meta/blog-single-meta' ); ?>
        <div class="dtr-single-post--content">
            <?php get_template_part( '/template-parts/post/content/single-content' ); ?>
            <?php if ( has_tag() && true == olyve_get_theme_option( 'olyve_single_tags_enable', true ) ||  class_exists( 'dtr_olyve_core' ) && true == olyve_get_theme_option( 'olyve_social_share_enable', true ) ) { ?>
            <div class="dtr-post-footer-meta">
                <?php if ( has_tag() && true == olyve_get_theme_option( 'olyve_single_tags_enable', true ) ) { ?>
                <div class="dtr-meta-tags"><?php if ( $tags_title != '' ) { ?><span class="dtr-tags-title dtr-meta-title"><?php echo esc_html($tags_title) ?></span><?php } ?><?php the_tags( '','' ); ?></div>
                <?php } ?>
                <?php if ( class_exists( 'dtr_olyve_core' ) && true == olyve_get_theme_option( 'olyve_social_share_enable', true ) ) { olyve_social_share_hook(); } ?>
            </div>
            <?php } ?>
            <?php 
			// author bio
			if ( '' != get_the_author_meta( 'description' ) && is_multi_author() ) {
				get_template_part( '/template-parts/post/author-bio' ); 
			} 
			// post nav
			olyve_post_nav(); 
			// comments
			if ( comments_open() || get_comments_number() ) {
				comments_template(); 
			} ?>
            <?php endwhile; ?>
            </article>
    </main>
    <!-- #dtr-primary-section -->
    <?php if( is_active_sidebar('widgets-blog') ) {
	 get_sidebar(); } ?>
</div>
<!-- #dtr-main-wrapper -->
<?php get_footer();
