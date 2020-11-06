<?php
/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class skyrocket_initialise_wp_colorpicker_settings {

	public function __construct() {

		// Register our Panels
		add_action( 'customize_register', array( $this, 'skyrocket_add_customizer_panels' ) );

		// Register our sections
		add_action( 'customize_register', array( $this, 'skyrocket_add_customizer_sections' ) );

		// Register our sample Custom Control controls
		add_action( 'customize_register', array( $this, 'skyrocket_register_sample_controls' ) );
	}

	/**
	 * Register the Customizer panels
	 */
	public function skyrocket_add_customizer_panels( $wp_customize ) {
		/**
		 * Add our ColorPicker Test Panel
		 */
		 $wp_customize->add_panel( 'color_picker_panel',
		 	array(
				'title' => __( 'WP ColorPicker Test', 'skyrocket' ),
				'description' => esc_html__( 'Test the WP Color Picker Alpha script.', 'skyrocket' )
			)
		);
	}

	/**
	 * Register the Customizer sections
	 */
	public function skyrocket_add_customizer_sections( $wp_customize ) {
		/**
		 * Add our Body Text Section
		 */
		$wp_customize->add_section( 'test_color_controls_section',
			array(
				'title' => __( 'Test Controls', 'skyrocket' ),
				'description' => esc_html__( 'Test the WP Color Picker Alpha script with some sample controls.', 'skyrocket' ),
				'panel' => 'color_picker_panel'
			)
		);
	}

	/**
	 * Register our sample custom controls
	 */
	public function skyrocket_register_sample_controls( $wp_customize ) {
		// Test of Simple Notice control
		$wp_customize->add_setting( 'test_simple_notice',
			array(
				'default' => '',
				'type' => 'option',
				'transport' => 'postMessage',
				'sanitize_callback' => 'skyrocket_text_sanitization'
			)
		);
		$wp_customize->add_control( new Skyrocket_Simple_Notice_Custom_Control( $wp_customize, 'test_simple_notice',
			array(
				'label' => __( 'Sample Color Controls', 'skyrocket' ),
				'description' => __( 'These sample color controls test the WP Color Picker Script created by @kallookoo. Check out the <a href="https://github.com/kallookoo/wp-color-picker-alpha" target="_blank">WP-Color-Picker-Alpha Repo</a> on Github to learn more.', 'skyrocket' ),
				'section' => 'test_color_controls_section'
			)
		) );

		// Test of WPColorPicker Alpha Color Picker Control
		$wp_customize->add_setting( 'test_wpcolorpicker_alpha_color-1',
			array(
				'default' => 'rgba(55,55,55,0.5)',
				'type' => 'option',
				'transport' => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
			)
		);
		$wp_customize->add_control( new Skyrocket_Alpha_Color_Control( $wp_customize, 'test_wpcolorpicker_alpha_color-1',
			array(
				'label' => __( 'WP ColorPicker Alpha Color Picker', 'skyrocket' ),
				'description' => esc_html__( 'Sample color control with Alpha channel', 'skyrocket' ),
				'section' => 'test_color_controls_section',
				'input_attrs' => array(
					'palette' => array(
						'#000000',
						'#222222',
						'#444444',
						'#777777',
						'#999999',
						'#aaaaaa',
						'#dddddd',
						'#ffffff',
					)
				),
			)
		) );

		// Another Test of WPColorPicker Alpha Color Picker Control
		$wp_customize->add_setting( 'test_wpcolorpicker_alpha_color-2',
			array(
				'default' => 'rgb(199,67,204)',
				'type' => 'option',
				'transport' => 'refresh',
				'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
			)
		);
		$wp_customize->add_control( new Skyrocket_Alpha_Color_Control( $wp_customize, 'test_wpcolorpicker_alpha_color-2',
			array(
				'label' => __( 'WP ColorPicker Alpha Color Picker', 'skyrocket' ),
				'description' => esc_html__( 'Sample color control with Alpha channel', 'skyrocket' ),
				'section' => 'test_color_controls_section',
				'input_attrs' => array(
					'resetalpha' => false,
					'palette' => array(
						'rgba(99,78,150,1)',
						'rgba(67,78,150,1)',
						'rgba(34,78,150,.7)',
						'rgba(3,78,150,1)',
						'rgba(7,110,230,.9)',
						'rgba(234,78,150,1)',
						'rgba(99,78,150,.5)',
						'rgba(190,120,120,.5)',
					),
				),
			)
		) );

	}

}

/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit( dirname(__FILE__) ) . 'custom-controls.php';

/**
 * Initialise our Customizer settings
 */
$wpColorPickerTest = new skyrocket_initialise_wp_colorpicker_settings();
