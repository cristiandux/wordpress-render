<?php
/**
 * Theme helper functions
 *
 * @package OlyveTheme
 * @version 1.0.0
 */

/**
 * Flush rewrite rules for custom post types on theme activation
 */
add_action( 'after_switch_theme', 'olyve_rewrite_rules_flush' );
if ( ! function_exists( 'olyve_rewrite_rules_flush' ) ) {
    function olyve_rewrite_rules_flush() {
         flush_rewrite_rules();
    }
}

/**
 * Modify category widget 
 */
if ( ! function_exists( 'olyve_categories_postcount_filter' ) ) {
	function olyve_categories_postcount_filter ( $in ) {
	  $out = preg_replace( '/<\/a> \(([0-9]+)\)/', ' <span class="dtr-post-count">(\\1)</span></a>', $in );
	  return $out;
	}
	add_filter('wp_list_categories','olyve_categories_postcount_filter');
}

/**
 * Modify archive widget 
 */
if ( ! function_exists( 'olyve_archives_postcount_filter' ) ) {
	function olyve_archives_postcount_filter( $in ) {
		if ( false !== strpos( $in, '<li>' ) ) {
			$out = preg_replace( '/<\/a>&nbsp;\(([0-9]+)\)/', ' <span class="dtr-post-count">(\\1)</span></a>', $in );
			return $out;
		}
		return $in;
	}
	add_filter( 'get_archives_link', 'olyve_archives_postcount_filter' );
}


/**
 * Wrap current page in span for wp_link_pages
 */
if ( ! function_exists( 'olyve_wp_link_pages_wrap' ) ) {
	function olyve_wp_link_pages_wrap( $link ) {
		if ( ctype_digit( $link ) ) {
			return '<span class="page-link-current">' . $link . '</span>';
		}
		return $link;
	}
	add_filter( 'wp_link_pages_link', 'olyve_wp_link_pages_wrap' );
}

/**
 * Sanitize checkbox
 */
if ( ! function_exists( 'olyve_sanitize_checkbox' ) ) {
	function olyve_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
} // olyve_sanitize_checkbox

/**
 * Sanitize select
 */
if ( ! function_exists( 'olyve_sanitize_select' ) ) {
	function olyve_sanitize_select( $input, $setting ){
		$input = sanitize_key($input);
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
	}
}

/**
 * Sanitize image upload
 */
if ( ! function_exists( 'olyve_sanitize_image' ) ) {
	function olyve_sanitize_image( $file, $setting ) {
	  
		//allowed file types
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png'
		);
		  
		//check file type from file name
		$file_ext = wp_check_filetype( $file, $mimes );
		  
		//if file has a valid mime type return it, otherwise return default
		return ( $file_ext['ext'] ? $file : $setting->default );
	}
}

