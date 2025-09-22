<?php
/**
 * The template for displaying testimonial details.
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
get_header(); 
$title_align = olyve_get_theme_option( 'olyve_page_title_section_align', 'text-center' );
?>
<?php if ( true == olyve_get_theme_option( 'olyve_enable_testimonial_pagetitle_section', true ) ) { ?>
<div class="dtr-page-title--section <?php echo esc_attr( $title_align ); ?>">
    <div class="dtr-page-title__overlay"></div>
    <div class="container">
        <div class="dtr-page-title__content">
            <?php if ( true == olyve_get_theme_option( 'olyve_enable_testimonial_page_title', true ) ) { 
            the_title( '<h1 class="dtr-page-title">', '</h1>' ); 
        } ?>
        </div>
        <?php if ( true == olyve_get_theme_option( 'olyve_enable_testimonial_breadcrumb', true ) ) { ?>
        <div class="dtr-breadcrumb-wrapper">
            <?php get_template_part( '/template-parts/header/breadcrumb' ); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<!-- #page header -->
<div id="dtr-main-wrapper" class="container clearfix dtr-fullwidth">
    <main id="dtr-primary-section" class="dtr-content-area">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( true == olyve_get_theme_option( 'olyve_testimonial_single_image', true ) ) { ?>
            <div class="dtr-testimonial-thumb">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php } ?>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php olyve_post_nav(); ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>
</div>
<!-- #dtr-main-wrapper -->
<?php get_footer();