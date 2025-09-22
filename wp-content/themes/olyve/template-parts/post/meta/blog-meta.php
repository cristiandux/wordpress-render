<?php
/**
 * Blog post archive meta
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( true == olyve_get_theme_option( 'olyve_blog_page_category_enable', true ) || true == olyve_get_theme_option( 'olyve_blog_page_date_enable', true ) || true == olyve_get_theme_option( 'olyve_blog_page_author_enable', true ) ) { ?>
<div class="dtr-meta dtr-entry-meta">
    <?php if ( true == olyve_get_theme_option( 'olyve_blog_page_category_enable', true ) ) { ?>
    <div class="dtr-meta-category">
        <?php the_category( ' ', get_the_ID() ); ?>
    </div>
    <?php } ?>
    <?php if (  true == olyve_get_theme_option( 'olyve_blog_page_author_enable', true ) ) { ?>
    <div class="dtr-meta-item dtr-meta-author"><span class="vcard author"><span class="fn"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php echo esc_html( get_the_author() ) ?></a> </span></span></div>
    <?php } ?>
    <?php if ( true == olyve_get_theme_option( 'olyve_blog_page_date_enable', true ) ) { ?>
    <div class="dtr-meta-item dtr-meta-date"><span class="entry-date updated"><?php echo esc_html( get_the_date() ); ?></span></div>
    <?php } ?>
</div>
<?php }