// core plugin update notice
if ( ! function_exists( 'olyve_core_update_admin_notice' ) ) {
	function olyve_core_update_admin_notice() {
		if ( is_admin() ) {
			if( !function_exists('get_plugin_data') ){
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			if ( !class_exists( 'dtr_olyve_core' ) ) return;
			$olyve_core_plugin_dir = WP_PLUGIN_DIR . '/dtr-olyve-core/dtr-olyve-core.php';
			$olyve_core_plugin_data = get_plugin_data($olyve_core_plugin_dir);
			$olyve_core_plugin_version = $olyve_core_plugin_data['Version'];
			if ( $olyve_core_plugin_version < OLYVE_CORE_PLUGIN_CURRENT_VERSION ) { ?>
				<div class="notice notice-error"><p><?php _e( '<strong>Important</strong> : Update Olyve Core Plugin. Go To : Appearance / Install Plugins', 'olyve' ); ?></p></div>
			<?php }
		}
	}
}
add_action( 'admin_notices', 'olyve_core_update_admin_notice' );

// elementor addon plugin update notice
if ( ! function_exists( 'olyve_elementor_addon_update_admin_notice' ) ) {
	function olyve_elementor_addon_update_admin_notice() {
		if ( is_admin() ) {
			if( !function_exists('get_plugin_data') ){
				require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			if ( !class_exists( '\OlyveAddons\Olyve_Elementor_Addons' ) ) return;
			$olyve_elementor_addon_plugin_dir = WP_PLUGIN_DIR . '/dtr-olyve-elementor-addon/dtr-olyve-elementor.php';
			$olyve_elementor_addon_plugin_data = get_plugin_data($olyve_elementor_addon_plugin_dir);
			$olyve_elementor_addon_plugin_version = $olyve_elementor_addon_plugin_data['Version'];
			if ( $olyve_elementor_addon_plugin_version < OLYVE_ELEMENTOR_ADDON_PLUGIN_CURRENT_VERSION ) { ?>
            	<div class="notice notice-error"><p><?php _e( '<strong>Important</strong> : Update Olyve Elementor Addons Plugin Plugin. Go To : Appearance / Install Plugins', 'olyve' ); ?></p></div>
			<?php }
		}
	}
}
add_action( 'admin_notices', 'olyve_elementor_addon_update_admin_notice' );

// import Notice
if ( ! function_exists( 'olyve_demo_import_notice' ) ) {
    function olyve_demo_import_notice() {
        if ( true == olyve_get_theme_option( 'olyve_demo_import_notification_enable', true ) ) {
        ?>
        <div class="notice notice-error is-dismissible dtr-import-notice">
            <h4><?php _e( '** Theme SetUp Guide for New Buyers **', 'olyve' ); ?></h4>
            <h5><?php _e( 'Step 1: Install All Required / Recommended Plugins', 'olyve' ); ?></h5>
          <p><?php _e( 'There is a link to install plugins in below Notice OR <strong>Visit : Appearance > Install Plugins</strong>', 'olyve' ); ?></p>
            <h5><?php _e( 'Step 2: Import Theme Demo Data', 'olyve' ); ?></h5>
            <p><?php _e( 'As WordPress Themes do not carry data with them...Import Demo Data to make your link look like Theme Demo.<br> <strong>Visit : Appearance > Import Theme Demo Data</strong><br>You need - One Click Demo Import Plugin - active to see this option. This plugin is already in recommeded list, so will get install along with other plugins (in step 1).', 'olyve' ); ?></h5>
            <h5><?php _e( 'Step 3: Online Help Documentation', 'olyve' ); ?></h5>
            <p><?php _e( 'Find online help document here : <br><a class="button button-primary" href="https://docs.tanshcreative.com/olyve" target="_blank">Online Help Documentation</a>', 'olyve' ); ?></p>
            <h5><?php _e( 'Step 4: Disable this Notification', 'olyve' ); ?></h5>
            <p><?php _e( 'If you have finished importing demo data...<strong>Permanently Disable</strong> this Demo Import and Import Plugin Install Notice via theme options: <strong>Theme Options > Demo Notification</strong>', 'olyve' ); ?></h5><br>           
        </div>
        <?php
        }
    }
    add_action( 'admin_notices', 'olyve_demo_import_notice' );
}

// admin styles
if ( true == olyve_get_theme_option( 'olyve_demo_import_notification_enable', true ) ) {
	if ( ! function_exists( 'olyve_import_notice_admin_css' ) ) {
		function olyve_import_notice_admin_css() {
		  echo '<style>
			.dtr-import-notice { background-color: #f6f7f6; border-color: #f6f7f6; border-left-color: #000; color: #000; }
			.dtr-import-notice h4 { font-size: 1.4em; }
			.dtr-import-notice h5 { font-size: 1.2em; margin-top: 30px; margin-bottom: 10px; }
			.dtr-import-notice p { font-size: 1em; }
			.dtr-import-notice .button { margin-top: 10px; }
            .wp-block-heading, .wp-block-spacer { background-color: #ddd; }
		  </style>';
		}
		add_action('admin_head', 'olyve_import_notice_admin_css'); 
	}
}