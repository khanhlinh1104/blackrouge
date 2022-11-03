<?php
/**
 * Banner Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_banner_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Banner Slider Section', 'shopup' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'shopup' ),
			'section'  => 'shopup_banner_section',
			'settings' => 'shopup_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_banner_section',
		array(
			'selector' => '#shopup_banner_section .section-link',
			'settings' => 'shopup_enable_banner_section',
		)
	);
}

// Banner Section - Content Type.
$wp_customize->add_setting(
	'shopup_banner_content',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'shopup_sanitize_select',
	)
);

$wp_customize->add_control(
	'shopup_banner_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shopup' ),
		'section'         => 'shopup_banner_section',
		'settings'        => 'shopup_banner_content',
		'type'            => 'select',
		'active_callback' => 'shopup_is_banner_section_enabled',
		'choices'         => shopup_get_banner_choices(),
	)
);

// Banner Section - Number of Slides.
$wp_customize->add_setting(
	'shopup_banner_slide_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'shopup_sanitize_number_range',
		'validate_callback' => 'shopup_validate_slider_count',
	)
);

$wp_customize->add_control(
	'shopup_banner_slide_count',
	array(
		'label'           => esc_html__( 'Number of Slides', 'shopup' ),
		'description'     => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'         => 'shopup_banner_section',
		'settings'        => 'shopup_banner_slide_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'shopup_is_banner_section_enabled',
	)
);

// List out selected number of fields.
$slide_count = get_theme_mod( 'shopup_banner_slide_count', 3 );

for ( $i = 1; $i <= $slide_count; $i++ ) {

	// Banner Section - Content Type Post.
	$wp_customize->add_setting(
		'shopup_banner_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_banner_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'shopup' ) . $i,
			'section'         => 'shopup_banner_section',
			'settings'        => 'shopup_banner_content_post_' . $i,
			'active_callback' => 'shopup_is_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_post_choices(),
		)
	);

	// Banner Section - Content Type Page.
	$wp_customize->add_setting(
		'shopup_banner_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_banner_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'shopup' ) . $i,
			'section'         => 'shopup_banner_section',
			'settings'        => 'shopup_banner_content_page_' . $i,
			'active_callback' => 'shopup_is_banner_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_page_choices(),
		)
	);

	// Banner Section - Content Type Product.
	$wp_customize->add_setting(
		'shopup_banner_content_product_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_banner_content_product_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'shopup' ) . $i,
			'section'         => 'shopup_banner_section',
			'settings'        => 'shopup_banner_content_product_' . $i,
			'active_callback' => 'shopup_is_banner_section_and_content_type_product_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_product_choices(),
		)
	);

	// Banner Section - Button Label.
	$wp_customize->add_setting(
		'shopup_banner_button_label' . $i,
		array(
			'default'           => __( 'Shop Now', 'shopup' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'shopup_banner_button_label' . $i,
		array(
			'label'           => esc_html__( 'Button Label ', 'shopup' ) . $i,
			'section'         => 'shopup_banner_section',
			'settings'        => 'shopup_banner_button_label' . $i,
			'type'            => 'text',
			'active_callback' => 'shopup_is_banner_section_enabled',
		)
	);

	// Banner Section - Button Link.
	$wp_customize->add_setting(
		'shopup_banner_button_link' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shopup_banner_button_link' . $i,
		array(
			'label'           => esc_html__( 'Button Link ', 'shopup' ) . $i,
			'section'         => 'shopup_banner_section',
			'settings'        => 'shopup_banner_button_link' . $i,
			'type'            => 'url',
			'active_callback' => 'shopup_is_banner_section_enabled',
		)
	);

	// Banner Section - Horizontal Line.
	$wp_customize->add_setting(
		'shopup_banner_horizontal_line_' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new ShopUp_Customize_Horizontal_Line(
			$wp_customize,
			'shopup_banner_horizontal_line_' . $i,
			array(
				'section'         => 'shopup_banner_section',
				'settings'        => 'shopup_banner_horizontal_line_' . $i,
				'active_callback' => 'shopup_is_banner_section_enabled',
				'type'            => 'hr',
			)
		)
	);

}
