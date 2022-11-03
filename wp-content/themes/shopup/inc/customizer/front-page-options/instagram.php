<?php
/**
 * Instagram Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_instagram_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Instagram Section', 'shopup' ),
		'priority' => 120,
	)
);

// Instagram Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_instagram_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_instagram_section',
		array(
			'label'    => esc_html__( 'Enable Instagram Section', 'shopup' ),
			'section'  => 'shopup_instagram_section',
			'settings' => 'shopup_enable_instagram_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_instagram_section',
		array(
			'selector' => '#shopup_instagram_section .section-link',
			'settings' => 'shopup_enable_instagram_section',
		)
	);
}

// Instagram Section - Shortcode.
$wp_customize->add_setting(
	'shopup_instagram_shortcode',
	array(
		'default'           => '[instagram-feed cols=6 showfollow=false]',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_instagram_shortcode',
	array(
		'label'           => esc_html__( 'Shortcode', 'shopup' ),
		'section'         => 'shopup_instagram_section',
		'settings'        => 'shopup_instagram_shortcode',
		'type'            => 'text',
		'active_callback' => 'shopup_is_instagram_section_enabled',
	)
);
