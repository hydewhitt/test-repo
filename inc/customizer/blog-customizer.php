<?php
/**
 * Blog / Archive / Search Customizer Options
 *
 * @package corponotch_pro
 */

// Add blog section
$wp_customize->add_section( 'corponotch_pro_blog_section', array(
	'title'             => esc_html__( 'Blog/Archive Page Setting','corponotch-pro' ),
	'description'       => esc_html__( 'Blog/Archive/Search Page Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_theme_options_panel',
) );

// latest blog title drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[latest_blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'          	=> corponotch_pro_theme_option( 'latest_blog_title' ),
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[latest_blog_title]', array(
	'label'             => esc_html__( 'Latest Blog Title', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: This title is displayed when your homepage displays option is set to latest posts.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'type'				=> 'text',
) ) );

// sidebar layout setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[sidebar_layout]', array(
	'sanitize_callback'   => 'corponotch_pro_sanitize_select',
	'default'             => corponotch_pro_theme_option( 'sidebar_layout' ),
) );

$wp_customize->add_control(  new CorpoNotch_Pro_Radio_Image_Control ( $wp_customize, 'corponotch_pro_theme_options[sidebar_layout]', array(
	'label'               => esc_html__( 'Sidebar Layout', 'corponotch-pro' ),
	'section'             => 'corponotch_pro_blog_section',
	'choices'			  => corponotch_pro_sidebar_position(),
) ) );

// column control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[column_type]', array(
	'default'          	=> corponotch_pro_theme_option( 'column_type' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[column_type]', array(
	'label'             => esc_html__( 'Column Layout', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'column-1' 		=> esc_html__( 'One Column', 'corponotch-pro' ),
		'column-2' 		=> esc_html__( 'Two Column', 'corponotch-pro' ),
		'column-3' 		=> esc_html__( 'Three Column', 'corponotch-pro' ),
		'column-4' 		=> esc_html__( 'Four Column', 'corponotch-pro' ),
	),
) );

// excerpt count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[excerpt_count]', array(
	'default'          	=> corponotch_pro_theme_option( 'excerpt_count' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_excerpt_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[excerpt_count]', array(
	'label'             => esc_html__( 'Excerpt Length', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 50,
		),
) );

// pagination control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[pagination_type]', array(
	'default'          	=> corponotch_pro_theme_option( 'pagination_type' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[pagination_type]', array(
	'label'             => esc_html__( 'Pagination Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'default' 		=> esc_html__( 'Default', 'corponotch-pro' ),
		'numeric' 		=> esc_html__( 'Numeric', 'corponotch-pro' ),
		'infinite' 		=> esc_html__( 'Infinite', 'corponotch-pro' ),
		'click' 		=> esc_html__( 'Load More Button', 'corponotch-pro' ),
	),
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_date]', array(
	'default'           => corponotch_pro_theme_option( 'show_date' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_date]', array(
	'label'             => esc_html__( 'Show Date', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Archive category meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_category]', array(
	'default'           => corponotch_pro_theme_option( 'show_category' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_category]', array(
	'label'             => esc_html__( 'Show Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_author]', array(
	'default'           => corponotch_pro_theme_option( 'show_author' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_author]', array(
	'label'             => esc_html__( 'Show Author', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Archive comment meta setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[show_comment]', array(
	'default'           => corponotch_pro_theme_option( 'show_comment' ),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[show_comment]', array(
	'label'             => esc_html__( 'Show Comment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_blog_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );