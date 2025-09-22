<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Olyve_Blockquote extends Widget_Base {

	/**
	 * Retrieve widget name
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-quote';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Blockquote', 'olyve' );
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
			'section_blockquote_content',
			[
				'label' => esc_html__( 'Blockquote', 'olyve' ),
			]
		);
		
		$this->add_control(
			'blockquote_style',
			[
				'label' => esc_html__( 'Quote Style', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-quote__left-align',
				'label_block' => true,
				'options' => [
					'dtr-quote__center-align'	=> esc_html__( 'Center Aligned', 'olyve' ),
					'dtr-quote__left-align'	=> esc_html__( 'Left Aligned', 'olyve' ),
					'dtr-quote__right-align'	=> esc_html__( 'Right Aligned', 'olyve' ),
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
				'options'	=> [
					'dtr-radius--rounded'   => esc_html__( 'Rounded', 'olyve' ),
					'dtr-radius--square'    => esc_html__( 'Square', 'olyve' ),
				],
			]
		);
		
		// Blockquote Text
		$this->add_control(
			'blockquote_content',
			[
				'label' => esc_html__( 'Blockquote Text', 'olyve' ),
				'description' => esc_html__('Use &lt;br&gt; tag for line break', 'olyve'),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Blockquote Text.', 'olyve' ),
				'placeholder' => esc_html__( 'Your Description', 'olyve' ),
				'title' => esc_html__( 'Blockquote Text Here', 'olyve' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
			]
		);
		
		$this->add_control(
			'blockquote_author',
			[
				'label' => esc_html__( 'Author Name', 'olyve' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'olyve' ),
				'placeholder' => esc_html__( 'Author Name Here', 'olyve' ),
				'label_block' => true,
				'show_label' => true,
			]
		);
				
		$this->add_control(
			'blockquote_source',
			[
				'label' => esc_html__( 'Source', 'olyve' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Source', 'olyve' ),
				'placeholder' => esc_html__( 'Source Here', 'olyve' ),
				'label_block' => true,
				'show_label' => true,
			]
		);
		
		$this->add_control(
			'view',
			[
				'label' => esc_html__( 'View', 'olyve' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);
		
		$this->end_controls_section();
		// content control ends

		// style control starts
		$this->start_controls_section(
			'section_blockquote_style',
			[
				'label' => esc_html__( 'Styles', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-quote' => 'background-color: {{VALUE}};',
				],
			]
		);
        
		$this->add_control(
			'quote_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
                'separator'	=> 'before',
				'selectors' => [
					'{{WRAPPER}} .dtr-quote__content::before' => 'color: {{VALUE}};',
				],
			]
		);
        
		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-quote__content' => 'border-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'content_style_control',
			[
				'label' 	=> esc_html__( 'Blockquote Text', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'blockquote_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} blockquote' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'blockquote_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} blockquote',
            ]
        );
		
		$this->add_control(
			'author_style_control',
			[
				'label' 	=> esc_html__( 'Author', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'blockquote_author_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-quote__author' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'blockquote_author_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-quote__author',
            ]
        );

		$this->add_control(
			'source_style_control',
			[
				'label' 	=> esc_html__( 'Source', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'before',
			]
		);
		
		$this->add_control(
			'blockquote_source_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-quote__source' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'blockquote_source_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-quote__source',
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
		$html = ''; 
		$html .= '<div class="dtr-quote ' . esc_attr( $settings['blockquote_style'] ) . ' ' . esc_attr( $settings['border_radius'] ) . ' clearfix"><div class="dtr-quote__content">';
		
		if ( ! empty( $settings['blockquote_content'] ) ) {
			$html .= sprintf( '<blockquote>%s</blockquote>', wp_kses_post( $settings['blockquote_content'] ) );
		}
		if ( ! empty( $settings['blockquote_author'] ) ) {
			$html .= sprintf( '<h5 class="dtr-quote__author">%s</h5>', esc_html( $settings['blockquote_author'] ) ); 
		}  
		if ( ! empty( $settings['blockquote_source'] ) ) {
			$html .= sprintf( '<span class="dtr-quote__source">%s</span>', esc_html( $settings['blockquote_source'] ) ); 
		}  
		$html .= '</div></div>';
		echo $html;	
	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
		<#
		var html = '<div class="dtr-quote ' + settings.blockquote_style + ' ' + settings.border_radius + ' clearfix"><div class="dtr-quote__content">';
		if ( settings.blockquote_content ) {
			html += '<blockquote>' + settings.blockquote_content + '</blockquote>';
		}
        if ( settings.blockquote_author ) {
			html += '<h5 class="dtr-quote__author">' + settings.blockquote_author + '</h5>';
		}
		if ( settings.blockquote_source ) {
			html += '<span class="dtr-quote__source">' + settings.blockquote_source + '</span>';
		}
		html += '</div></div>';
		print( html );
		#>
		<?php
	}
}