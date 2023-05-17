<?php
/**
 * Call to Action Customizer Options
 *
 * @package corponotch_pro
 */

// Add cta section
$wp_customize->add_section( 'corponotch_pro_cta_section', array(
	'title'             => esc_html__( 'Call to Action Section','corponotch-pro' ),
	'description'       => esc_html__( 'Call to Action Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// cta menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_cta]', array(
	'default'           => corponotch_pro_theme_option('enable_cta'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_cta]', array(
	'label'             => esc_html__( 'Enable Call to Action', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// cta alignment control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_align]', array(
	'default'          	=> corponotch_pro_theme_option('cta_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_align]', array(
	'label'             => esc_html__( 'Layout', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'left-align' 	=> esc_html__( 'Left Align', 'corponotch-pro' ),
		'center-align' 	=> esc_html__( 'Center Align', 'corponotch-pro' ),
	),
) );

// cta count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_opacity]', array(
	'default'          	=> corponotch_pro_theme_option('cta_opacity'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// cta content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('cta_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );


// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'choices'			=> corponotch_pro_page_choices(),
	'active_callback'	=> 'corponotch_pro_cta_content_page_enable',
) ) );

// cta posts drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_content_post]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[cta_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'choices'			=> corponotch_pro_post_choices(),
	'active_callback'	=> 'corponotch_pro_cta_content_post_enable',
) ) );

// cta title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_custom_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_custom_title]', array(
	'label'             => esc_html__( 'Input Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'text',
	'active_callback'	=> 'corponotch_pro_cta_content_custom_enable',
) );

// cta link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_custom_link]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_custom_link]', array(
	'label'             => esc_html__( 'Input Link', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'url',
	'active_callback'	=> 'corponotch_pro_cta_content_custom_enable',
) );

// cta link drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_custom_description]', array(
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_custom_description]', array(
	'label'             => esc_html__( 'Input Description', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'textarea',
	'active_callback'	=> 'corponotch_pro_cta_content_custom_enable',
) );

// cta additional image setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_custom_image]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[cta_custom_image]',
		array(
		'label'       		=> esc_html__( 'Select Image', 'corponotch-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 600, 500 ),
		'section'     		=> 'corponotch_pro_cta_section',
		'active_callback'	=> 'corponotch_pro_cta_content_custom_enable',
) ) );

// cta btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[cta_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('cta_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[cta_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_cta_section',
	'type'				=> 'text',
) );
