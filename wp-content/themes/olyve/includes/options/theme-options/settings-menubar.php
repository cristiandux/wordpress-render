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
		'title'      => esc_html__( 'Menu', 'olyve' ),
		'id'         => 'olyve_menu_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(
            array(
				'id'    => 'olyve_info_menu_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Main Menu - Font Settings', 'olyve' ),
			),  
            array(
				'id'                => 'olyve_menu_typo',
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
				'output'            => array( '.main-navigation .sf-menu li a' ),
			),   
            array(
				'id'    => 'olyve_info_menu_dropdown_typo',
				'type'  => 'info',
                'title' => esc_html__( 'Dropdown - Font Settings', 'olyve' ),
			),      
            array(
				'id'                => 'olyve_menu_dpd_typo',
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
				'output'            => array( '.main-navigation .sf-menu li li a' ),
			),   
            array(
				'id'    => 'olyve_info_default_menu_colors',
				'type'  => 'info',
                'title' => esc_html__( 'Default Menu Color Settings', 'olyve' ),
                'desc' =>  wp_kses( __('<strong>This is menu ---> on page load</strong>', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),    
            array(
				'id'       => 'olyve_default_menu_link_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Link colors', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-menu-default .sf-menu li a' ),
			),  
            array(
				'id'          => 'olyve_default_menu_active_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Active Link Color', 'olyve' ),
                'output'      => array( 
                    'color' => '.dtr-menu-default .sf-menu li.current-menu-item a, .dtr-menu-default .sf-menu li.current-menu-ancestor > a, .dtr-menu-default .sf-menu .active' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_default_menu_dpd_bg_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown - Background Color', 'olyve' ),
                'output'      => array(
					'background-color' => '.dtr-menu-default .sf-menu ul',
				),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_default_menu_dpd_border_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown - Border Color', 'olyve' ),
                'output'      => array(
					'border-color' => '.dtr-menu-default .sf-menu ul',
				),
				'transparent' => false,
				'validate'    => 'color',
			), 
            array(
				'id'          => 'olyve_default_menu_dpd_link_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Color', 'olyve' ),
                'output'      => array( 
                    'color' => '.dtr-menu-default .sf-menu li li a, .dtr-menu-default .sf-menu .sub-menu li.current-menu-item li a, .dtr-menu-default .sf-menu li.current-menu-item li a, .dtr-menu-default .sf-menu ul li.current-menu-item a, .dtr-menu-default .sf-menu li li.current-menu-ancestor > a:hover' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_default_menu_dpd_hover_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Hover / Active Color', 'olyve' ),
                'output'      => array( 
                    'color' => '.dtr-menu-default .sf-menu .sub-menu li.current-menu-item li a:hover, .dtr-menu-default .sf-menu .sub-menu li.current-menu-item a, .dtr-menu-default .sf-menu li li.current-menu-ancestor > a, .dtr-menu-default .sf-menu ul li a:hover, .dtr-menu-default .sf-menu ul li:hover > a, .dtr-menu-default .sf-menu ul li:hover > a::after, .dtr-menu-default .sf-menu > li li.menu-item-has-children a:hover' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            
             array(
				'id'          => 'olyve_default_menu_dpd_hoverbg_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Hover / Active Background Color', 'olyve' ),
                'output'      => array( 
                    'background-color' => '.dtr-menu-default .sf-menu .sub-menu li.current-menu-item li a:hover, .dtr-menu-default .sf-menu .sub-menu li.current-menu-item a, .dtr-menu-default .sf-menu li li.current-menu-ancestor > a, .dtr-menu-default .sf-menu ul li a:hover, .dtr-menu-default .sf-menu ul li:hover > a, .dtr-menu-default .sf-menu > li li.menu-item-has-children a:hover' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            
            // info
            array(
				'id'    => 'olyve_info_alt_menu_color_settings',
				'type'  => 'info',
                'title' => esc_html__( 'Alt Menu Color Settings', 'olyve' ),
                'desc' =>  wp_kses( __('<strong>This is menu ---> on page scroll</strong>', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),  
             array(
				'id'       => 'olyve_alt_menu_link_color',
				'type'     => 'link_color',
				'title'    => esc_html__( 'Link colors', 'olyve' ),
                'active'   => false, 
				'output'   => array( '.dtr-menu-alt .sf-menu li a' ),
			),  
            array(
				'id'          => 'olyve_alt_menu_active_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Active Link Color', 'olyve' ),
                'output'      => array( 
                    'color' => '.dtr-menu-alt .sf-menu li.current-menu-item a, .dtr-menu-alt .sf-menu li.current-menu-ancestor > a, .dtr-menu-alt .sf-menu .active' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_alt_menu_dpd_bg_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown - Background Color', 'olyve' ),
                'output'      => array(
					'background-color' => '.dtr-menu-alt .sf-menu ul',
				),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_alt_menu_dpd_border_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown - Border Color', 'olyve' ),
                'output'      => array(
					'border-color' => '.dtr-menu-alt .sf-menu ul',
				),
				'transparent' => false,
				'validate'    => 'color',
			), 
            array(
				'id'          => 'olyve_alt_menu_dpd_link_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Color', 'olyve' ),
                'output'      => array( 
                    'color' => '.dtr-menu-alt .sf-menu li li a, .dtr-menu-alt .sf-menu .sub-menu li.current-menu-item li a, .dtr-menu-alt .sf-menu li.current-menu-item li a, .dtr-menu-alt .sf-menu ul li.current-menu-item a, .dtr-menu-alt .sf-menu li li.current-menu-ancestor > a:hover' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_alt_menu_dpd_hover_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Hover / Active Color', 'olyve' ),
                'output'      => array( 
                    'color' => '.dtr-menu-alt .sf-menu .sub-menu li.current-menu-item li a:hover, .dtr-menu-alt .sf-menu .sub-menu li.current-menu-item a, .dtr-menu-alt .sf-menu li li.current-menu-ancestor > a, .dtr-menu-alt .sf-menu ul li a:hover, .dtr-menu-alt .sf-menu ul li:hover > a, .dtr-menu-alt .sf-menu ul li:hover > a::after, .dtr-menu-alt .sf-menu > li li.menu-item-has-children a:hover' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),
            array(
				'id'          => 'olyve_alt_menu_dpd_hoverbg_color',
				'type'        => 'color',
                'title'       => esc_html__( 'Dropdown Link - Hover / Active Background Color', 'olyve' ),
                'output'      => array( 
                    'background-color' => '.dtr-menu-alt .sf-menu .sub-menu li.current-menu-item li a:hover, .dtr-menu-alt .sf-menu .sub-menu li.current-menu-item a, .dtr-menu-alt .sf-menu li li.current-menu-ancestor > a, .dtr-menu-alt .sf-menu ul li a:hover, .dtr-menu-alt .sf-menu ul li:hover > a, .dtr-menu-alt .sf-menu > li li.menu-item-has-children a:hover' 
                 ),
				'transparent' => false,
				'validate'    => 'color',
			),

        ),
	)
);