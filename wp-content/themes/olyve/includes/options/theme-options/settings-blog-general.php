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
		'title'      => esc_html__( 'Main Blog Page / Archives', 'olyve' ),
		'id'         => 'olyve_blog_general_settings',
        'icon'       => 'dashicons dashicons-arrow-right-alt',
		'subsection' => true,
		'fields'     => array(           
            array(
				'id'       => 'olyve_blog_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Page Title Text', 'olyve' ),
				'default'  => esc_html__( 'Blog', 'olyve' ),
			),                 
            // info
            array(
				'id'   => 'olyve_info_blog_page_layout',
				'type' => 'info',
                'title'    => esc_html__( 'Blog Main Page and Archives Pages Layout', 'olyve' ),
			),
            // page layout
            array(
                'id'       => 'olyve_blog_layout',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Change Layout', 'olyve' ),
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
				'id'   => 'olyve_info_blog_posts_layout',
				'type' => 'info',
                'title'    => esc_html__( 'Posts Layout Style', 'olyve' ),
				'desc' => wp_kses( __('Choose how posts are arranged on blog and archives pages', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
			),
             array(
				'id'       => 'olyve_blog_entry_style',
				'type'     => 'select',
				'title'    => esc_html__( 'Change - Posts Layout Style', 'olyve' ),
				'options'  => array(
					'dtr-blog-default' 				=> esc_html__('Default', 'olyve'),
		            'dtr-blog-grid-masonry'			=> esc_html__('Masonry Grid - 2 column', 'olyve'),
                    'dtr-blog-grid-fitrows'			=> esc_html__('Grid - 2 column', 'olyve'),
                    'dtr-blog-grid-masonry-3col'	=> esc_html__('Masonry Grid - 3 column', 'olyve'),
                    'dtr-blog-grid-fitrows-3col'    => esc_html__('Grid - 3 column', 'olyve'),
				),
				'default'  => 'dtr-blog-default',
			  ),
              array(
				'id'       => 'olyve_first_full_post_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Standard First Post', 'olyve' ),
				'default'  => false, 
			  ), 
              array(
				'id'   => 'olyve_info_blog_enable_elements',
				'type' => 'info',
                'title'    => esc_html__( 'Enable / Disable Elements', 'olyve' ),
                'subtitle' => esc_html__( 'Will work for elements on blog and archive pages. Settings for single posts are separate.', 'olyve' ),
			  ),
              array(
				'id'       => 'olyve_archive_image_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Featured Image', 'olyve' ),
				'default'  => true, 
			  ), 
              array(
				'id'       => 'olyve_archive_image_corner',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Corners', 'olyve' ),
				'options'  => array(
					'dtr-radius--rounded'    => esc_html__( 'Rounded Corners', 'olyve' ),
		            ''	 				            => esc_html__( 'Default', 'olyve' ),
				),
				'default'  => 'dtr-radius--rounded',
			  ),
              array(
				'id'       => 'olyve_blog_page_date_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Date', 'olyve' ),
				'default'  => true, 
			  ), 
              array(
				'id'       => 'olyve_blog_page_author_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Author', 'olyve' ),
				'default'  => true, 
			  ), 
              array(
				'id'       => 'olyve_blog_page_category_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Category', 'olyve' ),
				'default'  => true, 
			  ), 
              array(
				'id'       => 'olyve_blog_page_excerpt_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Excerpt', 'olyve' ),
				'default'  => true, 
			  ), 
              array(
				'id'       => 'olyve_get_archive_excerpt_length',
				'type'     => 'text',
				'title'    => esc_html__( 'Excerpt Length', 'olyve' ),
				'subtitle' => wp_kses( __('If excerpt is provided in excerpt box it will be displayed by default irrespective of excerpt length settings<br><br><strong>40 or any other number&nbsp;&nbsp;</strong> - To show that much words<br><strong>1&nbsp;&nbsp;&nbsp;&nbsp;</strong> - For complete post content<br><strong>999</strong> - For upto more tag - Default', 'olyve'), array( 'br' => array(), 'strong' => array(), ) ),
				'validate' => array( 'numeric' ),
				'default'  => '999',
			  ),
              array(
				'id'       => 'olyve_read_more_enable',
			    'type'     => 'switch',
				'title'    => esc_html__( 'Read more link', 'olyve' ),
				'default'  => true, 
			  ), 
              array(
				'id'       => 'olyve_read_more_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Read more link text', 'olyve' ),
				'default'  => esc_html__( 'Continue Reading', 'olyve' ),
			  ), 
 
		),
	)
);