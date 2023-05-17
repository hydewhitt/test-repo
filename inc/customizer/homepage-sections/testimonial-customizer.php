<?php
/**
 * Testimonial Customizer Options
 *
 * @package corponotch_pro
 */

// Add testimonial section
$wp_customize->add_section( 'corponotch_pro_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial Section','corponotch-pro' ),
	'description'       => esc_html__( 'Testimonial Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// testimonial enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_testimonial]', array(
	'default'           => corponotch_pro_theme_option('enable_testimonial'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_testimonial]', array(
	'label'             => esc_html__( 'Enable Testimonial', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_testimonial_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// testimonial control enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_control]', array(
	'default'           => corponotch_pro_theme_option('testimonial_control'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[testimonial_control]', array(
	'label'             => esc_html__( 'Show Arrow Control', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_testimonial_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// testimonial count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_opacity]', array(
	'default'          	=> corponotch_pro_theme_option('testimonial_opacity'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[testimonial_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_testimonial_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// testimonial additional image setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_image]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[testimonial_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'corponotch-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 1920, 1080 ),
		'section'     		=> 'corponotch_pro_testimonial_section',
) ) );

// testimonial content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('testimonial_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[testimonial_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_testimonial_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
	),
) );

// testimonial count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_count]', array(
	'default'          	=> corponotch_pro_theme_option('testimonial_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_testimonial_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[testimonial_count]', array(
	'label'             => esc_html__( 'Number of Testimonial', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_testimonial_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
) );

// testimonial pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[testimonial_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_testimonial_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_testimonial_content_category_enable',
) ) );

for ( $i = 1; $i <= corponotch_pro_theme_option('testimonial_count'); $i++ ) :

	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_testimonial_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_testimonial_content_page_enable',
	) ) );

	// testimonial posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[testimonial_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_testimonial_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_testimonial_content_post_enable',
	) ) );

	// testimonial label chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[testimonial_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_testimonial_section',
		'type'				=> 'text',
	) );

	// testimonial social control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_social_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Multi_Input_Custom_Control( $wp_customize, 'corponotch_pro_theme_options[testimonial_social_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Social Links %d', 'corponotch-pro' ), $i ),
		'button_text'       => esc_html__( 'Add More', 'corponotch-pro' ),
		'section'           => 'corponotch_pro_testimonial_section',
		'type'				=> 'multi-input',
	) ) );

	// testimonial hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[testimonial_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_testimonial_section',
	) ) );

endfor;
