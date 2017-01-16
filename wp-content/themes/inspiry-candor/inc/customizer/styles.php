<?php
/**
 * Styles Settings
 */


if ( ! function_exists( 'inspiry_styles_customizer' ) ) :
	function inspiry_styles_customizer( WP_Customize_Manager $wp_customize ) {


		/**
		 * Styles Section
		 */

		$wp_customize->add_section( 'inspiry_styles_section', array(
			'title' => esc_html__( 'Styles', 'inspiry' ),
			'priority' => 128,
		) );


		/* Text Color */
		$wp_customize->add_setting( 'inspiry_text_color', array(
			'default' => '#4b4b4b',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'inspiry_text_color',
				array(
					'label' => esc_html__( 'Text Color', 'inspiry' ),
					'section' => 'inspiry_styles_section',
				)
			)
		);

		/* Heading Color */
		$wp_customize->add_setting( 'inspiry_heading_color', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'inspiry_heading_color',
				array(
					'label' => esc_html__( 'Heading Color', 'inspiry' ),
					'section' => 'inspiry_styles_section',
				)
			)
		);

		/* Link Color */
		$wp_customize->add_setting( 'inspiry_link_color', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'inspiry_link_color',
				array(
					'label' => esc_html__( 'Link Color', 'inspiry' ),
					'section' => 'inspiry_styles_section',
				)
			)
		);

		/* Link Hover Color */
		$wp_customize->add_setting( 'inspiry_link_hover_color', array(
			'default' => '#4b4b4b',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'inspiry_link_hover_color',
				array(
					'label' => esc_html__( 'Link Hover Color', 'inspiry' ),
					'section' => 'inspiry_styles_section',
				)
			)
		);

		/* Quick CSS */
		$wp_customize->add_setting( 'inspiry_quick_css', array(
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'inspiry_quick_css', array(
			'label' => esc_html__( 'Quick CSS', 'inspiry' ),
			'description' => esc_html__( 'Enter small CSS changes here. If you need to change major portions of the theme then use child-custom.css file in child theme.', 'inspiry' ),
			'type' => 'textarea',
			'section' => 'inspiry_styles_section',
		) );

	}

	add_action( 'customize_register', 'inspiry_styles_customizer' );
endif;


if ( ! function_exists( 'inspiry_styles_defaults' ) ) :
	/**
	 * Set default values for styles settings
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	function inspiry_styles_defaults( WP_Customize_Manager $wp_customize ) {
		 $styles_settings_ids = array(
			 'inspiry_text_color',
			 'inspiry_heading_color',
			 'inspiry_link_color',
			 'inspiry_link_hover_color'
		 );
		 inspiry_initialize_defaults( $wp_customize, $styles_settings_ids );
	}

	add_action( 'customize_save_after', 'inspiry_styles_defaults' );
endif;