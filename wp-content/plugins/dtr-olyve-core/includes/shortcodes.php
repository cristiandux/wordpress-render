<?php
/*------------------------------------------------------------
 * Table of Contents
 *
 * Testimonial Carousel
 * Portfolio Grid
 * Portfolio Single Item
 *------------------------------------------------------------*/

/*------------------------------------------------------------
 * Testimonial Carousel
 * @since 1.0
 *------------------------------------------------------------*/
if ( ! function_exists( 'olyve_testimonial_carousel_sc' ) ) {
	function olyve_testimonial_carousel_sc( $atts, $content = null ) {
		extract ( shortcode_atts( array(
			'limit'     	        => -1,
			'order'     	        => 'DESC',
			'orderby'		        => 'date',
            'testimonial_columns'   => 'dtr-testimonial--2col',
			'image'			        => 'show',
			'nav_type'		        => 'dots',
		), $atts ) );
		
		global $post;
		$args = array(
			'post_type'      		=> 'dtr_testimonial',
			'posts_per_page'		=> esc_attr( $limit ),
			'order'          		=> esc_attr( $order ), 
			'orderby'        		=> $orderby,
			'post_status'    		=> 'publish',
			'ignore_sticky_posts'	=> 1,
		);

		$query = new WP_Query( $args );
		$output = '';
		
		if( $nav_type == 'arrows' ) {
			$nav_class = 'dtr-slider-has-arrows';
		} elseif( $nav_type == 'dots' ) {
			$nav_class = 'dtr-slider-has-dots';
		} else {   
			$nav_class = ''; 
		}
		
		if ($query->have_posts()) :	

		$output .= '<div class="swiper dtr-swiper swiper-container dtr-testimonial-carousel ' . $testimonial_columns . ' ' . $nav_class . ' clearfix"><div class="swiper-wrapper">';
			while ( $query->have_posts() ) : $query->the_post();
				$output .= '<div class="swiper-slide clearfix"><div class="dtr-testimonial">';
					$client_name = $client_designation = '';
					$post_id 			= get_the_ID();
					$url      			= get_permalink( $post_id );
					$client_name 		= get_post_meta( $post->ID, '_olyve_testimonial_client_name', true );
					$client_designation	= get_post_meta( $post->ID, '_olyve_testimonial_client_designation', true );
                    
                // client info
				if( has_post_thumbnail() && $image == 'show' || $client_name || $client_designation ){
					$output .= '<div class="dtr-testimonial__client-info-wrapper">';

                        $output .= '<div class="dtr-testimonial__client-info">';
                        if( $client_name ){
                            $output .= '<h5 class="dtr-testimonial__client-name">' . esc_html( $client_name ) . '</h5>';
                        } 
                        if( $client_designation ){ 
                            $output .= '<p class="dtr-testimonial__client-job">' . esc_html( $client_designation ) . '</p>';
                        } 
                        $output .=  '</div>';
                        
                        // image output
                        if( has_post_thumbnail() && $image == 'show' ) {
                            $output .= '<div class="dtr-testimonial__client-img-wrapper">';
                            $thumb    	= get_post_thumbnail_id(); 
                            $img_url	= wp_get_attachment_url( $thumb, 'full' ); 
                            $image_src	= aq_resize( $img_url, 70, 70, true ); 
                            $output .=  '<img class="dtr-testimonial__client-img" src="' . esc_url( $image_src ) . '" alt="' . esc_attr( $client_name ) . '"/>';
                            $output .= '</div>'; 
                        } 
                    
					$output .=  '</div>';
				}		

				// content	
				$output .= '<div class="dtr-testimonial__content">';
                    $output .= '<span class="dtr-testimonial__icon"></span>';
                    $output .= '<div class="dtr-testimonial__text">';
                    $content = get_the_content();
                    $content = apply_filters( 'the_content', $content );
                    $content = str_replace( ']]>', ']]&gt;', $content );
                    $output .= $content;
                $output .= '</div></div>';

				$output .= '</div></div>'; // slide and item ends
				
			endwhile;
		    $output .= '</div>'; // swiper wrapper ends
		    // navigation
            if( $nav_type == 'arrows' || $nav_type == 'dots' ) {
                $output .= '<div class="dtr-testimonial__nav-wrapper">';
                if( $nav_type == 'arrows' ) {
                    $output .= '<div class="swiper-button-prev dtr-swiper-button dtr-testimonial__prev"></div><div class="swiper-button-next dtr-swiper-button dtr-testimonial__next"></div>';
                } 
                if( $nav_type == 'dots' ) {
                    $output .= '<div class="swiper-pagination dtr-testimonial__dots"></div>';
                } 
                $output .= '</div>';
            }
		$output .= '</div>';	
		// main content ends
		
		wp_reset_postdata();
		endif;
		return $output;
	}
}
add_shortcode('dtr_testimonial_carousel', 'olyve_testimonial_carousel_sc');

