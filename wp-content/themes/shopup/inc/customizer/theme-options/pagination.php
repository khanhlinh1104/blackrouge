<?php
/**
 * Pagination
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_pagination',
	array(
		'panel' => 'shopup_theme_options',
		'title' => esc_html__( 'Pagination', 'shopup' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'shopup_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'shopup' ),
			'section'  => 'shopup_pagination',
			'settings' => 'shopup_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'shopup_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'shopup_sanitize_select',
	)
);

$wp_customize->add_control(
	'shopup_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'shopup' ),
		'section'         => 'shopup_pagination',
		'settings'        => 'shopup_pagination_type',
		'active_callback' => 'shopup_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'shopup' ),
			'numeric' => __( 'Numeric', 'shopup' ),
		),
	)
);
