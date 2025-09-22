<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Portfolio Widget
 */
class Olyve_Portfolio extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-grid-portfolio';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Portfolio', 'olyve' );
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
		wp_register_script( 'isotope', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/isotope.pkgd.min.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_script( 'dtr-widgets', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/dtr-widgets.js', [ 'elementor-frontend' ], '1.0.0', true );
    } 
	
	/**
	 * Retrieve the list of scripts the widget depended on.
	 * Used to set scripts dependencies required to run the widget.
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
        return [
		  'imagesloaded',
		  'masonry',
		  'isotope',
		  'dtr-widgets'
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
			'section_portfolio_content',
			[
				'label'	=> esc_html__( 'Portfolio', 'olyve' ),
			]
		);
		
        $this->add_control(
			'main_title',
			[
				'label' 		=> esc_html__( 'Main Heading', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Works', 'olyve' ),
				'label_block'	=> true,
				'show_label' 	=> true,
				'separator' 	=> 'before',
			]
		);
        
		$this->add_control(
			'limit',
			[
				'label' 		=> esc_html__( 'Number of posts to show', 'olyve' ),
				'type' 			=> Controls_Manager::NUMBER,
				'default' 		=> 6,
				'min' 			=> -1,
				'step' 			=> 1,
				'separator' 	=> 'before',
				'description'	=> esc_html__( '-1 to show all posts', 'olyve' ),
			]
		);
		
		$this->add_control(
			'layout',
			[
				'label' 		=> esc_html__( 'Layout', 'olyve' ),
				'type' 			=> Controls_Manager::SELECT,
				'default'		=> 'dtr-portfolio-fitrows',
				'separator' 	=> 'before',
				'description'	=> esc_html__( 'Save and check it - Frontend', 'olyve' ),
				'options'		=> [
					'dtr-portfolio-fitrows'	=> esc_html__( 'Fit Rows', 'olyve' ),
					'dtr-portfolio-masonry'	=> esc_html__( 'Masonry', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'columns',
			[
				'label' 	=> esc_html__( 'Number of columns', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'dtr-portfolio-grid-3col',
				'options'	=> [
					'dtr-portfolio-grid-2col'	=> esc_html__( '2', 'olyve' ),
					'dtr-portfolio-grid-3col' 	=> esc_html__( '3', 'olyve' ),
					'dtr-portfolio-grid-4col' 	=> esc_html__( '4', 'olyve' ),
				],
			]
		);
		
        $this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Border Radius', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--rounded',
				'options'	=> [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'olyve' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'post_orderby',
			[
				'label' 	=> esc_html__( 'Sort Posts By', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'date',
				'separator' 	=> 'before',
				'options' 	=> [
					'date'	=> esc_html__( 'Date', 'olyve' ),
					'rand' 	=> esc_html__( 'Random', 'olyve' ),
					'title'	=> esc_html__( 'Title', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label' 	=> esc_html__( 'Arrange Sorted Posts', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'DESC',
				'options' 	=> [
					'DESC'	=> esc_html__( 'Descending', 'olyve' ),
					'ASC'  	=> esc_html__( 'Ascending', 'olyve' ),
				],
			]
		);
		
		// tax
		$this->add_control(
			'tax',
			[
				'label' 		=> esc_html__( 'Show only Selected Categories', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> '',
				'label_block'	=> true,
				'show_label' 	=> true,
				'separator' 	=> 'before',
				'description'	=> esc_html__( 'Add slugs of categories to be displayed, separated by comma', 'olyve' ),
			]
		);
		
		// filter
		$this->add_control(
			'filter',
			[
				'label' 	=> esc_html__( 'Filter', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'show',
				'separator'	=> 'before',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
        
        		
		// all link
		$this->add_control(
			'all_text',
			[
				'label' 		=> esc_html__( 'All Link Text', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'All', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);
	
		// image
		$this->add_control(
			'image_settings',
			[
				'label' 	=> esc_html__( 'Image Settings', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'image_size',
			[
				'label' 	=> esc_html__( 'Image Size', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'img_default',
				'options' 	=> [
					'img_default'	=> esc_html__( 'Default', 'olyve' ),
					'img_custom'	=> esc_html__( 'Custom - Hard Crop', 'olyve' ),
				],
			]
		);
	
		$this->add_control(
			'image_size_default',
			[
				'label' 	=> esc_html__( 'Choose Image Size', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'full',
				'condition'	=> [
					'image_size'	=> [ 'img_default' ],
				],
				'options'	=> [
					'full'		=> esc_html__( 'Full', 'olyve' ),
					'medium'	=> esc_html__( 'Medium', 'olyve' ),
					'thumbnail'	=> esc_html__( 'Thumbnail', 'olyve' ),
				],
			]
		);

		$this->add_control(
			'img_crop_info',
			[
				'label' 	=> esc_html__( 'While using cropping - size of main image must be greater than specified for cropping.', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition'	=> [
					'image_size'	=> [ 'img_custom' ],
				],
			]
		);
		
		$this->add_control(
			'img_width',
			[
				'label' 	=> esc_html__( 'Hard Crop - Width ', 'olyve' ),
				'type' 		=> Controls_Manager::NUMBER,
				'default' 	=> 600,
				'condition'	=> [
					'image_size'	=> [ 'img_custom' ],
				],
				'min'		=> 100,
				'step' 		=> 10,
				'separator' => 'none',
			]
		);
		
		$this->add_control(
			'img_height',
			[
				'label' 	=> esc_html__( 'Hard Crop - Height ', 'olyve' ),
				'type' 		=> Controls_Manager::NUMBER,
				'default' 	=> 400,
				'condition'	=> [
					'image_size'	=> [ 'img_custom' ],
				],
				'min' 		=> 100,
				'step' 		=> 10,
				'separator' => 'none',
			]
		);	
		
		// heading
		$this->add_control(
			'heading_settings',
			[
				'label' 	=> esc_html__( 'Heading Settings', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'heading',
			[
				'label' 	=> esc_html__( 'Heading', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'heading_size',
			[
				'label' 		=> esc_html__( 'Heading HTML Tag', 'olyve' ),
				'type' 			=> Controls_Manager::SELECT,
				'options'		=> [
					'h1'	=> 'H1',
					'h2' 	=> 'H2',
					'h3' 	=> 'H3',
					'h4' 	=> 'H4',
					'h5' 	=> 'H5',
					'h6' 	=> 'H6',
					'p' 	=> 'p',
				],
				'label_block'	=> true,
				'default' 		=> 'h4',
			]
		);
		
		// subheading
		$this->add_control(
			'subheading_settings',
			[
				'label' 	=> esc_html__( 'Short Info Settings', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'subheading',
			[
				'label' 	=> esc_html__( 'Short Info', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default'	=> 'show',
				'options' 	=> [
					'show'	=> esc_html__( 'Show', 'olyve' ),
					'hide'	=> esc_html__( 'Hide', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'subheading_size',
			[
				'label' 		=> esc_html__( 'Short Info HTML Tag', 'olyve' ),
				'type' 			=> Controls_Manager::SELECT,
				'options'		=> [
					'h1'	=> 'H1',
					'h2' 	=> 'H2',
					'h3' 	=> 'H3',
					'h4' 	=> 'H4',
					'h5' 	=> 'H5',
					'h6' 	=> 'H6',
					'p' 	=> 'p',
				],
				'label_block'	=> true,
				'default' 		=> 'p',
			]
		);
		
		// link
		$this->add_control(
			'link_settings',
			[
				'label' 	=> esc_html__( 'Link Settings', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
        $this->add_control(
			'link_icon',
			[
				'label' 	=> esc_html__( 'Show Link Icon', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'yes',
				'separator'	=> 'before',
				'options' 	=> [
					'yes'	=> esc_html__( 'Yes', 'olyve' ),
					'no'	=> esc_html__( 'No', 'olyve' ),
				],
			]
		);
        
		$this->add_control(
			'link_wrap',
			[
				'label' 	=> esc_html__( 'Wrap in Link', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'yes',
				'separator'	=> 'before',
				'options' 	=> [
					'yes'	=> esc_html__( 'Yes', 'olyve' ),
					'no'	=> esc_html__( 'No', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'target',
			[
				'label' 	=> esc_html__( 'Open Link In', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '_blank',
				'separator'	=> 'before',
				'options' 	=> [
					'_blank'	=> esc_html__( 'New Window', 'olyve' ),
					'_self'	=> esc_html__( 'Same Window', 'olyve' ),
				],
			]
		);
		
		
		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_style_content',
			[
				'label'	=> esc_html__( 'Styles', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Portfolio Item Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-portfolio-item__wrapper' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'filter_content_style',
			[
				'label' => esc_html__( 'Filter', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
			]
		);
		
		$this->add_control(
			'filter_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-filter-nav a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'filter_hover_color',
			[
				'label' 	=> esc_html__( 'Hover : Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-filter-nav a:hover'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'filter_active_color',
			[
				'label' 	=> esc_html__( 'Active : Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-filter-nav a.active'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'filter_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-filter-nav a',
            ]
        );

		// heading
		$this->add_control(
			'item_heading_style',
			[
				'label' => esc_html__( 'Heading', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'heading_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-portfolio-item__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'main_heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio-item__heading',
            ]
        );
		
		// subheading
		$this->add_control(
			'subheading_style',
			[
				'label' => esc_html__( 'Short Info', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
		$this->add_control(
			'subheading_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-portfolio-item__subheading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'subheading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio-item__subheading',
            ]
        );
        
        // heading
		$this->add_control(
			'btn_style',
			[
				'label' => esc_html__( 'Icon Link Style', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-icon-btn' => 'color: {{VALUE}};',
				],
			]
		);
        
		$this->add_control(
			'icon_hover_color',
			[
				'label' => __( 'Hover: Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-icon-btn:hover' => 'color: {{VALUE}};',
				],
			]
		);
        
         $this->add_control(
			'main_title_style',
			[
				'label' => esc_html__( 'Main Section Heading', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);
        
        $this->add_control(
			'heading_style',
			[
				'label' 	=> esc_html__( 'Style', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-heading__gradient',
				'options'	=> [
					'dtr-heading__default'  => esc_html__( 'Default - Single Color', 'olyve' ),
                    'dtr-heading__gradient'	=> esc_html__( 'With Gradient', 'olyve' ),
				],
			]
		);
        
        $this->add_control(
			'default_heading_color',
			[
				'label' => __( 'Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
                'condition' => [
					'heading_style' => [ 'dtr-heading__default' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-heading__default' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'main_title_gradient',
				'types' => [ 'gradient' ],
                'condition' => [
					'heading_style' => [ 'dtr-heading__gradient' ],
				],
				'selector' => '{{WRAPPER}} .dtr-heading__gradient',
			]
		);
        
       $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'main_title_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-portfolio__main-title',
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
		echo do_shortcode('[dtr_portfolio_grid main_title="' . $settings['main_title'] . '" heading_style="' . $settings['heading_style'] . '" limit="' . $settings['limit'] . '" orderby="' . $settings['post_orderby'] . '" order="' . $settings['post_order'] . '" tax="' . $settings['tax'] . '" filter="' . $settings['filter'] . '" heading="' . $settings['heading'] . '" heading_size="' . $settings['heading_size'] . '" image_size="' . $settings['image_size'] . '" image_size_default="' . $settings['image_size_default'] . '" img_width="' . $settings['img_width'] . '" img_height="' . $settings['img_height'] . '" layout="' . $settings['layout'] . '" columns="' . $settings['columns'] . '" border_radius="' . $settings['border_radius'] . '" all_text="' . $settings['all_text'] . '" subheading="' . $settings['subheading'] . '" subheading_size="' . $settings['subheading_size'] . '" link_wrap="' . $settings['link_wrap'] . '" link_icon="' . $settings['link_icon'] . '" target="' . $settings['target'] . '" ]');
	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() { }
}