<?php
/**
 * Introduction Customizer Options
 *
 * @package corponotch_pro
 */

// Add introduction section
$wp_customize->add_section( 'corponotch_pro_introduction_section', array(
	'title'             => esc_html__( 'Introduction Section','corponotch-pro' ),
	'description'       => esc_html__( 'Introduction Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// introduction menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_introduction]', array(
	'default'           => corponotch_pro_theme_option('enable_introduction'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_introduction]', array(
	'label'             => esc_html__( 'Enable Introduction', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// introduction alignment control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_align]', array(
	'default'          	=> corponotch_pro_theme_option('introduction_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_align]', array(
	'label'             => esc_html__( 'Image Alignment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'left-align' 	=> esc_html__( 'Left Align', 'corponotch-pro' ),
		'right-align' 	=> esc_html__( 'Right Align', 'corponotch-pro' ),
	),
) );

// introduction excerpt control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_excerpt]', array(
	'default'          	=> corponotch_pro_theme_option('introduction_excerpt'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_excerpt]', array(
	'label'             => esc_html__( 'Content Length', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'excerpt' 		=> esc_html__( 'Excerpt', 'corponotch-pro' ),
		'full-content' 	=> esc_html__( 'Full Content', 'corponotch-pro' ),
	),
) );

// introduction content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('introduction_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );

// introduction sub title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('introduction_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'text',
) );

// introduction pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_content_page]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[introduction_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'choices'			=> corponotch_pro_page_choices(),
	'active_callback'	=> 'corponotch_pro_introduction_content_page_enable',
) ) );

// introduction posts drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_content_post]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[introduction_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'choices'			=> corponotch_pro_post_choices(),
	'active_callback'	=> 'corponotch_pro_introduction_content_post_enable',
) ) );

// introduction title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_custom_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_custom_title]', array(
	'label'             => esc_html__( 'Input Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'text',
	'active_callback'	=> 'corponotch_pro_introduction_content_custom_enable',
) );

// introduction link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_custom_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_custom_link]', array(
	'label'             => esc_html__( 'Input Link', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'url',
	'active_callback'	=> 'corponotch_pro_introduction_content_custom_enable',
) );

// introduction link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_custom_description]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_custom_description]', array(
	'label'             => esc_html__( 'Input Description', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'textarea',
	'active_callback'	=> 'corponotch_pro_introduction_content_custom_enable',
) );

// introduction additional image setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_custom_image]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[introduction_custom_image]',
		array(
		'label'       		=> esc_html__( 'Select Image', 'corponotch-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 600, 500 ),
		'section'     		=> 'corponotch_pro_introduction_section',
		'active_callback'	=> 'corponotch_pro_introduction_content_custom_enable',
) ) );

// introduction btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[introduction_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('introduction_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[introduction_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_introduction_section',
	'type'				=> 'text',
) );
