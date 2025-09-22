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
		'title'      => esc_html__( 'Search Settings', 'olyve' ),
		'id'         => 'olyve_search_settings',
        'icon'       => 'dashicons dashicons-search',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'       => 'olyve_search_form_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Form Field Text', 'olyve' ),
				'default'  => esc_html__('Search...', 'olyve'),
			),   
            array(
				'id'       => 'olyve_search_modal_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Modal Search Title', 'olyve' ),
				'default'  => esc_html__('What you are looking for?', 'olyve'),
			),  
        ),
	)
);