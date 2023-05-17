<?php
/**
 * Callbacks functions
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_has_woocommerce' ) ) :
	/**
	 * Check if woocommerce is enabled enabled
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_has_woocommerce() {
		return class_exists( 'WooCommerce' ) ? true : false;
	}
endif;

if ( ! function_exists( 'corponotch_pro_theme_color_custom_enable' ) ) :
	/**
	 * Check if theme color custom enabled
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_theme_color_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[theme_color]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_slider_content_post_enable' ) ) :
	/**
	 * Check if slider content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_slider_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[slider_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_slider_content_page_enable' ) ) :
	/**
	 * Check if slider content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_slider_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[slider_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_slider_content_custom_enable' ) ) :
	/**
	 * Check if slider content type is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_slider_content_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[slider_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_slider_content_category_enable' ) ) :
	/**
	 * Check if slider content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_slider_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[slider_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_short_cta_content_post_enable' ) ) :
	/**
	 * Check if short_cta content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_short_cta_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[short_cta_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_short_cta_content_page_enable' ) ) :
	/**
	 * Check if short_cta content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_short_cta_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[short_cta_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_short_cta_content_custom_enable' ) ) :
	/**
	 * Check if short_cta content type is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_short_cta_content_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[short_cta_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_introduction_content_post_enable' ) ) :
	/**
	 * Check if introduction content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_introduction_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[introduction_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_introduction_content_page_enable' ) ) :
	/**
	 * Check if introduction content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_introduction_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[introduction_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_introduction_content_custom_enable' ) ) :
	/**
	 * Check if introduction content type is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_introduction_content_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[introduction_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_service_content_post_enable' ) ) :
	/**
	 * Check if service content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_service_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[service_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_service_content_page_enable' ) ) :
	/**
	 * Check if service content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_service_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[service_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_service_content_category_enable' ) ) :
	/**
	 * Check if service content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_service_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[service_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_service_hr_enable' ) ) :
	/**
	 * Check if service hr enable.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_service_hr_enable( $control ) {
		return 'category' !== $control->manager->get_setting( 'corponotch_pro_theme_options[service_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_hero_content_content_post_enable' ) ) :
	/**
	 * Check if hero_content content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_hero_content_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[hero_content_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_hero_content_content_page_enable' ) ) :
	/**
	 * Check if hero_content content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_hero_content_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[hero_content_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_hero_content_content_custom_enable' ) ) :
	/**
	 * Check if hero_content content type is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_hero_content_content_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[hero_content_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_portfolio_content_post_enable' ) ) :
	/**
	 * Check if portfolio content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_portfolio_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[portfolio_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_portfolio_content_page_enable' ) ) :
	/**
	 * Check if portfolio content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_portfolio_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[portfolio_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_portfolio_content_category_enable' ) ) :
	/**
	 * Check if portfolio content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_portfolio_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[portfolio_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_skills_content_post_enable' ) ) :
	/**
	 * Check if skills content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_skills_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[skills_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_skills_content_page_enable' ) ) :
	/**
	 * Check if skills content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_skills_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[skills_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_skills_content_category_enable' ) ) :
	/**
	 * Check if skills content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_skills_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[skills_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_skills_hr_enable' ) ) :
	/**
	 * Check if skills hr enable.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_skills_hr_enable( $control ) {
		return 'category' !== $control->manager->get_setting( 'corponotch_pro_theme_options[skills_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_product_content_product_enable' ) ) :
	/**
	 * Check if product content type is product.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_product_content_product_enable( $control ) {
		return corponotch_pro_has_woocommerce() && 'product' == $control->manager->get_setting( 'corponotch_pro_theme_options[product_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_product_content_product_category_enable' ) ) :
	/**
	 * Check if product content type is product category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_product_content_product_category_enable( $control ) {
		return corponotch_pro_has_woocommerce() && 'product-category' == $control->manager->get_setting( 'corponotch_pro_theme_options[product_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_team_content_post_enable' ) ) :
	/**
	 * Check if team content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_team_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[team_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_team_content_page_enable' ) ) :
	/**
	 * Check if team content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_team_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[team_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_team_content_category_enable' ) ) :
	/**
	 * Check if team content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_team_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[team_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_client_content_post_enable' ) ) :
	/**
	 * Check if client content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_client_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[client_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_client_content_page_enable' ) ) :
	/**
	 * Check if client content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_client_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[client_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_client_content_category_enable' ) ) :
	/**
	 * Check if client content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_client_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[client_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_client_content_custom_enable' ) ) :
	/**
	 * Check if client content type is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_client_content_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[client_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_testimonial_content_post_enable' ) ) :
	/**
	 * Check if testimonial content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_testimonial_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[testimonial_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_testimonial_content_page_enable' ) ) :
	/**
	 * Check if testimonial content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_testimonial_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[testimonial_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_testimonial_content_category_enable' ) ) :
	/**
	 * Check if testimonial content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_testimonial_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[testimonial_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_recent_content_post_enable' ) ) :
	/**
	 * Check if recent content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_recent_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[recent_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_recent_content_category_enable' ) ) :
	/**
	 * Check if recent content type is category.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_recent_content_category_enable( $control ) {
		return 'category' == $control->manager->get_setting( 'corponotch_pro_theme_options[recent_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_cta_content_post_enable' ) ) :
	/**
	 * Check if cta content type is post.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_cta_content_post_enable( $control ) {
		return 'post' == $control->manager->get_setting( 'corponotch_pro_theme_options[cta_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_cta_content_page_enable' ) ) :
	/**
	 * Check if cta content type is page.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_cta_content_page_enable( $control ) {
		return 'page' == $control->manager->get_setting( 'corponotch_pro_theme_options[cta_content_type]' )->value();
	}
endif;

if ( ! function_exists( 'corponotch_pro_cta_content_custom_enable' ) ) :
	/**
	 * Check if cta content type is custom.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function corponotch_pro_cta_content_custom_enable( $control ) {
		return 'custom' == $control->manager->get_setting( 'corponotch_pro_theme_options[cta_content_type]' )->value();
	}
endif;
