<?php
/**
 * Global Customizer Options
 *
 * @package corponotch_pro
 */

// Add Global section
$wp_customize->add_section( 'corponotch_pro_global_section', array(
	'title'             => esc_html__( 'Global Setting','corponotch-pro' ),
	'description'       => esc_html__( 'Global Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_theme_options_panel',
) );

// breadcrumb setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_breadcrumb]', array(
	'default'           => corponotch_pro_theme_option( 'enable_breadcrumb' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_breadcrumb]', array(
	'label'             => esc_html__( 'Enable Breadcrumb', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_global_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// homepage subtitle bar setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_subtitle_bar]', array(
	'default'           => corponotch_pro_theme_option( 'enable_subtitle_bar' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_subtitle_bar]', array(
	'label'             => esc_html__( 'Enable Subtitle Separator line', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_global_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );


// site layout setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[site_layout]', array(
	'sanitize_callback'   => 'corponotch_pro_sanitize_select',
	'default'             => corponotch_pro_theme_option('site_layout'),
) );

$wp_customize->add_control(  new CorpoNotch_Pro_Radio_Image_Control ( $wp_customize, 'corponotch_pro_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'corponotch-pro' ),
	'section'             => 'corponotch_pro_global_section',
	'choices'			  => corponotch_pro_site_layout(),
) ) );

// loader setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_loader]', array(
	'default'           => corponotch_pro_theme_option( 'enable_loader' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_loader]', array(
	'label'             => esc_html__( 'Enable Loader', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_global_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// loader type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[loader_type]', array(
	'default'          	=> corponotch_pro_theme_option('loader_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[loader_type]', array(
	'label'             => esc_html__( 'Loader Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_global_section',
	'type'				=> 'select',
	'choices'			=> corponotch_pro_get_spinner_list(),
) );

// header typography type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[header_typography]', array(
	'default'          	=> corponotch_pro_theme_option('header_typography'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[header_typography]', array(
	'label'             => esc_html__( 'Heading Typography', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_global_section',
	'type'				=> 'select',
	'choices'			=> corponotch_pro_header_typography(),
) );

// body typography type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[body_typography]', array(
	'default'          	=> corponotch_pro_theme_option('body_typography'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[body_typography]', array(
	'label'             => esc_html__( 'Body Typography', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_global_section',
	'type'				=> 'select',
	'choices'			=> corponotch_pro_body_typography(),
) );
