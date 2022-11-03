<?php

if ( ! get_theme_mod( 'shopup_enable_associate_section', false ) ) {
	return;
}

$section_content          = array();
$section_content['title'] = get_theme_mod( 'shopup_associate_title' );
$section_content['text']  = get_theme_mod( 'shopup_associate_text' );
$section_content['count'] = get_theme_mod( 'shopup_associate_count', 5 );

$section_content = apply_filters( 'shopup_associate_section_content', $section_content );

shopup_render_associate_section( $section_content );

/**
 * Render associate section
 */
function shopup_render_associate_section( $section_content ) {
	?>
	<section id="shopup_associate_section" class="shopup-frontpage-section shopup-brands-slider">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_associate_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_content['title'] ) || ! empty( $section_content['text'] ) ) { ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_content['text'] ); ?></p>
				</div>
			<?php } ?>
			<div class="shopup-section-body">
				<div class="shopup-brands-slider-wrapper brand-slider">
					<?php
					for ( $i = 1; $i <= $section_content['count']; $i++ ) {
						$logo     = get_theme_mod( 'shopup_associate_logo_' . $i );
						$logo_url = get_theme_mod( 'shopup_associate_logo_url_' . $i );
						if ( ! empty( $logo ) ) {
							?>
							<div class="shopup-brand-single">
								<a href="<?php echo esc_url( $logo_url ); ?>"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr__( 'associate-logo', 'shopup' ); ?>"></a>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
