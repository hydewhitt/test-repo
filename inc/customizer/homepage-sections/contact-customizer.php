<?php
/**
 * Contact Customizer Options
 *
 * @package corponotch_pro
 */

// Add contact section
$wp_customize->add_section( 'corponotch_pro_contact_section', array(
	'title'             => esc_html__( 'Contact Section','corponotch-pro' ),
	'description'       => esc_html__( 'Contact Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// contact menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_contact]', array(
	'default'           => corponotch_pro_theme_option('enable_contact'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_contact]', array(
	'label'             => esc_html__( 'Enable Contact', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_contact_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// Client additional image setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[contact_image]', array(
	'sanitize_callback' => 'corponotch_pro_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'corponotch_pro_theme_options[contact_image]',
		array(
		'label'       		=> esc_html__( 'Select Background Image', 'corponotch-pro' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'corponotch-pro' ), 1920, 1080 ),
		'section'     		=> 'corponotch_pro_contact_section',
) ) );

// contact sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[contact_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('contact_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[contact_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_contact_section',
	'type'				=> 'text',
) );

// contact label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[contact_title]', array(
	'default'          	=> corponotch_pro_theme_option('contact_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[contact_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_contact_section',
	'type'				=> 'text',
) );

// contact alignment control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[contact_align]', array(
	'default'          	=> corponotch_pro_theme_option('contact_align'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[contact_align]', array(
	'label'             => esc_html__( 'Content Alignment', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_contact_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'left-align' 	=> esc_html__( 'Left Align', 'corponotch-pro' ),
		'right-align' 	=> esc_html__( 'Right Align', 'corponotch-pro' ),
	),
) );

// contact btn label chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[contact_shortcode]', array(
	'default'          	=> corponotch_pro_theme_option('contact_shortcode'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[contact_shortcode]', array(
	'label'             => esc_html__( 'Contact Form Shortcode', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Please add form shortcode from Contact Form 7.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_contact_section',
	'type'				=> 'text',
) );
