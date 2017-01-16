<?php
/**
 * Customizer
 */


if ( ! function_exists( 'inspiry_initialize_defaults' ) ) :
	/**
	 * Helper function to initialize default values for settings as customizer api do not do so by default.
	 *
	 * @param WP_Customize_Manager $wp_customize
	 * @param $inspiry_settings_ids
	 */
	function inspiry_initialize_defaults( WP_Customize_Manager $wp_customize, $inspiry_settings_ids ) {
		if ( is_array( $inspiry_settings_ids ) && ! empty( $inspiry_settings_ids ) ) {
			$mods = get_theme_mods();
			foreach ( $inspiry_settings_ids as $setting_id ) {
				$setting = $wp_customize->get_setting( $setting_id );
				if ( ! isset( $mods[ $setting->id ] ) ) {
					set_theme_mod( $setting->id, $setting->default );
				}
			}
		}
	}
endif;


if( !function_exists( 'inspiry_sanitize' ) ) :
	/**
	 * A sanitization placeholder
	 * @param $str
	 * @return mixed
	 */
    function inspiry_sanitize( $str ) {
		return $str;
    }
endif;


/**
 * Load custom controls
 */
if ( ! function_exists( 'inspiry_load_customize_controls' ) ) :
	function inspiry_load_customize_controls() {
		require_once( get_template_directory() . '/inc/customizer/custom/control-multiple-checkbox.php' );
		require_once( get_template_directory() . '/inc/customizer/custom/control-radio-image.php' );
	}

	add_action( 'customize_register', 'inspiry_load_customize_controls', 0 );
endif;


/**
 * Blog Settings
 */
require_once( get_template_directory() . '/inc/customizer/blog.php' );


/**
 * Header Settings
 */
require_once( get_template_directory() . '/inc/customizer/header.php' );


/**
 * Single Post Settings
 */
require_once( get_template_directory() . '/inc/customizer/single-post.php' );


/**
 * Footer Settings
 */
require_once( get_template_directory() . '/inc/customizer/footer.php' );


/**
 * Google Fonts Settings
 */
require_once( get_template_directory() . '/inc/customizer/google-fonts.php' );


/**
 * Styles Settings
 */
require_once( get_template_directory() . '/inc/customizer/styles.php' );


if( !function_exists( 'inspiry_modify_default_customizer' ) ) :
	/**
	 * Remove stuff from customizer
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
    function inspiry_modify_default_customizer( WP_Customize_Manager $wp_customize ) {

	    /* Move header image to header section */
	    $wp_customize -> get_control( 'header_image' ) -> section = 'inspiry_header_section';

	    /*  Remove header text color control */
	    $wp_customize -> remove_control( 'header_textcolor' );

	    /* Modify background image title */
	    $wp_customize -> get_section( 'background_image' ) -> title = esc_html__( 'Background', 'inspiry' );

		/* Move background color to background image section */
	    $wp_customize -> get_control( 'background_color' ) -> section = 'background_image';
    }

	add_action( 'customize_register', 'inspiry_modify_default_customizer', 999 );
endif;

