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
		'title'      => esc_html__( 'Scroll Top', 'olyve' ),
		'id'         => 'olyve_scroll_top_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(         
             array(
				'id'       => 'olyve_enable_scroll_top',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Scroll to Top', 'olyve' ),
				'default'  => false,
			 ), 
             array(
				'id'       => 'olyve_enable_mobile_scroll_top',
				'type'     => 'select',
				'title'    => esc_html__( 'Scroll To Top on Small Screens', 'olyve' ),
				'options'  => array(
                'show'              => esc_html__( 'Show', 'olyve' ),
		        'd-none d-lg-block' => esc_html__( 'Hide', 'olyve' ),
				),
				'default'  => 'show',
			),  
            array(
				'id'          => 'olyve_scroll_top_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '#take-to-top',
				),
			),      
            array(
				'id'          => 'olyve_scroll_top_hover_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'On Hover: Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '#take-to-top:hover',
				),
			),        
            array(
				'id'       => 'olyve_scroll_top_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '#take-to-top' ),
			),
            
        ),
	)
);