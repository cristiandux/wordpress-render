<?php
/**
 * The template for displaying the footer
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
if ( true == olyve_get_theme_option( 'olyve_footer_enable', false ) ) : ?>
<footer id="dtr-footer-section" class="dtr-footer-section-wrap clearfix">
    <?php if ( true == olyve_get_theme_option( 'olyve_footer_columns_enable', false ) ) { ?>
    <?php if ( is_active_sidebar( 'footer-column-1' ) || is_active_sidebar( 'footer-column-2' ) || is_active_sidebar( 'footer-column-3' ) || is_active_sidebar( 'footer-column-4' ) ) { ?>
    <div class="dtr-footer-row">
        <div class="container">
            <div class="row">
                <?php
		// get footer columns
		if ( olyve_get_theme_option( 'olyve_footer_columns', '4' ) ) { 
			$footer_columns = olyve_get_theme_option( 'olyve_footer_columns', '4' ); 
		} else { 
			$footer_columns = '4'; 
		}
		if( $footer_columns == '1' ){
			$footer_column_col1 = 'col-12';
		} elseif( $footer_columns == '2' ){
			$footer_column_col1 = 'col-12 col-md-6';
			$footer_column_col2 = 'col-12 col-md-6';
		} elseif( $footer_columns == '3' ){
			$footer_column_col1 = 'col-12 col-md-4';
			$footer_column_col2 = 'col-12 col-md-4';
			$footer_column_col3 = 'col-12 col-md-4';
		} elseif( $footer_columns == '4' ){
			$footer_column_col1 = 'col-12 col-md-6 col-lg-3';
			$footer_column_col2 = 'col-12 col-md-6 col-lg-3';
			$footer_column_col3 = 'col-12 col-md-6 col-lg-3';
			$footer_column_col4 = 'col-12 col-md-6 col-lg-3';
		} elseif( $footer_columns == '5' ){
			$footer_column_col1 = 'col-12 col-md-6';
			$footer_column_col2 = 'col-12 col-md-3';
			$footer_column_col3 = 'col-12 col-md-3';
		} elseif( $footer_columns == '6' ){
			$footer_column_col1 = 'col-12 col-md-3';
			$footer_column_col2 = 'col-12 col-md-6';
			$footer_column_col3 = 'col-12 col-md-3';
		} elseif( $footer_columns == '7' ){
			$footer_column_col1 = 'col-12 col-md-4';
			$footer_column_col2 = 'col-12 col-md-5';
			$footer_column_col3 = 'col-12 col-md-3';
		} elseif( $footer_columns == '8' ){
			$footer_column_col1 = 'col-12 col-md-6 col-lg-2';
			$footer_column_col2 = 'col-12 col-md-6 col-lg-4';
			$footer_column_col3 = 'col-12 col-md-6 col-lg-3';
			$footer_column_col4 = 'col-12 col-md-6 col-lg-3';
		} 
		?>
                <?php if( is_active_sidebar( 'footer-column-1' ) ) { ?>
                <?php if( $footer_columns == '1' || $footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4' || $footer_columns == '5' || $footer_columns == '6' || $footer_columns == '7'  || $footer_columns == '8' ) { ?>
                <div class="<?php echo esc_attr( $footer_column_col1 );?>">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-1') ) ?>
                </div>
                <?php } } // widgets area 1 ?>
                <?php if( is_active_sidebar( 'footer-column-2' ) ) { ?>
                <?php if( $footer_columns == '2' || $footer_columns == '3' || $footer_columns == '4' || $footer_columns == '5' || $footer_columns == '6' || $footer_columns == '7' || $footer_columns == '8' ) { ?>
                <div class="<?php echo esc_attr( $footer_column_col2 );?> small-device-space">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-2') ) ?>
                </div>
                <?php } } // widgets area 2 ?>
                <?php if( is_active_sidebar( 'footer-column-3' ) ) { ?>
                <?php if( $footer_columns == '3' || $footer_columns == '4' || $footer_columns == '5' || $footer_columns == '6' || $footer_columns == '7' || $footer_columns == '8' ) { ?>
                <div class="<?php echo esc_attr( $footer_column_col3 );?> small-device-space">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-3') ) ?>
                </div>
                <?php } } // widgets area 3 ?>
                <?php if( is_active_sidebar( 'footer-column-4' ) ) { ?>
                <?php if( $footer_columns == '4' || $footer_columns == '8' ) { ?>
                <div class="<?php echo esc_attr( $footer_column_col4 );?> small-device-space">
                    <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('footer-column-4') ) ?>
                </div>
                <?php } } // widgets area 4 ?>
            </div>
        </div>
    </div>
    <?php } } // dtr-footer-row ?>
    <?php if ( true == olyve_get_theme_option( 'olyve_copyright_enable', true ) ) { ?>
    <?php if ( is_active_sidebar( 'copyright-column-1' ) ) { ?>
    <div class="dtr-copyright">
        <div class="container">
            <div class="dtr-copyright__content">
                <div class="dtr-copyright__column"><?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('copyright-column-1') ) ?></div>
            </div>
        </div>
    </div>
    <?php } } ?>
    <?php if ( true == olyve_get_theme_option( 'olyve_enable_scroll_top', false ) ) { ?>
    <a id="take-to-top" href="#" class="<?php echo esc_attr( olyve_get_theme_option( 'olyve_enable_mobile_scroll_top', '' ) ); ?>" aria-label="<?php esc_attr_e( 'Scroll To Top', 'olyve' ); ?>"></a>
    <?php } ?>
</footer>
<?php endif; ?>
</div>
<!-- #dtr-wrapper -->
<?php wp_footer(); ?>
</body></html>