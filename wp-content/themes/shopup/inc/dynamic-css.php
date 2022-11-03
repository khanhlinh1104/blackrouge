<?php

/**
 * Dynamic CSS
 */
function shopup_dynamic_css() {
	$default_color = shopup_get_default_color();

	$primary_color = get_theme_mod( 'primary_color', $default_color['primary'] );

	$header_font           = get_theme_mod( 'shopup_header_font', 'DM Serif Display' );
	$body_font             = get_theme_mod( 'shopup_body_font', 'Montserrat' );
	$site_title_font       = get_theme_mod( 'shopup_site_title_font', 'DM Serif Display' );
	$site_description_font = get_theme_mod( 'shopup_site_description_font', 'Montserrat' );

	$custom_css  = '';
	$custom_css .= '
    /* Color */
    :root {
        --secondary-color: ' . esc_attr( $primary_color ) . ';
    }
    ';

	$custom_css .= '
    /* Typograhpy */
    :root {
        --font-heading: "' . esc_attr( $header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont,"' . esc_attr( $body_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea {
        font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
        font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}
    
	.site-description {
        font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}
    ';

	wp_add_inline_style( 'shopup-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'shopup_dynamic_css', 99 );
