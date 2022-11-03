<?php
/**
 * Footer Options
 *
 * @package ShopUp
 */

$wp_customize->add_section(
	'shopup_footer_options',
	array(
		'panel' => 'shopup_theme_options',
		'title' => esc_html__( 'Footer Options', 'shopup' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'shopup' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'shopup_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'shopup_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'shopup' ),
		'section'  => 'shopup_footer_options',
		'settings' => 'shopup_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'shopup_scroll_top',
	array(
		'sanitize_callback' => 'shopup_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new ShopUp_Toggle_Switch_Custom_Control(
		$wp_customize,
		'shopup_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'shopup' ),
			'section' => 'shopup_footer_options',
		)
	)
);
