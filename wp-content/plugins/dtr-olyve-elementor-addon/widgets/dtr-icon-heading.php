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
class Olyve_Iconhead extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-iconhead';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Icon + Text', 'olyve' );
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
			'section_iconhead',
			[
				'label' => __( 'Icon + Text', 'olyve' ),
			]
		);
		
        $this->add_control(
			'iconhead_wrap_style',
			[
				'label' => esc_html__( 'Wrap Style', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'label_block' => true,
				'options' => [
					'' 						=> esc_html__( 'None', 'olyve' ),
					'dtr-iconhead--boxed'	=> esc_html__( 'Boxed', 'olyve' ),
				],
			]
		);
        
        $this->add_control(
			'border_radius',
			[
				'label' 	=> esc_html__( 'Border Radius', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-radius--round',
                'condition' => [
					'iconhead_wrap_style'	=> [ 'dtr-iconhead--boxed' ],
				],
				'options'	=> [
                    'dtr-radius--round'      => esc_html__( 'Round', 'olyve' ),
					'dtr-radius--rounded'    => esc_html__( 'Rounded', 'olyve' ),
					'dtr-radius--square'     => esc_html__( 'Square', 'olyve' ),
				],
			]
		);
        
        $this->add_responsive_control(
			'iconhead_box_x_padding',
			[
				'label' => esc_html__( 'Left/Right Padding to Box', 'olyve' ),
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
					'iconhead_wrap_style'	=> [ 'dtr-iconhead--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead--boxed' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'iconhead_box_y_padding',
			[
				'label' => esc_html__( 'Top/Bottom Padding to Box', 'olyve' ),
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
					'iconhead_wrap_style'	=> [ 'dtr-iconhead--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead--boxed' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
		$this->add_control(
			'iconhead_icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-iconhead--style-default',
                'separator'	=> 'before',
				'label_block' => true,
				'options' => [
					'dtr-iconhead--style-default'	=> esc_html__( 'Default', 'olyve' ),
					'dtr-iconhead--style-circle' 	=> esc_html__( 'Circle Background', 'olyve' ),
					'dtr-iconhead--style-square'	=> esc_html__( 'Square Background', 'olyve' ),
				],
			]
		);
		
		$this->add_control(
			'iconhead_align_style',
			[
				'label' => esc_html__( 'Icon Align', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-iconhead--align-left',
				'label_block' => true,
				'options' => [
					'dtr-iconhead--align-left'		=> esc_html__( 'Left', 'olyve' ),
					'dtr-iconhead--align-right' 	=> esc_html__( 'Right', 'olyve' ),
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead__icon' => 'font-size: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'iconhead_icon_style'	=> [ 'dtr-iconhead--style-default' ],
				],
			]
		);
		
		$this->add_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Icon Margin Right', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead--align-left .dtr-iconhead__icon' => 'margin-right: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'iconhead_align_style'	=> [ 'dtr-iconhead--align-left' ],
				],
			]
		);
		
		$this->add_control(
			'icon_margin-left',
			[
				'label' => esc_html__( 'Icon Margin Left', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead--align-right .dtr-iconhead__icon' => 'margin-left: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'iconhead_align_style'	=> [ 'dtr-iconhead--align-right' ],
				],
			]
		);
		
		$this->add_control(
			'iconhead_icon_type',
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
					'iconhead_icon_type' => [ 'icon-type-icon' ],
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
					'iconhead_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'olyve' ),
				'options' => olyve_icons(),
			]
		);
		
		// image
		$this->add_control(
			'iconhead_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'iconhead_icon_type'	=> [ 'icon-type-img' ],
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
					'url'	=> 
                    OLYVE_ELEMENTOR_ADDONS_URL . 'assets/img/img-circle-100x100.png',
				],
				'condition'	=> [
					'iconhead_icon_type'	=> [ 'icon-type-img' ],
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
					'iconhead_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);
		
		$this->add_control(
			'iconhead_icon_html',
			[
				'label' => __( 'Custom HTML', 'olyve' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'iconhead_icon_type'	=> [ 'icon-type-html' ],
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
				'default' => 'p',
			]
		);
		
		// button
		$this->add_control(
			'link',
			[
				'label' 		=> esc_html__( 'Link to Text', 'olyve' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder'	=> 'http://your-link.com',
				'default'	=> [
					'url'	=> '',
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
				'label' => __( 'Box Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'condition' => [
					'iconhead_wrap_style'	=> [ 'dtr-iconhead--boxed' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead--boxed' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Icon Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
                'separator' 	=> 'before',
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead__icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Icon Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead__icon' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'iconhead_icon_style'	=> [ 'dtr-iconhead--style-circle', 'dtr-iconhead--style-square' ],
				],
			]
		);
		
		$this->add_control(
			'icon_border_color',
			[
				'label' => __( 'Icon Border Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-iconhead__icon' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'iconhead_icon_style'	=> [ 'dtr-iconhead--style-circle', 'dtr-iconhead--style-square' ],
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
				'label' 	=> esc_html__( 'Heading', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-iconhead__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-iconhead__heading',
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
		}
		// icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		?>
        <div class="dtr-iconhead <?php echo esc_attr( $settings['iconhead_align_style'] ); ?> <?php echo esc_attr( $settings['iconhead_icon_style'] ); ?> <?php echo esc_attr( $settings['iconhead_wrap_style'] ); ?> <?php echo $settings['border_radius']; ?>">
        <div class="dtr-icon dtr-iconhead__icon">
             <?php if ( $settings['iconhead_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) { 
                    Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] ); 
                } elseif ( $settings['iconhead_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
                    <i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
             <?php } elseif ( $settings['iconhead_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) { 
                    $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                    $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                    $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                    $image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
                    echo $image_html;
                } elseif ( $settings['iconhead_icon_type'] == 'icon-type-html' && ! empty( $settings['iconhead_icon_html'] ) ) {                 
                    echo $settings['iconhead_icon_html'];
              } else {}  ?>      
            </div>
        <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
            <a class="dtr-iconhead__link" <?php echo $this->get_render_attribute_string( 'button' ); ?>>
        <?php } ?>
        <?php if ( ! empty( $settings['heading'] ) ) { ?>
        	<<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-iconhead__heading"><?php echo wp_kses_post( $settings['heading'] ); ?></<?php echo esc_attr( $settings['heading_size'] ) ?>>
        <?php } ?>
        <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
            </a>
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
        <div class="dtr-iconhead {{ settings.iconhead_align_style }} {{ settings.iconhead_icon_style }} {{ settings.iconhead_wrap_style }}  {{ settings.border_radius }}">
            <div class="dtr-icon dtr-iconhead__icon">
                <# if ( settings.iconhead_icon_type == 'icon-type-icon' ) { #>
                    {{{ iconHTML.value }}}
                <# } else if ( settings.iconhead_icon_type == 'icon-type-custom-icon' ) { #>
                    <i class="{{ settings.custom_icon }}"></i> 	
                <# } else if ( settings.iconhead_icon_type == 'icon-type-img' ) { #>
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
                <# } else if ( settings.iconhead_icon_type == 'icon-type-html' ) { #>
                    {{{ settings.iconhead_icon_html }}}
                <# } else { } #>
            </div>
            <# if ( settings.link.url != '' ) { #>
                <a class="dtr-iconhead__link" href="{{ settings.link.url }}" role="button">
            <# } #> 
            <{{ settings.heading_size }} class="dtr-iconhead__heading"> {{{ settings.heading }}}</{{ settings.heading_size }}>
            <# if ( settings.link.url != '' ) { #>
                </a>
            <# } #> 
        </div> 
		<?php
	}
}