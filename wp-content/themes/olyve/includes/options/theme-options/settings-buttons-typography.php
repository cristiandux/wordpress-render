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
		'title'      => esc_html__( 'Links / Buttons Typography', 'olyve' ),
		'id'         => 'olyve_button_typography_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            // links
            array(
				'id'    => 'olyve_info_link_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Text Link', 'olyve' ),
			),  
            array(
				'id'       => 'olyve_default_link_color',
				'type'     => 'link_color',
				'title'    => '',
                'active'   => false, 
				'output'   => array( 'a' ),
			),
             // buttons
            array(
				'id'       => 'olyve_info_button_typo',
				'type'     => 'info',
                'title'    => esc_html__( 'Buttons Typography', 'olyve' ),
			),  
            array(
				'id'                => 'olyve_button_typo',
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
				'output'            => array( '.dtr-btn, button, .wp-block-button__link, .dtr-form-btn, .dtr-form .dtr-btn, input[type="submit"], input[type="reset"], button[type="submit"], #submit' ),
			),
            array(
				'id'       => 'olyve_button_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Font Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-btn, button, .wp-block-button__link, .dtr-form-btn, .dtr-form .dtr-btn, input[type="submit"], input[type="reset"], button[type="submit"], #submit' ),
			),

		),
	)
);