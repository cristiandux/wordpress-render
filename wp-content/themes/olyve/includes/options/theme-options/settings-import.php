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
		'title'      => esc_html__( 'Demo Notification', 'olyve' ),
		'id'         => 'olyve_demo_import_settings',
        'icon'       => 'dashicons dashicons-admin-plugins',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'    => 'olyve_info_demo_import',
				'type'  => 'info',
                'title' => esc_html__( 'Notice to Import Demo Data and Demo Data Import Plugin Install', 'olyve' ),
                'subtitle' => wp_kses( __('If you are done with demo import. You can delete - One Click Demo Import - Plugin.<br><br>On removal of plugin it will keep giving notice to install plugin.<br>Switch that notice off here, as not required anymore.', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			), 
            array(
				'id'       => 'olyve_demo_import_notification_enable',
			    'type'     => 'switch',
                'title' => esc_html__( 'Demo Notice On/Off', 'olyve' ),
				'default'  => true, 
			),  
        ),
	)
);