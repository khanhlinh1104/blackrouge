<?php
/**
 * Theme Customizer
 *
 * @package ShopUp_Lite
 */

function shopup_lite_customize_register( $wp_customize ) {

	require get_theme_file_path() . '/inc/customizer/double-image-promo.php';

}
add_action( 'customize_register', 'shopup_lite_customize_register' );


function shopup_lite_customize_preview_js() {
	wp_enqueue_script( 'shopup-lite-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview', 'shopup-customizer' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'shopup_lite_customize_preview_js' );


function shopup_lite_custom_control_scripts() {
	wp_enqueue_style( 'shopup-lite-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls.css', array( 'shopup-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'shopup-lite-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'shopup-custom-controls-js' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'shopup_lite_custom_control_scripts' );

/*============= Active Callbacks =============*/

// Double Image Promo.
function shopup_lite_is_double_image_promo_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_lite_enable_double_image_promo_section' )->value() );
}
