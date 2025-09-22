<?php
/**
 * Olyve Customizer
 *
 * @package OlyveTheme
 * @version 1.0.0
 */

/**
 * Customizer Mods
 */
function olyve_customizer_register( $wp_customize ) {
	
	// Remove core sections
	$wp_customize->remove_section( 'themes' );
	
	// Remove core controls
	$wp_customize->remove_control( 'header_textcolor' );

	// title_tagline section priority
	$wp_customize->add_section( 'title_tagline' , array(
		'title'		=> esc_html__( 'Site Identity', 'olyve' ),
		'priority'	=> 1,
	));
	
	// Logo type select field
	$wp_customize->add_setting( 'olyve_logo_type', array(
		'sanitize_callback' => 'olyve_sanitize_select',
  		'default' => 'olyve_text_logo',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'olyve_logo_type', array(
		'type' 		=> 'select',
		'section' 	=> 'title_tagline',
		'label'		=> esc_html__( 'Select Logo Type', 'olyve' ),
		'settings'	=> 'olyve_logo_type',
		'priority'	=> 1,
		'choices'	=> array(
			'olyve_img_logo' => esc_html__( 'Image Logo', 'olyve' ),
			'olyve_text_logo' => esc_html__( 'Text Logo', 'olyve' ),
			'olyve_site_title_logo' => esc_html__( 'Site Title', 'olyve' ),
		),
	) );
	
	// Logo Width
	$wp_customize->add_setting( 'olyve_logo_width', array(
		'default'      		=> '',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'olyve_logo_width_control',
            array(
                'label'      	=> esc_html__( 'Logo Width', 'olyve' ),
				'description'	=> esc_html__( 'Logo will resize as per width. Do not add unit.', 'olyve' ),
                'section'   	=> 'title_tagline',
                'settings'   	=> 'olyve_logo_width',
				'default'      	=> '',
                'priority'   	=> 8
            )
        )
    );
	
	// Logo Height
	$wp_customize->add_setting( 'olyve_logo_height', array(
		'default'      		=> '',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'olyve_logo_height_control',
            array(
                'label'      	=> esc_html__( 'Logo Height', 'olyve' ),
				'description'	=> esc_html__( 'Logo will resize as per width. Height is just to serve for height attribute criteria. Do not add unit.', 'olyve' ),
                'section'   	=> 'title_tagline',
                'settings'   	=> 'olyve_logo_height',
				'default'      	=> '',
                'priority'   	=> 8
            )
        )
    );
	
	// Alt logo
	$wp_customize->add_setting('olyve_alt_img_logo', array(
		'default'      		=> '',
		'sanitize_callback'	=> 'olyve_sanitize_image',
         'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
		) 
	);
    
	
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'olyve_alt_img_logo_control', 
			array(
        		'label' 		=> esc_html__('Alt Logo', 'olyve'),
				'description' 	=> esc_html__('Logo and Alt Logo will work for either for on-load header or on-scroll header as per header variation. Refresh window if not visible on customizer edit screen.', 'olyve'),
        		'section' 		=> 'title_tagline',
        		'settings'		=> 'olyve_alt_img_logo',
				'default'      	=> '',
				'priority' 	 	=> 8
    		)
		)
	);
	
	// Alt Logo Width
	$wp_customize->add_setting( 'olyve_alt_logo_width', array(
		'default'      		=> '',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'olyve_alt_logo_width_control',
            array(
                'label'      	=> esc_html__( 'Alt Logo Width', 'olyve' ),
				'description'	=> esc_html__( 'Logo will resize as per width. Do not add unit.', 'olyve' ),
                'section'   	=> 'title_tagline',
                'settings'   	=> 'olyve_alt_logo_width',
				'default'      	=> '',
                'priority'   	=> 8
            )
        )
    );
	
	// Alt Logo height
	$wp_customize->add_setting( 'olyve_alt_logo_height', array(
		'default'      		=> '',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'olyve_alt_logo_height_control',
            array(
                'label'      	=> esc_html__( 'Alt Logo Height', 'olyve' ),
				'description'	=> esc_html__( 'Logo will resize as per width. Height is just to serve for height attribute criteria. Do not add unit.', 'olyve' ),
                'section'   	=> 'title_tagline',
                'settings'   	=> 'olyve_alt_logo_height',
				'default'      	=> '',
                'priority'   	=> 8
            )
        )
    );
	
        
    // Text to image Logo
	$wp_customize->add_setting( 'olyve_logo_sub_text', array(
		'default'      		=> esc_html__( 'Olyve Schwarz', 'olyve' ),
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'olyve_logo_sub_text_control',
            array(
                'label'      	=> esc_html__( 'Text next to Image Logo', 'olyve' ),
				'description'	=> esc_html__( 'This is the text next to image logo.', 'olyve' ),
                'section'   	=> 'title_tagline',
                'settings'   	=> 'olyve_logo_sub_text',
				'default'      	=> esc_html__( 'Olyve Schwarz', 'olyve' ),
                'priority'   	=> 8
            )
        )
    );
    
	// Responsive 
	$wp_customize->add_setting( 'olyve_resp_logo_type', array(
		'sanitize_callback'	=> 'olyve_sanitize_select',
  		'default' 			=> 'olyve_resp_main_logo',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'olyve_resp_logo_type', array(
		'type' 			=> 'select',
		'section' 		=> 'title_tagline',
		'label'			=> esc_html__( 'Logo Image For - Responsive Header', 'olyve' ),
		'description'	=> esc_html__( 'You can choose any one of the - Logo & Alt Logo - for small screen headers', 'olyve' ),
		'settings'		=> 'olyve_resp_logo_type',
		'priority'		=> 8,
		'choices'		=> array(
			'olyve_resp_main_logo'	=> esc_html__( 'Logo', 'olyve' ),
			'olyve_resp_alt_logo' 	=> esc_html__( 'Alt Logo', 'olyve' ),
		),
	) );
	
	// Text Logo
	$wp_customize->add_setting( 'olyve_text_logo_text', array(
		'default'      		=> esc_html__( 'Logo', 'olyve' ),
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
        'type' => 'theme_mod', // or 'option'
  'capability' => 'edit_theme_options',
	));
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'olyve_text_logo_control',
            array(
                'label'      	=> esc_html__( 'Text for - Only text Logo (Without Image)', 'olyve' ),
				'description'	=> esc_html__( 'Use this if need logo text other than Site Title.', 'olyve' ),
                'section'   	=> 'title_tagline',
                'settings'   	=> 'olyve_text_logo_text',
				'default'      	=> esc_html__( 'Logo', 'olyve' ),
                'priority'   	=> 8
            )
        )
    );
	
	// background_image section
	$wp_customize->add_section( 'background_image' , array(
		'title'		=> esc_html__('Body background Image','olyve'),
		'priority'	=> 2,
	));
	// background_color section
	$wp_customize->add_section( 'colors' , array(
		'title'		=> esc_html__('Body background Color','olyve'),
		'priority'	=> 3,
	));
}
add_action( 'customize_register', 'olyve_customizer_register', 20 );
// customize_register

/**
 * Customizer css
 */
function olyve_panels_scripts() {
	wp_enqueue_style( 'customizer-style', get_template_directory_uri() . '/includes/customizer/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'olyve_panels_scripts' );