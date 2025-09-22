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
		'title'      => esc_html__( 'Search In Header', 'olyve' ),
		'id'         => 'olyve_header_search_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'       => 'olyve_header_search_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-search-modal-trigger' ),
			),           
            array(
				'id'    => 'olyve_info_headersearch_style',
				'type'  => 'info',
                'title' => esc_html__( 'Search Icon on - Header On Page Scroll', 'olyve' ),
			), 
           array(
				'id'       => 'olyve_stheader_search_color',
				'type'     => 'link_color',
                'title'    => esc_html__( 'Icon Color', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.header-fixed .dtr-search-modal-trigger' ),
			),            

        ),
	)
);