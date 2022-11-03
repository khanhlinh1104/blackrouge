<?php
/**
 * Deals Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_deals_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Deals Section', 'shopup' ),
		'priority' => 60,
	)
);

// Deals Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_deals_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_deals_section',
		array(
			'label'    => esc_html__( 'Enable Deals Section', 'shopup' ),
			'section'  => 'shopup_deals_section',
			'settings' => 'shopup_enable_deals_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_deals_section',
		array(
			'selector' => '#shopup_deals_section .section-link',
			'settings' => 'shopup_enable_deals_section',
		)
	);
}

// Deals Section - Section Title.
$wp_customize->add_setting(
	'shopup_deals_title',
	array(
		'default'           => __( 'Deals of the day', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_deals_title',
	array(
		'label'           => esc_html__( 'Title', 'shopup' ),
		'section'         => 'shopup_deals_section',
		'settings'        => 'shopup_deals_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_deals_section_enabled',
	)
);

// Deals Section - Content.
$wp_customize->add_setting(
	'shopup_deals_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_deals_content',
	array(
		'label'           => esc_html__( 'Content', 'shopup' ),
		'section'         => 'shopup_deals_section',
		'settings'        => 'shopup_deals_content',
		'type'            => 'text',
		'active_callback' => 'shopup_is_deals_section_enabled',
	)
);

// Deals Section - Deal Deadline.
$wp_customize->add_setting(
	'shopup_deals_deadline',
	array(
		'default'           => date( 'Y-m-d 23:59:59' ),
		'sanitize_callback' => 'shopup_sanitize_date_time',
	)
);

$wp_customize->add_control(
	new WP_Customize_Date_Time_Control(
		$wp_customize,
		'shopup_deals_deadline',
		array(
			'label'              => esc_html__( 'Deal Deadline', 'shopup' ),
			'allow_past_date'    => false,
			'twelve_hour_format' => true,
			'section'            => 'shopup_deals_section',
			'settings'           => 'shopup_deals_deadline',
			'active_callback'    => 'shopup_is_deals_section_enabled',
		)
	)
);

// Deals Section - Background Image.
$wp_customize->add_setting(
	'shopup_deals_background_image',
	array(
		'sanitize_callback' => 'shopup_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'shopup_deals_background_image',
		array(
			'label'           => esc_html__( 'Background Image', 'shopup' ),
			'section'         => 'shopup_deals_section',
			'settings'        => 'shopup_deals_background_image',
			'active_callback' => 'shopup_is_deals_section_enabled',
		)
	)
);

// Deals Section - Button Label.
$wp_customize->add_setting(
	'shopup_deals_button_label',
	array(
		'default'           => __( 'Shop Now', 'shopup' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_deals_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'shopup' ),
		'section'         => 'shopup_deals_section',
		'settings'        => 'shopup_deals_button_label',
		'type'            => 'text',
		'active_callback' => 'shopup_is_deals_section_enabled',
	)
);

// Deals Section - Button Link.
$wp_customize->add_setting(
	'shopup_deals_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'shopup_deals_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'shopup' ),
		'section'         => 'shopup_deals_section',
		'settings'        => 'shopup_deals_button_link',
		'type'            => 'url',
		'active_callback' => 'shopup_is_deals_section_enabled',
	)
);
