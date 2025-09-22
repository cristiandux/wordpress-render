<?php
/**
 * The Title for page
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
$page_desc = '';
$title_align = olyve_get_theme_option( 'olyve_page_title_section_align', 'text-center' );
$page_desc  = get_post_meta( $post->ID, '_olyve_page_desc_meta', true );
if ( ! is_home() && ! is_front_page() && ! is_page_template('template-no-page-header.php') && true == olyve_get_theme_option( 'olyve_enable_pagetitle_section', true ) ) { ?>
<div class="dtr-page-title--section <?php echo esc_attr( $title_align ); ?>">
    <div class="dtr-page-title__overlay"></div>
    <div class="container">
        <div class="dtr-page-title__content">
            <?php if ( true == olyve_get_theme_option( 'olyve_enable_page_title', true ) ) { 
                    the_title( '<h1 class="dtr-page-title">', '</h1>' ); 
                 } ?>
        </div>
        <?php if ( true == olyve_get_theme_option( 'olyve_enable_page_breadcrumb', true ) ) { ?>
        <div class="dtr-breadcrumb-wrapper">
            <?php get_template_part( '/template-parts/header/breadcrumb' ); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php }