<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\REPEATER;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Olyve_Animated_Heading extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-animated-heading';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Animated Heading', 'olyve' );
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
	  	wp_register_script( 'animated-headline', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/animated-headline.js', [ 'elementor-frontend' ], '1.0.0', true );
		wp_register_style( 'animated-headline', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/css/animated-headline.css' );
    }
	
	/**
	 * Retrieve the list of scripts the widget depends on.
	 * Used to set scripts dependencies required to run the widget.
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
        return [
			'animated-headline',
        ];
    }
	
	/**
	 * Retrieve the list of styles the widget depends on.
	 * Used to set styles dependencies required to run the widget.
	 * @return array Widget styles dependencies.
	 */
	public function get_style_depends() {
        return [
			'animated-headline'
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
			'section_heading_content',
			[
				'label'	=> esc_html__( 'Animated Heading', 'olyve' ),
			]
		);
		
		$this->add_control(
			'animation_style',
			[
				'label' 	=> esc_html__( 'Animation Style', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'options'	=> [
					'slide' 	=> esc_html__( 'Slide', 'olyve' ),
					'push'		=> esc_html__( 'Push', 'olyve' ),
					'rotate-1'	=> esc_html__( 'Rotate', 'olyve' ),
					'zoom'		=> esc_html__( 'Zoom', 'olyve' ),
				],
				'default'	=> 'slide',
			]
		);
		
		$this->add_control(
			'info_one',
			[
				'label' 	=> esc_html__( 'Leave Before / After Animating Text field blank if need to rotate complete sentences', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		// heading
		$this->add_control(
			'heading_before',
			[
				'label' 		=> esc_html__( 'Before Animating Text', 'olyve' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Experience The', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Experience The', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator'		=> 'before',
			]
		);
		
		$this->add_control(
			'heading_after',
			[
				'label' 		=> esc_html__( 'After Animating Text', 'olyve' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> '',
				'placeholder' 	=> '',
				'label_block'	=> true,
				'show_label'	=> true,
				'separator'		=> 'before',
			]
		);
				
		$this->add_control(
			'heading_size',
			[
				'label' 	=> esc_html__( 'HTML Tag', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'separator'		=> 'before',
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
		
		$this->add_control(
			'text_align',
			[
				'label' 	=> esc_html__( 'Text Align', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'text-left',
				'options'	=> [
					'text-center'	=> esc_html__( 'Center', 'olyve' ),
					'text-left'		=> esc_html__( 'Left', 'olyve' ),
					'text-right'	=> esc_html__( 'Right', 'olyve' ),
				],
			]
		);
		
		// animate_text
		$this->add_control(
			'text_l1',
			[
				'label' 		=> esc_html__( 'First Rotating Word', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Good', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Good', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
				'separator' 	=> 'before',
			]
		);
		
		
		$repeater = new Repeater();

		$repeater->add_control(
			'animating_items_text',
			[
				'label' 		=> '',
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'Better', 'olyve' ),
				'separator'		=> 'before',
				'placeholder'	=> esc_html__( 'Better', 'olyve' ),
				'label_block' 	=> true,
			]
		);

		// fields
		$this->add_control(
			'animating_items',
			[
				'label' => __( 'Other Words to Rotate', 'olyve' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'animating_items_text'	=> __( 'Better', 'olyve' ),
					],
					[
						'animating_items_text'	=> __( 'Best', 'olyve' ),
					],
				],
				
				'title_field' => '{{{ animating_items_text }}}',
			]
		);

		
		$repeater->add_control(
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
			'section_heading_style',
			[
				'label'	=> esc_html__( 'Styles', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		// heading
		$this->add_control(
			'heading_style_control',
			[
				'label'	=> esc_html__( 'Heading', 'olyve' ),
				'type' 	=> Controls_Manager::HEADING,
			]
		);
		
		$this->add_control(
			'heading_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-animated-headline'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'animated_text_color',
			[
				'label' 	=> esc_html__( 'Animating Words Color', 'olyve' ),
				'default' 	=> '',
				'type' 		=> Controls_Manager::COLOR,
				'selectors'	=> [
					'{{WRAPPER}} .dtr-words-wrapper b'	=> 'color: {{VALUE}};',
				],
			]
		);


		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-animated-headline',
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

		<<?php echo esc_attr( $settings['heading_size'] ); ?> class=" dtr-animated-headline <?php echo esc_attr( $settings['text_align']  ); ?> <?php echo esc_attr( $settings['animation_style']  ); ?>">
		<?php if ( ! empty( $settings['heading_before'] ) ) { ?>
		<?php echo wp_kses_post( $settings['heading_before'] ); ?> 
		<?php } ?>
		<span class="dtr-words-wrapper">
		<b class="is-visible"><?php echo esc_html( $settings['text_l1'] ); ?></b>
		<?php foreach ( $settings['animating_items'] as $index => $item ) : ?>
		<b>
		<?php echo esc_html( $item['animating_items_text'] ) ?>
		</b>
		<?php endforeach; ?>
		</span>
		<?php if ( ! empty( $settings['heading_after'] ) ) { ?>
		<?php echo wp_kses_post( $settings['heading_after'] ); ?> 
		<?php } ?>
		</<?php echo esc_attr( $settings['heading_size'] ); ?>>
<?php }

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
		
		<{{{ settings.heading_size }}} class="dtr-animated-headline {{{ settings.animation_style }}} {{{ settings.text_align }}}">
		<# if ( settings.heading_before ) {  #>
		{{{ settings.heading_before }}}
		<# } #>
		<span class="dtr-words-wrapper">
		<b class="is-visible">{{{ settings.text_l1 }}}</b>
		<# if ( settings.animating_items ) {
		_.each( settings.animating_items, function( item, index ) { #>
			<b>	
			{{{ item.animating_items_text }}}
			</b>
		<# } ); 
		} #>
		</span>
		<# if ( settings.heading_after ) {  #>
		{{{ settings.heading_after }}}
		<# } #>
		</{{{ settings.heading_size }}}>
	
		<?php
	}
}