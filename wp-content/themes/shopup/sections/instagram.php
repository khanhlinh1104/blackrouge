<?php
if ( ! get_theme_mod( 'shopup_enable_instagram_section', false ) ) {
	return;
}

shopup_render_instagram_section();

/**
 * Render instagram section
 */
function shopup_render_instagram_section() {
	?>
	<section id="shopup_instagram_section" class="shopup-frontpage-section shopup-product-instagram-section">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_instagram_section' );
		endif;

		$ig_shortcode = get_theme_mod( 'shopup_instagram_shortcode', '[instagram-feed cols=6 showfollow=false]' );
		echo do_shortcode( $ig_shortcode );
		?>
	</section>
	<?php
}
