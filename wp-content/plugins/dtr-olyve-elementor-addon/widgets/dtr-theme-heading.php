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
class Olyve_Theme_Heading extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-theme-heading';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Theme Heading', 'olyve' );
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
	
		// content control starts
		$this->start_controls_section(
			'section_main_content',
			[
				'label'	=> esc_html__( 'Theme Heading', 'olyve' ),
			]
		);

        $this->add_control(
			'heading_style',
			[
				'label' 	=> esc_html__( 'Heading Style', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-heading__gradient',
				'options'	=> [
					'dtr-heading__default'  => esc_html__( 'Default', 'olyve' ),
                    'dtr-heading__gradient'	=> esc_html__( 'With Gradient', 'olyve' ),
				],
			]
		);
        
		// heading
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
				'default' => 'h2',
			]
		);
        
        $this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'olyve' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'olyve' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'olyve' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'olyve' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => 'left',
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
			'section_main_style',
			[
				'label'	=> esc_html__( 'Typography', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		// heading
		$this->add_control(
			'heading_style_control',
			[
				'label'	=> esc_html__( 'Heading Font Settings', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-heading',
            ]
        );
        
         $this->add_control(
			'heading_color_style',
			[
				'label' 	=> esc_html__( 'Choose Heading Color Scheme from Theme Defaults', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-text--color-three',
                'label_block' => true,
                'condition' => [
					'heading_style' => [ 'dtr-heading__default' ],
				],
				'options'	=> [
					'dtr-text--color-one'   => esc_html__( 'First', 'olyve' ),
                    'dtr-text--color-two'   => esc_html__( 'Default - Second', 'olyve' ),
                    'dtr-text--color-three' => esc_html__( 'Third', 'olyve' ),
                    'dtr-text--color-four'  => esc_html__( 'Fourth', 'olyve' ),
				],
			]
		);
        
        $this->add_control(
			'default_heading_color',
			[
				'label' => __( 'Set custom Color', 'olyve' ),
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
        
        $this->add_control(
			'default_heading_span_color',
			[
				'label' => __( 'Span in Heading - Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
                'condition' => [
					'heading_style' => [ 'dtr-heading__default' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-heading__default span' => 'color: {{VALUE}};',
				],
			]
		);
        
       $this->add_control(
			'heading_gradient_info',
			[
				'label' 	=> esc_html__( 'Heading Gradient', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
					'heading_style' => [ 'dtr-heading__gradient' ],
				],
			]
		);	
 
       $this->add_control(
			'heading_gradient_info_two',
			[
				'label' 	=> esc_html__( 'Set angle to 90 degree for better result. Headings gradient can be changed at once for all headings via theme options in Theme Base Colors', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
					'heading_style' => [ 'dtr-heading__gradient' ],
				],
			]
		);	
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'heading_gradient',
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .dtr-heading',
                'condition' => [
					'heading_style' => [ 'dtr-heading__gradient' ],
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
	$settings = $this->get_settings(); ?>
    <?php if ( ! empty( $settings['heading'] ) ) { ?>
        <<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-heading <?php echo esc_attr( $settings['heading_style'] ); ?> <?php echo esc_attr( $settings['heading_color_style'] ); ?>"><?php echo wp_kses_post( $settings['heading'] ) ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
    <?php } ?>
<?php }

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
        <# if ( settings.heading != '' ) { #>
            <{{ settings.heading_size }} class="dtr-heading {{ settings.heading_style }} {{ settings.heading_color_style }}"> {{{ settings.heading }}}</{{ settings.heading_size }}>
        <# } #> 
		<?php
	}
}