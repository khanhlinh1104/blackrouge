<?php
/**
 * Render homepage sections.
 */
function shopup_homepage_sections() {
	$homepage_sections = shopup_get_homepage_sections();

	foreach ( $homepage_sections as $key => $value ) {
		require get_template_directory() . '/sections/' . $key . '.php';
	}
}
