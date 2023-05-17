<?php
/**
 * Skills Customizer Options
 *
 * @package corponotch_pro
 */

// Add skills section
$wp_customize->add_section( 'corponotch_pro_skills_section', array(
	'title'             => esc_html__( 'Skills Section','corponotch-pro' ),
	'description'       => esc_html__( 'Skills Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// skills menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_skills]', array(
	'default'           => corponotch_pro_theme_option('enable_skills'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_skills]', array(
	'label'             => esc_html__( 'Enable Skills', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// skills sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('skills_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'text',
) );

// skills label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_title]', array(
	'default'          	=> corponotch_pro_theme_option('skills_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'text',
) );

// Client additional image setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_image]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[skills_image]',
		array(
		'label'       		=> esc_html__( 'Select Image', 'corponotch-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 600, 600 ),
		'section'     		=> 'corponotch_pro_skills_section',
) ) );

// skills alignment control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_image_align]', array(
	'default'          	=> corponotch_pro_theme_option('skills_image_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_image_align]', array(
	'label'             => esc_html__( 'Image Alignment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'left-align' 	=> esc_html__( 'Left Align', 'corponotch-pro' ),
		'right-align' 	=> esc_html__( 'Right Align', 'corponotch-pro' ),
	),
) );

// skills video chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_video]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_video]', array(
	'label'             => esc_html__( 'Video Url', 'corponotch-pro' ),
	'description' 		=> esc_html__( 'Use video url from YouTube or Media Library.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'url',
) );

// skills column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_column]', array(
	'default'          	=> corponotch_pro_theme_option('skills_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_column]', array(
	'label'             => esc_html__( 'Column Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1'  => esc_html__( 'One Column', 'corponotch-pro' ),
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
	),
) );

// skills alignment control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_align]', array(
	'default'          	=> corponotch_pro_theme_option('skills_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_align]', array(
	'label'             => esc_html__( 'Alignment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'center-align'  => esc_html__( 'Center Align', 'corponotch-pro' ),
        'left-align'    => esc_html__( 'Left Align', 'corponotch-pro' ),
	),
) );

// skills content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('skills_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
	),
) );

// skills count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_count]', array(
	'default'          	=> corponotch_pro_theme_option('skills_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_skills_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[skills_count]', array(
	'label'             => esc_html__( 'Number of Service', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
) );

for ( $i = 1; $i <= corponotch_pro_theme_option('skills_count'); $i++ ) :

	// skills menu enable setting and control.
	$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_icon_' . $i . ']', array(
		// 'default'           => corponotch_pro_theme_option('skills_icon_' . $i . ''),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Icon_Picker_Control( $wp_customize, 'corponotch_pro_theme_options[skills_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_skills_section',
		'type' 				=> 'icon_picker',
	) ) );

	// skills pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[skills_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_skills_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_skills_content_page_enable',
	) ) );

	// skills posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[skills_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_skills_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_skills_content_post_enable',
	) ) );

	// skills hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[skills_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_skills_section',
		'active_callback'   => 'corponotch_pro_skills_hr_enable',
	) ) );

endfor;

// skills pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[skills_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[skills_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_skills_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_skills_content_category_enable',
) ) );

