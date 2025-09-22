<?php
/**
 * The template for displaying 404.
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
get_header(); ?>

<div id="dtr-wrapper" class="clearfix">
<?php
 	$text 		=  olyve_get_theme_option('olyve_404_text', esc_html__('We are sorry, but something went wrong.','olyve')); 
	$subtext 	=  olyve_get_theme_option('olyve_404_subtext', esc_html__('Oops...','olyve')); 
	$linktext	=  olyve_get_theme_option('olyve_404_link_text', esc_html__('Back To Home','olyve')); ?>
<div id="dtr-main-wrapper" class="container dtr-fullwidth">
    <main id="dtr-primary-section" class="dtr-content-area clearfix">
        <div class="dtr-primary-section--content">
            <div class="error-404 clearfix">
                <p class="heading-404"></p>
                <div class="error-form-wrapper">
                    <p class="subtext-404"><?php echo esc_html( $subtext ); ?></p>
                    <p class="text-404"><?php echo wp_kses_post( $text ); ?></p>
                </div>
               <a class="dtr-btn dtr-btn--round link-404" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $linktext ); ?> </a></div>
        </div>
    </main>
</div>
<!-- #content-wrapper -->
<?php get_footer();