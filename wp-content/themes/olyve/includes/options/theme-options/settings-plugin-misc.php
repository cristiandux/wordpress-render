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
		'title'      => esc_html__( 'Plugin Misc Settings', 'olyve' ),
		'id'         => 'olyve_plugin_misc_settings',
        'icon'       => 'dashicons dashicons-admin-plugins',
		'subsection' => false,
		'fields'     => array(
            array(
				'id'    => 'olyve_info_elementor_override',
				'type'  => 'info',
                'style'  => 'success',
                'title' => esc_html__( 'Below settings do not need to any alteration...except in very rare cases. Keep as it is :)', 'olyve' ),
			), 
            array(
				'id'    => 'olyve_info_elementor_default_settings',
				'type'  => 'info',
                'title' => esc_html__( 'Elementor Settings', 'olyve' ),
			), 
            array(
				'id'       => 'olyve_set_elementor_settings',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Auto Set Elementor Default Settings', 'olyve' ),
                'subtitle' => esc_html__( 'We need to enable elementor manually for post types and disable it for default font and colors. These settings are set by default.', 'olyve' ),
                'default'  => true, 
		    ), 
            array(
				'id'    => 'olyve_info_elementor_default_settings',
				'type'  => 'info', 
                'style'  => 'success',
                'title' => esc_html__( 'Theme is built with Elementor Free Version, Paid version is not required to edit any theme element', 'olyve' ),
			), 
            array(
				'id'       => 'olyve_elementor_pro_mod',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Pro Version Elements in Locked state and Pro Advertise Banners - For Free Version', 'olyve' ),
                'subtitle' => esc_html__( 'Locked elements cannot be used with free version. So by default this is kept off.', 'olyve' ),
                'desc'     => esc_html__( 'If Elementor Pro is active then Pro elements will show up irrespective of this setting.', 'olyve' ),
				'default'  => false, 
			),
            /*array(
				'id'    => 'olyve_info_redux_fallback_settings',
				'type'  => 'info',
                'title' => esc_html__( 'Redux Fallback', 'olyve' ),
			), 
            array(
				'id'       => 'olyve_redux_fallback_settings',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Apply theme styles even if redux plugin is not installed', 'olyve' ),
                'default'  => true, 
		    ),*/
        ),
	)
);