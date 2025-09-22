<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Recentposts Carousel Widget
 */
class Olyve_Recentposts_Carousel extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-posts-carousel';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Posts Carousel', 'olyve' );
	}

	/**
	 * Retrieve widget icon.
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-favorite';
	}

	/**
	 * Retrieve the list of categories widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array('dtr-element');
	}
	
	/**
	 * Register the scripts widget depends on.
	 */
	public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );
	  	wp_register_script( 'swiper', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/swiper-bundle.min.js', [ 'elementor-frontend' ], '8.4.5', true );
		wp_register_script( 'dtr-widgets', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/dtr-widgets.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_style( 'swiper', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/css/swiper.min.css' );
    }
   
	/**
	 * Retrieve the list of scripts the image carousel widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
        return [
            'swiper',
			'dtr-widgets'
        ];
    }
	
	/**
	 * Retrieve the list of styles the widget depends on.
	 * Used to set styles dependencies required to run the widget.
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
        return [
			'swiper'
        ];
    }

	/**
	 * Register widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @access protected
	 */
	protected function register_controls() {
		
		// content control starts
		$this->start_controls_section(
			'section_post_carousel_content',
			[
				'label' => esc_html__( 'Posts Carousel', 'olyve' ),
			]
		);

		$this->add_control(
			'post_limit',
			[
				'label' => esc_html__( 'Number of posts to show', 'olyve' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 4,
				'min' => -1,
				'step' => 1,
				'separator' => 'before',
				'description' => esc_html__( '-1 to show all posts', 'olyve' ),
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label' => esc_html__( 'Sort Posts By', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' 	=> esc_html__( 'Date', 'olyve' ),
					'rand' 	=> esc_html__( 'Random', 'olyve' ),
					'title'	=> esc_html__( 'Title', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label' => esc_html__( 'Arrange Sorted Posts', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC'	=> esc_html__( 'Descending', 'olyve' ),
					'ASC'  	=> esc_html__( 'Ascending', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'radius_type',
			[
				'label' => esc_html__( 'Corner Type - For Image / Block', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-radius--rounded',
				'separator' => 'before',
				'options' => [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'olyve' ),
					'dtr-radius--square'   => esc_html__( 'Square', 'olyve' ),
				],
			]
		);
		
		// nav_type
		$this->add_control(
			'nav_type',
			[
				'label' => esc_html__( 'Navigation Type', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'arrows',
				'separator' => 'before',
				'options' => [
					'arrows'	=> esc_html__( 'Arrow', 'olyve' ),
					'dots' 		=> esc_html__( 'Dots', 'olyve' ),
					'none' 		=> esc_html__( 'None', 'olyve' ),
				],
			]
		);

		// image
		$this->add_control(
			'image_settings',
			[
				'label' => esc_html__( 'Image Settings', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'  	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'image_size',
			[
				'label' => esc_html__( 'Image Size', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'img_default',
				'options' => [
					'img_default'	=> esc_html__( 'Default', 'olyve' ),
					'img_custom'	=> esc_html__( 'Custom - Hard Crop', 'olyve' ),
				],
			]
		);
	
		$this->add_control(
			'image_size_default',
			[
				'label' => esc_html__( 'Choose Image Size', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'full',
				'condition' => [
					'image_size' => [ 'img_default' ],
				],
				'options' => [
					'full'		=> esc_html__( 'Full', 'olyve' ),
					'medium'	=> esc_html__( 'Medium', 'olyve' ),
					'thumbnail'	=> esc_html__( 'Thumbnail', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'img_crop_info',
			[
				'label' => esc_html__( 'While using cropping - size of main image must be greater than specified for cropping.', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'image_size' => [ 'img_custom' ],
				],
			]
		);
		
		$this->add_control(
			'img_width',
			[
				'label' => esc_html__( 'Hard Crop - Width ', 'olyve' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 600,
				'condition' => [
					'image_size' => [ 'img_custom' ],
				],
				'min' => 100,
				'step' => 10,
				'separator' => 'none',
			]
		);
		
		$this->add_control(
			'img_height',
			[
				'label' => esc_html__( 'Hard Crop - Height ', 'olyve' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 400,
				'condition' => [
					'image_size' => [ 'img_custom' ],
				],
				'min' => 100,
				'step' => 10,
				'separator' => 'none',
			]
		);	

		// content
		$this->add_control(
			'content_settings',
			[
				'label' => esc_html__( 'Content Settings', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'category',
			[
				'label' => esc_html__( 'Category', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'  	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'date',
			[
				'label' => esc_html__( 'Date', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'  => esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
				
		$this->add_control(
			'author',
			[
				'label' => esc_html__( 'Author', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'  => esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
					
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'  	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'excerpt',
			[
				'label' => esc_html__( 'Excerpt', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'hide',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'  	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'words',
			[
				'label' 		=> esc_html__( 'Limit Short Content - Words Count', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '35',
				'label_block'	=> true,
				'show_label'	=> true,
				'condition' => [
					'excerpt' => [ 'show' ],
				],
			]
		);
		
		$this->add_control(
			'read_more',
			[
				'label' => esc_html__( 'Read More', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'hide',
				'separator' => 'before',
				'options' => [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		// read_more_text
		$this->add_control(
			'read_more_text',
			[
				'label' 		=> esc_html__( 'Read More Text', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Read More', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);

		// carousel
		$this->add_control(
			'v_settings',
			[
				'label' => esc_html__( 'Carousel Settings', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'autoplay_delay',
			[
				'label' => esc_html__( 'Autoplay Delay (ms)', 'olyve' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 7000,
				'min' => 1000, // Minimum delay (1 second)
				'step' => 100,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'on',
				'options' => [
					'on'  => esc_html__( 'On', 'olyve' ),
					'off' => esc_html__( 'Off', 'olyve' ),
				],
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Loop Carousel', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'olyve' ),
					'false'  => esc_html__( 'No', 'olyve' ),
				],
			]
		);
        
		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => esc_html__( 'Styles', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-post-block__content-wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		// heading
		$this->add_control(
			'heading_style',
			[
				'label' => esc_html__( 'Heading', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'heading_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-post-block__title-link' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'main_heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-post-block__title-link',
            ]
        );
		
		// meta
		$this->add_control(
			'meta_style',
			[
				'label' 	=> esc_html__( 'Date / Author', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'meta_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-meta-item, {{WRAPPER}} .dtr-meta-item a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'meta_hover_color',
			[
				'label' 	=> esc_html__( 'Hover : Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-meta-item a:hover, {{WRAPPER}} .dtr-meta-item:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'meta_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-meta-item',
            ]
        );

		// Content
		$this->add_control(
			'content_style',
			[
				'label' => esc_html__( 'Content', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Excerpt Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-post-block__excerpt' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'content_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-post-block__excerpt',
            ]
        );
		
		// Read more
		$this->add_control(
			'read_more_style',
			[
				'label' => esc_html__( 'Read More', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
				
		$this->add_control(
			'link_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-post__button'	=> 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'link_hover_color',
			[
				'label' 	=> esc_html__( 'On Hover: Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-post__button:hover'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'link_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-post__button',
            ]
        );
        
        // category
		$this->add_control(
			'category_style',
			[
				'label' 	=> esc_html__( 'Category', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'category_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-meta-category a' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'category_border_color',
			[
				'label' 	=> esc_html__( 'Border Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-meta-category a' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'category_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-meta-category a',
            ]
        );
      
		// nav_styles
		$this->add_control(
			'nav_styles',
			[
				'label' => esc_html__( 'Prev / Next Arrows', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
			]
		);
		
		$this->add_control(
			'arrow_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_border_color',
			[
				'label' => esc_html__( 'Border Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next, {{WRAPPER}} .swiper-button-prev' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_hover_bg_color',
			[
				'label' => esc_html__( 'Hover Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_hover_border_color',
			[
				'label' => esc_html__( 'Hover Border Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'arrow_hover_color',
			[
				'label' => esc_html__( 'Hover Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'arrows' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:hover, {{WRAPPER}} .swiper-button-prev:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		// dots_nav_styles
		$this->add_control(
			'dots_nav_styles',
			[
				'label' => esc_html__( 'Pagination Dots', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'nav_type'	=> [ 'dots' ],
				],
			]
		);
		
		$this->add_control(
			'dots_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'dots' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-pagination-bullet::after' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'dots_hover_bg_color',
			[
				'label' => esc_html__( 'Active / Hover Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'nav_type'	=> [ 'dots' ],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet-active, {{WRAPPER}} .swiper-pagination-bullet:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .swiper-pagination-bullet:hover::after' => 'border-color: {{VALUE}};',
				],
			]
		);
        
		$this->end_controls_section();
		// style control ends
		
	}

	/**
	 * Render widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
	
		// Safe access to settings with default fallbacks
		$return_width  = isset($settings['img_width']) ? $settings['img_width'] : '600';
		$return_height = isset($settings['img_height']) ? $settings['img_height'] : '400';
		$category      = isset($settings['category']) ? $settings['category'] : 'show';
		$author        = isset($settings['author']) ? $settings['author'] : 'show';
		$date          = isset($settings['date']) ? $settings['date'] : 'show';
		$limit 		   = isset($settings['post_limit']) ? $settings['post_limit'] : 4;
		$words		   = isset($settings['words']) ? $settings['words'] : 35;
		$orderby       = isset($settings['post_orderby']) && !empty($settings['post_orderby']) ? $settings['post_orderby'] : 'date';
		$order         = isset($settings['post_order']) && !empty($settings['post_order']) ? $settings['post_order'] : 'DESC'; 

		// Set query arguments with safe access
		$args = [
			'posts_per_page' => $limit !== -1 ? $limit : -1,
			'orderby'        => $orderby,  // Use safe, validated value
			'order'          => $order,    // Use safe, validated value
			'post_status'    => 'publish',
			'ignore_sticky_posts' => 1,
		];

		// Create the WP Query for recent posts
		$recent_posts = new \WP_Query($args);
		$output = '';
	
		// Check if there are posts to display
		if ($recent_posts->have_posts()) {

			// Add the autoplay delay data attribute here
			$autoplay = isset($settings['autoplay']) ? $settings['autoplay'] : 'on';  // Default 'off' for autoplay
			$autoplay_delay = isset( $settings['autoplay_delay'] ) ? $settings['autoplay_delay'] : 7000;
			$loopSetting = isset($settings['loop']) ? $settings['loop'] : 'true'; // Default to 'true'

			$output .= '<div class="swiper dtr-swiper swiper-container dtr-recentposts-carousel ' . $settings['radius_type'] . ' ' . $settings['nav_type'] . '" data-swiper-autoplay-delay="' . esc_attr( $autoplay_delay ) . '" data-swiper-autoplay="' . esc_attr($autoplay) . '" data-swiper-loop="' . esc_attr($loopSetting) . '"><div class="swiper-wrapper">';
	
			while ($recent_posts->have_posts()) {
				$recent_posts->the_post();
				$permalink   = get_permalink();
				$thumb_title = get_the_title();
				$post_id     = get_the_ID();
				$thumb       = get_post_thumbnail_id();
				$img_url     = wp_get_attachment_url($thumb, 'full');
	
				// image resize logic
				$return_image = '';
				if (!empty($img_url) && $settings['image'] === 'show') {
					$image_resize = aq_resize($img_url, $return_width, $return_height, true);
					$return_image = '<img src="' . esc_url($image_resize) . '" alt="' . esc_attr($thumb_title) . '"/>';
				} else {
					$return_image = get_the_post_thumbnail($post_id, 'full');
				}
	
				// Image output if it's set to show
				$has_img_class = has_post_thumbnail() ? 'dtr-recentposts--has-img' : 'dtr-recentposts--no-img';
	
				$output .= '<div class="swiper-slide dtr-post-block ' . $has_img_class . '" data-swiper-autoplay="' . esc_attr( $autoplay_delay ) . '"><div class="dtr-post-block__content-wrapper">';
	
				// Image
				if ($settings['image'] === 'show' && has_post_thumbnail()) {
					$output .= '<div class="dtr-post-block__img-wrapper">';
					$output .= '<a href="' . esc_url($permalink) . '" rel="bookmark" aria-label="' . get_the_title() . '">' . $return_image . '</a>';
					$output .= '</div>';
				}
	
				// Content
				$output .= '<div class="dtr-post-block__content">';
	
				// Category
				if ($category === 'show') {
					$cats = get_the_category($post_id);
					if ($cats) {
						$output .= '<div class="dtr-meta-item dtr-meta-category">';
						foreach ($cats as $cat) {
							$output .= '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . $cat->name . '</a>';
						}
						$output .= '</div>';
					}
				}
	
				// Title
				if ($settings['title'] === 'show') {
					$output .= '<h5 class="dtr-post-block__title"><a class="dtr-post-block__title-link" href="' . esc_url($permalink) . '" rel="bookmark">' . esc_html(get_the_title()) . '</a></h5>';
				}
				
				// Excerpt
				if ($settings['excerpt'] === 'show') {
					$output .= '<div class="dtr-post-block__excerpt">';
					$content = get_the_content();
					$content = wp_trim_words($content, $words);
					$content = str_replace(']]>', ']]&gt;', $content);
					$output .= $content;
					$output .= '</div>';
				}

				$output .= '</div>'; // content
				$output .= '<div class="dtr-post-block__btm-content">';
				// Meta (date, author)
				if ($author === 'show' || $date === 'show') {
					$output .= '<div class="dtr-post-block__meta dtr-meta">';
					if ($date === 'show') {
						$output .= '<a class="dtr-meta-item dtr-meta-date" href="' . esc_url($permalink) . '" rel="bookmark">' . get_the_date() . '</a>';
					}
					if ($author === 'show') {
						$output .= '<a class="dtr-meta-item dtr-meta-author" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>';
					}
					$output .= '</div>';
				}
		
				// Read More
				if ($settings['read_more'] === 'show') {
					$output .= '<p class="dtr-post__button-wrap"><a class="dtr-post__button" href="' . esc_url($permalink) . '" role="button">' . esc_html($settings['read_more_text']) . '</a></p>';
				}

				$output .= '</div>'; // bottom content
				$output .= '</div>'; // content-wrapper
				$output .= '</div>'; // swiper-slide
			}
			$output .= '</div>';
	
			// Navigation
			if ($settings['nav_type'] === 'arrows') {
				$output .= '<div class="swiper-button-prev dtr-swiper-button dtr-recentposts__prev"></div><div class="swiper-button-next dtr-swiper-button dtr-recentposts__next"></div>';
			} elseif ($settings['nav_type'] === 'dots') {
				$output .= '<div class="swiper-pagination dtr-recentposts__dots"></div>';
			}
	
			$output .= '</div>'; // swiper-container
		}	
		wp_reset_postdata();	
		echo $output;
	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() { }
}