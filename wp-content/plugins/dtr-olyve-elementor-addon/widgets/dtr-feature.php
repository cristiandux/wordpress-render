<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Olyve_Feature extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-feature';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Feature', 'olyve' );
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
	 * Register widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_feature',
			[
				'label' => __( 'Feature', 'olyve' ),
			]
		);
		
		$this->add_control(
			'feature_wrap_style',
			[
				'label' => esc_html__( 'Wrap Style', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'label_block' => true,
				'options' => [
					'' 						=> esc_html__( 'None', 'olyve' ),
					'dtr-feature--boxed'	=> esc_html__( 'Boxed', 'olyve' ),
				],
			]
		);
        
        $this->add_responsive_control(
			'feature_box_padding',
			[
				'label' => esc_html__( 'Padding to Box', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
                'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature--boxed' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Border Radius', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '',
                'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'options'	=> [
					''	                    => esc_html__( 'Rounded', 'olyve' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'icon_properties',
			[
				'label' 	=> esc_html__( 'Style to Icon / Image', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);	
			       
		$this->add_control(
			'feature_icon_style',
			[
				'label' => esc_html__( 'Background Style', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-feature--style-rounded',
				'label_block' => true,
				'options' => [
					'dtr-feature--style-default'	=> esc_html__( 'None', 'olyve' ),
                    'dtr-feature--style-rounded' 	=> esc_html__( 'Rounded Background', 'olyve' ),
					'dtr-feature--style-circle' 	=> esc_html__( 'Circle Background', 'olyve' ),
					'dtr-feature--style-square'		=> esc_html__( 'Square Background', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'feature_icon_size_style',
			[
				'label' => esc_html__( 'Background Size', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-feature--size-medium',
				'label_block' => true,
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-rounded', 'dtr-feature--style-circle', 'dtr-feature--style-square' ],
				],
				'options' => [
					'dtr-feature--size-small'	=> esc_html__( 'Small', 'olyve' ),
                    'dtr-feature--size-medium' 	=> esc_html__( 'Medium', 'olyve' ),
					'dtr-feature--size-large' 	=> esc_html__( 'Large', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'feature_align_style',
			[
				'label' => esc_html__( 'Icon / Image Align', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-feature--icon-align-left',
				'label_block' => true,
				'options' => [
					'dtr-feature--icon-align-left'		=> esc_html__( 'Left', 'olyve' ),
					'dtr-feature--icon-align-right' 	=> esc_html__( 'Right', 'olyve' ),
					'dtr-feature--icon-align-top'	    => esc_html__( 'Top', 'olyve' ),
				],
			]
		);
		
        $this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Text Align', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-feature--text-left',
				'label_block' => true,
				'options' => [
					'dtr-feature--text-left'	=> esc_html__( 'Left', 'olyve' ),
					'dtr-feature--text-right' 	=> esc_html__( 'Right', 'olyve' ),
					'dtr-feature--text-center'	=> esc_html__( 'Center', 'olyve' ),
				],
				'condition' => [
					'feature_align_style'	=> [ 'dtr-feature--icon-align-top' ],
				],
			]
		);
        
		$this->add_control(
			'feature_vert_align',
			[
				'label' => esc_html__( 'Icon Vertical Align', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-feature--icon-vert-align-top',
				'label_block' => true,
				'options' => [
					'dtr-feature--icon-vert-align-top'		=> esc_html__( 'Top', 'olyve' ),
					'dtr-feature--icon-vert-align-center'	=> esc_html__( 'Middle', 'olyve' ),
				],
				'condition' => [
					'feature_align_style'	=> [ 'dtr-feature--icon-align-left', 'dtr-feature--icon-align-right' ],
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'separator' => 'before',
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-default' ],
				],
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'icon_m_top',
			[
				'label' => esc_html__( 'Margin Top to Icon', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-default' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'icon_m_right',
			[
				'label' => esc_html__( 'Margin Right to Icon', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-default' ],
					'feature_align_style'	=> [ 'dtr-feature--icon-align-left' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'margin-right: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'icon_m_left',
			[
				'label' => esc_html__( 'Margin Left to Icon', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-default' ],
					'feature_align_style'	=> [ 'dtr-feature--icon-align-right' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'margin-left: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'feature_icon_type',
			[
				'label' 	=> esc_html__( 'Icon Type', 'olyve' ),
				'type'		=> Controls_Manager::SELECT,
				'default'	=> 'icon-type-icon',
				'separator'	=> 'before',
				'options' 	=> [
					'icon-type-icon'		=> esc_html__( 'Font Awesome Icon', 'olyve' ),
					'icon-type-img'			=> esc_html__( 'Image', 'olyve' ),
					'icon-type-custom-icon'	=> esc_html__( 'Theme Icon', 'olyve' ),
					'icon-type-html'		=> esc_html__( 'Custom HTML', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'default_icon',
			[
				'label' => esc_html__( 'Font Awesome Library', 'olyve' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'label_block' => true,
				'condition' => [
					'feature_icon_type' => [ 'icon-type-icon' ],
				],
			]
		);

		$this->add_control(
			'custom_icon',
			[
				'label' => esc_html__( 'Theme Custom Library', 'olyve' ),
				'type' => Controls_Manager::SELECT2,
				'default' => 'icon-arrow-right',
				'label_block' => true,
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'olyve' ),
				'options' => olyve_icons(),
			]
		);
		
		// image
		$this->add_control(
			'feature_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);	
			
		$this->add_control(
			'image',
			[
				'label' 	=> esc_html__( 'Choose Image', 'olyve' ),
				'type' 		=> Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default'	=> [
					'url'	=> OLYVE_ELEMENTOR_ADDONS_URL . 'assets/img/img-circle-100x100.png',
				],
				'condition'	=> [
					'feature_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' 		=> 'thumbnail',
				'default' 	=> 'full',
				'separator'	=> 'none',
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);
		
		// custom icon
		$this->add_control(
			'feature_icon_html',
			[
				'label' => __( 'Custom HTML', 'olyve' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'feature_icon_type'	=> [ 'icon-type-html' ],
				],
			]
		);
		
		// heading
        $this->add_control(
			'heading_properties',
			[
				'label' 	=> esc_html__( 'Heading', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);	
        
		$this->add_control(
			'heading',
			[
				'label' 		=> '',
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Heading Goes Here', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Heading Goes Here', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);
				
		$this->add_control(
			'heading_size',
			[
				'label' 	=> esc_html__( 'Heading - HTML Tag', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'options'	=> [
					'h1' 	=> 'H1',
					'h2' 	=> 'H2',
					'h3' 	=> 'H3',
					'h4' 	=> 'H4',
					'h5' 	=> 'H5',
					'h6'	=> 'H6',
					'p' 	=> 'p',
				],
				'default' => 'h4',
			]
		);
        
        $this->add_control(
			'heading_m_top',
			[
				'label' => esc_html__( 'Margin Top to Heading', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__heading' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
        // content
        $this->add_control(
			'text_properties',
			[
				'label' 	=> esc_html__( 'Feature Text', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);	
        
		$this->add_control(
			'feature_content',
			[
				'label' 		=> '',
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> '',
				'placeholder' 	=> esc_html__( 'Your Content', 'olyve' ),
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'text_m_top',
			[
				'label' => esc_html__( 'Margin Top', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__text' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);
        
		// subtext
        $this->add_control(
			'subtext_properties',
			[
				'label' 	=> esc_html__( 'Subtext', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);	
        
		$this->add_control(
			'subtext',
			[
				'label' 		=> '',
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> '',
				'placeholder' 	=> esc_html__( 'Sub Text', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);
        
        $this->add_control(
			'subtext_m_top',
			[
				'label' => esc_html__( 'Margin Top', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__subtext' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);
       
        // link       
		$this->add_control(
			'link_control',
			[
				'label' 	=> esc_html__( 'Link', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);		
		
		$this->add_control(
			'link',
			[
				'label' 		=> esc_html__( 'Link', 'olyve' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder'	=> 'http://your-link.com',
				'default' 		=> [
					'url'	=> '#',
				],
			]
		);
        
        $this->add_control(
			'link_text',
			[
				'label' => __( 'Link Text', 'olyve' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Learn More', 'olyve' ),
				'separator' => '',
				'placeholder' => __( 'Learn More', 'olyve' ),
			]
		);
        
        $this->add_control(
			'link_m_top',
			[
				'label' => esc_html__( 'Margin Top', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__link' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'olyve' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Styles', 'olyve' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'box_bg_color',
			[
				'label' => __( 'Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature--boxed' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'box_hover_bg_color',
			[
				'label' => __( 'On Hover - Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature--boxed:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_style_control',
			[
				'label' 	=> esc_html__( 'Icon', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-rounded', 'dtr-feature--style-circle', 'dtr-feature--style-square' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'background-color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'icon_border_width',
			[
				'label' => esc_html__( 'Border Width', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'separator' => 'before',
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-circle', 'dtr-feature--style-rounded', 'dtr-feature--style-square' ],
				],
				'range' => [
					'px' => [
						'max' => 5,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature__icon' => 'border-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		

		$this->add_control(
			'icon_border_color',
			[
				'label' 	=> esc_html__( 'Border Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'condition' => [
					'feature_icon_style'	=> [ 'dtr-feature--style-circle', 'dtr-feature--style-rounded', 'dtr-feature--style-square' ],
				],
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature__icon'	=> 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_hover_color',
			[
				'label' => __( 'On Box Hover - Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature--boxed:hover .dtr-feature__icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_hover_bg_color',
			[
				'label' => __( 'On Box Hover - Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
					'feature_icon_style'	=> [ 'dtr-feature--style-circle', 'dtr-feature--style-rounded', 'dtr-feature--style-square' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-feature--boxed:hover .dtr-feature__icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_border_color',
			[
				'label' 	=> esc_html__( 'On Box Hover - Border Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
					'feature_icon_style'	=> [ 'dtr-feature--style-circle', 'dtr-feature--style-rounded', 'dtr-feature--style-square' ],
				],
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature--boxed:hover .dtr-feature__icon'	=> 'border-color: {{VALUE}};',
				],
			]
		);
		
		// heading
		$this->add_control(
			'heading_style_control',
			[
				'label' 	=> esc_html__( 'Heading', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'heading_hover_color',
			[
				'label' 	=> esc_html__( 'Color - On Box Hover', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature--boxed:hover .dtr-feature__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-feature__heading',
            ]
        );
		
		// subtext
		$this->add_control(
			'subtext_style_control',
			[
				'label' 	=> esc_html__( 'Subtext', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'subtext_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature__subtext'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'subtext_hover_color',
			[
				'label' 	=> esc_html__( 'Color - On Box Hover', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature--boxed:hover .dtr-feature__subtext'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'subtext_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-feature__subtext',
            ]
        );


		// text
		$this->add_control(
			'text_style_control',
			[
				'label' 	=> esc_html__( 'Text', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature__text'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'text_hover_color',
			[
				'label' 	=> esc_html__( 'Color - On Box Hover', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'condition' => [
					'feature_wrap_style'	=> [ 'dtr-feature--boxed' ],
				],
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature--boxed:hover .dtr-feature__text'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'text_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-feature__text',
            ]
        );
        
        // link
		$this->add_control(
			'link_style_control',
			[
				'label' 	=> esc_html__( 'Link', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'link_hover_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-feature__link, {{WRAPPER}} .dtr-feature__link:hover' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'link_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-feature__link',
            ]
        );
		
		$this->end_controls_section();
	}

		/**
	 * Render widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings(); 
        // button
		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
			$this->add_render_attribute( 'button', 'class', 'dtr-feature__link' );
		}
		$this->add_render_attribute( 'button', 'role', 'button' );
        
		// icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		?>
        <div class="dtr-feature <?php echo esc_attr( $settings['feature_wrap_style'] ); ?> <?php echo esc_attr( $settings['feature_icon_style'] ); ?> <?php echo esc_attr( $settings['feature_vert_align'] ); ?> <?php echo esc_attr( $settings['text_align'] ); ?> <?php echo esc_attr( $settings['feature_align_style'] ); ?> <?php echo esc_attr( $settings['feature_icon_size_style'] ); ?> <?php echo $settings['border_radius']; ?>">
            <div class="dtr-icon dtr-feature__icon">
             <?php if ( $settings['feature_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) { 
                    Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] ); 
                } elseif ( $settings['feature_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
                    <i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
             <?php } elseif ( $settings['feature_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) { 
                    $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                    $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                    $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                    $image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
                    echo $image_html;
                } elseif ( $settings['feature_icon_type'] == 'icon-type-html' && ! empty( $settings['feature_icon_html'] ) ) {
                    echo $settings['feature_icon_html'];
              } else {}  ?>      
            </div>
        <?php if ( ! empty( $settings['subtext'] ) || ! empty( $settings['heading'] ) || ! empty( $settings['feature_content'] ) ) { ?>
             <div class="dtr-feature__content">
             <?php if ( ! empty( $settings['subtext'] ) ) { ?>
             <p class="dtr-feature__subtext"><?php echo wp_kses_post( $settings['subtext'] ); ?></p>
             <?php } ?>
             <?php if ( ! empty( $settings['heading'] ) ) { ?>
             <<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-feature__heading"><?php echo wp_kses_post( $settings['heading'] ); ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
             <?php } ?>
             <?php if ( ! empty( $settings['feature_content'] ) ) { ?>
             <div class="dtr-feature__text"><?php echo wp_kses_post( $settings['feature_content'] ) ?></div>
             <?php } ?>
             <?php if ( $settings['link_text'] != '' ) { ?>
                <a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo $settings['link_text']; ?></a>
             <?php } ?>
             </div>
        <?php } ?>
        </div>
<?php	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
        <# iconHTML = elementor.helpers.renderIcon( view, settings.default_icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
        <div class="dtr-feature {{ settings.feature_wrap_style }} {{ settings.feature_icon_style }} {{ settings.feature_vert_align }} {{ settings.text_align }} {{ settings.feature_align_style }} {{ settings.feature_icon_size_style }} {{ settings.border_radius }}">
        
            <div class="dtr-icon dtr-feature__icon">
                <# if ( settings.feature_icon_type == 'icon-type-icon' ) { #>
                    {{{ iconHTML.value }}}
                <# } else if ( settings.feature_icon_type == 'icon-type-custom-icon' ) { #>
                    <i class="{{ settings.custom_icon }}"></i> 	
                <# } else if ( settings.feature_icon_type == 'icon-type-img' ) { #>
                    <#
                    var image = {
                    id: settings.image.id,
                    url: settings.image.url,
                    size: settings.thumbnail_size,
                    dimension: settings.thumbnail_custom_dimension,
                    model: view.getEditModel()
                    };
                    var image_url = elementor.imagesManager.getImageUrl( image );  #> 
                    <img src="{{ image_url }}"/> 
                <# } else if ( settings.feature_icon_type == 'icon-type-html' ) { #>
                    {{{ settings.feature_icon_html }}}
                <# } else { } #>
            </div>
            
            <div class="dtr-feature__content">
            <# if ( settings.subtext != '' ) { #>
            <p class="dtr-feature__subtext">{{{ settings.subtext }}}</p>
            <# } #>
            <# if ( settings.heading != '' ) { #>
            <{{ settings.heading_size }} class="dtr-feature__heading"> {{{ settings.heading }}}</{{ settings.heading_size }}>
            <# } #>
            <# if ( settings.feature_content != '' ) { #>
            <div class="dtr-feature__text">{{{ settings.feature_content }}}</div>
            <# } #>
            <# if ( settings.link_text != '' ) { #>
               <a class="dtr-feature__link" href="{{ settings.link.url }}" role="button">{{{ settings.link_text }}}</a> 
            <# } #>
            </div>
        </div> 
		<?php
	}
}