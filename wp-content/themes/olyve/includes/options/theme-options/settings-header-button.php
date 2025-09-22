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
		'title'      => esc_html__( 'Button In Header', 'olyve' ),
		'id'         => 'olyve_header_button_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'olyve_header_btn_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Button Text', 'olyve' ),
				'default'  => esc_html__( 'Contact Us', 'olyve' ),
			),            
            array(
				'id'       => 'olyve_header_btn_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Link', 'olyve' ),
				'subtitle' => esc_html__( 'This must be a URL.', 'olyve' ),
				'default'  => '',
			 ),
            array(
				'id'       => 'olyve_header_button_target',
				'type'     => 'select',
				'title'    => esc_html__( 'Open link in', 'olyve' ),
				'options'  => array(
                'self'    => esc_html__( 'Same Window', 'olyve' ),
		        'blank'   => esc_html__( 'New Window', 'olyve' ),
				),
				'default'  => 'self',
			),  
             array(
				'id'    => 'olyve_info_headerbtn_style',
				'type'  => 'info',
                'title' => esc_html__( 'Button Style', 'olyve' ),
			),  
            array(
				'id'                => 'olyve_headerbtn_typo',
				'type'              => 'typography',
				'title'             => esc_html__( 'Font Settings', 'olyve' ),
				'google'            => true,
                'font-backup'       => true,
                'all-styles'        => true,
				'all-subsets'       => true,
                'text-align'        => false,
                'color'             => false,
				'letter-spacing'    => true, 
                'units'             => 'px',
				'output'            => array( '.dtr-header-btn' ),
			),
            array(
				'id'       => 'olyve_headerbtn_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Font Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-header-btn' ),
			),
            array(
				'id'          => 'olyve_headerbtn_bg',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-header-btn',
				),
			),

        ),
	)
);