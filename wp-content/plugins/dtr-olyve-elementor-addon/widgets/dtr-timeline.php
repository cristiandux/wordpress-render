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
class Olyve_Timeline extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-timeline';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Timeline', 'olyve' );
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
			'section_timeline',
			[
				'label' => __( 'Timeline', 'olyve' ),
			]
		);
        
       $this->add_control(
			'icon_info',
			[
				'label' 	=> esc_html__( 'Icon / Image Settings', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
			]
		);	
        
		$this->add_control(
			'timeline_align_style',
			[
				'label' => esc_html__( 'Align', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-timeline--icon-align-left',
				'label_block' => true,
				'options' => [
					'dtr-timeline--icon-align-left'		=> esc_html__( 'Left', 'olyve' ),
					'dtr-timeline--icon-align-right' 	=> esc_html__( 'Right', 'olyve' ),
				],
			]
		);
        
		$this->add_control(
			'timeline_icon_style',
			[
				'label' => esc_html__( 'Background Style', 'olyve' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'dtr-timeline--style-rounded',
				'label_block' => true,
				'options' => [
					'dtr-timeline--style-default'	=> esc_html__( 'None', 'olyve' ),
                    'dtr-timeline--style-rounded'	=> esc_html__( 'Rounded Background', 'olyve' ),
					'dtr-timeline--style-circle' 	=> esc_html__( 'Circle Background', 'olyve' ),
					'dtr-timeline--style-square'	=> esc_html__( 'Square Background', 'olyve' ),
				],
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'separator' => 'before',
				'range' => [
					'px' => [
						'max' => 200,
					],
				],
				'default' => [
				'size' => '',
				],
                'condition' => [
					'timeline_icon_style'	=> [ 'dtr-timeline--style-default' ],
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-timeline__icon' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->add_control(
			'timeline_icon_type',
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
					'timeline_icon_type' => [ 'icon-type-icon' ],
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
					'timeline_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'olyve' ),
				'options' => olyve_icons(),
			]
		);
		
		// image
		$this->add_control(
			'timeline_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'timeline_icon_type'	=> [ 'icon-type-img' ],
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
					'timeline_icon_type'	=> [ 'icon-type-img' ],
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
					'timeline_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);
		
		// custom icon
		$this->add_control(
			'timeline_icon_html',
			[
				'label' => __( 'Custom HTML', 'olyve' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'timeline_icon_type'	=> [ 'icon-type-html' ],
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
				'default' 		=> esc_html__( 'Heading', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Heading', 'olyve' ),
				'label_block'	=> true,
				'show_label'	=> true,
			]
		);
        
         
		$this->add_control(
			'heading_subtext',
			[
				'label' 		=> esc_html__( 'Subtext in Heading', 'olyve' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Subtext in Heading', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Heading Subtext', 'olyve' ),
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
				'default' => 'p',
			]
		);

        // content
        $this->add_control(
			'text_properties',
			[
				'label' 	=> esc_html__( 'Timeline Text', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);	
        
		$this->add_control(
			'timeline_content',
			[
				'label' 		=> esc_html__( 'Use this span for seperating arrow : <span class="arrow"></span>', 'olyve' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Content', 'olyve' ),
				'placeholder' 	=> esc_html__( 'Your Content', 'olyve' ),
				'label_block' 	=> true,
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
					'{{WRAPPER}} .dtr-timeline__icon' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'icon_bg_color',
			[
				'label' => __( 'Background Color', 'olyve' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .dtr-timeline__icon' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .dtr-timeline__heading'	=> 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'subheading_color',
			[
				'label' 	=> esc_html__( 'Subtext Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline__heading-subtext'	=> 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'heading_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-timeline__heading',
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
					'{{WRAPPER}} .dtr-timeline__text'	=> 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'text_border_color',
			[
				'label' 	=> esc_html__( 'Border Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-timeline__text'	=> 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'text_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-timeline__text',
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
        
		// icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		?>
      <div class="dtr-timeline <?php echo esc_attr( $settings['timeline_icon_style'] ); ?> <?php echo esc_attr( $settings['timeline_align_style'] ); ?>">
            <div class="dtr-icon dtr-timeline__icon">
             <?php if ( $settings['timeline_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) { 
                    Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] ); 
                } elseif ( $settings['timeline_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
                    <i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
             <?php } elseif ( $settings['timeline_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) { 
                    $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                    $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                    $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                    $image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
                    echo $image_html;
                } elseif ( $settings['timeline_icon_type'] == 'icon-type-html' && ! empty( $settings['timeline_icon_html'] ) ) {
                    echo $settings['timeline_icon_html'];
              } else {}  ?>      
            </div>
        <?php if ( ! empty( $settings['heading'] ) || ! empty( $settings['timeline_content'] ) ) { ?>
             <div class="dtr-timeline__content">
                 <?php if ( ! empty( $settings['heading'] ) ) { ?>
                 <<?php echo esc_attr( $settings['heading_size'] ) ?> class="dtr-timeline__heading"><?php echo wp_kses_post( $settings['heading'] ); ?> <span class="dtr-timeline__heading-subtext"><?php echo wp_kses_post( $settings['heading_subtext'] ); ?></span></<?php echo esc_attr( $settings['heading_size'] ) ?>>
                 <?php } ?>
                 <?php if ( ! empty( $settings['timeline_content'] ) ) { ?>
                 <div class="dtr-timeline__text"><?php echo wp_kses_post( $settings['timeline_content'] ) ?></div>
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
        <div class="dtr-timeline {{ settings.timeline_icon_style }} {{ settings.timeline_align_style }}">
        
            <div class="dtr-icon dtr-timeline__icon">
                <# if ( settings.timeline_icon_type == 'icon-type-icon' ) { #>
                    {{{ iconHTML.value }}}
                <# } else if ( settings.timeline_icon_type == 'icon-type-custom-icon' ) { #>
                    <i class="{{ settings.custom_icon }}"></i> 	
                <# } else if ( settings.timeline_icon_type == 'icon-type-img' ) { #>
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
                <# } else if ( settings.timeline_icon_type == 'icon-type-html' ) { #>
                    {{{ settings.timeline_icon_html }}}
                <# } else { } #>
            </div>
            
            <div class="dtr-timeline__content">
                <# if ( settings.heading != '' ) { #>
                <{{ settings.heading_size }} class="dtr-timeline__heading">{{{ settings.heading }}} <span class="dtr-timeline__heading-subtext">{{{ settings.heading_subtext }}}</span></{{ settings.heading_size }}>
                <# } #>
                <# if ( settings.timeline_content != '' ) { #>
                <div class="dtr-timeline__text">{{{ settings.timeline_content }}}</div>
                <# } #>
            </div>
        </div> 
		<?php
	}
}