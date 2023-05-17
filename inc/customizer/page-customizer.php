<?php
/**
 * Page Customizer Options
 *
 * @package corponotch_pro
 */

// Add excerpt section
$wp_customize->add_section( 'corponotch_pro_page_section', array(
	'title'             => esc_html__( 'Page Setting','corponotch-pro' ),
	'description'       => esc_html__( 'Page Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_theme_options_panel',
) );

// frontpage setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_front_page]', array(
	'default'           => corponotch_pro_theme_option( 'enable_front_page' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_front_page]', array(
	'label'             => esc_html__( 'Show Static Front Page', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_page_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[sidebar_page_layout]', array(
	'sanitize_callback'   => 'corponotch_pro_sanitize_select',
	'default'             => corponotch_pro_theme_option('sidebar_page_layout'),
) );

$wp_customize->add_control(  new CorpoNotch_Pro_Radio_Image_Control ( $wp_customize, 'corponotch_pro_theme_options[sidebar_page_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'corponotch-pro' ),
	'section'             => 'corponotch_pro_page_section',
	'choices'			  => corponotch_pro_sidebar_position(),
) ) );
