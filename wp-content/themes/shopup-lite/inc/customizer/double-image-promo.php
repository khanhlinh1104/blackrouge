<?php
/**
 * Double Image Promo
 *
 * @package ShopUp_Lite
 */

$wp_customize->add_section(
	'shopup_double_image_promo_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Double Image Promo', 'shopup-lite' ),
		'priority' => 55,
	)
);

// Double Image Promo - Enable Section.
$wp_customize->add_setting(
	'shopup_lite_enable_double_image_promo_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_lite_enable_double_image_promo_section',
		array(
			'label'    => esc_html__( 'Enable Double Image Promo', 'shopup-lite' ),
			'section'  => 'shopup_double_image_promo_section',
			'settings' => 'shopup_lite_enable_double_image_promo_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_lite_enable_double_image_promo_section',
		array(
			'selector' => '#shopup_double_image_promo_section .section-link',
			'settings' => 'shopup_lite_enable_double_image_promo_section',
		)
	);
}

// Double Image Promo - Section Title.
$wp_customize->add_setting(
	'shopup_lite_double_image_promo_section_title',
	array(
		'default'           => __( 'Season Sale', 'shopup-lite' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_lite_double_image_promo_section_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup-lite' ),
		'section'         => 'shopup_double_image_promo_section',
		'settings'        => 'shopup_lite_double_image_promo_section_title',
		'type'            => 'text',
		'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
	)
);

// Double Image Promo - Content.
$wp_customize->add_setting(
	'shopup_lite_double_image_promo_section_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_lite_double_image_promo_section_content',
	array(
		'label'           => esc_html__( 'Section Content', 'shopup-lite' ),
		'section'         => 'shopup_double_image_promo_section',
		'settings'        => 'shopup_lite_double_image_promo_section_content',
		'type'            => 'text',
		'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
	)
);

// Double Image Promo - Button Label.
$wp_customize->add_setting(
	'shopup_lite_double_image_promo_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'shopup_lite_double_image_promo_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shopup-lite' ),
		'section'         => 'shopup_double_image_promo_section',
		'settings'        => 'shopup_lite_double_image_promo_button_label',
		'type'            => 'text',
		'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
	)
);

// Double Image Promo - Button Link.
$wp_customize->add_setting(
	'shopup_lite_double_image_promo_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'shopup_lite_double_image_promo_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shopup-lite' ),
		'section'         => 'shopup_double_image_promo_section',
		'settings'        => 'shopup_lite_double_image_promo_button_link',
		'type'            => 'url',
		'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
	)
);

for ( $i = 1; $i <= 2; $i++ ) {

	// Double Image Promo - Section Title.
	$wp_customize->add_setting(
		'shopup_lite_double_image_promo_title_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shopup_lite_double_image_promo_title_' . $i,
		array(
			'label'           => esc_html__( 'Title ', 'shopup-lite' ) . $i,
			'section'         => 'shopup_double_image_promo_section',
			'settings'        => 'shopup_lite_double_image_promo_title_' . $i,
			'type'            => 'text',
			'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
		)
	);

	// Double Image Promo - Subtitle.
	$wp_customize->add_setting(
		'shopup_lite_double_image_promo_subtitle_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shopup_lite_double_image_promo_subtitle_' . $i,
		array(
			'label'           => esc_html__( 'Subtitle ', 'shopup-lite' ) . $i,
			'section'         => 'shopup_double_image_promo_section',
			'settings'        => 'shopup_lite_double_image_promo_subtitle_' . $i,
			'type'            => 'text',
			'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
		)
	);

	// Double Image Promo - Background Image.
	$wp_customize->add_setting(
		'shopup_lite_double_image_promo_background_image_' . $i,
		array(
			'sanitize_callback' => 'shopup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shopup_lite_double_image_promo_background_image_' . $i,
			array(
				'label'           => esc_html__( 'Background Image ', 'shopup-lite' ) . $i,
				'section'         => 'shopup_double_image_promo_section',
				'settings'        => 'shopup_lite_double_image_promo_background_image_' . $i,
				'active_callback' => 'shopup_lite_is_double_image_promo_section_enabled',
			)
		)
	);
}