<?php
/**
 * The main template file
 * Display a page when nothing more specific matches a query.
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
?>
<div id="dtr-main-wrapper" class="container <?php echo esc_attr( olyve_blog_classes() ); ?> <?php echo esc_attr( olyve_first_post_classes() ); ?> <?php echo esc_attr( $olyve_default_layout_class ) ?>">
    <main id="dtr-primary-section" class="dtr-content-area">
        <?php
	 if ( have_posts() ) : 
	 		// get selected layout
			if ( 'dtr-blog-grid-masonry-3col' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) || 'dtr-blog-grid-masonry' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) || 'dtr-blog-grid-fitrows' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) || 'dtr-blog-grid-fitrows-3col' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
				get_template_part( '/template-parts/post/archive-layout', 'masonry' ); 
			} elseif ( 'dtr-blog-left-thumb' == olyve_get_theme_option( 'olyve_blog_entry_style', 'dtr-blog-default' ) ) {
				get_template_part( '/template-parts/post/archive-layout', 'list' ); 
			} else {
				get_template_part( '/template-parts/post/archive-layout', 'standard' ); 
			} ?>
			<div class="clearfix"></div>
            <?php if ( 'nextprev' == olyve_get_theme_option( 'olyve_blog_archive_pagination_style', 'numbered' ) ) {
				olyve_archive_nav();
			} else {
				olyve_numbered_pagination();
			} 
	    else : 
			get_template_part( '/template-parts/page/content', 'none' ); 
		endif; 
		?>
    </main>
    <!-- #dtr-primary-section -->
    <?php if( is_active_sidebar('widgets-blog') ) {
	 get_sidebar(); } ?>
    <div class="clearfix"></div>
</div>
<!-- #content-wrapper -->
<?php get_footer();