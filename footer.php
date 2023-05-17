<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corponotch_pro
 */

/**
 * corponotch_pro_site_content_ends_action hook
 *
 * @hooked corponotch_pro_site_content_ends -  10
 *
 */
do_action( 'corponotch_pro_site_content_ends_action' );

/**
 * corponotch_pro_footer_start_action hook
 *
 * @hooked corponotch_pro_footer_start -  10
 *
 */
do_action( 'corponotch_pro_footer_start_action' );

/**
 * corponotch_pro_site_info_action hook
 *
 * @hooked corponotch_pro_site_info -  10
 *
 */
do_action( 'corponotch_pro_site_info_action' );

/**
 * corponotch_pro_footer_ends_action hook
 *
 * @hooked corponotch_pro_footer_ends -  10
 * @hooked corponotch_pro_slide_to_top -  20
 *
 */
do_action( 'corponotch_pro_footer_ends_action' );

/**
 * corponotch_pro_page_ends_action hook
 *
 * @hooked corponotch_pro_page_ends -  10
 *
 */
do_action( 'corponotch_pro_page_ends_action' );

wp_footer();

/**
 * corponotch_pro_body_html_ends_action hook
 *
 * @hooked corponotch_pro_body_html_ends -  10
 *
 */
do_action( 'corponotch_pro_body_html_ends_action' );
