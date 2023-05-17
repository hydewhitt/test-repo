<?php
/**
 * Sortable Customizer Options
 *
 * @package corponotch_pro
 */

// Add sortable section
$wp_customize->add_section( 'corponotch_pro_sortable', array(
	'title'               => esc_html__('Homepage Sortable','corponotch-pro'),
	'description'         => esc_html__( 'Homepage Sortable Settings.', 'corponotch-pro' ),
	'panel'               => 'corponotch_pro_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[sortable]', array(
	'sanitize_callback'   => 'corponotch_pro_sanitize_sortable',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Customize_Sortable_Control ( $wp_customize, 'corponotch_pro_theme_options[sortable]', array(
	'label'               => esc_html__( 'Sortable Homepage', 'corponotch-pro' ),
	'description'         => esc_html__( 'Drag and Drop to sort the sections according to your preference.', 'corponotch-pro' ),
	'section'             => 'corponotch_pro_sortable',
	'type'                => 'sortable',
	'choices'			  => corponotch_pro_sortable_sections(),
) ) );

// sortable reset setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[sortable_reset]', array(
	'default'           => corponotch_pro_theme_option('sortable_reset'),
	'sanitize_callback' => 'corponotch_pro_sanitize_checkbox',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[sortable_reset]', array(
	'label'             => esc_html__( 'Reset Sortable', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Refresh the page as you publish the settings to see the change.', 'corponotch-pro' ),
	'type'              => 'checkbox',
	'section'           => 'corponotch_pro_sortable',
) );
