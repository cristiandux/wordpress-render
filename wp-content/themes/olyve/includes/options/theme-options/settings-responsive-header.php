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
		'title'      => esc_html__( 'Responsive Header', 'olyve' ),
		'id'         => 'olyve_resp_header_settings',
        'icon'       => 'dashicons dashicons-table-row-after',
		'subsection' => false,
		'fields'     => array(
            
            array(
				'id'    => 'olyve_info_resp_header',
				'type'  => 'info',
                'title' => esc_html__( 'Header For Small Screens', 'olyve' ),
			), 
            array(
				'id'       => 'olyve_resp_header_bg_color',
				'type'     => 'background',
				'output'   => array(
					'background-color' => '#dtr-responsive-header',
				),
				'title'    => esc_html__( 'Background', 'olyve' ),
			),
            array(
				'id'          => 'olyve_resp_header_hamburger_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Hamburger Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-hamburger-lines, .dtr-hamburger-lines:after, .dtr-hamburger-lines:before',
				),
			),
            array(
				'id'          => 'olyve_resp_menu_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Drop Menu Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.slicknav_nav, .slicknav_menu',
				),
			),
            array(
				'id'          => 'olyve_resp_menu_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '#dtr-responsive-header, .slicknav_nav li',
				),
			),
            array(
				'id'    => 'olyve_info_resp_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Typography', 'olyve' ),
			), 
            array(
				'id'                => 'olyve_resp_menu_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Font', 'olyve' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
				'letter-spacing'    => true, 
                'font-size'         => true,
                'line-height'       => true,
                'units'             => 'px',
				'output'            => array( '.slicknav_nav, .slicknav_nav a, .slicknav_menu .slicknav_menutxt, .slicknav_menu .current-menu-item .sub-menu a' ),
			),   
            array(
				'id'          => 'olyve_resp_menu_hover',
				'type'        => 'color',
				'title'       => esc_html__( 'Link Hover / Active Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.slicknav_nav a:hover, .slicknav_menu .current-menu-item a, .slicknav_menu .current-menu-item .sub-menu a:hover, .slicknav_nav .slicknav_row:hover, .slicknav_nav .slicknav_row:hover a',
				),
			),               
            array(
				'id'          => 'olyve_resp_menu_link_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Link Border Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.slicknav_nav li, .slicknav_nav .sub-menu',
				),
			),            
            array(
				'id'          => 'olyve_resp_menu_arrow_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Arrow Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.slicknav_arrow',
				),
			),          
            array(
				'id'          => 'olyve_resp_menu_arrow_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Arrow Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.slicknav_arrow',
				),
			),
                                       
        ),
	)
);