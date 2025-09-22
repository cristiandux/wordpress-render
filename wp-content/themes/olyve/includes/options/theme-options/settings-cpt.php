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
		'title'      => esc_html__( 'Custom Post Types', 'olyve' ),
		'id'         => 'olyve_cpt_settings',
        'icon'       => 'dashicons dashicons-admin-page',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'    => 'olyve_info_portfolio_cpt',
				'type'  => 'info',
                'title' => esc_html__( 'Portfolio Post', 'olyve' ),
			), 
            array(
				'id'       => 'olyve_portfolio_single_image',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Featured Image', 'olyve' ),
				'default'  => true, 
			),
            array(
				'id'       => 'olyve_portfolio_slug_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Post Slug', 'olyve' ),
                'subtitle' => wp_kses( __('This will be reflected in post URL text.<br>On change it may give 404 error for portfolio posts.<br><br>Flushing permalinks will make it work<br>(Re-save the permalink structure under : WP Admin Menu / Settings / Permalink)', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
				'default'  => esc_html__('portfolio', 'olyve'),
			),   
            array(
				'id'    => 'olyve_info_testimonial_cpt',
				'type'  => 'info',
                'title' => esc_html__( 'Testimonial Post', 'olyve' ),
			), 
            array(
				'id'       => 'olyve_testimonial_single_image',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Featured Image', 'olyve' ),
				'default'  => true, 
			),
            array(
				'id'       => 'olyve_testimonial_slug_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Testimonial Post Slug', 'olyve' ),
                'subtitle' => wp_kses( __('This will be reflected in post URL text.<br>On change it may give 404 error for portfolio posts.<br><br>Flushing permalinks will make it work<br>(Re-save the permalink structure under : WP Admin Menu / Settings / Permalink)', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
				'default'  => esc_html__('testimonial', 'olyve'),
			),   

        ),
	)
);