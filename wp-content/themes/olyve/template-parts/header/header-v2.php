<?php
/**
 * Template for displaying header v2
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
?>
<?php if ( true == olyve_get_theme_option( 'olyve_topbar_enable', false ) ) { ?>
<?php if ( true == olyve_get_theme_option( 'olyve_header_button_enable', false ) || is_active_sidebar( 'widget-header-three' ) && true == olyve_get_theme_option( 'olyve_header_widget_area_three_enable', false ) || is_active_sidebar( 'widget-header-two' ) && true == olyve_get_theme_option( 'olyve_header_widget_area_two_enable', false ) ) { ?>
<div id="dtr-topbar" class="clearfix">
    <div class="dtr-topbar-content">
        <?php if ( is_active_sidebar( 'widget-header-two' ) && true == olyve_get_theme_option( 'olyve_header_widget_area_two_enable', false ) ) { ?>
        <div class="dtr-topbar-left dtr-header-widget-two">
            <?php dynamic_sidebar( 'widget-header-two' ); ?>
        </div>
        <?php } ?>
        <?php if ( true == olyve_get_theme_option( 'olyve_header_button_enable', false ) || is_active_sidebar( 'widget-header-three' ) && true == olyve_get_theme_option( 'olyve_header_widget_area_three_enable', false ) ) { ?>
        <div class="dtr-topbar-right dtr-header-widget-three">
            <?php dynamic_sidebar( 'widget-header-three' ); ?>
             <?php if ( true == olyve_get_theme_option( 'olyve_header_button_enable', false ) ) { ?>
        <a href="<?php echo esc_url( olyve_get_theme_option( 'olyve_header_btn_link' ) ); ?>" class="dtr-btn dtr-header-btn" target="_<?php echo esc_attr( olyve_get_theme_option( 'olyve_header_button_target', '' ) ); ?>"><span class="dtr-header-btn__text"><?php echo wp_kses( olyve_get_theme_option( 'olyve_header_btn_text' ), wp_kses_allowed_html('post') ); ?></span></a>
        <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<?php } ?>
<div id="dtr-header-global" class="clearfix">
    <div class="dtr-header-global-content">
        <div class="dtr-header-left">
            <?php get_template_part( '/template-parts/header/logo' ); ?>
            <?php get_template_part( '/template-parts/header/logo-alt' ); ?>
        </div>
        <?php if ( true == olyve_get_theme_option( 'olyve_header_menubar_enable', true ) ) { ?>
        <div class="main-navigation dtr-menu-default">
            <?php get_template_part( '/template-parts/header/main-menu' ); ?>
        </div>
        <?php } ?>
        <div class="dtr-header-right">
            <?php if ( is_active_sidebar( 'widget-header-one' ) && true == olyve_get_theme_option( 'olyve_header_widget_area_one_enable', false ) ) { ?>
            <div class="dtr-header-widget-one dtr-header-widget-wrapper clearfix">
                <?php dynamic_sidebar( 'widget-header-one' ); ?>
            </div>
            <?php } ?>
            <?php if ( true == olyve_get_theme_option( 'olyve_header_search_enable', false ) ) { ?>
            <a href="#dtr-search-modal" role="button" class="dtr-search-modal-trigger" aria-label="<?php esc_attr_e( 'Search Modal Button', 'olyve' ); ?>"></a>
            <?php } ?>
        </div>
    </div>
</div>
<?php get_template_part( '/template-parts/header/responsive-header' ); ?>
<?php if ( true == olyve_get_theme_option( 'olyve_header_search_enable', false ) ) { 
	get_template_part( '/template-parts/header/search-modal' ); 
}