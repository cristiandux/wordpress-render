<?php
/**
 * The Title for single post 
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
if ( is_singular('dtr_testimonial') || is_singular('dtr_portfolio') ) return;
$title_align = olyve_get_theme_option( 'olyve_page_title_section_align', 'text-center' );
if ( true == olyve_get_theme_option( 'olyve_enable_single_pagetitle_section', true ) ) { ?>
<div class="dtr-page-title--section <?php echo esc_attr( $title_align ); ?>">
    <div class="dtr-page-title__overlay"></div>
    <div class="container">
        <div class="dtr-page-title__content">
            <?php get_template_part( '/template-parts/post/meta/blog-single-pre-meta' ); ?>
            <?php if ( true == olyve_get_theme_option( 'olyve_enable_single_page_title', true ) ) { 
                the_title( '<h1 class="dtr-single-post-title dtr-page-title">', '</h1>' );
            } ?>
        </div>
        <?php if ( true == olyve_get_theme_option( 'olyve_enable_single_breadcrumb', true ) ) { ?>
        <div class="dtr-breadcrumb-wrapper">
            <?php get_template_part( '/template-parts/header/breadcrumb' ); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php }