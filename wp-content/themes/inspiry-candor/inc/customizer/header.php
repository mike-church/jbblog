<?php
/**
 * Customizer settings for Header
 */

if ( ! function_exists( 'inspiry_header_customizer' ) ) :
    function inspiry_header_customizer( WP_Customize_Manager $wp_customize ) {

        /**
         * Header Section
         */
        $wp_customize->add_section( 'inspiry_header_section', array (
            'title' => esc_html__( 'Header', 'inspiry' ),
            'priority' => 22,
        ) );

	    /* header variation */
        $wp_customize->add_setting( 'inspiry_header_variation', array (
            'default' => 'left-aligned-header',
	        'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_header_variation', array (
            'label' => esc_html__( 'Header Layout Variation', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_header_section',
            'choices' => array (
                'left-aligned-header' => esc_html__( 'Logo or Site Title on Left', 'inspiry' ),
                'center-aligned-header' => esc_html__( 'Logo or Site Title in Center', 'inspiry' ),
            )
        ) );

	    /* Search Toggle Icon  */
	    $wp_customize->add_setting( 'inspiry_search_toggle', array (
		    'default' => 'true',
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_search_toggle', array (
		    'label' => esc_html__( 'Search Icon', 'inspiry' ),
		    'type' => 'radio',
		    'section' => 'inspiry_header_section',
		    'choices' => array (
			    'true' => esc_html__( 'Show', 'inspiry' ),
			    'false' => esc_html__( 'Hide', 'inspiry' ),
		    ),
	    ) );

	    /* Slidable Sidebar Button */
	    $wp_customize->add_setting( 'inspiry_slidable_sidebar', array (
		    'default' => 'true',
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_slidable_sidebar', array (
		    'label' => esc_html__( 'Slidable Sidebar Icon', 'inspiry' ),
		    'description' => esc_html__( 'It is not required for 2nd blog layout.', 'inspiry' ),
		    'type' => 'radio',
		    'section' => 'inspiry_header_section',
		    'choices' => array (
			    'true' => esc_html__( 'Show', 'inspiry' ),
			    'false' => esc_html__( 'Hide', 'inspiry' ),
		    ),
		    'active_callback' => 'inspiry_is_slideable_sidebar_required',
	    ) );

        /* Social Icons */
        $wp_customize->add_setting( 'inspiry_show_social_menu', array (
            'default' => 'true',
	        'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_show_social_menu', array (
            'label' => esc_html__( 'Social Icons', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_header_section',
            'choices' => array (
                'true' => esc_html__( 'Show', 'inspiry' ),
                'false' => esc_html__( 'Hide', 'inspiry' ),
            )
        ) );

        /* Facebook URL */
        $wp_customize->add_setting( 'inspiry_facebook_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_facebook_url', array (
            'label' => esc_html__( 'Facebook URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* Twitter URL */
        $wp_customize->add_setting( 'inspiry_twitter_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_twitter_url', array (
            'label' => esc_html__( 'Twitter URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* LinkedIn URL */
        $wp_customize->add_setting( 'inspiry_linkedin_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_linkedin_url', array (
            'label' => esc_html__( 'LinkedIn URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* Google Plus URL */
        $wp_customize->add_setting( 'inspiry_google_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_google_url', array (
            'label' => esc_html__( 'Google Plus URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* Instagram URL */
        $wp_customize->add_setting( 'inspiry_instagram_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_instagram_url', array (
            'label' => esc_html__( 'Instagram URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* YouTube URL */
        $wp_customize->add_setting( 'inspiry_youtube_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_youtube_url', array (
            'label' => esc_html__( 'YouTube URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* Skype Username */
        $wp_customize->add_setting( 'inspiry_skype_username', array (
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'inspiry_skype_username', array (
            'label' => esc_html__( 'Skype Username', 'inspiry' ),
            'type' => 'text',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* Pinterest URL */
        $wp_customize->add_setting( 'inspiry_pinterest_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_pinterest_url', array (
            'label' => esc_html__( 'Pinterest URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );

        /* RSS URL */
        $wp_customize->add_setting( 'inspiry_rss_url', array (
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'inspiry_rss_url', array (
            'label' => esc_html__( 'RSS URL', 'inspiry' ),
            'type' => 'url',
            'section' => 'inspiry_header_section',
	        'active_callback' => 'inspiry_is_social_icons_enabled',
        ) );
    }

    add_action( 'customize_register', 'inspiry_header_customizer' );
endif;


if ( ! function_exists( 'inspiry_header_defaults' ) ) :
    /**
     * Set default values for header settings
     *
     * @param WP_Customize_Manager $wp_customize
     */
    function inspiry_header_defaults( WP_Customize_Manager $wp_customize ) {
        $header_settings_ids = array(
            'inspiry_header_variation',
            'inspiry_show_social_menu',
            'inspiry_search_toggle',
            'inspiry_slidable_sidebar',
        );
        inspiry_initialize_defaults( $wp_customize, $header_settings_ids );
    }

    add_action( 'customize_save_after', 'inspiry_header_defaults' );
endif;


if( !function_exists( 'inspiry_is_slideable_sidebar_required' ) ) :
	/**
	 * Checks if slideable sidebar is required or not
	 * @return bool
	 */
	function inspiry_is_slideable_sidebar_required() {
		$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
		if ( 'two' != $inspiry_blog_variation ) {
			return true;
		}
		return false;
	}
endif;


if( !function_exists( 'inspiry_is_social_icons_enabled' ) ) :
    function inspiry_is_social_icons_enabled() {
	    $inspiry_show_social_icons   = get_theme_mod( 'inspiry_show_social_menu', 'true' );
	    if ( 'true' == $inspiry_show_social_icons ) {
		    return true;
	    }
	    return false;
    }
endif;