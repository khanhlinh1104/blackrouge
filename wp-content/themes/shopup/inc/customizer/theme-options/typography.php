<?php
/**
 * Typography
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_typography',
	array(
		'panel' => 'shopup_theme_options',
		'title' => esc_html__( 'Typography', 'shopup' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'shopup_site_title_font',
	array(
		'default'           => 'DM Serif Display',
		'sanitize_callback' => 'shopup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shopup_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'shopup' ),
		'section'  => 'shopup_typography',
		'settings' => 'shopup_site_title_font',
		'type'     => 'select',
		'choices'  => shopup_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'shopup_site_description_font',
	array(
		'default'           => 'Montserrat',
		'sanitize_callback' => 'shopup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shopup_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'shopup' ),
		'section'  => 'shopup_typography',
		'settings' => 'shopup_site_description_font',
		'type'     => 'select',
		'choices'  => shopup_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'shopup_header_font',
	array(
		'default'           => 'DM Serif Display',
		'sanitize_callback' => 'shopup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shopup_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'shopup' ),
		'section'  => 'shopup_typography',
		'settings' => 'shopup_header_font',
		'type'     => 'select',
		'choices'  => shopup_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'shopup_body_font',
	array(
		'default'           => 'Montserrat',
		'sanitize_callback' => 'shopup_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'shopup_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'shopup' ),
		'section'  => 'shopup_typography',
		'settings' => 'shopup_body_font',
		'type'     => 'select',
		'choices'  => shopup_get_all_google_font_families(),
	)
);
