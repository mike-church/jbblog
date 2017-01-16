<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'inspiry_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function inspiry_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        /* Candor Shortcodes */
        array(
            'name'               => 'Candor Shortcodes',
            'slug'               => 'candor-shortcodes',
            'source'             => get_template_directory() . '/inc/plugins/candor-shortcodes.zip',
            'required'           => false,
            'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),

        /* Jetpack */
        array(
            'name'      => 'Jetpack',
            'slug'      => 'jetpack',
            'required'  => false
        ),

	    /* Wp Instagram Widget */
        array(
            'name'      => 'Wp Instagram Widget',
            'slug'      => 'wp-instagram-widget',
            'required'  => false
        ),

	    /* Tweets plugin */
	    array(
		    'name'      => 'Quick and Easy Tweets',
		    'slug'      => 'quick-and-easy-tweets',
		    'required'  => false
	    ),
    );


	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'inspiry',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
