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
		'id'         => 'olyve_footer_general_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'olyve_footer_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Footer Section', 'olyve' ),
				'default'  => false, 
			),
            array(
				'id'   => 'olyve_info_main_footer_row',
				'type' => 'info',
                'title'    => esc_html__( 'Main Footer Columns Row', 'olyve' ),
			),
            array(
				'id'       => 'olyve_footer_columns_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Main Footer Columns Row', 'olyve' ),
				'default'  => false, 
			),
            array(
				'id'       => 'olyve_footer_columns',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Columns', 'olyve' ),
				'options'  => array(
                    '1'	=> esc_html__( 'Single Column', 'olyve' ),
		            '2'	=> esc_html__( 'Two Equal Columns', 'olyve' ),
		            '3'	=> esc_html__( 'Three Equal Columns', 'olyve' ),
                    '4'	=> esc_html__( 'Four Equal Columns', 'olyve' ),
                    '5'	=> esc_html__( '6 + 3 + 3', 'olyve' ),
                    '6'	=> esc_html__( '3 + 6 + 3', 'olyve' ),
                    '7'	=> esc_html__( '4 + 5 + 3', 'olyve' ),
                    '8'	=> esc_html__( '2 + 4 + 3 + 3', 'olyve' ),
				),
				'default'  => '4',
			),
            array(
				'id'            => 'olyve_footer_main_padding',
				'type'          => 'spacing',
                'title'         => esc_html__( 'Padding', 'olyve' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,  
                'left'          => false,  
				'display_units' => true,
				'output'        => array( '.dtr-footer-row' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
            array(
				'id'   => 'olyve_info_copyright_row',
				'type' => 'info',
                'title'    => esc_html__( 'Copyright Settings', 'olyve' ),
			),
            array(
				'id'       => 'olyve_copyright_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Copyright', 'olyve' ),
				'default'  => true, 
			),
            array(
				'id'            => 'olyve_copyright_padding',
				'type'          => 'spacing',
                'title'         => esc_html__( 'Padding', 'olyve' ),
				'mode'          => 'padding',
				'all'           => false,
				'units'         => array('px','em'),
                'units_extended' => false,
                'right'         => false,  
                'left'          => false,  
				'display_units' => true,
				'output'        => array( '.dtr-copyright__content' ),
				'default'       => array(
					'units'          => 'px',
				),
			),
		),
	)
);