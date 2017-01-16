<?php
/**
 * Google Fonts Customizer
 */

if ( ! function_exists( 'inspiry_google_fonts_customizer' ) ) :
	function inspiry_google_fonts_customizer( WP_Customize_Manager $wp_customize ) {

		$inspiry_google_fonts = inspiry_get_google_fonts_list();

		/**
		 * Typography Section
		 */
		$wp_customize->add_section( 'inspiry_typography_section', array (
			'title'       => esc_html__( 'Typography', 'inspiry' ),
			'description' => esc_html__( 'Section to select Google fonts for headings and body text.', 'inspiry' ),
			'priority'    => 126,
		) );

		/* Heading Font */
		$wp_customize->add_setting( 'inspiry_heading_font', array (
			'Default' => 'Default',
			'sanitize_callback' => 'inspiry_sanitize',
		) );
		$wp_customize->add_control( 'inspiry_heading_font', array (
			'label'   => esc_html__( 'Google Font for Headings', 'inspiry' ),
			'section' => 'inspiry_typography_section',
			'type'    => 'select',
			'choices' => $inspiry_google_fonts,
		) );

		/* Body Font */
		$wp_customize->add_setting( 'inspiry_body_font', array (
			'Default' => 'Default',
			'sanitize_callback' => 'inspiry_sanitize',
		) );
		$wp_customize->add_control( 'inspiry_body_font', array (
			'label'   => esc_html__( 'Google Font for Body Text', 'inspiry' ),
			'section' => 'inspiry_typography_section',
			'type'    => 'select',
			'choices' => $inspiry_google_fonts,
		) );
		
	}

	add_action( 'customize_register', 'inspiry_google_fonts_customizer' );
endif;

if ( ! function_exists( 'inspiry_fonts_defaults' ) ) :
	/**
	 * Set default values for fonts settings
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	function inspiry_fonts_defaults( WP_Customize_Manager $wp_customize ) {
		$fonts_settings_ids = array(
			'inspiry_heading_font',
			'inspiry_body_font',
		);
		inspiry_initialize_defaults( $wp_customize, $fonts_settings_ids );
	}
	
	add_action( 'customize_save_after', 'inspiry_fonts_defaults' );
endif;