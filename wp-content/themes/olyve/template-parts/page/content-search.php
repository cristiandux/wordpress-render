<?php
/**
 * The default template for displaying content of search results
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
$readmore = olyve_get_theme_option( 'olyve_read_more_text', esc_html__( 'Read More', 'olyve') ); ?>
<div class="dtr-search-item">
    <div class="dtr-search-item-inner">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="dtr-entry-thumb"> <?php echo '<a href="' .  esc_url( get_permalink() ) . '">' . get_the_post_thumbnail( $post->ID, 'full', array( 'title' => '' ) ) . '</a>';  ?> </div>
        <?php } ?>
        <?php the_title( sprintf( '<h5 class="dtr-search-post-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
        <?php 
		if ( has_excerpt() ) {
			$excerpt = the_excerpt();
		} else {
			$excerpt = ''; 
		} ?>
        <p class="dtr-post__button-wrap"><a href="<?php the_permalink(); ?>" class="dtr-post__button"><?php echo esc_html( $readmore ); ?></a></p>
    </div>
</div>