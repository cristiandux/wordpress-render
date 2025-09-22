<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
get_header(); ?>
<div id="dtr-main-wrapper" class="container dtr-fullwidth">
	<main id="dtr-primary-section" class="dtr-content-area clearfix">
		<?php if ( have_posts() ) : ?>
		<div class="dtr-search-grid-wrapper clearfix">
			<div class="dtr-search-grid clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( '/template-parts/page/content', 'search' );  ?>
				<?php endwhile; ?>
			</div>
		</div>
		<?php olyve_numbered_pagination(); ?>
		<?php else : ?>
		<?php get_template_part( '/template-parts/page/content', 'none' ); ?>
		<?php endif; ?>
	</main>
</div>
<?php get_footer();