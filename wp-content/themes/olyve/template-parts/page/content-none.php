<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
?>
<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
    <div class="dtr-primary-section--content">
        <h4>
            <?php esc_html_e( 'Nothing Found', 'olyve' ); ?>
        </h4>
        <div class="page-content">
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <?php	printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'olyve' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			); ?>
            <?php elseif ( is_search() ) : ?>
            <p>
                <?php esc_html_e( 'Sorry, no results were found for your search terms. Please try again with different keywords.', 'olyve' ); ?>
            </p>
            <?php get_search_form(); ?>
            <?php else : ?>
            <p>
                <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Try with search.', 'olyve' ); ?>
            </p>
            <?php get_search_form(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>