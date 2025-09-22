<?php
namespace OlyveAddons\Widgets;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * About Widget
 */
class Olyve_About extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-about';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'About', 'olyve' );
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
		
		// image control starts
		$this->start_controls_section(
			'section_main_content',
			[
				'label'	=> esc_html__( 'About', 'olyve' ),
			]
		);

		// image
		$this->add_control(
			'about_image_control',
			[
				'label' => esc_html__( 'Image', 'olyve' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);		
		$this->add_control(
			'image',
			[
				'label' 	=> esc_html__( 'Choose Image', 'olyve' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default'	=> [
					'url'	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' 		=> 'thumbnail',
				'default' 	=> 'full',
				'separator'	=> 'none',
			]
		);
        
        $this->add_responsive_control(
			'about_image_border_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'olyve' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .dtr-about__img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_control(
			'left_title_info',
			[
				'label' 	=> esc_html__( 'Left Title', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);	
        
		$this->add_control(
			'about_title_left',
			[
				'label' 		=> esc_html__( 'Left Title Text', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'UX Research', 'olyve' ),
				'placeholder'	=> esc_html__( 'Left Title', 'olyve' ),
				'label_block' 	=> true,
			]
		);
        
        $this->add_responsive_control(
			'about_title_left_top_position',
			[
				'label' => esc_html__( 'Position from Top', 'olyve' ),
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
					'{{WRAPPER}} .dtr-about-title__left' => 'top: {{SIZE}}{{UNIT}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'about_title_left_left_position',
			[
				'label' => esc_html__( 'Position from Left', 'olyve' ),
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
					'{{WRAPPER}} .dtr-about-title__left' => 'left: {{SIZE}}{{UNIT}}',
				],
			]
		);
       
        $this->add_control(
			'right_title_info',
			[
				'label' 	=> esc_html__( 'Right Title', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);
         
        $this->add_control(
			'about_title_right',
			[
				'label' 		=> esc_html__( 'Right Title Text', 'olyve' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> esc_html__( 'UX Research', 'olyve' ),
				'placeholder'	=> esc_html__( 'Left Title', 'olyve' ),
				'label_block' 	=> true,
			]
		);
        
         $this->add_responsive_control(
			'about_title_right_bottom_position',
			[
				'label' => esc_html__( 'Position from Bottom', 'olyve' ),
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
					'{{WRAPPER}} .dtr-about-title__right' => 'bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);
        
        $this->add_responsive_control(
			'about_title_right_right_position',
			[
				'label' => esc_html__( 'Position from Right', 'olyve' ),
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
					'{{WRAPPER}} .dtr-about-title__right' => 'right: {{SIZE}}{{UNIT}}',
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

		// style control starts
		$this->start_controls_section(
			'section_content_main_styles',
			[
				'label'	=> esc_html__( 'Styles', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->add_control(
			'left_title_style_info',
			[
				'label' 	=> esc_html__( 'Left Title', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
			]
		);
        
		$this->add_control(
			'left_title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-about-title__left .dtr-about-title' => 'background-color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'left_title_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-about-title__left .dtr-about-title::after' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'left_title_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-about-title__left .dtr-about-title' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'right_title_style_info',
			[
				'label' 	=> esc_html__( 'Right Title', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);
        
        $this->add_control(
			'right_title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-about-title__right .dtr-about-title' => 'background-color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'right_title_arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .dtr-about-title__right .dtr-about-title::after' => 'color: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'right_title_color',
			[
				'label' => esc_html__( 'Color', 'olyve' ),
				'default' => '',
				'type' => Controls_Manager::COLOR,
                'separator' 	=> 'after',
				'selectors' => [
					'{{WRAPPER}} .dtr-about-title__right .dtr-about-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'about_title_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector'	=> '{{WRAPPER}} .dtr-about-title',
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
	  ?>
<div class="dtr-about">
    <?php if ( ! empty( $settings['image']['url'] ) ) { ?>
    <div class="dtr-about__img"> 		
        <?php
		$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
		$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
		$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
		$image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
        <?php echo $image_html ?> 
        <?php if ( ! empty( $settings['about_title_left'] ) ) {  ?>
        <div class="dtr-about-title__left dtr-aboutCursorLeft">
            <div class="dtr-about-title">
                <p><?php echo esc_html( $settings['about_title_left'] ) ?></p>
            </div>
        </div>
        <?php } ?>
        <?php if ( ! empty( $settings['about_title_right'] ) ) {  ?>  
        <div class="dtr-about-title__right dtr-aboutCursorRight">
            <div class="dtr-about-title">
                <p><?php echo esc_html( $settings['about_title_right'] ) ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</div>
<?php
	}

	/**
	 * Render widget output in the editor.
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 * @access protected
	 */
	protected function content_template() {
		?>
<div class="dtr-about">
    <#	if ( settings.image.url ) { #>
    <div class="dtr-about__img"> 
        <#
        var image = {
        id: settings.image.id,
        url: settings.image.url,
        size: settings.thumbnail_size,
        dimension: settings.thumbnail_custom_dimension,
        model: view.getEditModel()
        };
        var image_url = elementor.imagesManager.getImageUrl( image );  #> <img src="{{ image_url }}"/> 
        <# if ( settings.about_title_left ) { #>
        <div class="dtr-about-title__left dtr-aboutCursorLeft">
            <div class="dtr-about-title">
              {{{settings.about_title_left }}} 
            </div>
        </div>
        <# } #> 
        <# if ( settings.about_title_right ) { #>
        <div class="dtr-about-title__right dtr-aboutCursorRight">
            <div class="dtr-about-title">
              {{{settings.about_title_right }}} 
            </div>
        </div>
        <# } #> 
        
     </div>
    <# } #>
</div> 
<?php
	}
}