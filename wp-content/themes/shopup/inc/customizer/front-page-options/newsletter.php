<?php
/**
 * Newsletter Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_newsletter_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Newsletter Section', 'shopup' ),
		'priority' => 110,
	)
);

// Newsletter Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_newsletter_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_newsletter_section',
		array(
			'label'    => esc_html__( 'Enable Newsletter Section', 'shopup' ),
			'section'  => 'shopup_newsletter_section',
			'settings' => 'shopup_enable_newsletter_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_newsletter_section',
		array(
			'selector' => '#shopup_newsletter_section .section-link',
			'settings' => 'shopup_enable_newsletter_section',
		)
	);
}

// Newsletter Section - Section Title.
$wp_customize->add_setting(
	'shopup_newsletter_title',
	array(
		'default'           => __( 'Join Our Mailing List', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_newsletter_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_newsletter_section',
		'settings'        => 'shopup_newsletter_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_newsletter_section_enabled',
	)
);

// Newsletter Section - Newsletter Content.
$wp_customize->add_setting(
	'shopup_newsletter_content',
	array(
		'default'           => esc_html__( 'Sign up to our newsletter.', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_newsletter_content',
	array(
		'label'           => esc_html__( 'Content', 'shopup' ),
		'section'         => 'shopup_newsletter_section',
		'settings'        => 'shopup_newsletter_content',
		'type'            => 'text',
		'active_callback' => 'shopup_is_newsletter_section_enabled',
	)
);

// Newsletter Section - Background Color.
$default_color = shopup_get_default_color();
$wp_customize->add_setting(
	'shopup_newsletter_background_color',
	array(
		'default'           => $default_color['primary'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'shopup_newsletter_background_color',
		array(
			'label'           => __( 'Background Color', 'shopup' ),
			'section'         => 'shopup_newsletter_section',
			'settings'        => 'shopup_newsletter_background_color',
			'active_callback' => 'shopup_is_newsletter_section_enabled',
		)
	)
);

// Newsletter Section - Background Image.
$wp_customize->add_setting(
	'shopup_newsletter_background_image',
	array(
		'sanitize_callback' => 'shopup_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'shopup_newsletter_background_image',
		array(
			'label'           => esc_html__( 'Background Image', 'shopup' ),
			'description'     => esc_html__( 'Background color will be replaced by image.', 'shopup' ),
			'section'         => 'shopup_newsletter_section',
			'settings'        => 'shopup_newsletter_background_image',
			'active_callback' => 'shopup_is_newsletter_section_enabled',
		)
	)
);
