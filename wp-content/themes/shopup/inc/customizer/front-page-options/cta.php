<?php
/**
 * CTA Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_cta_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'CTA Section', 'shopup' ),
		'priority' => 80,
	)
);

// CTA Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_cta_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_cta_section',
		array(
			'label'    => esc_html__( 'Enable CTA Section', 'shopup' ),
			'section'  => 'shopup_cta_section',
			'settings' => 'shopup_enable_cta_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_cta_section',
		array(
			'selector' => '#shopup_cta_section .section-link',
			'settings' => 'shopup_enable_cta_section',
		)
	);
}

// CTA Section - Section Subtitle.
$wp_customize->add_setting(
	'shopup_cta_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_cta_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'shopup' ),
		'section'         => 'shopup_cta_section',
		'settings'        => 'shopup_cta_subtitle',
		'type'            => 'text',
		'active_callback' => 'shopup_is_cta_section_enabled',
	)
);

// CTA Section - Section Title.
$wp_customize->add_setting(
	'shopup_cta_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_cta_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_cta_section',
		'settings'        => 'shopup_cta_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_cta_section_enabled',
	)
);

// CTA Section - Content.
$wp_customize->add_setting(
	'shopup_cta_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_cta_content',
	array(
		'label'           => esc_html__( 'Content', 'shopup' ),
		'section'         => 'shopup_cta_section',
		'settings'        => 'shopup_cta_content',
		'type'            => 'text',
		'active_callback' => 'shopup_is_cta_section_enabled',
	)
);

// CTA Section - Background Image.
$wp_customize->add_setting(
	'shopup_cta_background_image',
	array(
		'sanitize_callback' => 'shopup_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'shopup_cta_background_image',
		array(
			'label'           => esc_html__( 'Background Image', 'shopup' ),
			'section'         => 'shopup_cta_section',
			'settings'        => 'shopup_cta_background_image',
			'active_callback' => 'shopup_is_cta_section_enabled',
		)
	)
);

// CTA Section - Center Image.
$wp_customize->add_setting(
	'shopup_cta_center_image',
	array(
		'sanitize_callback' => 'shopup_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'shopup_cta_center_image',
		array(
			'label'           => esc_html__( 'Center Image', 'shopup' ),
			'section'         => 'shopup_cta_section',
			'settings'        => 'shopup_cta_center_image',
			'active_callback' => 'shopup_is_cta_section_enabled',
		)
	)
);

// CTA Section - Button Label.
$wp_customize->add_setting(
	'shopup_cta_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_cta_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shopup' ),
		'section'         => 'shopup_cta_section',
		'settings'        => 'shopup_cta_button_label',
		'type'            => 'text',
		'active_callback' => 'shopup_is_cta_section_enabled',
	)
);

// CTA Section - Button Link.
$wp_customize->add_setting(
	'shopup_cta_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shopup_cta_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shopup' ),
		'section'         => 'shopup_cta_section',
		'settings'        => 'shopup_cta_button_link',
		'type'            => 'url',
		'active_callback' => 'shopup_is_cta_section_enabled',
	)
);
