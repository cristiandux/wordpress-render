<?php
/**
 * The template for displaying header.
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="dtr-wrapper" class="clearfix">
<header id="dtr-main-header">
	<?php           
    if( 'header-v1' == olyve_get_theme_option( 'olyve_header_layout', 'header-v1' ) ) {
    	get_template_part( '/template-parts/header/header-v1' );
    } elseif ( 'header-v2' == olyve_get_theme_option( 'olyve_header_layout', 'header-v1' ) ) {
    	get_template_part( '/template-parts/header/header-v2' );
    } elseif ( 'header-v3' == olyve_get_theme_option( 'olyve_header_layout', 'header-v1' ) ) {
    	get_template_part( '/template-parts/header/header-v3' );
    } elseif ( 'header-v4' == olyve_get_theme_option( 'olyve_header_layout', 'header-v1' ) ) {
    	get_template_part( '/template-parts/header/header-v4' );
    } else {
    	get_template_part( '/template-parts/header/header-v1' );
    }
    // page title 
    if ( is_page() ) {
        get_template_part( '/template-parts/page-title/page-header-page' );    
    } elseif ( is_single() ) {
        get_template_part( '/template-parts/page-title/page-header-single' );    
    } else {
       olyve_default_page_header_hook();
    }
    ?>
</header>