<?php
/**
 * Features Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_features_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Features Section', 'shopup' ),
		'priority' => 90,
	)
);

// Features Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_features_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_features_section',
		array(
			'label'    => esc_html__( 'Enable Features Section', 'shopup' ),
			'section'  => 'shopup_features_section',
			'settings' => 'shopup_enable_features_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_features_section',
		array(
			'selector' => '#shopup_features_section .section-link',
			'settings' => 'shopup_enable_features_section',
		)
	);
}

// Features Section - Section Text.
$wp_customize->add_setting(
	'shopup_features_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_features_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shopup' ),
		'section'         => 'shopup_features_section',
		'settings'        => 'shopup_features_text',
		'type'            => 'text',
		'active_callback' => 'shopup_is_features_section_enabled',
	)
);

// Features Section - Section Title.
$wp_customize->add_setting(
	'shopup_features_title',
	array(
		'default'           => __( 'Our Features', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_features_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_features_section',
		'settings'        => 'shopup_features_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_features_section_enabled',
	)
);

// Features Section - Section Text.
$wp_customize->add_setting(
	'shopup_features_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_features_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shopup' ),
		'section'         => 'shopup_features_section',
		'settings'        => 'shopup_features_text',
		'type'            => 'text',
		'active_callback' => 'shopup_is_features_section_enabled',
	)
);

// Features Section - Number of Posts.
$wp_customize->add_setting(
	'shopup_features_count',
	array(
		'default'           => 4,
		'sanitize_callback' => 'shopup_sanitize_number_range',
		'validate_callback' => 'shopup_validate_features_count',
	)
);

$wp_customize->add_control(
	'shopup_features_count',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'shopup' ),
		'description'     => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'         => 'shopup_features_section',
		'settings'        => 'shopup_features_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'shopup_is_features_section_enabled',
	)
);

// Features Section - Content Type.
$wp_customize->add_setting(
	'shopup_features_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'shopup_sanitize_select',
	)
);

$wp_customize->add_control(
	'shopup_features_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'shopup' ),
		'section'         => 'shopup_features_section',
		'settings'        => 'shopup_features_content_type',
		'type'            => 'select',
		'active_callback' => 'shopup_is_features_section_enabled',
		'choices'         => array(
			'page'     => esc_html__( 'Page', 'shopup' ),
			'post'     => esc_html__( 'Post', 'shopup' ),
			'category' => esc_html__( 'Category', 'shopup' ),
		),
	)
);

// List out selected number of fields.
$features_count = get_theme_mod( 'shopup_features_count', 4 );

for ( $i = 1; $i <= $features_count; $i++ ) {
	// Features Section - Select Post.
	$wp_customize->add_setting(
		'shopup_features_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_features_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'shopup' ) . $i,
			'section'         => 'shopup_features_section',
			'settings'        => 'shopup_features_content_post_' . $i,
			'active_callback' => 'shopup_is_features_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_post_choices(),
		)
	);

	// Features Section - Select Page.
	$wp_customize->add_setting(
		'shopup_features_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_features_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'shopup' ) . $i,
			'section'         => 'shopup_features_section',
			'settings'        => 'shopup_features_content_page_' . $i,
			'active_callback' => 'shopup_is_features_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => shopup_get_page_choices(),
		)
	);

}

// Features Section - Select Category.
$wp_customize->add_setting(
	'shopup_features_content_category',
	array(
		'sanitize_callback' => 'shopup_sanitize_select',
	)
);

$wp_customize->add_control(
	'shopup_features_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'shopup' ),
		'section'         => 'shopup_features_section',
		'settings'        => 'shopup_features_content_category',
		'active_callback' => 'shopup_is_features_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => shopup_get_post_cat_choices(),
	)
);
