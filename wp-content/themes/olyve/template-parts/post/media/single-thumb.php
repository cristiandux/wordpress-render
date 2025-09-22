<?php
/**
 * The Image for post 
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
if ( true == olyve_get_theme_option( 'olyve_single_image_enable', true ) ) { ?>
	<div class="dtr-single-thumb <?php echo esc_attr( olyve_get_theme_option( 'olyve_single_image_corner', 'dtr-radius--rounded' ) ) ?>">
		<?php the_post_thumbnail( 'full' ); ?>
	</div>
<?php }