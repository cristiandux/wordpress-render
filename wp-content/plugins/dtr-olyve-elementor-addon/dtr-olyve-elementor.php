<?php
/**
 * Plugin Name: Olyve Elementor Addons
 * Description: Adds custom elements for Olyve Theme via Elementor plugin. 
 * Author:      Tansh
 * Version:     1.0.5
 * Author URI:  http://themeforest.net/user/tansh
 * License:     GPL-2.0+
 * Text Domain: olyve
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
define('OLYVE_ELEMENTOR_ADDONS_URL', plugin_dir_url(__FILE__));
define( 'OLYVE_ELEMENTOR_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
			
/**
 * Load the plugin after Elementor loaded.
 * @since 1.0.0
 */
function olyve_elementor_addons_load() {
	// Require the main plugin file
	require( __DIR__ . '/class-dtr-olyve-elementor.php' );
}
add_action( 'plugins_loaded', 'olyve_elementor_addons_load' );

/**
 * Load the plugin text domain for translations.
 * @since 1.0.0
 */
function olyve_load_textdomain() {
    load_plugin_textdomain( 'olyve' );
}
add_action( 'init', 'olyve_load_textdomain' );