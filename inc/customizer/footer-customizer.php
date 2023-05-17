<?php
/**
 * Footer Customizer Options
 *
 * @package corponotch_pro
 */

// Add footer section
$wp_customize->add_section( 'corponotch_pro_footer_section', array(
	'title'             => esc_html__( 'Footer Section','corponotch-pro' ),
	'description'       => esc_html__( 'Footer Setting Options', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_theme_options_panel',
) );

// slide to top enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[slide_to_top]', array(
	'default'           => corponotch_pro_theme_option('slide_to_top'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[slide_to_top]', array(
	'label'             => esc_html__( 'Show Slide to Top', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_footer_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
) ) );

// copyright text
$wp_customize->add_setting( 'corponotch_pro_theme_options[copyright_text]',
	array(
		'default'       		=> corponotch_pro_theme_option('copyright_text'),
		'sanitize_callback'		=> 'corponotch_pro_santize_allow_tags',
	)
);
$wp_customize->add_control( 'corponotch_pro_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'corponotch-pro' ),
		'section'    			=> 'corponotch_pro_footer_section',
		'type'		 			=> 'textarea',
    )
);

