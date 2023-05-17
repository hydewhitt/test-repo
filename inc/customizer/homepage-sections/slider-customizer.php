<?php
/**
 * Slider Customizer Options
 *
 * @package corponotch_pro
 */

// Add slider section
$wp_customize->add_section( 'corponotch_pro_slider_section', array(
	'title'             => esc_html__( 'Slider Section','corponotch-pro' ),
	'description'       => esc_html__( 'Slider Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// slider menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_slider]', array(
	'default'           => corponotch_pro_theme_option('enable_slider'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_slider]', array(
	'label'             => esc_html__( 'Enable Slider', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// slider social menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_entire_site]', array(
	'default'           => corponotch_pro_theme_option('slider_entire_site'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[slider_entire_site]', array(
	'label'             => esc_html__( 'Show Entire Site', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_arrow]', array(
	'default'           => corponotch_pro_theme_option('slider_arrow'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[slider_arrow]', array(
	'label'             => esc_html__( 'Show Arrow Controller', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// slider autoplay control enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_autoplay]', array(
	'default'           => corponotch_pro_theme_option('slider_autoplay'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[slider_autoplay]', array(
	'label'             => esc_html__( 'Enable Auto Slide', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// slider wave border enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_slider_wave]', array(
	'default'           => corponotch_pro_theme_option('enable_slider_wave'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_slider_wave]', array(
	'label'             => esc_html__( 'Enable Slider Wave Border', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// slider count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_opacity]', array(
	'default'          	=> corponotch_pro_theme_option('slider_opacity'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_opacity]', array(
	'label'             => esc_html__( 'Overlay Opacity', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'range',
	'input_attrs'		=> array(
		'min'	=> 0,
		'max'	=> 9,
		),
) );

// slider alignment type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_align]', array(
	'default'          	=> corponotch_pro_theme_option('slider_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_align]', array(
	'label'             => esc_html__( 'Alignment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'left-align' 		=> esc_html__( 'Left Align', 'corponotch-pro' ),
		'center-align' 		=> esc_html__( 'Center Align', 'corponotch-pro' ),
		'right-align' 		=> esc_html__( 'Right Align', 'corponotch-pro' ),
	),
) );

// slider text color type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_text]', array(
	'default'          	=> corponotch_pro_theme_option('slider_text'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_text]', array(
	'label'             => esc_html__( 'Text Color', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'light-text' 		=> esc_html__( 'Light Text', 'corponotch-pro' ),
		'dark-text' 		=> esc_html__( 'Dark Text', 'corponotch-pro' ),
	),
) );

// slider btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('slider_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'text',
) );

// slider alt btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_alt_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('slider_alt_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_alt_btn_label]', array(
	'label'             => esc_html__( 'Alt Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'text',
) );

// slider alt btn link chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_alt_btn_link]', array(
	'default'          	=> corponotch_pro_theme_option('slider_alt_btn_link'),
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_alt_btn_link]', array(
	'label'             => esc_html__( 'Alt Button Url', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'url',
) );

// slider arrow control enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_alt_btn_color]', array(
	'default'           => corponotch_pro_theme_option('slider_alt_btn_color'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[slider_alt_btn_color]', array(
	'label'             => esc_html__( 'Enable Alt Button Color', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// slider content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('slider_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
		'custom' 	=> esc_html__( 'Custom', 'corponotch-pro' ),
	),
) );

// slider count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_count]', array(
	'default'          	=> corponotch_pro_theme_option('slider_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_slider_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[slider_count]', array(
	'label'             => esc_html__( 'Number of Slides', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 10. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 10,
		),
) );

for ( $i = 1; $i <= corponotch_pro_theme_option('slider_count'); $i++ ) :

	// slider title drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[slider_sub_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Sub Title %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_slider_section',
		'type'				=> 'text',
	) );

	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_slider_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_slider_content_page_enable',
	) ) );

	// slider posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[slider_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_slider_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_slider_content_post_enable',
	) ) );

	// slider title drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_custom_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[slider_custom_title_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Input Title %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_slider_section',
		'type'				=> 'text',
		'active_callback'	=> 'corponotch_pro_slider_content_custom_enable',
	) );

	// slider link drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_custom_link_' . $i . ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[slider_custom_link_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Input Link %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_slider_section',
		'type'				=> 'url',
		'active_callback'	=> 'corponotch_pro_slider_content_custom_enable',
	) );

	// Client additional image setting and control.
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_custom_image_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_image',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[slider_custom_image_' . $i . ']',
			array(
			'label'       		=> sprintf( esc_html__( 'Select Image %d', 'corponotch-pro' ), $i ),
			'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 1920, 1080 ),
			'section'     		=> 'corponotch_pro_slider_section',
			'active_callback'	=> 'corponotch_pro_slider_content_custom_enable',
	) ) );

	// slider hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[slider_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_slider_section',
		'active_callback'	=> 'corponotch_pro_slider_content_custom_enable',
	) ) );

endfor;

// slider category drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[slider_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[slider_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_slider_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_slider_content_category_enable',
) ) );
