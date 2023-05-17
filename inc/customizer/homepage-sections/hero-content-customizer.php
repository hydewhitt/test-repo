<?php
/**
 * Hero Content Customizer Options
 *
 * @package corponotch_pro
 */

// Add hero_content section
$wp_customize->add_section( 'corponotch_pro_hero_content_section', array(
	'title'             => esc_html__( 'Hero Content Section','corponotch-pro' ),
	'description'       => esc_html__( 'Hero Content Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// hero_content menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_hero_content]', array(
	'default'           => corponotch_pro_theme_option('enable_hero_content'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_hero_content]', array(
	'label'             => esc_html__( 'Enable Hero Content', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// hero_content sub title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('hero_content_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[hero_content_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'type'				=> 'text',
) );

// hero_content content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('hero_content_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[hero_content_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );

// hero_content pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_content_page]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[hero_content_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'choices'			=> corponotch_pro_page_choices(),
	'active_callback'	=> 'corponotch_pro_hero_content_content_page_enable',
) ) );

// hero_content posts drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_content_post]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[hero_content_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'choices'			=> corponotch_pro_post_choices(),
	'active_callback'	=> 'corponotch_pro_hero_content_content_post_enable',
) ) );

// hero_content title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_custom_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[hero_content_custom_title]', array(
	'label'             => esc_html__( 'Input Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'type'				=> 'text',
	'active_callback'	=> 'corponotch_pro_hero_content_content_custom_enable',
) );

// hero_content link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_custom_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[hero_content_custom_link]', array(
	'label'             => esc_html__( 'Input Link', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'type'				=> 'url',
	'active_callback'	=> 'corponotch_pro_hero_content_content_custom_enable',
) );

// hero_content link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_custom_description]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[hero_content_custom_description]', array(
	'label'             => esc_html__( 'Input Description', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'type'				=> 'textarea',
	'active_callback'	=> 'corponotch_pro_hero_content_content_custom_enable',
) );

// hero_content btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[hero_content_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('hero_content_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[hero_content_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_hero_content_section',
	'type'				=> 'text',
) );
