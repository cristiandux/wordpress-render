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
		'title'      => esc_html__( 'Paginations', 'olyve' ),
		'id'         => 'olyve_paginations_settings',
        'icon'       => 'dashicons dashicons-ellipsis',
		'subsection' => false,
		'fields'     => array(  
        
            array(
				'id'       => 'olyve_blog_archive_pagination_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Archive Pages Pagination Style', 'olyve' ),
				'options'  => array(
					'numbered' 	=> esc_html__('Default - Numbered', 'olyve'),
		            'nextprev'	=> esc_html__('Prev / Next', 'olyve'),
				),
				'default'  => 'numbered',
			),
            
            array(
				'id'   => 'olyve_info_numbered_pager',
				'type' => 'info',
                'title'    => esc_html__( 'Numbered Pager', 'olyve' ),
			),
            array(
				'id'          => 'olyve_pager_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-nav__button a, .dtr-nav__button .current, .post-page-numbers',
				),
			),
            array(
				'id'          => 'olyve_pager_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-nav__button a, .dtr-nav__button .current, .post-page-numbers',
				),
			),
            array(
				'id'          => 'olyve_pager_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-nav__button a, .dtr-nav__button .current, .post-page-numbers',
				),
			),
            array(
				'id'   => 'olyve_info_prev_next_pager',
				'type' => 'info',
                'title'    => esc_html__( 'Arrow (Prev/Next) Pager', 'olyve' ),
			),
            array(
				'id'          => 'olyve_pager_arrows_bg_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Background Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'background-color' => '.dtr-nav__prev-button a, .dtr-single-nav-prev a::before, .dtr-nav__next-button a, .dtr-single-nav-next a::after',
				),
			),
            array(
				'id'          => 'olyve_pager_arrows_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Text Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'color' => '.dtr-nav__prev-button a, .dtr-single-nav-prev a::before, .dtr-nav__next-button a, .dtr-single-nav-next a::after',
				),
			),
            array(
				'id'          => 'olyve_pager_arrows_border_color',
				'type'        => 'color',
				'title'       => esc_html__( 'Border Color', 'olyve' ),
				'default'     => '',
				'transparent' => true,
				'validate'    => 'color',
				'output'      => array(
					'border-color' => '.dtr-nav__prev-button a, .dtr-single-nav-prev a::before, .dtr-nav__next-button a, .dtr-single-nav-next a::after',
				),
			),
            array(
				'id'   => 'olyve_info_pager_single_post',
				'type' => 'info',
                'title'    => esc_html__( 'Single Post Pagination', 'olyve' ),
			),
            array(
				'id'       => 'olyve_prev_nav_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Previous Nav Text', 'olyve' ),
				'default'  => esc_html__( 'Previous Post', 'olyve' ),
			),     
            array(
				'id'       => 'olyve_next_nav_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Next Nav Text', 'olyve' ),
				'default'  => esc_html__( 'Next Post', 'olyve' ),
			),     
            array(
				'id'                => 'olyve_single_post_nav_typo',
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
                'color'             => false,
				'output'            => array( '.dtr-single-nav-text a' ),
			),   
            array(
				'id'       => 'olyve_single_post_nav_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-single-nav-text a' ),
			),           
           
 
		),
	)
);