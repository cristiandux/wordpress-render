<?php
/**
 * Include and setup custom metaboxes and fields.
 */
add_action( 'cmb2_admin_init', 'olyve_metaboxes' );
/**
 * Hook in and add a metabox
 */
function olyve_metaboxes() {
	
	// Prefix
	$prefix = '_olyve_';
	
	/**
	 * Testimonial Settings
	 */
	$olyve_testimonial_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'testimonial-settings-metabox',
		'title'         => esc_html__( 'Testimonial Settings', 'olyve' ),
		'object_types'  => array( 'dtr_testimonial' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );
	
    $olyve_testimonial_metabox->add_field( array(
		'name'	=> esc_html__( 'Client Name', 'olyve' ),
		'id'   	=> $prefix . 'testimonial_client_name',
		'type'	=> 'text',
	) );

    $olyve_testimonial_metabox->add_field( array(
		'name'	=> esc_html__( 'Client Designation', 'olyve' ),
		'id'   	=> $prefix . 'testimonial_client_designation',
		'type'	=> 'text',
	) );
   
	// Page Layout
	$page_layout = array(
		'' 					=> esc_html__( 'Default', 'olyve' ),
		'dtr-fullwidth'		=> esc_html__( 'No Sidebar', 'olyve' ),
		'dtr-right-sidebar'	=> esc_html__( 'Right Sidebar', 'olyve' ),
		'dtr-left-sidebar' 	=> esc_html__( 'Left Sidebar', 'olyve' ),
	);
	
	// Page Header Background image styles
	$page_header_bg_image_style = array(
		'repeat'	=> esc_html__( 'Repeat', 'olyve' ),
		'stretched'	=> esc_html__( 'Stretched', 'olyve' ),
		'fixed'		=> esc_html__( 'Fixed', 'olyve' ),
	);

	/**
	 * Page Settings
	 */   
	$olyve_page_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'page-settings-metabox',
		'title'         => esc_html__( 'Page Settings', 'olyve' ),
		'object_types'  => array( 'page', 'post' ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
	) );

	$olyve_page_metabox->add_field( array(
		'id'   		=> $prefix . 'page_layout_meta',
		'name' 		=> esc_html__( 'Sidebar Position', 'olyve' ),
		'type' 		=> 'select',
		'options'	=> $page_layout,
	) );

	/**
	 * Page Header
	 */
	$olyve_page_header_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'page-header-metabox',
		'title'         => esc_html__( 'Page Title Section Style', 'olyve' ),
		'object_types'	=> array( 'page', 'post' ), // Post type
		'context'    	=> 'normal',
		'priority'   	=> 'high',
	) );
	
	$olyve_page_header_metabox->add_field( array(
		'name' => esc_html__( 'Page Title Background Image - Upload or enter URL', 'olyve' ),
		'id'   =>  $prefix . 'page_header_bg_image',
		'type' => 'file',
	) );

	$olyve_page_header_metabox->add_field( array(
		'id'   		=> $prefix . 'page_header_bg_image_style',
		'name' 		=> esc_html__( 'Page Title Background Style', 'olyve' ),
		'type' 		=> 'select',
		'options'	=> $page_header_bg_image_style,
	) );
    
    /**
	 * Portfolio
	 */
	$olyve_portfolio_post_metabox = new_cmb2_box( array(
		'id'            => $prefix . 'portfolio-post-metabox',
		'title'         => esc_html__( 'Portfolio Grid Settings', 'olyve' ),
		'object_types'	=> array( 'dtr_portfolio' ), // Post type
		'context'    	=> 'side',
		'priority'   	=> 'high',
	) );
    
   $olyve_portfolio_post_metabox->add_field( array(
		'desc'  =>  wp_kses( __( 'Title is used as ID to recognize respective Portfolio item. <br>ID for Portfolio item is <strong> Slug </strong> of that item post means === Title as viewed in permalink.<br>This ID will show individual portfolio item via - Portfolio Single Item - element of Page Builder', 'olyve'), array( 'br' => array(), 'strong' => array(), 'i' => array(), ) ),
		'id'   	=> $prefix . 'testimonial_shorthand',
		'type' 	=> 'title',
	) );
    
    	
	$olyve_portfolio_post_metabox->add_field( array(
		'name'	=> esc_html__( 'Short Info', 'olyve' ),
		'desc'  => __('Will be displayed on - Portfolio Element - via Page Builder', 'olyve'),
		'id'   	=> $prefix . 'portfolio_subheading',
		'type'	=> 'text',
	) );
    
	$olyve_portfolio_post_metabox->add_field( array(
		'name'	=> esc_html__( 'If - Link to Heading in Portfolio Element - Needs to be External - Other than its linked single post', 'olyve' ),
		'desc'  => __('Give link here', 'olyve'),
		'id'   	=> $prefix . 'portfolio_external_link_url',
		'type'	=> 'text',
	) );

} // olyve_metaboxes