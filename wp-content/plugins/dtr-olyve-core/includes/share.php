<?php 
/**
 * Post Social share 
 */
// Post Social share hook
function olyve_social_share_hook() {
	do_action( 'olyve_social_share_hook' );
}
add_action( 'olyve_social_share_hook', 'olyve_default_social_share_hook' );

if( ! function_exists( 'olyve_default_social_share_hook' ) ) {
	function olyve_default_social_share_hook() {
		olyve_social_share();
	}
}
// Social Share
if ( ! function_exists('olyve_social_share') ) {
	function olyve_social_share() {

    global $olyve_theme_mod;

	// vars
	$twitter_handle = $style = $share_title = '';
	$post_id 		= get_the_ID();
	$url      		= get_permalink( $post_id );
	$title    		= get_the_title();
	$twitter_handle	= isset($olyve_theme_mod['olyve_twitter_handle_text']) ? $olyve_theme_mod['olyve_twitter_handle_text'] : '';
    $share_title	= isset($olyve_theme_mod['olyve_share_title_text']) ? $olyve_theme_mod['olyve_share_title_text'] : '';    
    $enable_twitter	   = isset($olyve_theme_mod['olyve_twitter_share_enable']) ? $olyve_theme_mod['olyve_twitter_share_enable'] : true;
    $enable_facebook   = isset($olyve_theme_mod['olyve_facebook_share_enable']) ? $olyve_theme_mod['olyve_facebook_share_enable'] : true;
    $enable_pinterest  = isset($olyve_theme_mod['olyve_pinterest_share_enable']) ? $olyve_theme_mod['olyve_pinterest_share_enable'] : true;
    $enable_googleplus = isset($olyve_theme_mod['olyve_googleplus_share_enable']) ? $olyve_theme_mod['olyve_googleplus_share_enable'] : false;
    $enable_linkedin   = isset($olyve_theme_mod['olyve_linkedin_share_enable']) ? $olyve_theme_mod['olyve_linkedin_share_enable'] : false;
	$excerpt 		= get_the_excerpt();
	?>
<div class="dtr-social-share dtr-social-default">
    <?php if ( $share_title != '' ) { ?><span class="dtr-meta-title dtr-social-share-title"><?php echo esc_html($share_title) ?></span><?php } ?>
    <ul class="dtr-social dtr-social-share-list clearfix">
        <?php if ( $enable_twitter == true ) { ?>
        <li><a href="https://twitter.com/share?text=<?php echo rawurlencode( $title ); ?>&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?><?php if ( $twitter_handle ) echo '&amp;via='. esc_attr( $twitter_handle ); ?>" title="<?php esc_html_e( 'Twitter', 'olyve' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-twitter-share"></a></li>
        <?php } ?>
         <?php if ( $enable_facebook == true ) { ?>
        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo rawurlencode( esc_url( $url ) ); ?>" title="<?php esc_html_e( 'Facebook', 'olyve' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-facebook-share"></a></li>
        <?php } ?>
        <?php if ( $enable_pinterest == true ) { ?>
        <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;media=<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id ) ); ?>&amp;description=<?php echo rawurlencode( $title ); ?>" title="<?php esc_html_e( 'Pinterest', 'olyve' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-pinterest-share"></a></li>
        <?php } ?>
        <?php if ( $enable_googleplus == true ) { ?>
        <li><a href="https://plus.google.com/share?url=<?php echo rawurlencode( esc_url( $url ) ); ?>" title="<?php esc_html_e( 'Google+', 'olyve' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-google-share"></a></li>
        <?php } ?>
        <?php if ( $enable_linkedin == true ) { ?>
        <li><a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo rawurlencode( esc_url( $url ) ); ?>&amp;title=<?php echo rawurlencode( $title ); ?>&amp;summary=<?php echo rawurlencode( $excerpt ); ?>&amp;source=<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e( 'LinkedIn', 'olyve' ); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=500,width=500');return false;" class="dtr-linkedin-share"></a></li>
        <?php } ?>
    </ul>
</div>
<?php	}
}