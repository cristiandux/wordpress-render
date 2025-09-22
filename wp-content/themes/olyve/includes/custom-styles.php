<?php 
/**
 * Custom styles through options panel
 *
 * @package OlyveTheme
 * @version 1.0.0
 */
if ( ! function_exists( 'olyve_custom_inline_styles' ) ) :
	function olyve_custom_inline_styles() {
		wp_enqueue_style( 'olyve-inline-style', get_template_directory_uri() . '/assets/css/custom_script.css' );
		
		//variables
		$olyve_custom_css_output = $olyve_page_title_style =  $page_title_size = $page_title_lh = $sm_post_title_size = $sm_post_title_lh = $sm_page_title_size =  $sm_page_title_lh = $sm_main_sizes_output = $sm_page_title_size_output = $sm_post_title_size_output = $h1_mobile_size  = $h1_mobile_lh = $h2_mobile_size  = $h2_mobile_lh  = $h3_mobile_size  = $h3_mobile_lh = $h4_mobile_size  = $h4_mobile_lh = $h5_mobile_size  = $h5_mobile_lh = $h6_mobile_size  = $h6_mobile_lh = $base_color_primary = $base_color_secondary = $base_color_tertiary = $base_color_quaternary = $text_color_one = $text_color_two = $text_color_three = $text_color_four = $border_color = $body_font_size = $body_line_height = $h1_font_size = $h1_line_height = $h2_font_size = $h2_line_height = $h3_font_size = $h3_line_height = $h4_font_size = $h4_line_height = $h5_font_size = $h5_line_height = $h6_font_size = $h6_line_height = $theme_base_colors_output = ''; 
        
        $base_color_primary    = olyve_get_theme_option( 'olyve_base_color_primary', '', 'rgba');
        $base_color_secondary  = olyve_get_theme_option( 'olyve_base_color_secondary', '', 'rgba');  
        $base_color_tertiary   = olyve_get_theme_option( 'olyve_base_color_tertiary', '', 'rgba');
        $base_color_quaternary = olyve_get_theme_option( 'olyve_base_color_quaternary', '', 'rgba');
        $text_color_one   = olyve_get_theme_option( 'olyve_text_color_one', '', 'rgba');  
        $text_color_two   = olyve_get_theme_option( 'olyve_text_color_two', '', 'rgba'); 
        $text_color_three = olyve_get_theme_option( 'olyve_text_color_three', '', 'rgba'); 
        $text_color_four  = olyve_get_theme_option( 'olyve_text_color_four', '', 'rgba');
        $border_color     = olyve_get_theme_option( 'olyve_borders_color', '', 'rgba'); 
        $body_font_size   = olyve_get_theme_option( 'olyve_body_font_size' ); 
        $body_line_height = olyve_get_theme_option( 'olyve_body_line_height'); 
        $h1_font_size     = olyve_get_theme_option( 'olyve_h1_font_size'); 
        $h1_line_height   = olyve_get_theme_option( 'olyve_h1_line_height'); 
        $h2_font_size     = olyve_get_theme_option( 'olyve_h2_font_size'); 
        $h2_line_height   = olyve_get_theme_option( 'olyve_h2_line_height'); 
        $h3_font_size     = olyve_get_theme_option( 'olyve_h3_font_size'); 
        $h3_line_height   = olyve_get_theme_option( 'olyve_h3_line_height'); 
        $h4_font_size     = olyve_get_theme_option( 'olyve_h4_font_size'); 
        $h4_line_height   = olyve_get_theme_option( 'olyve_h4_line_height'); 
        $h5_font_size     = olyve_get_theme_option( 'olyve_h5_font_size'); 
        $h5_line_height   = olyve_get_theme_option( 'olyve_h5_line_height'); 
        $h6_font_size     = olyve_get_theme_option( 'olyve_h6_font_size'); 
        $h6_line_height   = olyve_get_theme_option( 'olyve_h6_line_height'); 
        $page_title_size    = olyve_get_theme_option( 'olyve_page_title_font_size'); 
        $page_title_lh      = olyve_get_theme_option( 'olyve_page_title_line_height'); 
        $sm_post_title_size = olyve_get_theme_option( 'olyve_sm_post_title_size'); 
        $sm_post_title_lh   = olyve_get_theme_option( 'olyve_sm_post_title_lh');
        $sm_page_title_size = olyve_get_theme_option( 'olyve_sm_page_title_size'); 
        $sm_page_title_lh   = olyve_get_theme_option( 'olyve_sm_page_title_lh');
        $h1_mobile_size = olyve_get_theme_option( 'olyve_h1_size_mobile'); 
        $h1_mobile_lh   = olyve_get_theme_option( 'olyve_h1_lh_mobile');
        $h2_mobile_size = olyve_get_theme_option( 'olyve_h2_size_mobile'); 
        $h2_mobile_lh   = olyve_get_theme_option( 'olyve_h2_lh_mobile');
        $h3_mobile_size = olyve_get_theme_option( 'olyve_h3_size_mobile'); 
        $h3_mobile_lh   = olyve_get_theme_option( 'olyve_h3_lh_mobile');
        $h4_mobile_size = olyve_get_theme_option( 'olyve_h4_size_mobile'); 
        $h4_mobile_lh   = olyve_get_theme_option( 'olyve_h4_lh_mobile');
        $h5_mobile_size = olyve_get_theme_option( 'olyve_h5_size_mobile'); 
        $h5_mobile_lh   = olyve_get_theme_option( 'olyve_h5_lh_mobile');
        $h6_mobile_size = olyve_get_theme_option( 'olyve_h6_size_mobile'); 
        $h6_mobile_lh   = olyve_get_theme_option( 'olyve_h6_lh_mobile');       
        
        //theme base colors
        if ( is_string($base_color_primary) && $base_color_primary != '' ) { 
            $base_color_primary_output = '--dtr-base-color-primary: ' . $base_color_primary . ';';       
        } else { 
            $base_color_primary_output = ''; 
        }
            
        if ( is_string($base_color_secondary) && $base_color_secondary != '' ) { 
            $base_color_secondary_output = '--dtr-base-color-secondary: ' . $base_color_secondary . ';';       
        } else { 
            $base_color_secondary_output = ''; 
        } 
               
        if ( is_string($base_color_tertiary) && $base_color_tertiary != '' ) { 
            $base_color_tertiary_output = '--dtr-base-color-tertiary: ' . $base_color_tertiary . ';';       
        } else { 
            $base_color_tertiary_output = ''; 
        } 
        
        if ( is_string($base_color_quaternary) && $base_color_quaternary != '' ) { 
            $base_color_quaternary_output = '--dtr-base-color-quaternary: ' . $base_color_quaternary . ';';       
        } else { 
            $base_color_quaternary_output = ''; 
        }
        
        if ( is_string($text_color_one) && $text_color_one != '' ) { 
            $text_color_one_output = '--dtr-text-color-one: ' . $text_color_one . ';';       
        } else { 
            $text_color_one_output = ''; 
        } 
        
        if ( is_string($text_color_two) && $text_color_two != '' ) { 
            $text_color_two_output = '--dtr-text-color-two: ' . $text_color_two . ';';       
        } else { 
            $text_color_two_output = ''; 
        } 
        
        if ( is_string($text_color_three) && $text_color_three != '' ) { 
            $text_color_three_output = '--dtr-text-color-three: ' . $text_color_three . ';';       
        } else { 
            $text_color_three_output = ''; 
        } 
        
        if ( is_string($text_color_four) && $text_color_four != '' ) { 
            $text_color_four_output = '--dtr-text-color-four: ' . $text_color_four . ';';       
        } else { 
            $text_color_four_output = ''; 
        } 
        
        if ( is_string($border_color) && $border_color != '' ) { 
            $border_color_output = '--dtr-border-color-main: ' . $border_color . ';';       
        } else { 
            $border_color_output = ''; 
        } 
        
        //collective output
        if ( $base_color_primary != '' || $base_color_secondary != '' || $base_color_tertiary != '' || $base_color_quaternary != '' || $text_color_one != '' || $text_color_two != '' || $text_color_three != '' || $border_color != '' ) { 
        $theme_base_colors_output .= ':root { ' . $base_color_primary_output . $base_color_secondary_output . $base_color_tertiary_output . $base_color_quaternary_output . $text_color_one_output . $text_color_two_output . $text_color_three_output . $text_color_four_output . $border_color_output . ' }';
        }

        //body
        if ( $body_font_size != '' && $body_line_height != '' ) { 
            $body_font_size_output = 'body {font-size: ' . $body_font_size . ';line-height: ' . $body_line_height . ';}';
        } elseif ( $body_font_size != '' && $body_line_height == '' ) { 
            $body_font_size_output = 'body {font-size: ' . $body_font_size . ';}';    
        } elseif ( $body_font_size == '' && $body_line_height != '' ) { 
            $body_font_size_output = 'body {line-height: ' . $body_line_height . ';}';  
        } else { 
            $body_font_size_output = ''; 
        } 
        
        //h1
        if ( $h1_font_size != '' && $h1_line_height != '' ) { 
            $h1_font_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_font_size . ';line-height: ' . $h1_line_height . ';}';
        } elseif ( $h1_font_size != '' && $h1_line_height == '' ) { 
            $h1_font_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_font_size . ';}';    
        } elseif ( $h1_font_size == '' && $h1_line_height != '' ) { 
            $h1_font_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {line-height: ' . $h1_line_height . ';}';  
        } else { 
            $h1_font_size_output = ''; 
        } 
        
        //h2
        if ( $h2_font_size != '' && $h2_line_height != '' ) { 
            $h2_font_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_font_size . ';line-height: ' . $h2_line_height . ';}';
        } elseif ( $h2_font_size != '' && $h2_line_height == '' ) { 
            $h2_font_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_font_size . ';}';    
        } elseif ( $h2_font_size == '' && $h2_line_height != '' ) { 
            $h2_font_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {line-height: ' . $h2_line_height . ';}';  
        } else { 
            $h2_font_size_output = ''; 
        } 
        
        //h3
        if ( $h3_font_size != '' && $h3_line_height != '' ) { 
            $h3_font_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_font_size . ';line-height: ' . $h3_line_height . ';}';
        } elseif ( $h3_font_size != '' && $h3_line_height == '' ) { 
            $h3_font_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_font_size . ';}';    
        } elseif ( $h3_font_size == '' && $h3_line_height != '' ) { 
            $h3_font_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {line-height: ' . $h3_mobile_lh . ';}';  
        } else { 
            $h3_font_size_output = ''; 
        } 
        
          //h4
        if ( $h4_font_size != '' && $h4_line_height != '' ) { 
            $h4_font_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_font_size . ';line-height: ' . $h4_line_height . ';}';
        } elseif ( $h4_font_size != '' && $h4_line_height == '' ) { 
            $h4_font_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_font_size . ';}';    
        } elseif ( $h4_font_size == '' && $h4_line_height != '' ) { 
            $h4_font_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {line-height: ' . $h4_line_height . ';}';  
        } else { 
            $h4_font_size_output = ''; 
        } 

        //h5
        if ( $h5_font_size != '' && $h5_line_height != '' ) { 
            $h5_font_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_font_size . ';line-height: ' . $h5_line_height . ';}';
        } elseif ( $h5_font_size != '' && $h5_line_height == '' ) { 
            $h5_font_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_font_size . ';}';    
        } elseif ( $h5_font_size == '' && $h5_line_height != '' ) { 
            $h5_font_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {line-height: ' . $h5_line_height . ';}';  
        } else { 
            $h5_font_size_output = ''; 
        } 

        //h6
        if ( $h6_font_size != '' && $h6_line_height != '' ) { 
            $h6_font_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_font_size . ';line-height: ' . $h6_line_height . ';}';
        } elseif ( $h6_font_size != '' && $h6_line_height == '' ) { 
            $h6_font_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_font_size . ';}';    
        } elseif ( $h6_font_size == '' && $h6_line_height != '' ) { 
            $h6_font_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {line-height: ' . $h6_line_height . ';}';  
        } else { 
            $h6_font_size_output = ''; 
        } 
        
        //page title
        if ( $page_title_size != '' && $page_title_lh != '' ) { 
            $page_title_size_output = '.dtr-page-title {font-size: ' . $page_title_size . ';line-height: ' . $page_title_lh . ';}';
        } elseif ( $page_title_size != '' && $page_title_lh == '' ) { 
            $page_title_size_output = '.dtr-page-title {font-size: ' . $page_title_size . ';}';    
        } elseif ( $page_title_size == '' && $page_title_lh != '' ) { 
            $page_title_size_output = '.dtr-page-title {line-height: ' . $page_title_lh . ';}';  
        } else { 
            $page_title_size_output = ''; 
        }     
        
        //sm post title
        if ( $sm_post_title_size != '' && $sm_post_title_lh != '' ) { 
            $sm_post_title_size_output = '.dtr-single-post-title.dtr-page-title {font-size: ' . $sm_post_title_size . ';line-height: ' . $sm_post_title_lh . ';}';
        } elseif ( $sm_post_title_size != '' && $sm_post_title_lh == '' ) { 
            $sm_post_title_size_output = '.dtr-single-post-title.dtr-page-title {font-size: ' . $sm_post_title_size . ';}';    
        } elseif ( $sm_post_title_size == '' && $sm_post_title_lh != '' ) { 
            $sm_post_title_size_output = '.dtr-single-post-title.dtr-page-title {line-height: ' . $sm_post_title_lh . ';}';  
        } else { 
            $sm_post_title_size_output = ''; 
        } 
        
        //sm page title
        if ( $sm_page_title_size != '' && $sm_page_title_lh != '' ) { 
            $sm_page_title_size_output = '.dtr-page-title {font-size: ' . $sm_page_title_size . ';line-height: ' . $sm_page_title_lh . ';}';
        } elseif ( $sm_page_title_size != '' && $sm_page_title_lh == '' ) { 
            $sm_page_title_size_output = '.dtr-page-title {font-size: ' . $sm_page_title_size . ';}';    
        } elseif ( $sm_page_title_size == '' && $sm_page_title_lh != '' ) { 
            $sm_page_title_size_output = '.dtr-page-title {line-height: ' . $sm_page_title_lh . ';}';  
        } else { 
            $sm_page_title_size_output = ''; 
        } 
 
        //h1 mobile
        if ( $h1_mobile_size != '' && $h1_mobile_lh != '' ) { 
            $h1_mobile_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_mobile_size . ';line-height: ' . $h1_mobile_lh . ';}';
        } elseif ( $h1_mobile_size != '' && $h1_mobile_lh == '' ) { 
            $h1_mobile_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {font-size: ' . $h1_mobile_size . ';}';    
        } elseif ( $h1_mobile_size == '' && $h1_mobile_lh != '' ) { 
            $h1_mobile_size_output = 'h1, .elementor-widget-heading h1.elementor-heading-title {line-height: ' . $h1_mobile_lh . ';}';  
        } else { 
            $h1_mobile_size_output = ''; 
        } 
        
        //h2 mobile
        if ( $h2_mobile_size != '' && $h2_mobile_lh != '' ) { 
            $h2_mobile_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_mobile_size . ';line-height: ' . $h2_mobile_lh . ';}';
        } elseif ( $h2_mobile_size != '' && $h2_mobile_lh == '' ) { 
            $h2_mobile_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {font-size: ' . $h2_mobile_size . ';}';    
        } elseif ( $h2_mobile_size == '' && $h2_mobile_lh != '' ) { 
            $h2_mobile_size_output = 'h2, .elementor-widget-heading h2.elementor-heading-title {line-height: ' . $h2_mobile_lh . ';}';  
        } else { 
            $h2_mobile_size_output = ''; 
        } 
        
        //h3 mobile
        if ( $h3_mobile_size != '' && $h3_mobile_lh != '' ) { 
            $h3_mobile_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_mobile_size . ';line-height: ' . $h3_mobile_lh . ';}';
        } elseif ( $h3_mobile_size != '' && $h3_mobile_lh == '' ) { 
            $h3_mobile_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {font-size: ' . $h3_mobile_size . ';}';    
        } elseif ( $h3_mobile_size == '' && $h3_mobile_lh != '' ) { 
            $h3_mobile_size_output = 'h3, .elementor-widget-heading h3.elementor-heading-title {line-height: ' . $h3_mobile_lh . ';}';  
        } else { 
            $h3_mobile_size_output = ''; 
        } 

        //h4 mobile
        if ( $h4_mobile_size != '' && $h4_mobile_lh != '' ) { 
            $h4_mobile_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_mobile_size . ';line-height: ' . $h4_mobile_lh . '; }';
        } elseif ( $h4_mobile_size != '' && $h4_mobile_lh == '' ) { 
            $h4_mobile_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {font-size: ' . $h4_mobile_size . ';}';    
        } elseif ( $h4_mobile_size == '' && $h4_mobile_lh != '' ) { 
            $h4_mobile_size_output = 'h4, .elementor-widget-heading h4.elementor-heading-title {line-height: ' . $h4_mobile_lh . ';}';  
        } else { 
            $h4_mobile_size_output = ''; 
        } 

        //h5 mobile
        if ( $h5_mobile_size != '' && $h5_mobile_lh != '' ) { 
            $h5_mobile_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_mobile_size . ';line-height: ' . $h5_mobile_lh . ';}';
        } elseif ( $h5_mobile_size != '' && $h5_mobile_lh == '' ) { 
            $h5_mobile_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {font-size: ' . $h5_mobile_size . ';}';    
        } elseif ( $h5_mobile_size == '' && $h5_mobile_lh != '' ) { 
            $h5_mobile_size_output = 'h5, .elementor-widget-heading h5.elementor-heading-title {line-height: ' . $h5_mobile_lh . ';}';  
        } else { 
            $h5_mobile_size_output = ''; 
        } 

        //h6 mobile
        if ( $h6_mobile_size != '' && $h6_mobile_lh != '' ) { 
            $h6_mobile_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_mobile_size . ';line-height: ' . $h6_mobile_lh . ';}';
        } elseif ( $h6_mobile_size != '' && $h6_mobile_lh == '' ) { 
            $h6_mobile_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {font-size: ' . $h6_mobile_size . ';}';    
        } elseif ( $h6_mobile_size == '' && $h6_mobile_lh != '' ) { 
            $h6_mobile_size_output = 'h6, .elementor-widget-heading h6.elementor-heading-title {line-height: ' . $h6_mobile_lh . ';}';  
        } else { 
            $h6_mobile_size_output = ''; 
        } 

        // output
        if ( $sm_post_title_size_output != '' || $sm_page_title_size_output != '' ||  $h1_mobile_size_output != '' || $h2_mobile_size_output != '' || $h3_mobile_size_output != '' || $h4_mobile_size_output != '' || $h5_mobile_size_output != '' || $h6_mobile_size_output != '' ) {      
        $sm_main_sizes_output .= '@media (max-width: 782px) { ' . $sm_post_title_size_output . $sm_page_title_size_output . $h1_mobile_size_output . $h2_mobile_size_output . $h3_mobile_size_output . $h4_mobile_size_output . $h5_mobile_size_output . $h6_mobile_size_output . ' }';
        }

		// page title background styles
		$page_title_style 			= '';
		$bg_image 					= '';
		$bg_image_style 			= '';
		$bg_image       			= get_post_meta( get_the_ID(), '_olyve_page_header_bg_image', true );
		$bg_image_style 			= get_post_meta( get_the_ID(), '_olyve_page_header_bg_image_style', true );

		// Background image
		if ( $bg_image ) {
			if ( $bg_image_style == 'repeat' || $bg_image_style == '' ) {
				$olyve_page_title_style .= '.dtr-page-title-main { background: url('.  esc_url( $bg_image ) .') repeat !important; }';
			}
			if ( $bg_image_style == 'stretched' ) {
				$olyve_page_title_style .= '.dtr-page-title-main { background: url('. esc_url( $bg_image ) .') no-repeat center center !important; background-size: cover !important; }';
			}
			if ( $bg_image_style == 'fixed' ) {
				$olyve_page_title_style .= '.dtr-page-title-main { background: url('.  esc_url( $bg_image ) .') no-repeat center center fixed  !important; background-size: cover !important; }';
			}
		}
		// page title background styles
		
		// final custom css output	
		$olyve_custom_css_output = '' . $theme_base_colors_output . '' . $body_font_size_output . '' . $h1_font_size_output . '' . $h2_font_size_output . '' . $h3_font_size_output . '' . $h4_font_size_output . '' . $h5_font_size_output . '' . $h6_font_size_output . '' . $page_title_size_output . '' . $olyve_page_title_style . '' . $sm_main_sizes_output .'';
        
		wp_add_inline_style( 'olyve-inline-style', $olyve_custom_css_output );
	} 
endif;
add_action( 'wp_enqueue_scripts', 'olyve_custom_inline_styles', 30 );