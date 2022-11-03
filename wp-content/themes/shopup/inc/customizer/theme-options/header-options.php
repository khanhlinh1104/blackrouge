<?php
/**
 * Header Options
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_header_options',
	array(
		'panel' => 'shopup_theme_options',
		'title' => esc_html__( 'Header Options', 'shopup' ),
	)
);

// Header Options - Enable Search Form.
$wp_customize->add_setting(
	'shopup_enable_search_form',
	array(
		'sanitize_callback' => 'shopup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_search_form',
		array(
			'label'   => esc_html__( 'Enable Search Form', 'shopup' ),
			'section' => 'shopup_header_options',
		)
	)
);

// Header Options - Categories Title.
$wp_customize->add_setting(
	'shopup_header_categories_dropdown_title',
	array(
		'default'           => __( 'Categories', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_header_categories_dropdown_title',
	array(
		'label'    => esc_html__( 'Dropdown Title', 'shopup' ),
		'section'  => 'shopup_header_options',
		'settings' => 'shopup_header_categories_dropdown_title',
		'type'     => 'text',
	)
);

// Header Options - Enable Social Menu.
$wp_customize->add_setting(
	'shopup_enable_social_menu',
	array(
		'sanitize_callback' => 'shopup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_social_menu',
		array(
			'label'   => esc_html__( 'Enable Social Menu', 'shopup' ),
			'section' => 'shopup_header_options',
		)
	)
);
