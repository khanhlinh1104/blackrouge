<?php
/**
 * Product Carousal
 *
 * @package ShopUp
 */

if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

// Product Carousal.
$wp_customize->add_section(
	'shopup_product_carousal_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Product Carousal', 'shopup' ),
		'priority' => 50,
	)
);

// Product Carousal - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_product_carousal_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_product_carousal_section',
		array(
			'label'    => esc_html__( 'Enable Product Carousal', 'shopup' ),
			'section'  => 'shopup_product_carousal_section',
			'settings' => 'shopup_enable_product_carousal_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_product_carousal_section',
		array(
			'selector' => '#shopup_product_carousal_section .section-link',
			'settings' => 'shopup_enable_product_carousal_section',
		)
	);
}

// Product Carousal - Section Title.
$wp_customize->add_setting(
	'shopup_product_carousal_title',
	array(
		'default'           => __( 'Featured Products', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_product_carousal_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_product_carousal_section',
		'settings'        => 'shopup_product_carousal_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_product_carousal_section_enabled',
	)
);

// Product Carousal - Section Text.
$wp_customize->add_setting(
	'shopup_product_carousal_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_product_carousal_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shopup' ),
		'section'         => 'shopup_product_carousal_section',
		'settings'        => 'shopup_product_carousal_text',
		'type'            => 'text',
		'active_callback' => 'shopup_is_product_carousal_section_enabled',
	)
);

// Product Carousal - Number of Posts.
$wp_customize->add_setting(
	'shopup_product_carousal_count',
	array(
		'default'           => 4,
		'sanitize_callback' => 'shopup_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'shopup_product_carousal_count',
	array(
		'label'           => esc_html__( 'Number of products', 'shopup' ),
		'description'     => esc_html__( 'Note: Min 1. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'         => 'shopup_product_carousal_section',
		'settings'        => 'shopup_product_carousal_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'shopup_is_product_carousal_section_enabled',
	)
);

// Product Carousal - Content Type.
$wp_customize->add_setting(
	'shopup_product_carousal_content_type',
	array(
		'default'           => 'featured',
		'sanitize_callback' => 'shopup_sanitize_select',
	)
);

$wp_customize->add_control(
	'shopup_product_carousal_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shopup' ),
		'section'         => 'shopup_product_carousal_section',
		'settings'        => 'shopup_product_carousal_content_type',
		'type'            => 'select',
		'active_callback' => 'shopup_is_product_carousal_section_enabled',
		'choices'         => array(
			'product'        => esc_html__( 'Product', 'shopup' ),
			'product_cat'    => esc_html__( 'Product Category', 'shopup' ),
			'featured'       => esc_html__( 'Featured Product', 'shopup' ),
			'recent_product' => esc_html__( 'Recent Product', 'shopup' ),
		),
	)
);

// List out selected number of fields.
$product_count = get_theme_mod( 'shopup_product_carousal_count', 4 );
for ( $i = 1; $i <= $product_count; $i++ ) {

	// Product Carousal - Select Product.
	$wp_customize->add_setting(
		'shopup_product_carousal_content_product_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_product_carousal_content_product_' . $i,
		array(
			'label'           => esc_html__( 'Select Product ', 'shopup' ) . $i,
			'section'         => 'shopup_product_carousal_section',
			'settings'        => 'shopup_product_carousal_content_product_' . $i,
			'active_callback' => 'shopup_is_product_carousal_section_and_content_type_product_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_product_choices(),
		)
	);

}

// Product Carousal - Select Product Category.
$wp_customize->add_setting(
	'shopup_product_carousal_content_category',
	array(
		'sanitize_callback' => 'shopup_sanitize_select',
	)
);

$wp_customize->add_control(
	'shopup_product_carousal_content_category',
	array(
		'label'           => esc_html__( 'Select Product Category', 'shopup' ),
		'section'         => 'shopup_product_carousal_section',
		'settings'        => 'shopup_product_carousal_content_category',
		'active_callback' => 'shopup_is_product_carousal_section_and_content_type_product_category_enabled',
		'type'            => 'select',
		'choices'         => shopup_get_product_cat_choices(),
	)
);
