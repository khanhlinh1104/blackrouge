<?php
/**
 * Associate Section
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_associate_section',
	array(
		'panel' => 'shopup_front_page_options',
		'title' => esc_html__( 'Associate Section', 'shopup' ),
		'priority' => 70,
	)
);

// Associate Section - Enable Section.
$wp_customize->add_setting(
	'shopup_enable_associate_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'shopup_sanitize_switch',
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_enable_associate_section',
		array(
			'label'    => esc_html__( 'Enable Associate Section', 'shopup' ),
			'section'  => 'shopup_associate_section',
			'settings' => 'shopup_enable_associate_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'shopup_enable_associate_section',
		array(
			'selector' => '#shopup_associate_section .section-link',
			'settings' => 'shopup_enable_associate_section',
		)
	);
}

// Associate Section - Section Title.
$wp_customize->add_setting(
	'shopup_associate_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_associate_title',
	array(
		'label'           => esc_html__( 'Section Title', 'shopup' ),
		'section'         => 'shopup_associate_section',
		'settings'        => 'shopup_associate_title',
		'type'            => 'text',
		'active_callback' => 'shopup_is_associate_section_enabled',
	)
);

// Associate Section - Section Text.
$wp_customize->add_setting(
	'shopup_associate_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'shopup_associate_text',
	array(
		'label'           => esc_html__( 'Section Text', 'shopup' ),
		'section'         => 'shopup_associate_section',
		'settings'        => 'shopup_associate_text',
		'type'            => 'text',
		'active_callback' => 'shopup_is_associate_section_enabled',
	)
);

// Associate Section - Number of Logos.
$wp_customize->add_setting(
	'shopup_associate_count',
	array(
		'default'           => 5,
		'sanitize_callback' => 'shopup_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'shopup_associate_count',
	array(
		'label'           => esc_html__( 'Number of Logos', 'shopup' ),
		'description'     => esc_html__( 'Note: Min 1. Please input the valid number and save. Then refresh the page to see the change.', 'shopup' ),
		'section'         => 'shopup_associate_section',
		'settings'        => 'shopup_associate_count',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'shopup_is_associate_section_enabled',
	)
);

// List out selected number of fields.
$counter_count = get_theme_mod( 'shopup_associate_count', 5 );

for ( $i = 1; $i <= $counter_count; $i++ ) {

	$wp_customize->add_setting(
		'shopup_associate_logo_' . $i,
		array(
			'sanitize_callback' => 'shopup_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'shopup_associate_logo_' . $i,
			array(
				'label'           => esc_html__( 'Logo ', 'shopup' ) . $i,
				'section'         => 'shopup_associate_section',
				'settings'        => 'shopup_associate_logo_' . $i,
				'active_callback' => 'shopup_is_associate_section_enabled',
			)
		)
	);

	// Associate Section - Logo URL.
	$wp_customize->add_setting(
		'shopup_associate_logo_url_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'shopup_associate_logo_url_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Logo URL %d', 'shopup' ), $i ),
			'section'         => 'shopup_associate_section',
			'settings'        => 'shopup_associate_logo_url_' . $i,
			'type'            => 'url',
			'active_callback' => 'shopup_is_associate_section_enabled',
		)
	);

}
