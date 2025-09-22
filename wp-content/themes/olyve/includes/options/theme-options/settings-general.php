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
		'title'      => esc_html__( 'General Settings', 'olyve' ),
		'id'         => 'olyve_general_settings',
        'icon'       => 'el el-cogs',
		'subsection' => false,
		'fields'     => array(
            // info
            array(
				'id'   => 'olyve_info_page_padding',
				'type' => 'info',
                'title'    => '',
				'desc' => wp_kses( __('<strong>Keep these blank</strong> unless required to change theme defaults.', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // padding to pages
			array(
				'id'            => 'olyve_padding_pages',
				'type'          => 'spacing',
				'output'        => array( '#dtr-main-wrapper' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,  
                'left'          => false,  
				'display_units' => true,
				'title'         => esc_html__( 'Padding to Non Elementor Pages', 'olyve' ),
				'desc'          => esc_html__( 'This will work only for Non Eementor pages', 'olyve' ),
				'default'       => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				),
			),
            // padding to single posts
			array(
				'id'            => 'olyve_padding_posts',
				'type'          => 'spacing',
				'output'        => array( '.single.single-post #dtr-main-wrapper' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,  
                'left'          => false,  
				'display_units' => true,
				'title'         => esc_html__( 'Padding to Single Posts', 'olyve' ),
				'desc'          => esc_html__( 'This will work for single posts', 'olyve' ),
				'default'       => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				),
			),
            // padding to elementor posts
            array(
				'id'            => 'olyve_padding_elementor_posts',
				'type'          => 'spacing',
				'output'        => array( '.elementor-default.elementor-page.single-post #dtr-main-wrapper' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,  
                'left'          => false,  
				'display_units' => true,
				'title'         => esc_html__( 'Padding to Elementor Single Posts', 'olyve' ),
				'desc'          => esc_html__( 'This will work for single posts edited with elementor', 'olyve' ),
				'default'       => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				),
			), 
            // info
            array(
				'id'   => 'olyve_info_page_layout',
				'type' => 'info',
                'title'    => esc_html__( 'Global - Default Page Layout', 'olyve' ),
				'desc' => wp_kses( __('<strong>It is advisable to keep it default i.e. Full Width.</strong> Change only if some other layout is required all over the site.', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // page layout
            array(
                'id'       => 'olyve_page_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Change - Default Page Layout', 'olyve' ),
                'subtitle' => wp_kses( __('If need different layout just for any specific page(s), can be done in the settings of respective page.', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
 
                'options'  => array(
                    'dtr-fullwidth'  => array(
                        'alt' => esc_html__( 'Full Width', 'olyve' ),
                        'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                    ),
                    'dtr-right-sidebar'  => array(
                        'alt' => esc_html__( 'Right Sidebar', 'olyve' ),
                        'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                    ),
                    'dtr-left-sidebar'  => array(
                        'alt' => esc_html__( 'Left Sidebar', 'olyve' ),
                        'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                    ),
                   
                ),
                'default' => 'dtr-fullwidth',
            ),
            // info
            array(
				'id'   => 'olyve_info_page_misc',
				'type' => 'info',
                'title'    => esc_html__( 'Others', 'olyve' ),
			),
            // comments on pages
            array(
				'id'       => 'olyve_enable_page_comments',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Comments on pages', 'olyve' ),
				'default'  => true, 
			),
		),
	)
);