<?php
/**
 * Single Post Customizer Options
 *
 * @package corponotch_pro
 */

// Add excerpt section
$wp_customize->add_section( 'corponotch_pro_single_section', array(
	'title'             => esc_html__( 'Single Post Setting','corponotch-pro' ),
	'description'       => esc_html__( 'Single Post Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_theme_options_panel',
) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[sidebar_single_layout]', array(
	'sanitize_callback'   => 'corponotch_pro_sanitize_select',
	'default'             => corponotch_pro_theme_option('sidebar_single_layout'),
) );

$wp_customize->add_control(  new CorpoNotch_Pro_Radio_Image_Control ( $wp_customize, 'corponotch_pro_theme_options[sidebar_single_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'corponotch-pro' ),
	'section'             => 'corponotch_pro_single_section',
	'choices'			  => corponotch_pro_sidebar_position(),
) ) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_single_date]', array(
	'default'           => corponotch_pro_theme_option( 'show_single_date' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_single_date]', array(
	'label'             => esc_html__( 'Show Date', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_single_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_single_category]', array(
	'default'           => corponotch_pro_theme_option( 'show_single_category' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_single_category]', array(
	'label'             => esc_html__( 'Show Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_single_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_single_tags]', array(
	'default'           => corponotch_pro_theme_option( 'show_single_tags' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_single_tags]', array(
	'label'             => esc_html__( 'Show Tags', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_single_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_single_author]', array(
	'default'           => corponotch_pro_theme_option( 'show_single_author' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_single_author]', array(
	'label'             => esc_html__( 'Show Author', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_single_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );
