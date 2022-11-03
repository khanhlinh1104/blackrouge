<?php
/**
 * Post Options
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'shopup' ),
		'panel' => 'shopup_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'shopup_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'shopup' ),
			'section' => 'shopup_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'shopup_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'shopup' ),
			'section' => 'shopup_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'shopup_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'shopup' ),
			'section' => 'shopup_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'shopup_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'shopup' ),
			'section' => 'shopup_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'shopup_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'shopup' ),
		'section'  => 'shopup_post_options',
		'settings' => 'shopup_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'shopup_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'shopup' ),
			'section' => 'shopup_post_options',
		)
	)
);
