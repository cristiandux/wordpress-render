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
		'id'         => 'olyve_header_general_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            // info
            array(
				'id'    => 'olyve_info_header_layout',
				'type'  => 'info',
                'title' => esc_html__( 'Global - Default Header Layout', 'olyve' ),
				'desc'  => wp_kses( __('<strong>This will be applied all over the site</strong>', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),
            // layout
            array(
				'id'       => 'olyve_header_layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Change - Header Layout', 'olyve' ),
				'options'  => array(
                    'header-v1'	=> esc_html__( 'Style 1 - Classic', 'olyve' ),
		            'header-v2'	=> esc_html__( 'Style 2 - Left Menu', 'olyve' ),
		            'header-v3'	=> esc_html__( 'Style 3 - Top Fixed - Theme Default', 'olyve' ),
                    'header-v4'	=> esc_html__( 'Style 4', 'olyve' ),
				),
				'default'  => 'header-v1',
			),     
            // info
            array(
				'id'    => 'olyve_enable_header_elements',
				'type'  => 'info',
                'title' => esc_html__( 'Enable / Disable Header elements', 'olyve' ),
                'desc'  => wp_kses( __('Elements are - <strong>available / unavailable</strong> as per the - <strong>Header Variation - selected</strong>', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),       
            array(
				'id'       => 'olyve_header_menubar_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Menubar', 'olyve' ),
				'default'  => true,
			),
            array(
				'id'       => 'olyve_header_button_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Button in Header', 'olyve' ),
				'default'  => false,
			),
            array(
				'id'       => 'olyve_header_search_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Search Icon', 'olyve' ),
				'default'  => false,
			),
			array(
				'id'            => 'olyve_header_search_mleft',
				'type'          => 'spacing',
				'output'        => array( '.dtr-search-modal-trigger' ),
				'mode'          => 'margin',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'top'           => false,  
                'right'         => false,
                'bottom'        => false,  
				'display_units' => true,
				'title'         => esc_html__( 'Margin Left to Search Icon', 'olyve' ),
				'desc'          => esc_html__( 'Provide only if required, like in case hiding widget area.', 'olyve' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
            array(
				'id'       => 'olyve_topbar_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Topbar', 'olyve' ),
				'default'  => false,
			),
            array(
				'id'    => 'olyve_info_header_widgets',
				'type'  => 'info',
                'title'  => wp_kses( __('Header widgets will show up only if widgets are added in resp  widget area. Add widgets in respective widget area if required', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
                  'desc' => wp_kses( sprintf( __('<a href="%s" target="_blank">Click to add widgets</a>', 'olyve'), esc_url( admin_url( '/widgets.php' ) ) ), array( 'a' => array( 'href' => array(), 'class' => array(), 'target' => array() ), )),
			),   
            
            array(
				'id'       => 'olyve_header_widget_area_one_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Header Widget Area - One', 'olyve' ),
				'default'  => false,
			),
            array(
				'id'       => 'olyve_header_widget_area_two_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Header Widget Area - Two', 'olyve' ),
				'default'  => false,
			),
            array(
				'id'       => 'olyve_header_widget_area_three_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Header Widget Area - Three', 'olyve' ),
				'default'  => false,
			),
		),
	)
);