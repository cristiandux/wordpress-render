<?php
/**
* The template for displaying Author Bio.
*
* @package OlyveTheme
* @version 1.0.0
*/
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
global $post;
$post_author = $post->post_author;
$url = '';
?>
<div class="dtr-author-info clearfix">
        <div class="dtr-author-avatar"> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" aria-label="<?php esc_attr_e( 'avatar', 'olyve' ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 130 ); ?></a> </div>
        <div class="dtr-author-contentbox">
            <h4 class="dtr-author-title"> <?php printf( esc_html( '%s', 'olyve' ), get_the_author() ); ?></h4>
            <P class="dtr-author-jobtitle"><?php the_author_meta( 'olyve_jobtitle' ); ?></P>
            <div class="dtr-author-description dtr-social-default">
                <?php the_author_meta( 'description' ); ?>
                <a class="dtr-user-url" href="<?php the_author_meta( 'user_url' ); ?>"  aria-label="<?php esc_attr_e( 'user-url', 'olyve' ); ?>">
                <?php the_author_meta( 'user_url' ); ?>
                </a>
                <?php if ( get_the_author_meta( 'olyve_twitter', $post_author ) || get_the_author_meta( 'olyve_facebook', $post_author ) || get_the_author_meta( 'olyve_instagram', $post_author ) || get_the_author_meta( 'olyve_pinterest', $post_author ) || get_the_author_meta( 'olyve_linkedin', $post_author ) || get_the_author_meta( 'olyve_mail', $post_author ) ) { ?>
                <ul class="dtr-author-social dtr-social dtr-social-list clearfix">
                    <?php if ( $url = get_the_author_meta( 'olyve_twitter', $post_author ) ) { ?>
                    <li> <a href="<?php echo esc_url( $url ); ?>" title="<?php esc_attr_e( 'Twitter', 'olyve' ) ?>" class="dtr-twitter"></a></li>
                    <?php } ?>
                    <?php if ( $url = get_the_author_meta( 'olyve_facebook', $post_author ) ) { ?>
                    <li><a href="<?php echo esc_url( $url ); ?>" title="<?php esc_attr_e( 'Facebook', 'olyve' ) ?>" class="dtr-facebook"></a></li>
                    <?php } ?>
                    <?php if ( $url = get_the_author_meta( 'olyve_instagram', $post_author ) ) { ?>
                    <li><a href="<?php echo esc_url( $url ); ?>" title="<?php esc_attr_e( 'Instagram', 'olyve' ) ?>" class="dtr-instagram"></a></li>
                    <?php } ?>
                    <?php if ( $url = get_the_author_meta( 'olyve_pinterest', $post_author ) ) { ?>
                    <li> <a href="<?php echo esc_url( $url ); ?>" title="<?php esc_attr_e( 'Pinterest', 'olyve' ) ?>" class="dtr-pinterest"></a></li>
                    <?php } ?>
                    <?php if ( $url = get_the_author_meta( 'olyve_linkedin', $post_author ) ) { ?>
                    <li><a href="<?php echo esc_url( $url ); ?>" title="<?php esc_attr_e( 'Linkedin', 'olyve' ) ?>" class="dtr-linkedin"></a></li>
                    <?php } ?>
                    <?php if ( $url = get_the_author_meta( 'olyve_mail', $post_author ) ) { ?>
                    <li><a href="<?php echo esc_url( $url ); ?>" title="<?php esc_attr_e( 'Mail', 'olyve' ) ?>" class="dtr-mail"></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
</div>