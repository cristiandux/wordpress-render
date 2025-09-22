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
		'title'      => esc_html__( 'Footer Styles', 'olyve' ),
		'id'         => 'olyve_footer_style_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(      
            array(
				'id'    => 'olyve_info_styles_footer',
				'type'  => 'info',
                'title' => esc_html__( 'Complete Footer Section', 'olyve' ),
		    ), 
            array(
				'id'       => 'olyve_footer_background',
				'type'     => 'background',
				'output'   => array(
					'background-color' => '.dtr-footer-section-wrap',
				),
				'title'    => esc_html__( 'Background', 'olyve' ),
			),
            array(
				'id'       => 'olyve_footer_border_top',
				'type'     => 'border',
				'title'    => esc_html__( 'Border Top', 'olyve' ),
				'output'   => array( '#dtr-footer-section' ),
                'all'      => false,
                'left'     => false,
                'top'      => true,
                'right'    => false,
                'bottom'   => false,
			),
            array(
				'id'    => 'olyve_info_styles_copyright',
				'type'  => 'info',
                'title' => esc_html__( 'Copyright', 'olyve' ),
		    ), 
             array(
				'id'          => 'olyve_copyright_background',
				'type'        => 'color_rgba',
				'title'       => esc_html__( 'Background', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
                'options'       => array(
                    'show_buttons' => false,
                ), 
				'output'      => array(
					'background-color' => '.dtr-copyright',
				),
			),
            array(
				'id'       => 'olyve_copyright_border_top',
				'type'     => 'border',
				'title'    => esc_html__( 'Border Top', 'olyve' ),
				'output'   => array( '.dtr-copyright__content' ),
                'all'      => false,
                'left'     => false,
                'top'      => true,
                'right'    => false,
                'bottom'   => false,
			),
        ),
	)
);