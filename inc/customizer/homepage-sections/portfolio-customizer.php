<?php
/**
 * Portfolio Customizer Options
 *
 * @package corponotch_pro
 */

// Add portfolio section
$wp_customize->add_section( 'corponotch_pro_portfolio_section', array(
	'title'             => esc_html__( 'Portfolio Section','corponotch-pro' ),
	'description'       => esc_html__( 'Portfolio Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// portfolio menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_portfolio]', array(
	'default'           => corponotch_pro_theme_option('enable_portfolio'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_portfolio]', array(
	'label'             => esc_html__( 'Enable Portfolio', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// portfolio sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('portfolio_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[portfolio_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'type'				=> 'text',
) );

// portfolio label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_title]', array(
	'default'          	=> corponotch_pro_theme_option('portfolio_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[portfolio_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'type'				=> 'text',
) );

// portfolio column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_column]', array(
	'default'          	=> corponotch_pro_theme_option('portfolio_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[portfolio_column]', array(
	'label'             => esc_html__( 'Column Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
	),
) );

// portfolio button label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_btn_label]', array(
	'default'          	=> corponotch_pro_theme_option('portfolio_btn_label'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[portfolio_btn_label]', array(
	'label'             => esc_html__( 'Button Label', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'type'				=> 'text',
) );

// portfolio content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('portfolio_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[portfolio_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'page' 		=> esc_html__( 'Page', 'corponotch-pro' ),
		'post' 		=> esc_html__( 'Post', 'corponotch-pro' ),
		'category' 	=> esc_html__( 'Category', 'corponotch-pro' ),
	),
) );

// portfolio count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_count]', array(
	'default'          	=> corponotch_pro_theme_option('portfolio_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_portfolio_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[portfolio_count]', array(
	'label'             => esc_html__( 'Number of Portfolio', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
) );

for ( $i = 1; $i <= corponotch_pro_theme_option('portfolio_count'); $i++ ) :

	// portfolio pages drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_content_page_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[portfolio_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_portfolio_section',
		'choices'			=> corponotch_pro_page_choices(),
		'active_callback'	=> 'corponotch_pro_portfolio_content_page_enable',
	) ) );

	// portfolio posts drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_content_post_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[portfolio_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_portfolio_section',
		'choices'			=> corponotch_pro_post_choices(),
		'active_callback'	=> 'corponotch_pro_portfolio_content_post_enable',
	) ) );

endfor;

// portfolio pages drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[portfolio_content_category]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_category',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[portfolio_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_portfolio_section',
	'choices'			=> corponotch_pro_category_choices(),
	'active_callback'	=> 'corponotch_pro_portfolio_content_category_enable',
) ) );
