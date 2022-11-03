<?php
/**
 * Sidebar Option
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'shopup' ),
		'panel' => 'shopup_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'shopup_sidebar_position',
	array(
		'sanitize_callback' => 'shopup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'shopup_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'shopup' ),
		'section' => 'shopup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'shopup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'shopup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'shopup' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'shopup_post_sidebar_position',
	array(
		'sanitize_callback' => 'shopup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'shopup_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'shopup' ),
		'section' => 'shopup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'shopup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'shopup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'shopup' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'shopup_page_sidebar_position',
	array(
		'sanitize_callback' => 'shopup_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'shopup_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'shopup' ),
		'section' => 'shopup_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'shopup' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'shopup' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'shopup' ),
		),
	)
);
