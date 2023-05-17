<?php
/**
 * Client Customizer Options
 *
 * @package corponotch_pro
 */

// Add client section
$wp_customize->add_section( 'corponotch_pro_client_section', array(
	'title'             => esc_html__( 'Client Section','corponotch-pro' ),
	'description'       => esc_html__( 'Client Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// client menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_client]', array(
	'default'           => corponotch_pro_theme_option('enable_client'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_client]', array(
	'label'             => esc_html__( 'Enable Client', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// client sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[client_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[client_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'type'				=> 'text',
) );

// client label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[client_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[client_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'type'				=> 'text',
) );

// client column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[client_column]', array(
	'default'          	=> corponotch_pro_theme_option('client_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[client_column]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
        'column-5'  => esc_html__( 'Five Column', 'corponotch-pro' ),
        'column-6'  => esc_html__( 'Six Column', 'corponotch-pro' ),
	),
) );

// client content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[client_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('client_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[client_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );

// client count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[client_count]', array(
	'default'          	=> corponotch_pro_theme_option('client_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_client_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[client_count]', array(
	'label'             => esc_html__( 'Number of Client', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 10. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 10,
		),
) );

for ( $i = 1; $i <= corponotch_pro_theme_option('client_count'); $i++ ) :

	// client pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[client_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[client_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_client_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_client_content_page_enable',
	) ) );

	// client posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[client_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[client_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_client_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_client_content_post_enable',
	) ) );

	// Client additional image setting and control.
	$wp_customize->add_setting( 'corponotch_pro_theme_options[client_custom_image_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[client_custom_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Select Image %d', 'corponotch-pro' ), $i ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 500, 300 ),
			'section'     		=> 'corponotch_pro_client_section',
			'active_callback'	=> 'corponotch_pro_client_content_custom_enable',
	) ) );

	// client alt text control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[client_custom_text_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[client_custom_text_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Image Alt Text %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_client_section',
		'type'				=> 'text',
		'active_callback'	=> 'corponotch_pro_client_content_custom_enable',
	) );

	// client link control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[client_custom_link_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[client_custom_link_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Input Link %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_client_section',
		'type'				=> 'url',
		'active_callback'	=> 'corponotch_pro_client_content_custom_enable',
	) );

	// client hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[client_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[client_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_client_section',
		'active_callback'	=> 'corponotch_pro_client_content_custom_enable',
	) ) );

endfor;

// client category drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[client_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[client_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_client_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_client_content_category_enable',
) ) );