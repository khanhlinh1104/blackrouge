<?php
/**
 * ShopUp Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ShopUp_Lite
 */

if ( ! function_exists( 'shopup_lite_setup' ) ) :
	function shopup_lite_setup() {

		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'shopup-lite', get_stylesheet_directory() . '/languages' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );
		
		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'shopup_lite_setup' );

if ( ! function_exists( 'shopup_lite_enqueue_styles' ) ) :
	function shopup_lite_enqueue_styles() {

		$parenthandle = 'shopup-style';
		$theme        = wp_get_theme();

		// Parent style.
		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'shopup-slick-style',
				'shopup-fontawesome-style',
				'shopup-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		// Child style.
		wp_enqueue_style(
			'shopup-lite-style',
			get_stylesheet_uri(),
			array(
				$parenthandle,
				'shopup-woocommerce-style'
			),
			$theme->get( 'Version' )
		);

		// Custom script.
		wp_enqueue_script(
			'shopup-lite-custom-script',
			get_stylesheet_directory_uri() . '/assets/js/custom.js',
			array(
				'jquery',
				'shopup-navigation-script',
				'shopup-slick-script',
				'shopup-custom-script',
			),
			$theme->get( 'Version' ),
			true
		);

	}
endif;
add_action( 'wp_enqueue_scripts', 'shopup_lite_enqueue_styles' );

if ( ! function_exists( 'shopup_get_default_color' ) ) {
	/**
	 * Returns default colors.
	 */
	function shopup_get_default_color() {
		$color['primary'] = '#4E5EB7';
		return $color;
	}
}

require get_theme_file_path() . '/inc/customizer.php';
