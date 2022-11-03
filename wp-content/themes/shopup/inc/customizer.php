<?php
/**
 * ShopUp Theme Customizer
 *
 * @package ShopUp
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Validation.
require get_template_directory() . '/inc/customizer/validation.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shopup_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'shopup_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'shopup_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new ShopUp_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'ShopUp Pro', 'shopup' ),
				'button_text'      => __( 'Buy Pro', 'shopup' ),
				'url'              => 'https://ascendoor.com/themes/shopup-pro/',
				'background_color' => '#fe411b',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'shopup_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'shopup_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'shopup_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'shopup' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'shopup' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'shopup_is_static_homepage_enabled',
		)
	);

	// Colors.
	require get_template_directory() . '/inc/customizer/colors.php';

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'shopup_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function shopup_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function shopup_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shopup_customize_preview_js() {
	wp_enqueue_script( 'shopup-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), SHOPUP_VERSION, true );
}
add_action( 'customize_preview_init', 'shopup_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function shopup_custom_control_scripts() {
	wp_enqueue_style( 'shopup-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'shopup-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'shopup_custom_control_scripts' );
