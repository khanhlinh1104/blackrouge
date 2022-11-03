<?php
/**
 * Blog Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_blog_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Blog Section', 'shopup' ),
		'priority' => 100,
	)
);

// Blog Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'shopup' ),
			'section'  => 'shopup_blog_section',
			'settings' => 'shopup_enable_blog_section',
			'type'     => 'checkbox',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_blog_section',
		array(
			'selector' => '#shopup_blog_section .section-link',
			'settings' => 'shopup_enable_blog_section',
		)
	);
}

// Blog Section - Section Title.
$wp_customize->add_setting(
	'shopup_blog_title',
	array(
		'default'           => __( 'Blogs', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_blog_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_blog_section',
		'settings'        => 'shopup_blog_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_blog_section_enabled',
	)
);

// Blog Section - Section Text.
$wp_customize->add_setting(
	'shopup_blog_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_blog_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shopup' ),
		'section'         => 'shopup_blog_section',
		'settings'        => 'shopup_blog_text',
		'type'            => 'text',
		'active_callback' => 'shopup_is_blog_section_enabled',
	)
);

// Blog Section - Number of Posts.
$wp_customize->add_setting(
	'shopup_blog_count',
	array(
		'default'           => 3,
		'sanitize_callback' => 'shopup_sanitize_number_range',
		'validate_callback' => 'shopup_validate_blog_count',
	)
);

$wp_customize->add_control(
	'shopup_blog_count',
	array(
		'label'           => esc_html__( 'Number of Items to Show', 'shopup' ),
		'description'     => esc_html__( 'Note: Min 1 & Max 12. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'         => 'shopup_blog_section',
		'settings'        => 'shopup_blog_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
			'max' => 12,
		),
		'active_callback' => 'shopup_is_blog_section_enabled',
	)
);

// List out selected number of fields.
$blog_count = get_theme_mod( 'shopup_blog_count', 3 );

for ( $i = 1; $i <= $blog_count; $i++ ) {
	// Blog Section - Select Post.
	$wp_customize->add_setting(
		'shopup_blog_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'shopup_blog_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'shopup' ) . $i,
			'section'         => 'shopup_blog_section',
			'settings'        => 'shopup_blog_content_post_' . $i,
			'type'            => 'select',
			'active_callback' => 'shopup_is_blog_section_enabled',
			'choices'         => shopup_get_post_choices(),
		)
	);

}

// Blog Section - Button Label.
$wp_customize->add_setting(
	'shopup_blog_button_label',
	array(
		'default'           => __( 'View All', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_blog_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shopup' ),
		'section'         => 'shopup_blog_section',
		'settings'        => 'shopup_blog_button_label',
		'type'            => 'text',
		'active_callback' => 'shopup_is_blog_section_enabled',
	)
);

// Blog Section - Button Link.
$wp_customize->add_setting(
	'shopup_blog_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shopup_blog_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shopup' ),
		'section'         => 'shopup_blog_section',
		'settings'        => 'shopup_blog_button_link',
		'type'            => 'url',
		'active_callback' => 'shopup_is_blog_section_enabled',
	)
);
