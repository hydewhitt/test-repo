<?php
/**
 * Recent Customizer Options
 *
 * @package corponotch_pro
 */

// Add recent section
$wp_customize->add_section( 'corponotch_pro_recent_section', array(
	'title'             => esc_html__( 'Recent Section','corponotch-pro' ),
	'description'       => esc_html__( 'Recent Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// recent enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_recent]', array(
	'default'           => corponotch_pro_theme_option('enable_recent'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_recent]', array(
	'label'             => esc_html__( 'Enable Recent', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// recent sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('recent_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[recent_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'type'				=> 'text',
) );

// recent label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_title]', array(
	'default'          	=> corponotch_pro_theme_option('recent_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[recent_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'type'				=> 'text',
) );

// recent column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_column]', array(
	'default'          	=> corponotch_pro_theme_option('recent_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[recent_column]', array(
	'label'             => esc_html__( 'Column Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
	),
) );

// recent content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('recent_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[recent_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'recent' 	=> esc_html__( 'Recent', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
	),
) );

// recent count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_count]', array(
	'default'          	=> corponotch_pro_theme_option('recent_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_recent_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[recent_count]', array(
	'label'             => esc_html__( 'Number of Latest Blog', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
) );

// recent pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[recent_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_recent_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_recent_content_category_enable',
) ) );

for ( $i = 1; $i <= corponotch_pro_theme_option('recent_count'); $i++ ) :

	// recent posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[recent_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[recent_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_recent_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_recent_content_post_enable',
	) ) );

endfor;
