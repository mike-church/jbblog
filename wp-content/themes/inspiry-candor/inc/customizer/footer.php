<?php
/**
 * Customizer settings for Footer
 */

if ( ! function_exists( 'inspiry_footer_customizer' ) ) :
    function inspiry_footer_customizer( WP_Customize_Manager $wp_customize ) {

        /**
         * Footer Section
         */
        $wp_customize->add_section( 'inspiry_footer_section', array (
            'title' => esc_html__( 'Footer', 'inspiry' ),
            'priority' => 124,
        ) );

	    /* Copyright */
        $wp_customize->add_setting( 'inspiry_copyright_html', array (
            'sanitize_callback' => 'wp_kses_data',
        ) );
        $wp_customize->add_control( 'inspiry_copyright_html', array (
            'label' => esc_html__( 'Copyright Text', 'inspiry' ),
            'type' => 'textarea',
            'section' => 'inspiry_footer_section',
        ) );
    }

    add_action( 'customize_register', 'inspiry_footer_customizer' );
endif;