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
		'title'      => esc_html__( 'Align / On / Off', 'olyve' ),
		'id'         => 'olyve_pagetitle_misc_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'olyve_info_pagetitle_align',
				'type'  => 'info',
                'title' => esc_html__( 'Text Align', 'olyve' ),
			),
            array(
				'id'       => 'olyve_page_title_section_align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Align', 'olyve' ),
				'options'  => array(
					'text-left'   => esc_html__( 'Left', 'olyve' ),
					'text-right'  =>  esc_html__( 'Right', 'olyve' ),
                    'text-center' => esc_html__( 'Center', 'olyve' ),
				),
				'default'  => 'text-center',
			),           
            array(
				'id'    => 'olyve_info_pagetitle_pages',
				'type'  => 'info',
                'title' => esc_html__( 'For Pages', 'olyve' ),
			),            
            array(
				'id'       => 'olyve_enable_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'olyve' ),
				'default'  => true,
			),            
            array(
				'id'       => 'olyve_enable_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'olyve' ),
				'default'  => true,
			),           
            array(
				'id'       => 'olyve_enable_page_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'olyve' ),
				'default'  => true,
			),
            
            array(
				'id'    => 'olyve_info_pagetitle_archives',
				'type'  => 'info',
                'title' => esc_html__( 'For Archives Pages', 'olyve' ),
			),
            array(
				'id'       => 'olyve_enable_archive_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'olyve' ),
				'default'  => true,
			),            
            array(
				'id'       => 'olyve_enable_archive_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'olyve' ),
				'default'  => true,
			),           
            array(
				'id'       => 'olyve_enable_archive_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'olyve' ),
				'default'  => true,
			),
            
            array(
				'id'    => 'olyve_info_pagetitle_posts',
				'type'  => 'info',
                'title' => esc_html__( 'For Single Posts', 'olyve' ),
			),
            array(
				'id'       => 'olyve_enable_single_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'olyve' ),
				'default'  => true,
			),            
            array(
				'id'       => 'olyve_enable_single_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'olyve' ),
				'default'  => true,
			),           
            array(
				'id'       => 'olyve_enable_single_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'olyve' ),
				'default'  => true,
			),
            
            array(
				'id'    => 'olyve_info_pagetitle_portfolio',
				'type'  => 'info',
                'title' => esc_html__( 'For Portfolio Single Post', 'olyve' ),
			),
            array(
				'id'       => 'olyve_enable_portfolio_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'olyve' ),
				'default'  => true,
			),            
            array(
				'id'       => 'olyve_enable_portfolio_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'olyve' ),
				'default'  => true,
			),           
            array(
				'id'       => 'olyve_enable_portfolio_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'olyve' ),
				'default'  => true,
			),
            array(
				'id'    => 'olyve_info_pagetitle_testimonial',
				'type'  => 'info',
                'title' => esc_html__( 'For Testimonial Single Post', 'olyve' ),
			),
            array(
				'id'       => 'olyve_enable_testimonial_pagetitle_section',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Complete Page Title Section', 'olyve' ),
				'default'  => true,
			),            
            array(
				'id'       => 'olyve_enable_testimonial_page_title',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Page Title Text', 'olyve' ),
				'default'  => true,
			),           
            array(
				'id'       => 'olyve_enable_testimonial_breadcrumb',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Breadcrumb', 'olyve' ),
				'default'  => true,
			),
        ),
	)
);