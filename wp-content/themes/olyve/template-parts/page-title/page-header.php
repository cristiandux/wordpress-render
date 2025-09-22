<?php
/**
 * The Page header for archives
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Page header hook
if( ! function_exists( 'olyve_default_page_header_hook' ) ) {
	function olyve_default_page_header_hook() {
		olyve_page_header();
	}
}
// Build Page Title
if ( ! function_exists('olyve_page_title') ) {
	function olyve_page_title( $page_title='' ) {
		
		if ( is_home() ) { 
			$page_title = olyve_get_theme_option( 'olyve_blog_title', esc_html__('Blog','olyve') ); 
		}
		// Archives   
		elseif ( is_archive() ) {
			// category
			if ( is_category() ) {
				$page_title = sprintf( single_cat_title( '', false ) );
			// tag
			} elseif ( is_tag() ) {
        		$page_title = sprintf( single_tag_title( '', false ) );
			// Daily archive
			} elseif ( is_day() ) {
				$page_title = sprintf( get_the_date() );
			// Monthly archive
			} elseif ( is_month() ) {
				$page_title = sprintf( get_the_date( _x( 'F Y', 'monthly archives date format', 'olyve' ) ) );	
			// Yearly archive
			} elseif ( is_year() ) {
				$page_title = sprintf( get_the_date( _x( 'Y', 'yearly archives date format', 'olyve' ) ) );	
			//Author
			} elseif ( is_author() ) { 
         		$page_title = sprintf( get_the_author() );
			// Standard title
			} else {
				$page_title = single_term_title("", false);
				if ( $page_title == '' ) {
					$post_id = get_the_ID();
					$page_title = get_the_title( $post_id );
				}
			}
		// Search
		} elseif( is_search() ) {
			/* translators: %s: search query. */
			$page_title =  sprintf( esc_html__( ' Search Results : %s', 'olyve' ), get_search_query() );   
		// else
		} else {
			$post_id = get_the_ID();
			$page_title = get_the_title( $post_id );
		}
		return $page_title;
	} 
} 
// Page Header output
if ( ! function_exists( 'olyve_page_header' ) ) {
	function olyve_page_header() {
		global $post;
		$page_title	= olyve_page_title();
		
		if ( is_front_page() || is_page() || is_single() || is_404() ) return;
		if ( false == olyve_get_theme_option( 'olyve_enable_archive_pagetitle_section', true )  ) return;
		$title_align = olyve_get_theme_option( 'olyve_page_title_section_align', 'text-center' );
?>
<div class="dtr-page-title--section <?php echo esc_attr( $title_align ); ?>">
    <div class="dtr-page-title__overlay"></div>
    <div class="container">
        <div class="dtr-page-title__content">
            <?php if ( true == olyve_get_theme_option( 'olyve_enable_archive_page_title', true ) ) { ?>
            <h1 class="dtr-blog-title dtr-page-title"> <?php echo esc_html( $page_title ); ?> </h1>
            <?php } ?>
        </div>
        <?php if ( true == olyve_get_theme_option( 'olyve_enable_archive_breadcrumb', true ) ) { ?>
        <div class="dtr-breadcrumb-wrapper">
            <?php get_template_part( '/template-parts/header/breadcrumb' ); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php	
    } 
}