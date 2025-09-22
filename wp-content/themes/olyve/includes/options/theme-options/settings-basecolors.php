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
		'title'      => esc_html__( 'Theme Base Colors', 'olyve' ),
		'id'         => 'olyve_themebase_colors',
        'icon'       => 'dashicons dashicons-admin-appearance',
		'desc'       => '',
		'subsection' => false,
		'fields'     => array(     
            array(
				'id'    => 'olyve_info_main_base_colors',
				'type'  => 'info',
                'title' => esc_html__( 'Main Base Colors', 'olyve' ),
                'subtitle' => esc_html__( 'Used for backgrounds', 'olyve' ),
			),
            // color one
            array(
                'id'                => 'olyve_base_color_primary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Primary', 'olyve' ),
                'desc'              => esc_html__( 'Themes widely used color - for body background etc.', 'olyve' ),
                'options'       => array(
                    'show_buttons' => false,
                ),      
                'validate'          => 'color',
                'transparent'       => false,     
            ),
            // color two
            array(
                'id'                => 'olyve_base_color_secondary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Secondary', 'olyve' ),
                'desc'              => esc_html__( 'Mostly used for - elements backgrounds - to differentiate from body background.', 'olyve' ),
                'options'           => array(
                    'show_buttons'  => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,     
            ),
           array(
				'id'       => 'olyve_info_sub_base_colors',
				'type'     => 'info',
                'title'    => esc_html__( 'Gradient Colors', 'olyve' ),
                'subtitle' => esc_html__( 'Gradient which is used for buttons, theme headings element and some minor elements', 'olyve' ),
			),
            // color three
            array(
                'id'                => 'olyve_base_color_tertiary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Gradient Start Color', 'olyve' ),
                'options'           => array(
                    'show_buttons' => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,     
            ),
            // color four
            array(
                'id'                => 'olyve_base_color_quaternary',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Gradient End Color', 'olyve' ),
                'options'           => array(
                    'show_buttons' => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,     
            ),
            array(
				'id'       => 'olyve_info_border_colors',
				'type'     => 'info',
                'title'    => esc_html__( 'Common Border Color', 'olyve' ),
			),
            array(
                'id'                => 'olyve_borders_color',
                'type'              => 'color_rgba',
                'title'             => esc_html__( 'Main Border Color', 'olyve' ),
                'options'       => array(
                    'show_buttons' => false,
                ),
                'validate'          => 'color',
                'transparent'       => false,     
            ),
             array(
				'id'       => 'olyve_info_common_text_colors',
				'type'     => 'info',
                'title'    => esc_html__( 'Basic Text Colors', 'olyve' ),
                'subtitle' => esc_html__( 'If needed, can be overridden individually for body, headings, links etc. in respective section.', 'olyve' ),
			),
            array(
				'id'          => 'olyve_text_color_one',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - One', 'olyve' ),
                'subtitle'    => esc_html__( 'Mostly used for body text', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_text_color_two',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - Two', 'olyve' ),
                'subtitle'    => esc_html__( 'Mostly used for headings', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_text_color_three',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - Three', 'olyve' ),
                'subtitle'    => esc_html__( 'Used for default link, in very few instances for headings', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_text_color_four',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color - Four', 'olyve' ),
                'subtitle'    => esc_html__( 'Mostly used for text on contrast backgrounds', 'olyve' ),
				'default'     => '',
				'transparent' => false,
				'validate'    => 'color',
			),
            // ends
		),
	)
);