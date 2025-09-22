<?php
/**
 * The Entry Image for post 
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
if ( has_post_thumbnail() && true == olyve_get_theme_option( 'olyve_archive_image_enable', true ) ) { ?>
<div class="dtr-entry-thumb <?php echo esc_attr( olyve_get_theme_option( 'olyve_archive_image_corner', 'dtr-radius--rounded' ) ) ?>"> <a href="<?php echo esc_url( get_permalink() ); ?>">
    <?php the_post_thumbnail( 'full' ); ?>
    </a> </div>
<?php }