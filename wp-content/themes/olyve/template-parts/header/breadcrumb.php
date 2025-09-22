<?php
/**
 * The Breadcrumb
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
  
if ( 'yoast-breadcrumb' == olyve_get_theme_option( 'olyve_breadcrumb_plugin', 'yoast-breadcrumb' ) && function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
} elseif( 'navxt-breadcrumb' == olyve_get_theme_option( 'olyve_breadcrumb_plugin', 'yoast-breadcrumb' ) && function_exists('bcn_display_list') ) { ?>
    <ul class="breadcrumbs">
        <?php bcn_display_list(); ?>
    </ul>
<?php } else {
}