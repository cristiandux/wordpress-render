<?php
/**
 * Elementor Default Settings 
 */
if ( ! function_exists( 'olyve_enable_elementor_for_cpt' ) ) {
    function olyve_enable_elementor_for_cpt() {
        if ( true == olyve_get_theme_option( 'olyve_set_elementor_settings', true ) ) { 
            // Get the current Elementor settings
            $elementor_cpt_support = get_option('elementor_cpt_support');
    
            // Define the post types that need to enable Elementor
            $post_types_to_enable = array('post', 'page', 'dtr_portfolio');
    
            // If Elementor settings are not an array, initialize it as an array
            if (!is_array($elementor_cpt_support)) {
                $elementor_cpt_support = array();
            }
    
            // Flag to check if any changes are made
            $settings_changed = false;
    
            // Add the post types to the Elementor support array if they are not already included
            foreach ($post_types_to_enable as $post_type) {
                if (!in_array($post_type, $elementor_cpt_support)) {
                    $elementor_cpt_support[] = $post_type;
                    $settings_changed = true; // Mark that we have changed the settings
                }
            }
    
            // Update the Elementor settings only if changes are made
            if ($settings_changed) {
                update_option('elementor_cpt_support', $elementor_cpt_support);
            }
        }
    }
}
add_action('init', 'olyve_enable_elementor_for_cpt');

// Disable Elementor default colors
function olyve_disable_elementor_default_colors() {
    // Get the current setting for disabling default typography schemes
    $elementor_disable_color_schemes = get_option('elementor_disable_color_schemes');

    // Check if the setting is not set (i.e., it hasn't been manually set)
    if ($elementor_disable_color_schemes === false) {
        // Set the 'disable_typography_schemes' setting to 'yes'
        update_option('elementor_disable_color_schemes', 'yes');
    }
}
add_action('admin_init', 'olyve_disable_elementor_default_colors');


// Disable Elementor default typography
function olyve_disable_elementor_default_typography() {
    // Get the current setting for disabling default typography schemes
    $disable_typography_schemes = get_option('elementor_disable_typography_schemes');

    // Check if the setting is not set (i.e., it hasn't been manually set)
    if ($disable_typography_schemes === false) {
        // Set the 'disable_typography_schemes' setting to 'yes'
        update_option('elementor_disable_typography_schemes', 'yes');
    }
}
add_action('admin_init', 'olyve_disable_elementor_default_typography');