<?php
/**
 * Blog single post pre meta
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( has_category() && true == olyve_get_theme_option( 'olyve_single_category_enable', true ) ) { ?>
<div class="dtr-meta dtr-single-meta dtr-single-pre-meta">
    <div class="dtr-meta-category">
        <?php the_category( ' ', get_the_ID() ); ?>
    </div>
</div>
<?php }