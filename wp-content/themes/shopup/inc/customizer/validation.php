<?php
/**
 * Validation functions
 *
 * @package Shopup
 */

if ( ! function_exists( 'shopup_validate_excerpt_length' ) ) :
	function shopup_validate_excerpt_length( $validity, $value ) {
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'shopup' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_no_of_words', esc_html__( 'Minimum no of word is 1', 'shopup' ) );
		} elseif ( $value > 200 ) {
			$validity->add( 'max_no_of_words', esc_html__( 'Maximum no of words is 200', 'shopup' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'shopup_validate_slider_count' ) ) :
	function shopup_validate_slider_count( $validity, $value ) {
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'shopup' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of post is 1', 'shopup' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'shopup' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'shopup_validate_blog_count' ) ) :
	function shopup_validate_blog_count( $validity, $value ) {
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'shopup' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of post is 1', 'shopup' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'shopup' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'shopup_validate_categories_count' ) ) :
	function shopup_validate_categories_count( $validity, $value ) {
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'shopup' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of post is 1', 'shopup' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'shopup' ) );
		}
		return $validity;
	}
endif;

if ( ! function_exists( 'shopup_validate_features_count' ) ) :
	function shopup_validate_features_count( $validity, $value ) {
		$value = intval( $value );
		if ( empty( $value ) || ! is_numeric( $value ) ) {
			$validity->add( 'required', esc_html__( 'You must supply a valid number.', 'shopup' ) );
		} elseif ( $value < 1 ) {
			$validity->add( 'min_no_of_posts', esc_html__( 'Minimum no of post is 1', 'shopup' ) );
		} elseif ( $value > 12 ) {
			$validity->add( 'max_no_of_posts', esc_html__( 'Maximum no of posts is 12', 'shopup' ) );
		}
		return $validity;
	}
endif;
