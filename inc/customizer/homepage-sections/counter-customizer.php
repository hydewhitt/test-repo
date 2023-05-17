<?php
/**
 * Counter Customizer Options
 *
 * @package corponotch_pro
 */

// Add counter section
$wp_customize->add_section( 'corponotch_pro_counter_section', array(
	'title'             => esc_html__( 'Counter Section','corponotch-pro' ),
	'description'       => esc_html__( 'Counter Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// counter menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_counter]', array(
	'default'           => corponotch_pro_theme_option('enable_counter'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_counter]', array(
	'label'             => esc_html__( 'Enable Counter', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_counter_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// counter count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[counter_opacity]', array(
	'default'          	=> corponotch_pro_theme_option('counter_opacity'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[counter_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_counter_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// counter additional image setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[counter_image]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[counter_image]',
	array(
	'label'       		=> esc_html__( 'Select Image', 'corponotch-pro' ),
	'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 1920, 700 ),
	'section'     		=> 'corponotch_pro_counter_section',
) ) );

for ( $i = 1; $i <= 4; $i++ ) :

	// counter menu enable setting and control.
	$wp_customize->add_setting( 'corponotch_pro_theme_options[counter_icon_' . $i . ']', array(
		// 'default'           => corponotch_pro_theme_option('counter_icon_' . $i . ''),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Icon_Picker_Control( $wp_customize, 'corponotch_pro_theme_options[counter_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_counter_section',
		'type' 				=> 'icon_picker',
	) ) );

	// counter label chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[counter_label_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[counter_label_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Label %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_counter_section',
		'type'				=> 'text',
	) );

	// counter value chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[counter_value_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[counter_value_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Value %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_counter_section',
		'type'				=> 'text',
	) );

	// counter hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[counter_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[counter_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_counter_section',
	) ) );

endfor;
