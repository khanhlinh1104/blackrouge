<?php
if ( ! get_theme_mod( 'shopup_enable_cta_section', false ) ) {
	return;
}

$section_content                   = array();
$section_content['subtitle']       = get_theme_mod( 'shopup_cta_subtitle' );
$section_content['title']          = get_theme_mod( 'shopup_cta_title' );
$section_content['content']        = get_theme_mod( 'shopup_cta_content' );
$section_content['background_url'] = get_theme_mod( 'shopup_cta_background_image' );
$section_content['center_url']     = get_theme_mod( 'shopup_cta_center_image' );
$section_content['button_label']   = get_theme_mod( 'shopup_cta_button_label' );
$section_content['button_link']    = get_theme_mod( 'shopup_cta_button_link' );
$section_content['button_link']    = ! empty( $section_content['button_link'] ) ? $section_content['button_link'] : '#';

$section_content = apply_filters( 'shopup_cta_section_content', $section_content );

shopup_render_cta_section( $section_content );

/**
 * Render cta section
 */
function shopup_render_cta_section( $section_content ) {
	?>
	<section id="shopup_cta_section" class="shopup-frontpage-section shopup-cta-section shopup-half-grey-background">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_cta_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="shopup-cta-wrapper">
				<?php if ( ! empty( $section_content['background_url'] ) ) { ?>
					<div class="shopup-cta-background-img">
						<img src="<?php echo esc_url( $section_content['background_url'] ); ?>">
					</div>
				<?php } ?>
				<div class="shopup-cta-text">
					<h4 class="shopup-cta-subhead"><?php echo esc_html( $section_content['subtitle'] ); ?></h4>
					<h3 class="shopup-cta-head"><?php echo esc_html( $section_content['title'] ); ?></h3>
				</div>
				<?php if ( ! empty( $section_content['center_url'] ) ) { ?>
					<div class="shopup-cta-img">
						<img src="<?php echo esc_url( $section_content['center_url'] ); ?>">
					</div>
				<?php } ?>
				<div class="shopup-cta-details">
					<p><?php echo wp_kses_post( $section_content['content'] ); ?></p>
					<?php if ( ! empty( $section_content['button_label'] ) ) { ?>
						<div class="shopup-cta-button shopup-button shopup-button-alternate">
							<a href="<?php echo esc_url( $section_content['button_link'] ); ?>"><?php echo esc_html( $section_content['button_label'] ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
