<?php
namespace OlyveAddons\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Testimonial Carousel Widget
 */
class Olyve_Testimonial_Carousel extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-testimonial-carousel';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonial Carousel', 'olyve' );
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
	 * Retrieve the list of scripts the widget depends on.
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
			'section_testimonial_content',
			[
				'label' => esc_html__( 'Testimonial Carousel', 'olyve' ),
			]
		);
    
        $this->add_control(
			'testimonial_columns',
			[
				'label' 	=> esc_html__( 'Columns', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'dtr-testimonial--2col',
				'options' 	=> [
					'dtr-testimonial--2col'  => esc_html__( '2 Columns', 'olyve' ),
					'dtr-testimonial--3col' => esc_html__( '3 Columns', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'post_limit',
			[
				'label' 		=> esc_html__( 'Number of posts to show', 'olyve' ),
				'description'	=> esc_html__( '-1 to show all posts', 'olyve' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default'		=> '-1',
				'min' 			=> -1,
				'step' 			=> 1,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'post_orderby',
			[
				'label' 		=> esc_html__( 'Sort Testimonials By', 'olyve' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'date',
				'label_block'	=> true,
				'options'	=> [
					'date' 	=> esc_html__( 'Date', 'olyve' ),
					'rand' 	=> esc_html__( 'Random', 'olyve' ),
					'title'	=> esc_html__( 'Title', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label' 		=> esc_html__( 'Arrange Sorted Testimonials', 'olyve' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'DESC',
				'label_block'	=> true,
				'options'	=> [
					'DESC'	=> esc_html__( 'Descending', 'olyve' ),
					'ASC'  	=> esc_html__( 'Ascending', 'olyve' ),
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' 	=> esc_html__( 'Client Image', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'separator'	=> 'before',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		// nav_type
		$this->add_control(
			'nav_type',
			[
				'label' => esc_html__( 'Navigation Type', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dots',
				'separator' => 'before',
				'options' => [
					'arrows'	=> esc_html__( 'Arrow', 'olyve' ),
					'dots' 		=> esc_html__( 'Dots', 'olyve' ),
					'none' 		=> esc_html__( 'None', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'view',
			[
				'label' 	=> esc_html__( 'View', 'olyve' ),
				'type' 		=> Controls_Manager::HIDDEN,
				'default'	=> 'traditional',
			]
		);
		
		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_style_content',
			[
				'label'	=> esc_html__( 'Styles', 'olyve' ),
				'tab'	=> Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'box_bg_color',
			[
				'label' => esc_html__( 'Box Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
                'separator' => 'after',
				'selectors' => [
					'{{WRAPPER}} .dtr-testimonial' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-testimonial__icon::before' => 'color: {{VALUE}};',
				],
			]
		);
		
		// testimonial_content_typo_styles
		$this->add_control(
			'testimonial_content_typo_styles',
			[
				'label'	=> esc_html__( 'Content', 'olyve' ),
				'type'	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
			
		$this->add_control(
			'testimonial_text_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-testimonial__text' => 'color: {{VALUE}};',
				],
			]
		);
			
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'testimonial_text_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-testimonial__text',
            ]
        );
		
		// testimonial_client_typo_styles
		$this->add_control(
			'testimonial_client_typo_styles',
			[
				'label' 	=> esc_html__( 'Client Name', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'testimonial_client_name_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-testimonial__client-name' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'testimonial_client_name_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-testimonial__client-name',
            ]
        );
		
		// testimonial_designation_typo_styles
		$this->add_control(
			'testimonial_designation_typo_styles',
			[
				'label' 	=> esc_html__( 'Designation', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'testimonial_client_job_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-testimonial__client-job' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'testimonial_client_job_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-testimonial__client-job',
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
		$settings = $this->get_settings(); 
		echo do_shortcode('[dtr_testimonial_carousel testimonial_columns="' . $settings['testimonial_columns'] . '" nav_type="' . $settings['nav_type'] . '" image="' . $settings['image'] . '" limit="' . esc_html( $settings['post_limit'] ) . '" orderby="' . $settings['post_orderby'] . '" order="' . $settings['post_order'] . '"]');
		
	}
}