<?php
/**
 * Single Post Customizer
 */

if ( ! function_exists( 'inspiry_single_post_customizer' ) ) :
    function inspiry_single_post_customizer( WP_Customize_Manager $wp_customize ) {
        
        /**
         * Single Post Section
         */
        $wp_customize->add_section( 'inspiry_blog_post_section', array (
            'title' => esc_html__( 'Blog Post', 'inspiry' ),
            'priority' => 123,
        ) );

        $wp_customize->add_setting( 'inspiry_post_layout', array (
            'default' => 'one',
            'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_post_layout', array (
            'label' => esc_html__( 'Blog Post Layout', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_blog_post_section',
            'choices' => array (
                'one' => esc_html__( 'Full Width Layout', 'inspiry' ),
                'two' => esc_html__( 'Layout With Sidebar', 'inspiry' ),
            )
        ) );

        /* Show/Hide Social Share */
        $wp_customize->add_setting( 'inspiry_social_share', array (
            'default' => 'show',
            'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_social_share', array (
            'label' => esc_html__( 'Social Share', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_blog_post_section',
            'choices' => array (
                'show' => esc_html__( 'Show', 'inspiry' ),
                'hide' => esc_html__( 'Hide', 'inspiry' ),
            ),
        ) );

	    /* Hide Related Posts */
	    $wp_customize->add_setting( 'inspiry_related_posts', array (
		    'default' => 'show',
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_related_posts', array (
		    'label' => esc_html__( 'Related Posts', 'inspiry' ),
		    'type' => 'radio',
		    'section' => 'inspiry_blog_post_section',
		    'choices' => array (
			    'show' => esc_html__( 'Show', 'inspiry' ),
			    'hide' => esc_html__( 'Hide', 'inspiry' ),
		    ),
	    ) );

	    $wp_customize->add_setting( 'inspiry_related_posts_variation', array (
		    'default' => 'text-based',
		    'sanitize_callback' => 'inspiry_sanitize',
	    ) );
	    $wp_customize->add_control( 'inspiry_related_posts_variation', array (
		    'label' => esc_html__( 'Related Posts Design Variation', 'inspiry' ),
		    'type' => 'radio',
		    'section' => 'inspiry_blog_post_section',
		    'active_callback' => 'inspiry_is_related_posts_enabled',
		    'choices' => array (
			    'thumbnail-based' => esc_html__( 'Thumbnail Based', 'inspiry' ),
			    'text-based' => esc_html__( 'Text Based', 'inspiry' ),
		    ),
	    ) );

        /* Hide Post Author */
        $wp_customize->add_setting( 'inspiry_post_author', array (
			'default' => 'show',
			'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_post_author', array (
            'label' => esc_html__( 'Post Author', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_blog_post_section',
            'choices' => array (
                'show' => esc_html__( 'Show', 'inspiry' ),
                'hide' => esc_html__( 'Hide', 'inspiry' ),
            ),
        ) );

        /* Hide Post Navigation */
        $wp_customize->add_setting( 'inspiry_post_navigation', array (
            'default' => 'show',
	        'sanitize_callback' => 'inspiry_sanitize',
        ) );
        $wp_customize->add_control( 'inspiry_post_navigation', array (
            'label' => esc_html__( 'Post Navigation', 'inspiry' ),
            'type' => 'radio',
            'section' => 'inspiry_blog_post_section',
            'choices' => array (
                'show' => esc_html__( 'Show', 'inspiry' ),
                'hide' => esc_html__( 'Hide', 'inspiry' ),
            ),
        ) );

    }

    add_action( 'customize_register', 'inspiry_single_post_customizer' );
endif;


if ( ! function_exists( 'inspiry_single_post_defaults' ) ) :
    /**
     * Set default values for single post settings
     *
     * @param WP_Customize_Manager $wp_customize
     */
    function inspiry_single_post_defaults( WP_Customize_Manager $wp_customize ) {
        $single_post_settings_ids = array(
            'inspiry_post_layout',
            'inspiry_social_share',
            'inspiry_related_posts',
            'inspiry_related_posts_variation',
            'inspiry_post_author',
            'inspiry_post_navigation',
        );
        inspiry_initialize_defaults( $wp_customize, $single_post_settings_ids );
    }

    add_action( 'customize_save_after', 'inspiry_single_post_defaults' );
endif;


if( !function_exists( 'inspiry_is_related_posts_enabled' ) ) :
    function inspiry_is_related_posts_enabled() {
        $inspiry_related_posts = get_theme_mod( 'inspiry_related_posts', 'show' );
	    if ( 'show' == $inspiry_related_posts ) {
		    return true;
	    }
	    return false;
    }
endif;