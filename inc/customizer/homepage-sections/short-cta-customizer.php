<?php
/**
 * Short Call to Action Customizer Options
 *
 * @package corponotch_pro
 */

// Add short_cta section
$wp_customize->add_section( 'corponotch_pro_short_cta_section', array(
	'title'             => esc_html__( 'Short Call to Action Section','corponotch-pro' ),
	'description'       => esc_html__( 'Short Call to Action Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// short_cta menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_short_cta]', array(
	'default'           => corponotch_pro_theme_option('enable_short_cta'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_short_cta]', array(
	'label'             => esc_html__( 'Enable Short Call to Action', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// short_cta content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[short_cta_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('short_cta_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[short_cta_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );

// short_cta pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[short_cta_content_page]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[short_cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'choices'			=> corponotch_pro_page_choices(),
	'active_callback'	=> 'corponotch_pro_short_cta_content_page_enable',
) ) );

// short_cta posts drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[short_cta_content_post]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[short_cta_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'choices'			=> corponotch_pro_post_choices(),
	'active_callback'	=> 'corponotch_pro_short_cta_content_post_enable',
) ) );

// short_cta title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[short_cta_custom_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[short_cta_custom_title]', array(
	'label'             => esc_html__( 'Input Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'type'				=> 'text',
	'active_callback'	=> 'corponotch_pro_short_cta_content_custom_enable',
) );

// short_cta link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[short_cta_custom_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[short_cta_custom_link]', array(
	'label'             => esc_html__( 'Input Link', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'type'				=> 'url',
	'active_callback'	=> 'corponotch_pro_short_cta_content_custom_enable',
) );

// short_cta btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[short_cta_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('short_cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[short_cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_short_cta_section',
	'type'				=> 'text',
) );
