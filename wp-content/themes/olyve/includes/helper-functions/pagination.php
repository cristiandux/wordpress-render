<?php
/**
 * Paginations
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// atributes to navigation links
if ( ! function_exists( 'olyve_next_posts_link_attributes' ) ) {
	function olyve_next_posts_link_attributes() {
		return 'aria-label="' . esc_attr__('Next Post','olyve') . '"';
	}
}
add_filter('next_posts_link_attributes', 'olyve_next_posts_link_attributes');

if ( ! function_exists( 'olyve_prev_posts_link_attributes' ) ) {
	function olyve_prev_posts_link_attributes() {
		return 'aria-label="' . esc_attr__('Previous Post','olyve') . '"';
	}
}
add_filter('previous_posts_link_attributes', 'olyve_prev_posts_link_attributes');

/**
 * Navigation : next/prev for a single post
 */
if ( ! function_exists( 'olyve_post_nav' ) ) :
	function olyve_post_nav() { 
	?>
	<nav class="dtr-single-post-nav clearfix">
		<?php $prev_post = get_previous_post(); 
		 $prev_nav_text	 = olyve_get_theme_option('olyve_prev_nav_text', esc_html__('Previous Post','olyve')); ?>
		<div class="dtr-single-nav-prev dtr-single-nav-text">
        <?php if( $prev_post ) { ?>
			<?php previous_post_link('%link','' . esc_html( $prev_nav_text ) . ''); ?>
		<?php } ?>
		</div>
		<?php $next_post = get_next_post(); 
		$next_nav_text	 = olyve_get_theme_option('olyve_next_nav_text', esc_html__('Next Post','olyve')); ?>
		<div class="dtr-single-nav-next dtr-single-nav-text">
        <?php if( $next_post ) { ?>
        	<?php next_post_link('%link','' . esc_html( $next_nav_text ) . ''); ?>
        <?php } ?>
		</div>
	</nav>
	<?php
	}
endif; // olyve_post_nav

/**
 * Navigation : next/prev for archives
 */
if ( ! function_exists( 'olyve_archive_nav' ) ) :
function olyve_archive_nav() {
	global $wp_query;
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
<nav class="dtr-archive-nav dtr-arrow-nav clearfix">
		<div class="dtr-nav__button dtr-nav__prev-button">
			<?php if ( get_next_posts_link() ) : ?>
			<?php next_posts_link( '<div class="dtr-nav__icon dtr-nav__prev-icon"></div>' );  ?>
			<?php endif; ?>
		</div>
		<div class="dtr-nav__button dtr-nav__next-button">
			<?php if ( get_previous_posts_link() ) : ?>
			<?php previous_posts_link( '<div class="dtr-nav__icon dtr-nav__next-icon"></div>' ); ?>
			<?php endif; ?>
		</div>
</nav>
<!-- .dtr-post-nav -->
<?php
}
endif; // olyve_archive_nav

/**
 * Pagination : Numbered 
 */
if ( ! function_exists( 'olyve_numbered_pagination' ) ) :
    function olyve_numbered_pagination( $query = '' ) {

        if ( ! $query ) {
            global $wp_query;
            $query = $wp_query;
        }
		
		// vars
		$total  = $query->max_num_pages;
        $big    = 999999999; // unlikely integer

		// pagination
        if ( $total > 1 ) {
		
            // Get permalink structure
            if ( get_option( 'permalink_structure' ) ) {
                if ( is_page() ) {
                    $format = 'page/%#%/';
                } else {
                    $format = '/%#%/';
                }
            } else {
                $format = '&paged=%#%';
            }

            // Get current page
            if ( $current_page = get_query_var( 'paged' ) ) {
                $current_page = $current_page;
            } elseif ( $current_page = get_query_var( 'page' ) ) {
                $current_page = $current_page;
            } else {
                $current_page = 1;
            }

            // Midsize
            $mid_size = '2';
			
            // Pagination output
            $links = paginate_links( array(
                'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'        => $format,
                'total'         => $total,
				'current'       => max( 1, $current_page ),
                'mid_size'      => $mid_size,
                'prev_next'     => false,
                'next_text'     => false,
			    'type'          => 'array'
            ) );
			
			if ( $links ) :

    echo '<ul class="dtr-archive-nav dtr-number-nav clearfix">';
    if ( get_previous_posts_link() ) :
        echo '<li class="dtr-nav__button dtr-nav__arrow dtr-nav__prev-button">';
        echo get_previous_posts_link( '<div class="dtr-nav__icon dtr-nav__prev-icon"></div>' );
        echo '</li>';
    endif;

    echo '<li class="dtr-nav__button">';
    echo join( '</li><li class="dtr-nav__button">', $links );
    echo '</li>';

    if ( get_next_posts_link() ) :
        echo '<li class="dtr-nav__button dtr-nav__arrow dtr-nav__next-button">';
		echo get_next_posts_link( '<div class="dtr-nav__icon dtr-nav__next-icon"></div>' );
        echo '</li>';
    endif;
    echo '</ul>';
endif;
        }
    }
endif; // olyve_numbered_pagination