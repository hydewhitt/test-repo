<?php
/**
 * Default Theme Customizer Values
 *
 * @package corponotch_pro
 */

function corponotch_pro_get_default_theme_options() {
	$corponotch_pro_default_options = array(
		// default options

		/* Homepage Sections */

		// Top Bar
		'enable_topbar'			=> true,
		'show_social_menu'		=> false,
		'show_top_search'		=> true,
		'topbar_address'		=> esc_html__( 'Canary Wharf, London', 'corponotch-pro' ),
		'topbar_phone'			=> esc_html__( '+00 0 0000000', 'corponotch-pro' ),
		'topbar_email'			=> 'abc@sharkthemes.com',

		// Slider
		'enable_slider'			=> true,
		'slider_entire_site'	=> false,
		'enable_slider_wave'	=> false,
		'slider_arrow'			=> true,
		'slider_autoplay'		=> true,
		'slider_opacity'		=> 3,
		'slider_align'			=> 'center-align',
		'slider_text'			=> 'light-text',
		'slider_btn_label'		=> esc_html__( 'Learn More', 'corponotch-pro' ),
		'slider_alt_btn_url'	=> '#',
		'slider_alt_btn_color'	=> false,
		'slider_content_type'	=> 'page',
		'slider_count'			=> 3,

		// Short Call to action
		'enable_short_cta'			=> true,
		'short_cta_btn_label'		=> esc_html__( 'Contact Us Now', 'corponotch-pro' ),
		'short_cta_content_type'	=> 'page',

		// Introduction
		'enable_introduction'		=> true,
		'introduction_sub_title'	=> esc_html__( 'About Us', 'corponotch-pro' ),
		'introduction_btn_label'	=> esc_html__( 'Explore Us', 'corponotch-pro' ),
		'introduction_content_type'	=> 'page',
		'introduction_align'		=> 'left-align',
		'introduction_excerpt'		=> 'excerpt',

		// Service
		'enable_service'		=> true,
		'service_sub_title'		=> esc_html__( 'Our Service', 'corponotch-pro' ),
		'service_title'			=> esc_html__( 'What we can do for you', 'corponotch-pro' ),
		'service_content_type'	=> 'page',
		'service_column'		=> 'column-3',
		'service_align'			=> 'left-align',
		'service_count'			=> 3,

		// Hero Content
		'enable_hero_content'		=> true,
		'hero_content_sub_title'	=> esc_html__( 'We Make a Difference', 'corponotch-pro' ),
		'hero_content_btn_label'	=> esc_html__( 'Learn More', 'corponotch-pro' ),
		'hero_content_content_type'	=> 'page',

		// Counter
		'enable_hero_content'	=> true,
		'counter_opacity'		=> 8,

		// Portfolio
		'enable_portfolio'		=> true,
		'portfolio_sub_title'	=> esc_html__( 'Portfolio', 'corponotch-pro' ),
		'portfolio_title'		=> esc_html__( 'Our popular case studies', 'corponotch-pro' ),
		'portfolio_btn_label'	=> esc_html__( 'Read More', 'corponotch-pro' ),
		'portfolio_content_type'	=> 'page',
		'portfolio_column'		=> 'column-3',
		'portfolio_count'		=> 3,

		// Skills
		'enable_skills'			=> false,
		'skills_image_align'	=> 'left-align',
		'skills_sub_title'		=> esc_html__( 'Our Skills', 'corponotch-pro' ),
		'skills_title'			=> esc_html__( 'Prominent key Features', 'corponotch-pro' ),
		'skills_content_type'	=> 'page',
		'skills_column'			=> 'column-3',
		'skills_align'			=> 'left-align',
		'skills_count'			=> 3,

		// Product
		'enable_product'		=> true,
		'product_content_type'	=> 'product',
		'product_column'		=> 'column-4',
		'product_count'			=> 4,
		'product_title'			=> esc_html__( 'Featured Products', 'corponotch-pro' ),
		'product_sub_title'		=> esc_html__( 'All Styles in This Spring', 'corponotch-pro' ),

		// Team
		'enable_team'			=> true,
		'team_sub_title'		=> esc_html__( 'Our Team', 'corponotch-pro' ),
		'team_title'			=> esc_html__( 'Meet our exclusive team members', 'corponotch-pro' ),
		'team_content_type'		=> 'page',
		'team_column'			=> 'column-4',
		'team_count'			=> 4,

		// Client
		'enable_client'			=> true,
		'client_content_type'	=> 'page',
		'client_column'			=> 'column-5',
		'client_count'			=> 5,

		// Testimonial
		'enable_testimonial'	=> true,
		'testimonial_control'	=> false,
		'testimonial_content_type'	=> 'page',
		'testimonial_count'		=> 2,
		'testimonial_opacity'	=> 8,

		// Recent
		'enable_recent'			=> true,
		'recent_sub_title'		=> esc_html__( 'Latest News', 'corponotch-pro' ),
		'recent_title'			=> esc_html__( 'Check latest blogs for more inspiration', 'corponotch-pro' ),
		'recent_content_type'	=> 'recent',
		'recent_count'			=> 3,
		'recent_column'			=> 'column-3',

		// Call to action
		'enable_cta'			=> true,
		'cta_btn_label'			=> esc_html__( 'Contact Us Now', 'corponotch-pro' ),
		'cta_content_type'		=> 'page',
		'cta_align'				=> 'left-align',
		'cta_opacity'			=> 7,

		// Pricing
		'enable_pricing'		=> true,
		'pricing_sub_title'		=> esc_html__( 'Pricing', 'corponotch-pro' ),
		'pricing_title'			=> esc_html__( 'Choose Your Perfect Plan', 'corponotch-pro' ),
		'pricing_count'			=> 3,

		// Contact
		'enable_contact'		=> false,
		'contact_sub_title'		=> esc_html__( 'Contact', 'corponotch-pro' ),
		'contact_title'			=> esc_html__( 'Send Your Requirements', 'corponotch-pro' ),
		'contact_align'			=> 'right-align',
		
		// Footer
		'slide_to_top'			=> true,
		'copyright_text'		=> esc_html__( 'Copyright &copy; CorpoNotch Pro Theme | All Rights Reserved.', 'corponotch-pro' ) . sprintf( esc_html__( ' CorpoNotch Pro by %1$s Shark Themes %2$s', 'corponotch-pro' ), '<a href="' . esc_url( 'http://sharkthemes.com/' ) . '" target="_blank">','</a>' ),

		/* Theme Options */

		// blog / archive
		'latest_blog_title'		=> esc_html__( 'Blogs', 'corponotch-pro' ),
		'excerpt_count'			=> 25,
		'pagination_type'		=> 'numeric',
		'sidebar_layout'		=> 'right-sidebar',
		'column_type'			=> 'column-2',
		'show_date'				=> true,
		'show_category'			=> true,
		'show_author'			=> true,
		'show_comment'			=> true,

		// single post
		'sidebar_single_layout'	=> 'right-sidebar',
		'show_single_date'		=> true,
		'show_single_category'	=> true,
		'show_single_tags'		=> true,
		'show_single_author'	=> true,

		// page
		'enable_front_page'		=> false,
		'sidebar_page_layout'	=> 'right-sidebar',

		// global
		'enable_loader'			=> true,
		'enable_subtitle_bar'	=> true,
		'enable_breadcrumb'		=> true,
		'enable_sticky_header'	=> false,
		'header_layout'			=> 'normal-header',
		'loader_type'			=> 'default',
		'site_layout'			=> 'full',
		'header_typography'		=> 'default',
		'body_typography'		=> 'default',

		// theme color
		'theme_color_mode'		=> 'light',
		'theme_color'			=> 'default',
		'primary_color'			=> '#21242e',
		'secondary_color'		=> '#f35444',
	);

	$output = apply_filters( 'corponotch_pro_default_theme_options', $corponotch_pro_default_options );
	return $output;
}