<?php
/**
 * The template for displaying portfolio details.
 */
get_header(); 
$title_align = olyve_get_theme_option( 'olyve_page_title_section_align', 'text-center' );
if ( true == olyve_get_theme_option( 'olyve_enable_portfolio_pagetitle_section', true ) ) { ?>
<div class="dtr-page-title--section <?php echo esc_attr( $title_align ); ?>">
    <div class="dtr-page-title__overlay"></div>
    <div class="container">
        <div class="dtr-page-title__content">
            <?php if ( true == olyve_get_theme_option( 'olyve_enable_portfolio_page_title', true ) ) { 
            the_title( '<h1 class="dtr-page-title">', '</h1>' ); 
        } ?>
        </div>
        <?php if ( true == olyve_get_theme_option( 'olyve_enable_portfolio_breadcrumb', true ) ) { ?>
        <div class="dtr-breadcrumb-wrapper">
            <?php get_template_part( '/template-parts/header/breadcrumb' ); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php } ?>
<!-- #page header -->
<div id="dtr-main-wrapper" class="clearfix dtr-fullwidth">
    <main id="dtr-primary-section" class="dtr-content-area">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container">
            <?php if ( true == olyve_get_theme_option( 'olyve_portfolio_single_image', true ) ) { ?>
            <div class="dtr-portfolio-thumb">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php } ?>
            </div>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <div class="container">
        <?php olyve_post_nav(); ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </main>
</div>
<?php get_footer();