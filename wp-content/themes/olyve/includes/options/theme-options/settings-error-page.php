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
		'title'      => esc_html__( '404 Page', 'olyve' ),
		'id'         => 'olyve_error_page_settings',
        'icon'       => 'dashicons dashicons-external',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'       => 'olyve_404_subtext',
				'type'     => 'text',
				'title'    => esc_html__( '404 Sub Text', 'olyve' ),
				'default'  => esc_html__('Oops...', 'olyve'),
			),   
            array(
				'id'       => 'olyve_404_text',
				'type'     => 'text',
				'title'    => esc_html__( '404 Text', 'olyve' ),
				'default'  => esc_html__('We are sorry, but something went wrong.', 'olyve'),
			),  
            array(
				'id'       => 'olyve_404_link_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Back to Home Link Text', 'olyve' ),
				'default'  => esc_html__('Back To Home', 'olyve'),
			),  
        ),
	)
);