/*------------------------------------------------------------
 * Portfolio Grid
 * @since 1.0
 *------------------------------------------------------------*/
if ( ! function_exists( 'olyve_portfolio_grid_sc' ) ) {
	function olyve_portfolio_grid_sc( $atts, $content = null ) {
		extract ( shortcode_atts( array(
            'main_title'	    	=> 'Works',
            'heading_style'	    	=> 'dtr-heading__gradient',
			'image_size'	    	=> '',
			'image_size_default'	=> 'full',
			'img_width'	    		=> '600',
			'img_height'	    	=> '400',
			'filter'    			=> 'show', 
			'heading'   			=> 'show',
			'heading_size'   		=> 'h5',
			'subheading'   			=> 'show',
			'subheading_size'   	=> 'p',
			'limit'     			=> '6',
			'order'	    			=> 'DESC',
			'orderby'   			=> 'date',
			'tax'       			=> '',
			'columns'				=> 'dtr-portfolio-grid-3col',
			'layout'				=> 'dtr-portfolio-fitrows',
            'border_radius'       	=> 'dtr-radius--rounded',
            'all_text'    			=> 'All',
			'link_wrap'    			=> 'yes',
            'link_icon'    			=> 'yes',
			'target'         		=> '_blank',
		), $atts ) );
		
		$output = '';
		global $post;
		$args = array(
			'post_type'         => 'dtr_portfolio',
			'dtr_portfoliotags'	=> $tax,
			'posts_per_page'    => esc_attr( $limit ),
			'order'             => esc_attr( $order ), 
			'orderby'           => $orderby,
			'post_status'       => 'publish',
		);
        
        $output .= '<div class="dtr-portfolio__head-wrapper">';
		
        // heading
        if( $heading_style == 'dtr-heading__gradient' ){ 
            $output .= '<h2 class="dtr-portfolio__main-title dtr-heading__gradient">' . esc_html( $main_title ) . '</h2>';
        } else {
            $output .= '<h2 class="dtr-portfolio__main-title dtr-heading__default">' . esc_html( $main_title ) . '</h2>';
        }
        
		if( $filter == 'show' ){ 
		
			$portfolio_cats ='';
			if( $portfolio_cats && $portfolio_cats[0] == 0 ) {
				unset( $portfolio_cats[0] );
			}
			if( $portfolio_cats ){
				$args['tax_query'][] = array(
					'taxonomy'	=> 'dtr_portfoliotags',
					'terms' 	=> $portfolio_cats,
					'field' 	=> 'term_id',
				);
			}
		
			$loop = new WP_Query( $args );
			
			$portfolio_taxs = array();
			$filtered_taxs = array();
			
			if( is_array( $loop->posts ) && !empty( $loop->posts ) ) {
				foreach( $loop->posts as $loop_post ) {
					$post_taxs = wp_get_post_terms( $loop_post->ID, 'dtr_portfoliotags', array( "fields" => "all" ) );
					if( is_array( $post_taxs ) && !empty( $post_taxs ) ) {
						foreach( $post_taxs as $post_tax ) {
							if( is_array( $portfolio_cats ) && !empty( $portfolio_cats ) && ( in_array($post_tax->term_id, $portfolio_cats) || in_array( $post_tax->parent, $portfolio_cats )) )  						{
								$portfolio_taxs[urldecode( $post_tax->slug) ] = $post_tax->name;
							}
							if( empty( $portfolio_cats ) || !isset( $portfolio_cats ) ) {
								$portfolio_taxs[urldecode( $post_tax->slug )] = $post_tax->name;
							}
						}
					}
				}
			}

			$terms = get_terms( 'dtr_portfoliotags' );
			if( !empty( $terms ) && is_array( $terms ) ) {
				foreach( $terms as $term ) {
					if( is_array( $portfolio_taxs ) && array_key_exists ( urldecode( $term->slug ) , $portfolio_taxs ) ) {
						$filtered_taxs[urldecode( $term->slug )] = $term->name;
					}
				}
			}
            
			$portfolio_taxs = $filtered_taxs;
			$portfolio_category = get_terms( 'dtr_portfoliotags' );
			if( is_array( $portfolio_taxs ) && !empty( $portfolio_taxs ) ):
				$output .= '<div class="dtr-filter-nav-wrapper"><ul class="dtr-filter-nav clearfix">';
                $output .= '<li><a class="dtr-filter-all active" data-filter="*" href="#">';
				$output .= '' . esc_html( $all_text ) . '';
				$output .= '</a></li>';
				foreach( $portfolio_taxs as $portfolio_tax_slug => $portfolio_tax_name ): 
				$output .= '<li>';
					$output .= '<a data-filter=".' .  $portfolio_tax_slug . '" href="#">' . $portfolio_tax_name  . '';
				$output .= '</a></li>';
				endforeach; 
				$output .= '</ul></div>';
			endif; 
		} // filter
        
        $output .= '</div>';

		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) :	
			$output .= '<div class="dtr-portfolio-grid ' . esc_attr( $layout ) . ' ' . esc_attr( $columns ) . '">';	
			while ( $query->have_posts() ) : $query->the_post();
				
				// add filter classes 
				$filter_classes = '';
				$item_cats = get_the_terms( $post->ID, 'dtr_portfoliotags' );
				if( $item_cats ):
				foreach( $item_cats as $item_cat ) {
					$filter_classes .= urldecode( $item_cat->slug ) . ' ';
				}
				endif;
				
				// variables
				$external_link = '';
				$post_id 					= get_the_ID();
				$thumb						= get_post_thumbnail_id(); 
				$img_url     				= wp_get_attachment_url( $thumb, 'full' ); 
				$thumb_title 				= get_the_title();
				$permalink   				= get_permalink();
				$external_link				= get_post_meta( $post->ID, '_olyve_portfolio_external_link_url', true );   
				$portfolio_subheading		= get_post_meta( $post->ID, '_olyve_portfolio_subheading', true );
					
			$output .= '<div class="dtr-portfolio-item isotope-item '. esc_attr( $filter_classes ) . ' all"><div class="dtr-portfolio-item__wrapper ' . esc_attr( $border_radius ) . '">';
            
                    // image width
					if( $image_size == 'img_custom' && $img_width == '' ){
						$return_width = '600';
					} else {
						$return_width = $img_width;
					}
					// image height
					if( $image_size == 'img_custom' && $img_height == '' ){
						$return_height = '400';
					} else {
						$return_height = $img_height;
					}

					// image sizes
					if( ! empty( $img_url ) && ! empty( $return_width ) && ! empty( $return_height ) && $image_size == 'img_custom' && has_post_thumbnail() ) {  
						$image_resize   = aq_resize( $img_url, $return_width, $return_height, true );
						$return_image = '<img src="' . esc_url( $image_resize ) . '" alt="' . esc_attr( $thumb_title ) . '"/>';
					} else { 
						$return_image = '' . get_the_post_thumbnail ( $post_id, $image_size_default ) . '';
					}
						
					// image output
					if( has_post_thumbnail() ) { 
						$output .=  '<div class="dtr-portfolio-item__img">' . $return_image . '</div>';
					} else {
						$output .=  '<div class="dtr-portfolio-item__img no-portfolio-img"></div>';
					}
				
					// link
					if ( $link_wrap == 'yes' ) { 
						if ( $external_link != '' ) { 
							$output .= '<a class="dtr-portfolio-item__wrap-link" href="' . esc_url( $external_link ) . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '"></a>';
						} else {
							$output .= '<a class="dtr-portfolio-item__wrap-link" href="' . get_the_permalink() . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '"></a>';	
						}
					}
                    
                    if( $heading == 'show' || $subheading == 'show' || $link_icon == 'yes' ){ 
						$output .=  '<div class="dtr-portfolio-item__content">';	
                        	if( $heading == 'show' ){ 
								$output .= '<' . $heading_size . ' class="dtr-portfolio-item__heading">' . get_the_title() . '</' . $heading_size . '>';
							}
                            if( $subheading == 'show' ){ 
								$output .=  '<p class="dtr-portfolio-item__subheading">' . esc_html( $portfolio_subheading ) . '</p>';
							} 
                            // link icon
                            if ( $link_icon == 'yes' ) { 
                                if ( $external_link != '' ) { 
                                     $output .= '<a class="dtr-icon-btn dtr-portfolio-item__link" href="' . esc_url( $external_link ) . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '"></a>';
                                } else {
                                     $output .= '<a class="dtr-icon-btn dtr-portfolio-item__link" href="' . get_the_permalink() . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '"></a>'; 
                                }
                            } // link icon
						$output .= '</div>';
					}
					// portfolio content

				$output .= '</div></div>'; // dtr-portfolio-item	
			endwhile;
			$output .= '</div>';
			wp_reset_postdata();
		endif;
		return $output;
	}
}
add_shortcode('dtr_portfolio_grid', 'olyve_portfolio_grid_sc');