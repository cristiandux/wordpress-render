<?php
/**
 * Redux Settings
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

Redux::set_section(
	$opt_name,
	array(
		'title'      => esc_html__( 'Widgets Styles', 'olyve' ),
		'id'         => 'olyve_widgets_settings',
        'icon'       => 'dashicons dashicons-text',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'          => 'olyve_sidebar_widget_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-widget-area',
				),
			),
            array(
				'id'       => 'olyve_sidebar_widget_link',
				'type'     => 'link_color',
				'title'    => '',
                'active'   => false, 
				'output'   => array( '.dtr-widget-area a' ),
			),
            array(
				'id'          => 'olyve_sidebar_arwidgets_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Bottom To Archive Widget', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-bottom-color' => '.wp-block-archives-list li, .wp-block-latest-comments li',
				),
			),           
            array(
				'id'                => 'olyve_latest_post_heading_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Latest Post Widget : Post Title', 'olyve' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
                'color'             => true,
				'letter-spacing'    => true, 
                'units'             => 'px',
				'output'            => array( '.wp-block-latest-posts li' ),
			),
            array(
				'id'                => 'olyve_archive_category_widget_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Archive / Category Widget', 'olyve' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
                'color'             => true,
				'letter-spacing'    => true, 
                'units'             => 'px',
				'output'            => array( '.wp-block-categories-list a, .wp-block-archives-list a' ),
			),
            array(
				'id'                => 'olyve_nav_menu_widget',
				'type'              => 'typography',
				'title'             => esc_html__( 'Navigation Menu Widget in Sidebar', 'olyve' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
                'color'             => false,
				'letter-spacing'    => true, 
                'units'             => 'px',
				'output'            => array( '#dtr-secondary-section .widget_nav_menu a, .elementor-widget-wp-widget-nav_menu a' ),
			),
            array(
				'id'    => 'olyve_info_sidebar_widgets_styles',
				'type'  => 'info',
                'title' => esc_html__( 'For Widgets in Page / Post Sidebar Only', 'olyve' ),
			), 
            array(
				'id'          => 'olyve_general_sidebar_heading_Color',
				'type'        => 'color',
				'title'       => esc_html__( 'Heading in Sidebar', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-widget-area .wp-block-heading',
				),
			),
            array(
				'id'          => 'olyve_latest_post_heading_Color',
				'type'        => 'color',
				'title'       => esc_html__( 'Latest Post Widget : Post Title Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-widget-area .wp-block-latest-posts a',
				),
			),
            array(
				'id'          => 'olyve_archive_category_widget_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Archive / Category Widget - Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-widget-area .wp-block-categories-list a, .dtr-widget-area .wp-block-archives-list a',
				),
			),
            array(
				'id'          => 'olyve_archive_category_widget_hover_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Archive / Category Widget - Hover Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-widget-area .wp-block-categories-list li:hover a, .dtr-widget-area .wp-block-archives-list li:hover a',
				),
			),
            array(
				'id'    => 'olyve_info_social_widget',
				'type'  => 'info',
                'title' => esc_html__( 'Social Icons Widget', 'olyve' ),
                'subtitle' => esc_html__( 'Color Scheme For Light Backgrounds. Applicable for - Circle and Square style.', 'olyve' ),
			), 
            array(
				'id'          => 'olyve_social_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-widget-dark .dtr-social-with-bg .dtr-social li a',
				),
			),
            array(
				'id'       => 'olyve_social_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-widget-dark .dtr-social-with-bg .dtr-social li a' ),
			),
            array(
				'id'          => 'olyve_social_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-widget-dark .dtr-social-with-bg .dtr-social li a',
				),
			),
            array(
				'id'    => 'olyve_info_social_dark_widget',
				'type'  => 'info',
                'title' => esc_html__( 'Social Icons Widget', 'olyve' ),
                'subtitle' => esc_html__( 'Color Scheme For Dark Backgrounds. Applicable for - Circle and Square style.', 'olyve' ),
			), 
            array(
				'id'          => 'olyve_dark_social_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-widget-light .dtr-social-with-bg .dtr-social li a',
				),
			),
            array(
				'id'       => 'olyve_dark_social_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-widget-light .dtr-social-with-bg .dtr-social li a' ),
			),
            array(
				'id'          => 'olyve_dark_social_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-widget-light .dtr-social-with-bg .dtr-social li a',
				),
			),
            array(
				'id'    => 'olyve_info_sidebar_group',
				'type'  => 'info',
                'title' => esc_html__( 'Widget Gruop In Sidebar', 'olyve' ),
			), 
             array(
				'id'       => 'olyve_enable_widget_group_style',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Enable Style to Group in Sidebar', 'olyve' ),
				'default'  => true, 
			),
            array(
				'id'          => 'olyve_group_widgets_border_Color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color - For Group', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-widget-area .wp-block-group',
				),
			),
		),
	)
);