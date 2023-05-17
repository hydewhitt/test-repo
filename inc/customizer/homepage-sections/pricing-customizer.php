<?php
/**
 * Pricing Customizer Options
 *
 * @package corponotch_pro
 */

// Add pricing section
$wp_customize->add_section( 'corponotch_pro_pricing_section', array(
	'title'             => esc_html__( 'Pricing Section','corponotch-pro' ),
	'description'       => esc_html__( 'Pricing Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// pricing menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_pricing]', array(
	'default'           => corponotch_pro_theme_option('enable_pricing'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_pricing]', array(
	'label'             => esc_html__( 'Enable Pricing', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_pricing_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// pricing sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('pricing_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_pricing_section',
	'type'				=> 'text',
) );

// pricing label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_title]', array(
	'default'          	=> corponotch_pro_theme_option('pricing_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_pricing_section',
	'type'				=> 'text',
) );

// pricing_table count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_count]', array(
	'default'          	=> corponotch_pro_theme_option('pricing_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_pricing_count',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_count]', array(
	'label'             => esc_html__( 'Number of Pricing Table', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 5. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_pricing_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 5,
		),
) );

for ( $i = 1; $i <= corponotch_pro_theme_option('pricing_count'); $i++ ) :

	// pricing menu enable setting and control.
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_highlight_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_switch',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[pricing_highlight_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Highlight Pricing %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_pricing_section',
		'on_off_label' 		=> corponotch_pro_show_options(),
	) ) );

	// pricing label chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_label_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Label %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_pricing_section',
		'type'				=> 'text',
	) );

	// pricing value chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_pricing_section',
		'type'				=> 'text',
	) );

	// pricing sub label chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_sub_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_sub_label_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Sub Label %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_pricing_section',
		'type'				=> 'text',
	) );

	// pricing list control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_list_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Multi_Input_Custom_Control( $wp_customize, 'corponotch_pro_theme_options[pricing_list_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Feature List %d', 'corponotch-pro' ), $i ),
		'button_text'       => esc_html__( 'Add More', 'corponotch-pro' ),
		'section'           => 'corponotch_pro_pricing_section',
		'type'				=> 'multi-input',
	) ) );

	// pricing btn label chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_btn_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_btn_label_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Button Label %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_pricing_section',
		'type'				=> 'text',
	) );

	// pricing btn_url chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_btn_url_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[pricing_btn_url_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Button Url %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_pricing_section',
		'type'				=> 'text',
	) );

	// pricing hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[pricing_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[pricing_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_pricing_section',
	) ) );

endfor;
