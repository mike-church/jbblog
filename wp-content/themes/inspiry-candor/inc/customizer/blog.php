<?php
/**
 * Blog Customizer Settings
 */

if ( ! function_exists( 'inspiry_blog_customizer' ) ) :
    function inspiry_blog_customizer( WP_Customize_Manager $wp_customize ) {

        /**
         * Blog Section
         */
        $wp_customize->add_section( 'inspiry_blog_section', array (
            'title' => esc_html__( 'Blog', 'inspiry' ),
            'priority' => 21,
        ) );

        /* Blog Layout */
        $wp_customize->add_setting( 'inspiry_blog_layout', array (
            'default' => 'one',
	        'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control(
            new Inspiry_Custom_Radio_Image_Control(
                $wp_customize,
                'inspiry_blog_layout',
                array(
                    'section'		=> 'inspiry_blog_section',
                    'label'			=> esc_html__( 'Blog Layout', 'inspiry' ),
                    'description'	=> esc_html__( 'Choose your desired layout.', 'inspiry' ),
                    'choices'		=> array(
                        'one' => get_template_directory_uri() . '/images/variation-1.jpg',
                        'two' => get_template_directory_uri() . '/images/variation-2.jpg',
                        'three'	=> get_template_directory_uri() . '/images/variation-3.jpg',
                        'four' => get_template_directory_uri() . '/images/variation-4.jpg'
                    )
                )
            )
        );


	    /**
	     * Header Image Overlay and Contents
	     */
	    $wp_customize->add_setting( 'inspiry_header_shadow', array (
		    'default' => 'true',
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_header_shadow', array (
		    'label' => esc_html__( 'Header Top Shadow', 'inspiry' ),
		    'type' => 'radio',
		    'section' => 'inspiry_blog_section',
		    'choices' => array (
			    'true' => esc_html__( 'Show', 'inspiry' ),
			    'false' => esc_html__( 'Hide', 'inspiry' ),
		    ),
		    'active_callback' => 'inspiry_is_banner_required',
	    ) );

	    $wp_customize->add_setting( 'inspiry_header_image_content', array (
		    'default' => 'one',
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_header_image_content', array (
		    'label' => esc_html__( 'What to show on Banner', 'inspiry' ),
		    'type' => 'radio',
		    'section' => 'inspiry_blog_section',
		    'choices' => array (
			    'one' => esc_html__( 'Intro Section', 'inspiry' ),
			    'two' => esc_html__( 'Blog Post', 'inspiry' ),
		    ),
		    'active_callback' => 'inspiry_is_banner_required',
	    ) );


	    /**
         * Blog Intro Section
         */

        /* Intro Title Text */
        $wp_customize->add_setting( 'inspiry_intro_title', array (
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'inspiry_intro_title', array (
            'label' => esc_html__( 'Intro Title Text', 'inspiry' ),
            'type' => 'text',
            'section' => 'inspiry_blog_section',
	        'active_callback' => 'inspiry_is_intro_required',
        ) );

        /* Intro Description Text */
        $wp_customize->add_setting( 'inspiry_intro_decription', array (
            'sanitize_callback' => 'wp_kses_data',
        ) );

        $wp_customize->add_control( 'inspiry_intro_decription', array (
            'label' => esc_html__( 'Intro Description Text', 'inspiry' ),
            'type' => 'textarea',
            'section' => 'inspiry_blog_section',
	        'active_callback' => 'inspiry_is_intro_required',
        ) );

	    /**
	     * Banner Post
	     */
	    $recent_posts_list = array();
	    $recent_posts = wp_get_recent_posts( array( 'numberposts' => '20' ) );
	    foreach( $recent_posts as $recent ){
		    $recent_posts_list[ $recent["ID"] ] = $recent["post_title"];
	    }
	    $wp_customize->add_setting( 'inspiry_banner_post', array (
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_banner_post', array (
		    'label' => esc_html__( 'Select Post for Banner', 'inspiry' ),
		    'type' => 'select',
		    'section' => 'inspiry_blog_section',
		    'choices' => $recent_posts_list,
		    'active_callback' => 'inspiry_is_banner_post_required',
	    ) );

        /**
         * Featured Posts Section
         */

        /* Show/Hide Featured Posts Carousel */
        $wp_customize->add_setting( 'inspiry_featured_posts', array (
            'default' => 'true',
	        'sanitize_callback' => 'inspiry_sanitize',
        ) );

        $wp_customize->add_control( 'inspiry_featured_posts', array (
            'label' => esc_html__( 'Featured Posts Carousel', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_blog_section',
            'choices' => array (
                'true' => esc_html__( 'Show', 'inspiry' ),
                'false' => esc_html__( 'Hide', 'inspiry' ),
            ),
	        'active_callback' => 'inspiry_is_featured_posts_required',
        ) );

        // Tags List Array
        $tags = get_tags();
        $tags_list = array ();
        if ( $tags ) {
            foreach ( $tags as $tag ) {
                $tags_list[ $tag->slug ] = $tag->name;
            }
        }

        $wp_customize->add_setting( 'inspiry_featured_posts_tag', array (
            'default' => 'featured',
	        'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_featured_posts_tag', array (
            'label' => esc_html__( 'Select a Tag to Show Posts in Carousel', 'inspiry' ),
            'type' => 'select',
            'section' => 'inspiry_blog_section',
            'choices' => $tags_list,
	        'active_callback' => 'inspiry_is_featured_posts_enabled',
        ) );

        // Number of Featured Posts to show
        $wp_customize->add_setting( 'inspiry_number_of_featured_posts', array (
            'default' => '4',
            'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_number_of_featured_posts', array (
            'label' => esc_html__( 'Featured Posts to Show in Carousel', 'inspiry' ),
            'type' => 'text',
            'section' => 'inspiry_blog_section',
	        'active_callback' => 'inspiry_is_featured_posts_enabled',
        ) );

    }

    add_action( 'customize_register', 'inspiry_blog_customizer' );
endif;


if ( ! function_exists( 'inspiry_blog_defaults' ) ) :
	/**
	 * Set default values for blog settings
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	function inspiry_blog_defaults( WP_Customize_Manager $wp_customize ) {
		$blog_settings_ids = array(
			'inspiry_blog_layout',
			'inspiry_header_shadow',
			'inspiry_header_image_content',
			'inspiry_featured_posts',
			'inspiry_featured_posts_tag',
			'inspiry_number_of_featured_posts',
		);
		inspiry_initialize_defaults( $wp_customize, $blog_settings_ids );
	}

	add_action( 'customize_save_after', 'inspiry_blog_defaults' );
endif;


if( !function_exists( 'inspiry_is_banner_required' ) ) :
	/**
	 * Checks if banner is required or not
	 * @return bool
	 */
	function inspiry_is_banner_required() {
		$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
		if ( in_array( $inspiry_blog_variation, array ( 'two', 'three' ) ) ) {
			return true;
		}
		return false;
	}
endif;


if( !function_exists( 'inspiry_is_intro_required' ) ) :
	/**
	 * Checks if intro section is required or not
	 * @return bool
	 */
	function inspiry_is_intro_required() {
		$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
		if ( in_array( $inspiry_blog_variation, array ( 'one', 'four' ) ) ) {
			return true;
		}

		$inspiry_header_image_content = get_theme_mod( 'inspiry_header_image_content' );
		if ( $inspiry_header_image_content == 'one' ) {
			return true;
		}
		return false;
	}
endif;


if( !function_exists( 'inspiry_is_featured_posts_required' ) ) :
	/**
	 * Checks if featured posts are required or not
	 * @return bool
	 */
	function inspiry_is_featured_posts_required() {
		$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
		if ( in_array( $inspiry_blog_variation, array ( 'one' ) ) ) {
			return true;
		}
		return false;
	}
endif;


if( !function_exists( 'inspiry_is_featured_posts_enabled' ) ) :
	/**
	 * Checks if featured posts are enabled or not
	 * @return bool
	 */
	function inspiry_is_featured_posts_enabled() {
		$inspiry_featured_posts   = get_theme_mod( 'inspiry_featured_posts', 'true' );
		if ( inspiry_is_featured_posts_required() && 'true' == $inspiry_featured_posts ) {
			return true;
		}
		return false;
	}
endif;


if( !function_exists( 'inspiry_is_banner_post_required' ) ) :
	/**
	 * Checks if blog post for banner is required or not
	 * @return bool
	 */
	function inspiry_is_banner_post_required() {
		$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
		$inspiry_header_image_content   = get_theme_mod( 'inspiry_header_image_content', 'one' );
		if ( in_array( $inspiry_blog_variation, array ( 'two', 'three' ) ) && ( 'two' == $inspiry_header_image_content ) ) {
			return true;
		}
		return false;
	}
endif;