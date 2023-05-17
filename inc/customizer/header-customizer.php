<?php
/**
 * Header Customizer Options
 *
 * @package corponotch_pro
 */

// Add header section
$wp_customize->add_section( 'corponotch_pro_header_section', array(
	'title'             => esc_html__( 'Header Section','corponotch-pro' ),
	'description'       => esc_html__( 'Header Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_theme_options_panel',
) );

// header sticky setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_sticky_header]', array(
	'default'           => corponotch_pro_theme_option( 'enable_sticky_header' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_sticky_header]', array(
	'label'             => esc_html__( 'Make Header Sticky', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_header_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// header layout control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[header_layout]', array(
	'default'          	=> corponotch_pro_theme_option('header_layout'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[header_layout]', array(
	'label'             => esc_html__( 'Header Layout', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_header_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'normal-header' 	=> esc_html__( 'Normal', 'corponotch-pro' ),
		'absolute-header' 	=> esc_html__( 'Absolute', 'corponotch-pro' ),
		'center-header' 	=> esc_html__( 'Center Align', 'corponotch-pro' ),
	),
) );
