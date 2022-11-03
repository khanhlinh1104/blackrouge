<?php
/**
 * Categories Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_categories_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Categories Section', 'shopup' ),
		'priority' => 30,
	)
);

// Categories Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_categories_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_categories_section',
		array(
			'label'    => esc_html__( 'Enable Categories Section', 'shopup' ),
			'section'  => 'shopup_categories_section',
			'settings' => 'shopup_enable_categories_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_categories_section',
		array(
			'selector' => '#shopup_categories_section .section-link',
			'settings' => 'shopup_enable_categories_section',
		)
	);
}

// Categories Section - Section Title.
$wp_customize->add_setting(
	'shopup_categories_title',
	array(
		'default'           => __( 'Product Categories', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_categories_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_categories_section',
		'settings'        => 'shopup_categories_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_categories_section_enabled',
	)
);

// Categories Section - Section Text.
$wp_customize->add_setting(
	'shopup_categories_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_categories_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shopup' ),
		'section'         => 'shopup_categories_section',
		'settings'        => 'shopup_categories_text',
		'type'            => 'text',
		'active_callback' => 'shopup_is_categories_section_enabled',
	)
);

// Categories Section - Select Taxonomy.
$wp_customize->add_setting(
	'shopup_taxonomy_name',
	array(
		'default'           => 'product_cat',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_taxonomy_name',
	array(
		'label'           => esc_html__( 'Select Taxonomy', 'shopup' ),
		'section'         => 'shopup_categories_section',
		'settings'        => 'shopup_taxonomy_name',
		'active_callback' => 'shopup_is_categories_section_enabled',
		'type'            => 'select',
		'choices'         => shopup_get_taxonomy_choices(),
	)
);

// Categories Section - Number of Posts.
$wp_customize->add_setting(
	'shopup_categories_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'shopup_sanitize_number_range',
		'validate_callback' => 'shopup_validate_categories_count',
	)
);

$wp_customize->add_control(
	'shopup_categories_count',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'shopup' ),
		'description'     => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'         => 'shopup_categories_section',
		'settings'        => 'shopup_categories_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'shopup_is_categories_section_enabled',
	)
);

// List out selected number of fields.
$categories_count = get_theme_mod( 'shopup_categories_count', 3 );

for ( $i = 1; $i <= $categories_count; $i++ ) {

	// Categories Section - Select Category.
	$wp_customize->add_setting(
		'shopup_categories_content_category_' . $i,
		array(
			'sanitize_callback' => 'shopup_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'shopup_categories_content_category_' . $i,
		array(
			'label'           => esc_html__( 'Select Category ', 'shopup' ) . $i,
			'section'         => 'shopup_categories_section',
			'settings'        => 'shopup_categories_content_category_' . $i,
			'active_callback' => 'shopup_is_categories_section_and_content_type_category_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_post_cat_choices(),
		)
	);

	// Categories Section - Select Product Category.
	$wp_customize->add_setting(
		'shopup_categories_content_product_cat_' . $i,
		array(
			'sanitize_callback' => 'shopup_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'shopup_categories_content_product_cat_' . $i,
		array(
			'label'           => esc_html__( 'Select Category ', 'shopup' ) . $i,
			'section'         => 'shopup_categories_section',
			'settings'        => 'shopup_categories_content_product_cat_' . $i,
			'active_callback' => 'shopup_is_categories_section_and_content_type_product_cat_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_product_cat_choices(),
		)
	);

	// Categories Section - Category Image.
	$wp_customize->add_setting(
		'shopup_categories_image_' . $i,
		array(
			'sanitize_callback' => 'shopup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shopup_categories_image_' . $i,
			array(
				'label'           => esc_html__( 'Category Image ', 'shopup' ) . $i,
				'section'         => 'shopup_categories_section',
				'settings'        => 'shopup_categories_image_' . $i,
				'active_callback' => 'shopup_is_categories_section_and_content_type_category_enabled',
			)
		)
	);
}

// Categories Section - Button Label.
$wp_customize->add_setting(
	'shopup_categories_button_label',
	array(
		'default'           => __( 'Shop Now', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_categories_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shopup' ),
		'section'         => 'shopup_categories_section',
		'settings'        => 'shopup_categories_button_label',
		'type'            => 'text',
		'active_callback' => 'shopup_is_categories_section_enabled',
	)
);
