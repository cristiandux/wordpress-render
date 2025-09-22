<?php
namespace OlyveAddons;

use OlyveAddons\Widgets\Olyve_Theme_Heading;
use OlyveAddons\Widgets\Olyve_Button;
use OlyveAddons\Widgets\Olyve_Iconhead;
use OlyveAddons\Widgets\Olyve_Icon_List;
use OlyveAddons\Widgets\Olyve_Feature;
use OlyveAddons\Widgets\Olyve_Number_Feature;
use OlyveAddons\Widgets\Olyve_About;
use OlyveAddons\Widgets\Olyve_Timeline;
use OlyveAddons\Widgets\Olyve_Skills;
use OlyveAddons\Widgets\Olyve_Animated_Heading;
use OlyveAddons\Widgets\Olyve_Blockquote;
use OlyveAddons\Widgets\Olyve_Testimonial_Carousel;
use OlyveAddons\Widgets\Olyve_Recentposts_Carousel;
use OlyveAddons\Widgets\Olyve_Portfolio;
use OlyveAddons\Widgets\Olyve_Marquee;


if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * Main Plugin Class
 * Register new elementor widget.
 * @since 1.0.0
 */
class Olyve_Elementor_Addons {
	
	/**
	 * Minimum Elementor Version
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

	/**
	 * Constructor
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$this->add_actions();
		$this->setup_hooks();
		// Image Resizer
		require_once( OLYVE_ELEMENTOR_ADDONS_PATH . 'inc/aq_resizer.php' );
	}
	
	/**
	 * Add Actions
	 * @since 1.0.0
	 * @access private
	 */
	
	public function add_actions() {
		add_action( 'elementor/widgets/register', [ $this, 'on_widgets_registered' ] );
		add_action( 'elementor/init', array( $this, 'add_elementor_category' ) );
		
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}
		
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}
		
	}

	/**
	 * Admin notice
	 * Warning when the site doesn't have Elementor installed or activated.
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'olyve' ),
			'<strong>' . esc_html__( 'Olyve Elementor Addons', 'olyve' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'olyve' ) . '</strong>'
		);
		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	
	/**
	 * Admin notice
	 * Warning when the site doesn't have a minimum required Elementor version.
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'olyve' ),
			'<strong>' . esc_html__( 'Olyve Elementor Addons', 'olyve' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'olyve' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add setup_hooks
	 * @since 1.0.0
	 * @access private
	 */
	private function setup_hooks() {
		// Register Widget Styles
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/frontend/after_register_scripts',[ $this, 'register_frontend_scripts' ], 10 );
	}
	
	/**
	 * On Widgets Registered
	 * @since 1.0.0
	 * @access public
	 */
	public function on_widgets_registered() {
		$this->includes();
		$this->register_widget();
	}
	
	/**
	 * Add Category
	 * @since 1.0.0
	 * @access public
	 */
	 public function add_elementor_category() {
		\Elementor\Plugin::instance()->elements_manager->add_category(
			'dtr-element',
			array(
				'title' => __('Olyve Addons', 'olyve'),
				'icon' => 'fa fa-plug',
			),
			1);
      }

	/**
	 * Includes
	 * @since 1.0.0
	 * @access private
	 */
	private function includes() {
        require __DIR__ . '/inc/dtr-icons.php';
		require __DIR__ . '/widgets/dtr-theme-heading.php';
        require __DIR__ . '/widgets/dtr-button.php';
		require __DIR__ . '/widgets/dtr-icon-heading.php';
        require __DIR__ . '/widgets/dtr-icon-list.php';
		require __DIR__ . '/widgets/dtr-feature.php';
        require __DIR__ . '/widgets/dtr-number-feature.php';
        require __DIR__ . '/widgets/dtr-about.php';
        require __DIR__ . '/widgets/dtr-timeline.php';
        require __DIR__ . '/widgets/dtr-skills.php';
		require __DIR__ . '/widgets/dtr-animated-heading.php';
		require __DIR__ . '/widgets/dtr-blockquote.php';
		require __DIR__ . '/widgets/dtr-testimonial-carousel.php';
        require __DIR__ . '/widgets/dtr-recentposts-carousel.php';
        require __DIR__ . '/widgets/dtr-portfolio.php';
        require __DIR__ . '/widgets/dtr-marquee.php';
	}

	/**
	 * Register Widget
	 * @since 1.0.0
	 * @access private
	 */
	private function register_widget() {
		\Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Theme_Heading() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Button() );
	    \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Iconhead() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Icon_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Feature() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Number_Feature() );  
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_About() );   
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Timeline() ); 
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Skills() );     
		\Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Animated_Heading() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Blockquote() );
	 	\Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Testimonial_Carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Recentposts_Carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Portfolio() );
        \Elementor\Plugin::instance()->widgets_manager->register( new Olyve_Marquee() );
	}
	
	/**
	 * enqueue styles
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_styles() {
	    
        wp_enqueue_style( 'dtr-custom-icons', OLYVE_ELEMENTOR_ADDONS_URL . 'fonts/iconfont.css' );
        
		// elementor pro css mod
        global $olyve_theme_mod;
        $elementor_pro_mod = '';
        $elementor_pro_mod = isset($olyve_theme_mod['olyve_elementor_pro_mod']) ? $olyve_theme_mod['olyve_elementor_pro_mod'] : false;
		if ( $elementor_pro_mod == false && ! class_exists( 'ElementorPro\Plugin' ) ) {
			wp_enqueue_style( 'dtr-elementor-pro-mod', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/css/elementor-pro-mod.css' );
		}
	}
	
	/**
	 * Load Frontend Scripts
	 *
	 */
	public function register_frontend_scripts() {
		wp_register_script( 'swiper', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/swiper-bundle.min.js', array('jquery'), '5.0.3', true );
		wp_register_script( 'dtr-widgets', OLYVE_ELEMENTOR_ADDONS_URL . 'assets/js/dtr-widgets.js', array('jquery'), '1.0', true );
		wp_enqueue_style( 'font-awesome-5-all', ELEMENTOR_ASSETS_URL . 'lib/font-awesome/css/all.min.css' );
    } 
	
}
new Olyve_Elementor_Addons();