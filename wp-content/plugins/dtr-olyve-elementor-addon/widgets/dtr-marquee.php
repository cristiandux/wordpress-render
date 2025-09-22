<?php
namespace OlyveAddons\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Repeater;
use Elementor\Icons_Manager;
use Elementor\Control_Media;
use Elementor\Group_Control_Image_Size;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widget
 */
class Olyve_Marquee extends Widget_Base {

	/**
	 * Retrieve widget name.
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'dtr-marquee';
	}

	/**
	 * Retrieve widget title.
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Text Marquee', 'olyve' );
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
			'section_marquee_content',
			[
				'label'	=> esc_html__( 'Text Marquee', 'olyve' ),
			]
		);
        
        $this->add_control(
			'marquee_help_control',
			[
				'label' 	=> esc_html__( 'If you have less items, just repeat the same set of words once or twice. This will make text to occupy available page width, so no blank space will show up.', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'separator'	=> 'after',
			]
		);
        
        $repeater = new Repeater();

		$repeater->add_control(
			'marquee_text',
			[
				'label' => __( 'Text', 'olyve' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Best Design', 'olyve' ),
				'default' => __( 'Best Design', 'olyve' ),
			]
		);
        
        $this->add_control(
			'marquee_list',
			[
				'label' => __( 'Marquee Items', 'olyve' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'marquee_text' => __( 'Item #1', 'olyve' ),
					],
					[
						'marquee_text' => __( 'Item #2', 'olyve' ),
					],
					[
						'marquee_text' => __( 'Item #3', 'olyve' ),
					],
				],
				'title_field' => '{{{ marquee_text }}}',
			]
		);
				
		$this->add_control(
			'scroll_direction',
			[
				'label' 	=> esc_html__( 'Scroll Direction', 'olyve' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> 'dtr-marquee-l',
				'separator' => 'before',
				'options'	=> [
					''				=> esc_html__( 'Right to Left', 'olyve' ),
					'dtr-marquee-l'	=> esc_html__( 'Left to Right', 'olyve' ),
				],
			]
		);
		
		$this->add_responsive_control(
			'scroll_speed',
			[
				'label' => esc_html__( 'Animation Speed', 'olyve' ),
				'type' => Controls_Manager::SLIDER,
				'separator' => 'before',
				'range' => [
					'px' => [
						'max' => 300,
					],
				],
				'default' => [
				'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .dtr-marquee' => 'animation-duration: calc({{SIZE}}s)',
				],
			]
		);
        
        $this->add_control(
			'marquee_icon_type',
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
					'marquee_icon_type' => [ 'icon-type-icon' ],
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
					'marquee_icon_type'	=> [ 'icon-type-custom-icon' ],
				],
				'description' => esc_html__( 'Icon demo file for extra icons is included in help document.', 'olyve' ),
				'options' => olyve_icons(),
			]
		);
		
		// image
		$this->add_control(
			'marquee_image_control',
			[
				'label' 	=> esc_html__( 'Image', 'olyve' ),
				'type' 		=> Controls_Manager::HEADING,
				'condition' => [
					'marquee_icon_type'	=> [ 'icon-type-img' ],
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
					'marquee_icon_type'	=> [ 'icon-type-img' ],
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
					'marquee_icon_type'	=> [ 'icon-type-img' ],
				],
			]
		);
		
		// custom icon
		$this->add_control(
			'marquee_icon_html',
			[
				'label' => __( 'Custom HTML', 'olyve' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => '',
				'label_block' => true,
				'condition' => [
					'marquee_icon_type'	=> [ 'icon-type-html' ],
				],
			]
		);
		
		$this->add_control(
			'marquee_text_mr',
			[
				'label' => esc_html__( 'Margin Right to Text', 'olyve' ),
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
					'{{WRAPPER}} .dtr-marquee__text' => 'margin-right: {{SIZE}}{{UNIT}}',
				],
			]
		);
        
        $this->add_control(
			'marquee_icon_ml',
			[
				'label' => esc_html__( 'Margin Left to Icon / Image', 'olyve' ),
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
					'{{WRAPPER}} .dtr-marquee__icon' => 'margin-left: {{SIZE}}{{UNIT}}',
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
			'section_marquee_style',
			[
				'label' => esc_html__( 'Styles', 'olyve' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'text_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-marquee__text'	=> 'color: {{VALUE}};',
				],
			]
		);
	
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' 		=> 'text_typo',
				'label' 	=> esc_html__( 'Typography', 'olyve' ),
                'selector' 	=> '{{WRAPPER}} .dtr-marquee',
            ]
        );
        
        $this->add_control(
			'icon_color',
			[
				'label' 	=> esc_html__( 'Color', 'olyve' ),
				'type' 		=> Controls_Manager::COLOR,
				'default' 	=> '',
				'selectors'	=> [
					'{{WRAPPER}} .dtr-marquee__icon'	=> 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .dtr-marquee',
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
        // icon
		if ( ! empty( $settings['custom_icon'] ) ) {
			$this->add_render_attribute( 'custom_icon', 'class', $settings['custom_icon'] );
			$this->add_render_attribute( 'custom_icon', 'aria-hidden', 'true' );
		}
		?>
        <div class="dtr-marquee-wrapper">  
            <div class="dtr-marquee <?php echo esc_attr( $settings['scroll_direction'] ) ?>">
                <?php
                foreach ( $settings['marquee_list'] as $index => $item ) :
                $repeater_setting_key = $this->get_repeater_setting_key( 'marquee_text', 'marquee_list', $index );
                $this->add_inline_editing_attributes( $repeater_setting_key ); 
                ?>
                <div class="dtr-marquee__text" <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>><?php echo $item['marquee_text']; ?><span class="dtr-marquee__icon dtr-icon">
                 <?php if ( $settings['marquee_icon_type'] == 'icon-type-icon' && ! empty( $settings['default_icon'] ) ) { 
                        Icons_Manager::render_icon( $settings['default_icon'], [ 'aria-hidden' => 'true' ] ); 
                    } elseif ( $settings['marquee_icon_type'] == 'icon-type-custom-icon' && ! empty( $settings['custom_icon'] ) ) { ?>
                        <i <?php echo $this->get_render_attribute_string( 'custom_icon' ); ?>></i>
                 <?php } elseif ( $settings['marquee_icon_type'] == 'icon-type-img' && ! empty( $settings['image']['url'] ) ) { 
                        $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                        $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                        $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                        $image_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );
                        echo $image_html;
                    } elseif ( $settings['marquee_icon_type'] == 'icon-type-html' && ! empty( $settings['marquee_icon_html'] ) ) {
                        echo $settings['marquee_icon_html'];
                  } else {}  ?>
               </span></div>
                <?php endforeach; ?>
            </div>
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
        <# iconHTML = elementor.helpers.renderIcon( view, settings.default_icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
        <div class="dtr-marquee-wrapper">  
            <div class="dtr-marquee {{{settings.scroll_direction }}}">                
                <# _.each( settings.marquee_list, function( item, index ) {
                    var iconTextKey = view.getRepeaterSettingKey( 'marquee_text', 'marquee_list', index );
                    view.addRenderAttribute( iconTextKey, 'class', 'dtr-marquee__text' );
                    view.addInlineEditingAttributes( iconTextKey ); #>
                    <div {{{ view.getRenderAttributeString( iconTextKey ) }}}>{{{ item.marquee_text }}}<span class="dtr-marquee__icon dtr-icon">
                        <# if ( settings.marquee_icon_type == 'icon-type-icon' ) { #>
                            {{{ iconHTML.value }}}
                        <# } else if ( settings.marquee_icon_type == 'icon-type-custom-icon' ) { #>
                            <i class="{{ settings.custom_icon }}"></i> 	
                        <# } else if ( settings.marquee_icon_type == 'icon-type-img' ) { #>
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
                        <# } else if ( settings.marquee_icon_type == 'icon-type-html' ) { #>
                            {{{ settings.marquee_icon_html }}}
                        <# } else { } #>
                    </span></div>
                <# } ); #>
            </div>
        </div>
<?php
	}
}