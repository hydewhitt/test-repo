<?php
/**
 * Product Customizer Options
 *
 * @package corponotch_pro
 */

// Add featured section
$wp_customize->add_section( 'corponotch_pro_product_section', array(
	'title'             => esc_html__( 'Product Section','corponotch-pro' ),
	'description'       => esc_html__( 'Note: You need to install WooCommerce to customize this section.', 'corponotch-pro' ),
	'panel'             => 'corponotch_pro_homepage_sections_panel',
) );

// featured menu enable setting and control.
$wp_customize->add_setting( 'corponotch_pro_theme_options[enable_product]', array(
	'default'           => corponotch_pro_theme_option('enable_product'),
	'sanitize_callback' => 'corponotch_pro_sanitize_switch',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Switch_Control( $wp_customize, 'corponotch_pro_theme_options[enable_product]', array(
	'label'             => esc_html__( 'Enable Product', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'on_off_label' 		=> corponotch_pro_show_options(),
	'active_callback'	=> 'corponotch_pro_has_woocommerce',
) ) );

// featured sub title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[product_sub_title]', array(
	'default'          	=> corponotch_pro_theme_option('product_sub_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[product_sub_title]', array(
	'label'             => esc_html__( 'Sub Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'type'				=> 'text',
	'active_callback'	=> 'corponotch_pro_has_woocommerce',
) );

// featured title chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[product_title]', array(
	'default'          	=> corponotch_pro_theme_option('product_title'),
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[product_title]', array(
	'label'             => esc_html__( 'Title', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'type'				=> 'text',
	'active_callback'	=> 'corponotch_pro_has_woocommerce',
) );

// featured column type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[product_column]', array(
	'default'          	=> corponotch_pro_theme_option('product_column'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[product_column]', array(
	'label'             => esc_html__( 'Column Layout', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'type'				=> 'radio',
	'choices'			=> array( 
		'column-2'  => esc_html__( 'Two Column', 'corponotch-pro' ),
        'column-3'  => esc_html__( 'Three Column', 'corponotch-pro' ),
        'column-4'  => esc_html__( 'Four Column', 'corponotch-pro' ),
	),
	'active_callback'	=> 'corponotch_pro_has_woocommerce',
) );

// featured content type control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[product_content_type]', array(
	'default'          	=> corponotch_pro_theme_option('product_content_type'),
	'sanitize_callback' => 'corponotch_pro_sanitize_select',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[product_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'product' 			=> esc_html__( 'Product', 'corponotch-pro' ),
		'product-category' 	=> esc_html__( 'Product Category', 'corponotch-pro' ),
		'product-featured' 	=> esc_html__( 'Featured Products', 'corponotch-pro' ),
		'best-selling' 		=> esc_html__( 'Best Selling', 'corponotch-pro' ),
		'on-sale' 			=> esc_html__( 'On Sale Products', 'corponotch-pro' ),
	),
	'active_callback'	=> 'corponotch_pro_has_woocommerce',
) );

// featured count control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[product_count]', array(
	'default'          	=> corponotch_pro_theme_option('product_count'),
	'sanitize_callback' => 'corponotch_pro_sanitize_number_range',
	'validate_callback' => 'corponotch_pro_validate_product_count',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'corponotch_pro_theme_options[product_count]', array(
	'label'             => esc_html__( 'Number of Featured', 'corponotch-pro' ),
	'description'       => esc_html__( 'Note: Min 1 & Max 12. Please refresh the page to see the change.', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'type'				=> 'number',
	'input_attrs'		=> array(
		'min'	=> 1,
		'max'	=> 12,
		),
	'active_callback'	=> 'corponotch_pro_has_woocommerce',
) );

// featured product category drop down chooser control and setting
$wp_customize->add_setting( 'corponotch_pro_theme_options[product_content_product_category]', array(
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[product_content_product_category]', array(
	'label'             => esc_html__( 'Select Product Category', 'corponotch-pro' ),
	'section'           => 'corponotch_pro_product_section',
	'choices'			=> corponotch_pro_product_category_choices(),
	'active_callback'	=> 'corponotch_pro_product_content_product_category_enable',
) ) );

for ( $i = 1; $i <= corponotch_pro_theme_option('product_count'); $i++ ) :

	// featured products drop down chooser control and setting
	$wp_customize->add_setting( 'corponotch_pro_theme_options[product_content_product_' . $i . ']', array(
		'sanitize_callback' => 'corponotch_pro_sanitize_page_post',
	) );

	$wp_customize->add_control( new CorpoNotch_Pro_Dropdown_Chosen_Control( $wp_customize, 'corponotch_pro_theme_options[product_content_product_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Product %d', 'corponotch-pro' ), $i ),
		'section'           => 'corponotch_pro_product_section',
		'choices'			=> corponotch_pro_product_choices(),
		'active_callback'	=> 'corponotch_pro_product_content_product_enable',
	) ) );

endfor;
