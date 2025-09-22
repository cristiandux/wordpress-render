<?php
/**
 * Registers widget areas.
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
if ( ! function_exists('olyve_widgets_init') ) {
	function olyve_widgets_init()  {
		
		// Blog Widgets
		register_sidebar( array(
			'name'          => esc_html__( 'Blog Sidebar', 'olyve' ),
			'id'            => 'widgets-blog',
			'description'   => esc_html__( 'This area will be shown as a post sidebar. Widgets will be stacked in this column.', 'olyve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		// Header Widget Area - One
        if ( olyve_get_theme_option( 'olyve_header_widget_area_one_enable', false ) == true ) {
            register_sidebar( array(
                'name'          => esc_html__( 'Header Widget Area-One', 'olyve' ),
                'id'            => 'widget-header-one',
                'description'   => esc_html__( 'Widgets in this column will appear for : All Header Variations in Main header row right side.', 'olyve' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );
        }
		
		// Header Widget Widget - Two
        if ( olyve_get_theme_option( 'olyve_header_widget_area_two_enable', false ) == true ) {
            register_sidebar( array(
                'name'          => esc_html__( 'Header Widget Area-Two', 'olyve' ),
                'id'            => 'widget-header-two',
                'description'   => esc_html__( 'Widgets in this column will appear in : For Header Variations 1 / 2 in Topbar left side, and For Header Variation 4 in main header right side.', 'olyve' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );
        }
		
		// Header Widget Widget - Three
        if ( olyve_get_theme_option( 'olyve_header_widget_area_three_enable', false ) == true ) {
            register_sidebar( array(
                'name'          => esc_html__( 'Header Widget Area-Three', 'olyve' ),
                'id'            => 'widget-header-three',
                'description'   => esc_html__( 'Widgets in this column will appear in : For Header Variations 1 / 2 in Topbar right side.', 'olyve' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );
        }

		// Footer column 1
        if ( olyve_get_theme_option( 'olyve_footer_columns_enable', false ) == true ) { 
            register_sidebar( array(
                'name'          => esc_html__( 'Footer - Column 1', 'olyve' ),
                'id'            => 'footer-column-1',
                'description'   => esc_html__( 'Widgets in this column will appear in first footer column.', 'olyve' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            ) );
        }
        
		// Footer column 2
        if ( olyve_get_theme_option( 'olyve_footer_columns_enable', false ) == true && olyve_get_theme_option( 'olyve_footer_columns', '4' ) != '1' ) { 
			register_sidebar( array(
				'name'          => esc_html__( 'Footer - Column 2', 'olyve' ),
				'id'            => 'footer-column-2',
				'description'   => esc_html__( 'Widgets in this column will appear in second footer column.', 'olyve' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		}
		
		// Footer column 3
		if ( olyve_get_theme_option( 'olyve_footer_columns_enable', false ) == true && olyve_get_theme_option( 'olyve_footer_columns', '4' ) != '1' && olyve_get_theme_option( 'olyve_footer_columns', '4' ) != '2' ) { 
			register_sidebar( array(
				'name'          => esc_html__( 'Footer - Column 3', 'olyve' ),
				'id'            => 'footer-column-3',
				'description'   => esc_html__( 'Widgets in this column will appear in third footer column.', 'olyve' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		} 
		// Footer column 4
		if ( olyve_get_theme_option( 'olyve_footer_columns_enable', false ) == true && olyve_get_theme_option( 'olyve_footer_columns', '4' ) == '4' || olyve_get_theme_option( 'olyve_footer_columns', '4' ) == '8' ) { 
			register_sidebar( array(
				'name'          => esc_html__( 'Footer - Column 4', 'olyve' ),
				'id'            => 'footer-column-4',
				'description'   => esc_html__( 'Widgets in this column will appear in fourth footer column.', 'olyve' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			) );
		}

		// Copyright column - One
		register_sidebar( array(
			'name'          => esc_html__( 'Copyright Column 1', 'olyve' ),
			'id'            => 'copyright-column-1',
			'description'   => esc_html__( 'Widgets in this column will appear in copyright section.', 'olyve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		// Page Widgets
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'olyve' ),
			'id'            => 'widgets-page',
			'description'   => esc_html__( 'This area will be shown as a page sidebar. Widgets will be stacked in this column.', 'olyve' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'olyve_widgets_init' );
}