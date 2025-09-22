<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Olyve_Number_Feature extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-number-feature';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Number Feature', 'olyve' );
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
			'section_number_feature',
			[
				'label' => __( 'Number Feature', 'olyve' ),
			]
		);
        
        $this->add_control(
			'wrap_style',
			[
				'label' 	=> esc_html__( 'Wrap Style', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'options'	=> [
					'dtr-number-feature--boxed' => 'Boxed',
					'' 	                        => 'Default',
				],
				'default' => '',
			]
		);
        
        $this->add_control(
			'number',
			[
				'label' 		=> esc_html__( 'Number', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( '01', 'olyve' ),
				'placeholder' 	=> esc_html__( '01', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		); 
        
		$this->add_control(
			'heading',
			[
				'label' 		=> esc_html__( 'Heading', 'olyve' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Heading Goes Here', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Heading Goes Here', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
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
				'default' => 'h3',
			]
		);
		
		$this->add_control(
			'feature_box_content',
			[
				'label' 		=> esc_html__( 'Content', 'olyve' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Content Goes Here', 'olyve' ),
				'separator'		=> 'before',
				'placeholder' 	=> esc_html__( 'Your Content', 'olyve' ),
				'label_block' 	=> true,
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
			'border_radius',
			[
				'label' 	=> esc_html__( 'Box Border Radius', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--rounded',
                'separator' 	=> 'before',
                'condition' => [
					'wrap_style'	=> [ 'dtr-number-feature--boxed' ],
				],
				'options'	=> [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'olyve' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'olyve' ),
				],
			]
		);
        
        $this->add_control(
			'content_m_top',
			[
				'label' => esc_html__( 'Margin Top to Feature Text', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 300,
					],
				],
				'default' => [
				'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-number-feature__content' => 'margin-top: {{SIZE}}{{UNIT}}',
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
				'label' 	=> esc_html__( 'Box Background Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
                'condition' => [
					'wrap_style'	=> [ 'dtr-number-feature--boxed' ],
				],
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature'	=> 'background-color: {{VALUE}};',
				],
			]
		);
         		
		// number
		$this->add_control(
			'number_style_control',
			[
				'label' 	=> esc_html__( 'Number', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__number'	=> 'color: {{VALUE}};',
				],
			]
		);

        $this->add_control(
			'number_hover_color',
			[
				'label' 	=> esc_html__( 'On Box Hover: Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature:hover .dtr-number-feature__number'	=> 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'number_border_color',
			[
				'label' 	=> esc_html__( 'Border Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__number'	=> 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'number_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-number-feature__number',
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
					'{{WRAPPER}} .dtr-number-feature__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-number-feature__heading',
            ]
        );
			
		// content
		$this->add_control(
			'content_style_control',
			[
				'label' 	=> esc_html__( 'Content', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'content_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__text'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'content_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-number-feature__text',
            ]
        );
        
        // link
		$this->add_control(
			'link_style_control',
			[
				'label' 	=> esc_html__( 'Link Icon', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'link_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-number-feature__link'	=> 'color: {{VALUE}};',
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
					'{{WRAPPER}} .dtr-number-feature__link:hover'	=> 'color: {{VALUE}};',
				],
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
        if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
		}
		$this->add_render_attribute( 'button', 'role', 'button' );
		?>
        <div class="dtr-number-feature <?php echo $settings['wrap_style']; ?> <?php echo $settings['border_radius']; ?>"> 
            <a class="dtr-number-feature__link" <?php echo $this->get_render_attribute_string( 'button' ); ?>></a>   
            <?php if ( ! empty( $settings['number'] ) ) { ?>
                <div class="dtr-number-feature__number"><?php echo esc_html( $settings['number'] ); ?></div>
            <?php } ?>  
            <div class="dtr-number-feature__content ">
                <?php if ( ! empty( $settings['heading'] ) ) { ?>
                    <<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-number-feature__heading"><a <?php echo $this->get_render_attribute_string( 'button' ); ?>><?php echo wp_kses_post( $settings['heading'] ); ?></a></<?php echo esc_attr( $settings['heading_size'] ) ?>>
                <?php } ?>
                <?php if ( ! empty( $settings['feature_box_content'] ) ) { ?>
                     <div class="dtr-number-feature__text"><?php echo wp_kses_post( $settings['feature_box_content'] ) ?></div>
                <?php } ?>
            </div>
        </div>
<?php	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>        
        <div class="dtr-number-feature {{ settings.wrap_style }} {{ settings.border_radius }}">
            <# if ( settings.link.url != '' ) { #> 
            <a class="dtr-number-feature__link" class="dtr-number-feature__number" href="{{ settings.link.url }}" role="button"></a> 
            <# } #>
            <# if ( settings.number != '' ) { #>
                <div class="dtr-number-feature__number">{{{ settings.number }}}</div>
            <# } #>
            <div class="dtr-number-feature__content ">
                <{{ settings.heading_size }} class="dtr-number-feature__heading">{{{ settings.heading }}}</{{ settings.heading_size }}>
                 <# if ( settings.feature_box_content != '' ) { #>
                <div class="dtr-number-feature__text">{{{ settings.feature_box_content }}}</div>
                <# } #>
            </div>
        </div> 
		<?php
	}
}