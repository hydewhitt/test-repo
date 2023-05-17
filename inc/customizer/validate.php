<?php
/**
 * Validation functions
 *
 * @package corponotch_pro
 */

if ( ! function_exists( 'corponotch_pro_validate_excerpt_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_excerpt_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Excerpt Lenght is 1', 'corponotch-pro' ) );
		} elseif ( $value > 50 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Excerpt Lenght is 50', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_slider_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_slider_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Slider is 1', 'corponotch-pro' ) );
		} elseif ( $value > 10 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Slider is 10', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_service_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_service_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Service is 1', 'corponotch-pro' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Service is 12', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_portfolio_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_portfolio_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Protfolio is 1', 'corponotch-pro' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Protfolio is 12', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_skills_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_skills_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Skills is 1', 'corponotch-pro' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Skills is 12', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_client_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_client_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Client is 1', 'corponotch-pro' ) );
		} elseif ( $value > 10 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Client is 10', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_team_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_team_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Team is 1', 'corponotch-pro' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Team is 12', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;


if ( ! function_exists( 'corponotch_pro_validate_testimonial_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_testimonial_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Testimonial is 1', 'corponotch-pro' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Testimonial is 12', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_recent_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_recent_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Recent Posts is 1', 'corponotch-pro' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Recent Posts is 12', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'corponotch_pro_validate_pricing_count' ) ) :
	/**
	 * Check if the input value is valid integer.
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return string Whether the value is valid to the current preview.
	 */
	function corponotch_pro_validate_pricing_count( $validity, $value ){
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'corponotch-pro' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_slider', esc_html__( 'Minimum no of Pricing Table is 1', 'corponotch-pro' ) );
		} elseif ( $value > 5 ) {
			$validity->add( 'max_slider', esc_html__( 'Maximum no of Pricing Table is 5', 'corponotch-pro' ) );
		}
		return $validity;
	}
endif;