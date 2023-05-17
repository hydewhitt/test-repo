<?php
/**
 * Service Customizer Options
 *
 * @package corponotch_pro
 */

// Add service section
$wp_customize->add_section( 'corponotch_pro_service_section', array(
	'title'             => esc_html__( 'Service Section','corponotch-pro' ),
	'description'       => esc_html__( 'Service Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// service menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_service]', array(
	'default'           => corponotch_pro_theme_option('enable_service'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_service]', array(
	'label'             => esc_html__( 'Enable Service', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// service sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('service_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[service_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'type'				=> 'text',
) );

// service label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_title]', array(
	'default'          	=> corponotch_pro_theme_option('service_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[service_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'type'				=> 'text',
) );

// service column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_column]', array(
	'default'          	=> corponotch_pro_theme_option('service_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[service_column]', array(
	'label'             => esc_html__( 'Column Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
	),
) );

// service alignment control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_align]', array(
	'default'          	=> corponotch_pro_theme_option('service_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[service_align]', array(
	'label'             => esc_html__( 'Alignment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'center-align'  => esc_html__( 'Center Align', 'corponotch-pro' ),
        'left-align'    => esc_html__( 'Left Align', 'corponotch-pro' ),
	),
) );

// service content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('service_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[service_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
	),
) );

// service count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_count]', array(
	'default'          	=> corponotch_pro_theme_option('service_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_service_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[service_count]', array(
	'label'             => esc_html__( 'Number of Service', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
) );

for ( $i = 1; $i <= corponotch_pro_theme_option('service_count'); $i++ ) :

	// service menu enable setting and control.
	$wp_customize->add_setting( 'corponotch_pro_theme_options[service_icon_' . $i . ']', array(
		// 'default'           => corponotch_pro_theme_option('service_icon_' . $i . ''),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Icon_Picker_Control( $wp_customize, 'corponotch_pro_theme_options[service_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_service_section',
		'type' 				=> 'icon_picker',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_service_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_service_content_page_enable',
	) ) );

	// service posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[service_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[service_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_service_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_service_content_post_enable',
	) ) );

	// service hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[service_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[service_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_service_section',
		'active_callback'   => 'corponotch_pro_service_hr_enable',
	) ) );

endfor;

// service pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[service_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[service_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_service_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_service_content_category_enable',
) ) );
