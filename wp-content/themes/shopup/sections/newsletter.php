<?php
if ( ! get_theme_mod( 'shopup_enable_newsletter_section', false ) ) {
	return;
}

$section_content                     = array();
$section_content['title']            = get_theme_mod( 'shopup_newsletter_title', __( 'Join Our Mailing List', 'shopup' ) );
$section_content['content']          = get_theme_mod( 'shopup_newsletter_content', __( 'Sign up to our newsletter.', 'shopup' ) );
$section_content['background_color'] = get_theme_mod( 'shopup_newsletter_background_color' );
$section_content['background_url']   = get_theme_mod( 'shopup_newsletter_background_image' );

$section_content = apply_filters( 'shopup_newsletter_section_content', $section_content );

shopup_render_newsletter_section( $section_content );

/**
 * Render newsletter section
 */
function shopup_render_newsletter_section( $section_content ) {
	$style_attr = '';
	if ( ! empty( $section_content['background_color'] ) ) {
		$style_attr = 'background-color: ' . $section_content['background_color'] . ';';
	}
	?>
	<section id="shopup_newsletter_section" class="shopup-frontpage-section shopup-newsletter-section" style="<?php echo esc_attr( $style_attr ); ?>;">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_newsletter_section' );
		endif;

		if ( ! empty( $section_content['background_url'] ) ) {
			?>
			<div class="shopup-newsletter-img">
				<img src="<?php echo esc_url( $section_content['background_url'] ); ?>">
			</div>
			<?php
		}
		?>
		<div class="ascendoor-wrapper">
			<div class="shopup-newsletter-section-wrapper">
				<div class="shopup-newsletter-text">
					<h3 class="shopup-newsletter-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
					<p><?php echo wp_kses_post( $section_content['content'] ); ?></p>
				</div>
				<div class="shopup-newsletter-form">
					<?php
					$subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="Sign Up"]';
					echo do_shortcode( wp_kses_post( $subscription_shortcode ) );
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
