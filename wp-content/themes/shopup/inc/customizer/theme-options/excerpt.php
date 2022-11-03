<?php
/**
 * Excerpt
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_excerpt_options',
	array(
		'panel' => 'shopup_theme_options',
		'title' => esc_html__( 'Excerpt', 'shopup' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'shopup_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'shopup_sanitize_number_range',
		'validate_callback' => 'shopup_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'shopup_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'shopup' ),
		'description' => esc_html__( 'Note: Min 1 & Max 200. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'     => 'shopup_excerpt_options',
		'settings'    => 'shopup_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Excerpt - Read More Text.
$wp_customize->add_setting(
	'shopup_excerpt_more_text',
	array(
		'default'           => esc_html__( 'Read More', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_excerpt_more_text',
	array(
		'label'    => esc_html__( 'Read More Text', 'shopup' ),
		'section'  => 'shopup_excerpt_options',
		'settings' => 'shopup_excerpt_more_text',
		'type'     => 'text',
	)
);
