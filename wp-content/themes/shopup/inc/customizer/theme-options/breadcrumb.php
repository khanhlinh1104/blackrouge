<?php
/**
 * Breadcrumb
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'shopup' ),
		'panel' => 'shopup_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'shopup_enable_breadcrumb',
	array(
		'sanitize_callback' => 'shopup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'shopup' ),
			'section' => 'shopup_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'shopup_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'shopup_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'shopup' ),
		'active_callback' => 'shopup_is_breadcrumb_enabled',
		'section'         => 'shopup_breadcrumb',
	)
);
