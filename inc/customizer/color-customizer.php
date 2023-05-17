<?php
/**
 * Color Customizer Options
 *
 * @package corponotch_pro
 */

// theme color mode content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[theme_color_mode]', array(
	'default'          	=> corponotch_pro_theme_option('theme_color_mode'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[theme_color_mode]', array(
	'label'             => esc_html__( 'Theme Color Mode Options', 'corponotch-pro' ),
	'section'           => 'colors',
	'type'				=> 'radio',
	'choices'			=> array( 
		'light' 	=> esc_html__( 'Light', 'corponotch-pro' ),
		'dark' 		=> esc_html__( 'Dark', 'corponotch-pro' ),
	),
) );

// theme color content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[theme_color]', array(
	'default'          	=> corponotch_pro_theme_option('theme_color'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[theme_color]', array(
	'label'             => esc_html__( 'Theme Color Options', 'corponotch-pro' ),
	'section'           => 'colors',
	'type'				=> 'radio',
	'choices'			=> array( 
		'default' 	=> esc_html__( 'Default', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );

$wp_customize->add_setting( 'corponotch_pro_theme_options[primary_color]', array(
	'default'           => corponotch_pro_theme_option('primary_color'),
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'corponotch_pro_theme_options[primary_color]', array(
	'label'    => esc_html__( 'Primary Color', 'corponotch-pro' ),
	'section'  => 'colors',
	'active_callback'	=> 'corponotch_pro_theme_color_custom_enable',
) ) );

$wp_customize->add_setting( 'corponotch_pro_theme_options[secondary_color]', array(
	'default'           => corponotch_pro_theme_option('secondary_color'),
	'sanitize_callback' => 'sanitize_hex_color', // The hue is stored as a positive integer.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'corponotch_pro_theme_options[secondary_color]', array(
	'label'    => esc_html__( 'Secondary Color', 'corponotch-pro' ),
	'section'  => 'colors',
	'active_callback'	=> 'corponotch_pro_theme_color_custom_enable',
) ) );