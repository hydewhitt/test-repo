<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corponotch_pro
 */

/**
 * corponotch_pro_doctype_action hook
 *
 * @hooked corponotch_pro_doctype -  10
 *
 */
do_action( 'corponotch_pro_doctype_action' );

/**
 * corponotch_pro_head_action hook
 *
 * @hooked corponotch_pro_head -  10
 *
 */
do_action( 'corponotch_pro_head_action' );

/**
 * corponotch_pro_body_start_action hook
 *
 * @hooked corponotch_pro_body_start -  10
 *
 */
do_action( 'corponotch_pro_body_start_action' );
 
/**
 * corponotch_pro_page_start_action hook
 *
 * @hooked corponotch_pro_page_start -  10
 * @hooked corponotch_pro_loader -  20
 *
 */
do_action( 'corponotch_pro_page_start_action' );

/**
 * corponotch_pro_header_start_action hook
 *
 * @hooked corponotch_pro_header_start -  10
 *
 */
do_action( 'corponotch_pro_header_start_action' );

/**
 * corponotch_pro_site_branding_action hook
 *
 * @hooked corponotch_pro_site_branding -  10
 *
 */
do_action( 'corponotch_pro_site_branding_action' );

/**
 * corponotch_pro_primary_nav_action hook
 *
 * @hooked corponotch_pro_primary_nav -  10
 *
 */
do_action( 'corponotch_pro_primary_nav_action' );

/**
 * corponotch_pro_header_ends_action hook
 *
 * @hooked corponotch_pro_header_ends -  10
 *
 */
do_action( 'corponotch_pro_header_ends_action' );

/**
 * corponotch_pro_site_content_start_action hook
 *
 * @hooked corponotch_pro_site_content_start -  10
 *
 */
do_action( 'corponotch_pro_site_content_start_action' );

/**
 * corponotch_pro_primary_content_action hook
 *
 */
if ( is_front_page() && ! is_home() ) {
	$sections = corponotch_pro_sortable_sections();
	$sorted = corponotch_pro_theme_option( 'sortable' );
	$sorted = ! empty( $sorted ) ? explode( ',' , $sorted ) : array_keys( $sections );
	$i = 1;

	foreach ( $sorted as $section ) {
		add_action( 'corponotch_pro_primary_content_action', 'corponotch_pro_add_'. $section .'_section', $i . 0 );
		$i++;
	}
	do_action( 'corponotch_pro_primary_content_action' );
}