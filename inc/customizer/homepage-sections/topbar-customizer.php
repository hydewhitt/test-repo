<?php
/**
 * Topbar Customizer Options
 *
 * @package corponotch_pro
 */

// Add topbar section
$wp_customize->add_section( 'corponotch_pro_topbar_section', array(
	'title'             => esc_html__( 'Top Bar Section','corponotch-pro' ),
	'description'       => sprintf( '%1$s <a class="menu_locations" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'corponotch-pro' ), esc_html__( 'Click Here', 'corponotch-pro' ), esc_html__( 'to create menu.', 'corponotch-pro' ) ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// topbar enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_topbar]', array(
	'default'           => corponotch_pro_theme_option('enable_topbar'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_topbar]', array(
	'label'             => esc_html__( 'Enable Topbar', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_topbar_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// topbar address control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[topbar_address]', array(
	'default'			=> corponotch_pro_theme_option('topbar_address'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[topbar_address]', array(
	'label'             => esc_html__( 'Address', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_topbar_section',
	'type'				=> 'text',
) ) );

// topbar phone control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[topbar_phone]', array(
	'default'			=> corponotch_pro_theme_option('topbar_phone'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[topbar_phone]', array(
	'label'             => esc_html__( 'Phone No', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_topbar_section',
	'type'				=> 'text',
) ) );

// topbar email control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[topbar_email]', array(
	'default'			=> corponotch_pro_theme_option('topbar_email'),
	'sanitize_callback' => 'sanitize_email',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[topbar_email]', array(
	'label'             => esc_html__( 'Email ID', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_topbar_section',
	'type'				=> 'email',
) ) );

// topbar social menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_social_menu]', array(
	'default'           => corponotch_pro_theme_option('show_social_menu'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_social_menu]', array(
	'label'             => esc_html__( 'Show Social Menu', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_topbar_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// topbar search enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_top_search]', array(
	'default'           => corponotch_pro_theme_option('show_top_search'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_top_search]', array(
	'label'             => esc_html__( 'Show Search', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_topbar_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );