<?php
/**
 * ReduxFramework Config File
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux_Framework_Plugin' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'olyve_theme_mod';

// Comment to enable demo mode.
Redux::disable_demo();   // phpcs:ignore Squiz.PHP.CommentedOutCode

/* BEGIN ARGUMENTS */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => 'olyve_theme_mod',
	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),
	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',
	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,
	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Theme Options', 'olyve' ),
	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Theme Options', 'olyve' ),
	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,
	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,
	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',
	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,
	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,
	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,
	// Enable basic customizer support.
	'customizer'                => false,
	// Allow the panel to open expanded.
	//'open_expanded'             => false,
	// Disable the save warning when a user changes a field.
	//'disable_save_warn'         => false,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',
	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',
	// Specify a custom URL to an icon.
	'menu_icon'                 => '',
	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',
	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',
	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,
	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,
	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,
	// What to print by the field's title if the value shown is default.
	'default_mark'              => '',
	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,
	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,
	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,
	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',
	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,
	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',
	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,
	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',
	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	//'database'                  => '',
	//'network_admin'             => true,
	//'search'                    => true,
);


// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
	'id'    => 'olyve-docs',
	'href'  => 'https://docs.tanshcreative.com/olyve',
	'title' => __( 'Theme Documentation', 'olyve' ),
);

Redux::set_args( $opt_name, $args );
/* END ARGUMENTS */

// -> START - Sections
require_once get_template_directory() . '/includes/options/theme-options/settings-basecolors.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-site-settings.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-general.php';
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Typography', 'olyve' ),
		'id'    => 'section-typography',
		'icon'  => 'el el-text-width',
	)
);
require_once get_template_directory() . '/includes/options/theme-options/settings-general-typography.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-buttons-typography.php';
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Header', 'olyve' ),
		'id'    => 'section-header',
		'icon'  => 'dashicons dashicons-table-row-after',
	)
);
require_once get_template_directory() . '/includes/options/theme-options/settings-header-general.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-header-main-row.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-topbar.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-menubar.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-header-button.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-header-search.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-header-onscroll.php';
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Page Title Section', 'olyve' ),
		'id'    => 'section-page-title',
		'icon'  => 'dashicons dashicons-table-row-after',
	)
);
require_once get_template_directory() . '/includes/options/theme-options/settings-pagetitle-general.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-pagetitle-typography.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-pagetitle-misc.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-responsive-header.php';
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Footer', 'olyve' ),
		'id'    => 'section-footer',
		'icon'  => 'dashicons dashicons-table-row-before',
	)
);
require_once get_template_directory() . '/includes/options/theme-options/settings-footer-general.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-footer-styles.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-footer-typography.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-footer-scrolltop.php';
Redux::set_section(
	$opt_name,
	array(
		'title' => esc_html__( 'Blog', 'olyve' ),
		'id'    => 'section-blog',
		'icon'  => 'dashicons dashicons-welcome-write-blog',
	)
);
require_once get_template_directory() . '/includes/options/theme-options/settings-blog-general.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-blog-single.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-blog-typography.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-paginations.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-widgets.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-cpt.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-search.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-error-page.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-import.php';
require_once get_template_directory() . '/includes/options/theme-options/settings-plugin-misc.php';
// -> END - Sections

// Override redux admin css
function olyve_enqueue_redux_custom_css() {
    wp_enqueue_style(
        'redux-custom-css', // Handle for the custom CSS
        get_template_directory_uri() . '/assets/css/redux-custom.css', // Path to the custom CSS file
        array(), // Dependencies (leave empty if none)
        '1.0.0' // Version number
    );
}
add_action('admin_enqueue_scripts', 'olyve_enqueue_redux_custom_css', 100);