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
		'title'      => esc_html__( 'Single Post', 'olyve' ),
		'id'         => 'olyve_blog_single_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(                    
            array(
                'id'   => 'olyve_info_single_post_layout',
                'type' => 'info',
                'title'    => esc_html__( 'Single Post Layout', 'olyve' ),
                'subtitle' => esc_html__( 'Change only if some other layout is required for all single posts', 'olyve' ),
            ),
            // page layout
            array(
                'id'       => 'olyve_single_post_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Change Layout', 'olyve' ),
                'subtitle' => esc_html__( 'If need different layout just for any specific post(s), can be done in the settings of respective post.', 'olyve' ),
                'options'  => array(
                    'dtr-fullwidth'  => array(
                        'alt' => esc_html__( 'Full Width', 'olyve' ),
                        'img' => get_template_directory_uri() . '/assets/images/full-width.png',
                    ),
                    'dtr-right-sidebar'  => array(
                        'alt' => esc_html__( 'Right Sidebar', 'olyve' ),
                        'img' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
                    ),
                    'dtr-left-sidebar'  => array(
                        'alt' => esc_html__( 'Left Sidebar', 'olyve' ),
                        'img' => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                    ),
                   
                ),
                'default' => 'dtr-right-sidebar',
            ),        
            array(
                'id'   => 'olyve_info_single_enable_elements',
                'type' => 'info',
                'title'    => esc_html__( 'Enable / Disable Elements', 'olyve' ),
            ),
            array(
                'id'       => 'olyve_single_image_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Featured Image', 'olyve' ),
                'default'  => true, 
            ), 
            array(
                'id'       => 'olyve_single_image_corner',
                'type'     => 'select',
                'title'    => esc_html__( 'Featured Image Corners', 'olyve' ),
                'options'  => array(
                    'dtr-radius--rounded'   => esc_html__( 'Rounded Corners', 'olyve' ),
                    ''	 				    => esc_html__( 'Default', 'olyve' ),
                ),
                'default'  => 'dtr-radius--rounded',
            ),
            array(
                'id'       => 'olyve_single_date_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Date', 'olyve' ),
                'default'  => true, 
            ), 
            array(
                'id'       => 'olyve_single_author_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Author', 'olyve' ),
                'default'  => true, 
            ), 
            array(
                'id'       => 'olyve_single_category_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Category', 'olyve' ),
                'default'  => true, 
            ), 
            array(
                'id'       => 'olyve_single_comment_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Comment Number', 'olyve' ),
                'default'  => true, 
            ), 
            array(
                'id'       => 'olyve_single_tags_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Tags', 'olyve' ),
                'default'  => true, 
            ), 
            array(
				'id'       => 'olyve_date_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Date Title', 'olyve' ),
				'default'  => esc_html__( '', 'olyve' ),
			),     
            array(
				'id'       => 'olyve_tags_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Tags Title', 'olyve' ),
				'default'  => esc_html__( '', 'olyve' ),
			),     
            array(
				'id'       => 'olyve_author_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Author Title', 'olyve' ),
				'default'  => esc_html__( '', 'olyve' ),
			),  
            array(
                'id'   => 'olyve_info_social_share',
                'type' => 'info',
                'title'    => esc_html__( 'Social Share', 'olyve' ),
            ), 
            array(
                'id'       => 'olyve_social_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Share', 'olyve' ),
                'default'  => true, 
            ),   
            array(
				'id'       => 'olyve_share_title_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Share Title', 'olyve' ),
				'default'  => esc_html__( '', 'olyve' ),
			),
            array(
                'id'       => 'olyve_twitter_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Twitter in Share', 'olyve' ),
                'default'  => true, 
            ),  
            array(
				'id'       => 'olyve_twitter_handle_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Handle Text', 'olyve' ),
				'default'  => '',
			), 
            array(
                'id'       => 'olyve_facebook_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Facebook in Share', 'olyve' ),
                'default'  => true, 
            ),  
            array(
                'id'       => 'olyve_pinterest_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Pinterest in Share', 'olyve' ),
                'default'  => true, 
            ),  
            array(
                'id'       => 'olyve_googleplus_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Google in Share', 'olyve' ),
                'default'  => false, 
            ),  
            array(
                'id'       => 'olyve_linkedin_share_enable',
                'type'     => 'switch',
                'title'    => esc_html__( 'Linkedin in Share', 'olyve' ),
                'default'  => false, 
            ),  

		),
	)
);