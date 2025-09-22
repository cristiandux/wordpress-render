<?php
/**
 * The Template for displaying page / post sidebar
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// No sidebar if No Sidebar layout is selected 
$olyve_main_layout = olyve_get_layout_class();
if ( $olyve_main_layout == 'dtr-fullwidth' ) return; 

if ( true == olyve_get_theme_option( 'olyve_enable_widget_group_style', true ) ) {
	$widget_style = 'dtr-widget-group';
} else {
	$widget_style = '';
}
?>
<aside id="dtr-secondary-section" class="dtr-widget-area <?php echo esc_attr($widget_style) ?>">
	<?php if( is_page() ){
		if ( is_active_sidebar( 'widgets-page' ) ) {
			dynamic_sidebar('widgets-page'); 
		}
	} else {
		if ( is_active_sidebar( 'widgets-blog' ) ) {
			dynamic_sidebar('widgets-blog');
		}
	}		
	?>
</aside>
<!-- #dtr-secondary-section -->