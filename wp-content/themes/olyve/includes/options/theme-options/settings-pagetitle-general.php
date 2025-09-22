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
		'id'         => 'olyve_page_title_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'olyve_info_pagetitle_section_general',
				'type'  => 'info',
                'title' => esc_html__( 'Page Title Section Styles', 'olyve' ),
			),
            array(
				'id'       => 'olyve_page_title_background',
				'type'     => 'background',
				'output'   => array(
					'background-color' => '.dtr-page-title--section',
				),
				'title'    => esc_html__( 'Background', 'olyve' ),
			),
            array(
				'id'          => 'olyve_page_title_overlay_background',
				'type'        => 'color_rgba',
				'title'       => esc_html__( 'Overlay Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
                'options'       => array(
                    'show_buttons' => false,
                ),  
				'output'      => array(
					'background-color' => '.dtr-page-title__overlay',
				),
			),
            // spacings
			array(
				'id'            => 'olyve_page_title_padding',
				'type'          => 'spacing',
				'output'        => array( '.dtr-page-title--section' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,  
                'left'          => false,  
				'display_units' => true,
				'title'         => esc_html__( 'Padding - Top & Bottom', 'olyve' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
            //border
            array(
				'id'       => 'olyve_page_title_border',
				'type'     => 'border',
				'title'    => esc_html__( 'Border', 'olyve' ),
				'output'   => array( '.dtr-page-title--section' ),
                'all'      => false,
                'left'     => false,
                'top'      => true,
                'right'    => false,
                'bottom'   => true,
			), 
            array(
				'id'    => 'olyve_info_breadcrumb_general',
				'type'  => 'info',
                'title' => esc_html__( 'Breadcrumb', 'olyve' ),
			),
            array(
				'id'       => 'olyve_breadcrumb_plugin',
				'type'     => 'select',
				'title'    => esc_html__( 'Select Breadcrumb via which plugin', 'olyve' ),
				'options'  => array(
					'yoast-breadcrumb'  => esc_html__( 'Yoast SEO', 'olyve' ),
					'navxt-breadcrumb'  => esc_html__( 'Breadcrumb NavXT', 'olyve' ),
				),
				'default'  => 'yoast-breadcrumb',
			),   
            array(
				'id'            => 'olyve_breadcrumb_bottom_margin',
				'type'          => 'spacing',
				'output'        => array( '.dtr-breadcrumb-wrapper' ),
				'mode'          => 'margin',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'top'           => false,  
                'right'         => false,
                'bottom'        => true,  
                'right'         => false,
				'display_units' => true,
				'title'         => esc_html__( 'Margin Bottom', 'olyve' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
                     
        ),
	)
);