<?php
/**
 * Team Customizer Options
 *
 * @package corponotch_pro
 */

// Add team section
$wp_customize->add_section( 'corponotch_pro_team_section', array(
	'title'             => esc_html__( 'Team Section','corponotch-pro' ),
	'description'       => esc_html__( 'Team Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// team menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_team]', array(
	'default'           => corponotch_pro_theme_option('enable_team'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_team]', array(
	'label'             => esc_html__( 'Enable Team', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// team sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[team_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('team_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[team_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'type'				=> 'text',
) );

// team label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[team_title]', array(
	'default'          	=> corponotch_pro_theme_option('team_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[team_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'type'				=> 'text',
) );

// team column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[team_column]', array(
	'default'          	=> corponotch_pro_theme_option('team_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[team_column]', array(
	'label'             => esc_html__( 'Column Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
	),
) );

// team content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[team_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('team_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[team_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
	),
) );

// team count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[team_count]', array(
	'default'          	=> corponotch_pro_theme_option('team_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_team_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[team_count]', array(
	'label'             => esc_html__( 'Number of Team', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
) );

// team pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[team_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[team_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_team_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_team_content_category_enable',
) ) );

for ( $i = 1; $i <= corponotch_pro_theme_option('team_count'); $i++ ) :

	// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[team_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_team_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_team_content_page_enable',
	) ) );

	// team posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[team_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[team_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_team_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_team_content_post_enable',
	) ) );

	// team label chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[team_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'corponotch_pro_theme_options[team_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_team_section',
		'type'				=> 'text',
	) );

	// team social control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[team_social_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Multi_Input_Custom_Control( $wp_customize, 'corponotch_pro_theme_options[team_social_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Social Links %d', 'corponotch-pro' ), $i ),
		'button_text'       => esc_html__( 'Add More', 'corponotch-pro' ),
		'section'           => 'corponotch_pro_team_section',
		'type'				=> 'multi-input',
	) ) );

	// team hr control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[team_custom_hr_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Horizontal_Line( $wp_customize, 'corponotch_pro_theme_options[team_custom_hr_' . $i . ']', array(
		'section'           => 'corponotch_pro_team_section',
	) ) );

endfor;
