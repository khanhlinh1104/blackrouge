<?php
/**
 * Two Column Promo
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_two_col_promo_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Two Column Promo', 'shopup' ),
		'priority' => 40,
	)
);

// Two Column Promo - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_two_col_promo_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_two_col_promo_section',
		array(
			'label'    => esc_html__( 'Enable Two Column Promo', 'shopup' ),
			'section'  => 'shopup_two_col_promo_section',
			'settings' => 'shopup_enable_two_col_promo_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_two_col_promo_section',
		array(
			'selector' => '#shopup_two_col_promo_section .section-link',
			'settings' => 'shopup_enable_two_col_promo_section',
		)
	);
}

for ( $i = 1; $i <= 2; $i++ ) {

	// Two Column Promo - Section Title.
	$wp_customize->add_setting(
		'shopup_two_col_promo_title_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shopup_two_col_promo_title_' . $i,
		array(
			'label'           => esc_html__( 'Title ', 'shopup' ) . $i,
			'section'         => 'shopup_two_col_promo_section',
			'settings'        => 'shopup_two_col_promo_title_' . $i,
			'type'            => 'text',
			'active_callback' => 'shopup_is_two_col_promo_section_enabled',
		)
	);

	// Two Column Promo - Content.
	$wp_customize->add_setting(
		'shopup_two_col_promo_content_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shopup_two_col_promo_content_' . $i,
		array(
			'label'           => esc_html__( 'Content ', 'shopup' ) . $i,
			'section'         => 'shopup_two_col_promo_section',
			'settings'        => 'shopup_two_col_promo_content_' . $i,
			'type'            => 'text',
			'active_callback' => 'shopup_is_two_col_promo_section_enabled',
		)
	);

	// Two Column Promo - Background Image.
	$wp_customize->add_setting(
		'shopup_two_col_promo_background_image_' . $i,
		array(
			'sanitize_callback' => 'shopup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shopup_two_col_promo_background_image_' . $i,
			array(
				'label'           => esc_html__( 'Background Image ', 'shopup' ) . $i,
				'section'         => 'shopup_two_col_promo_section',
				'settings'        => 'shopup_two_col_promo_background_image_' . $i,
				'active_callback' => 'shopup_is_two_col_promo_section_enabled',
			)
		)
	);

	// Two Column Promo - Button Label.
	$wp_customize->add_setting(
		'shopup_two_col_promo_button_label_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shopup_two_col_promo_button_label_' . $i,
		array(
			'label'           => esc_html__( 'Button Label ', 'shopup' ) . $i,
			'section'         => 'shopup_two_col_promo_section',
			'settings'        => 'shopup_two_col_promo_button_label_' . $i,
			'type'            => 'text',
			'active_callback' => 'shopup_is_two_col_promo_section_enabled',
		)
	);

	// Two Column Promo - Button Link.
	$wp_customize->add_setting(
		'shopup_two_col_promo_button_link_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shopup_two_col_promo_button_link_' . $i,
		array(
			'label'           => esc_html__( 'Button Link ', 'shopup' ) . $i,
			'section'         => 'shopup_two_col_promo_section',
			'settings'        => 'shopup_two_col_promo_button_link_' . $i,
			'type'            => 'url',
			'active_callback' => 'shopup_is_two_col_promo_section_enabled',
		)
	);

	// Two Column Section - Horizontal Line.
	$wp_customize->add_setting(
		'shopup_two_col_promo_horizontal_line_' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new ShopUp_Customize_Horizontal_Line(
			$wp_customize,
			'shopup_two_col_promo_horizontal_line_' . $i,
			array(
				'section'         => 'shopup_two_col_promo_section',
				'settings'        => 'shopup_two_col_promo_horizontal_line_' . $i,
				'active_callback' => 'shopup_is_two_col_promo_section_enabled',
				'type'            => 'hr',
			)
		)
	);
}
