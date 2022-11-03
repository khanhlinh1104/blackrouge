<?php
if ( ! get_theme_mod( 'shopup_enable_two_col_promo_section', false ) ) {
	return;
}
?>
<section id="shopup_two_col_promo_section" class="shopup-frontpage-section shopup-deals-section no-section-padding">
	<?php
	if ( is_customize_preview() ) :
		shopup_section_link( 'shopup_two_col_promo_section' );
	endif;
	?>
	<div class="shopup-section-body">
		<div class="shopup-deals-section-wrapper">
			<?php
			for ( $i = 1; $i <= 2; $i++ ) {
				$col_title     = get_theme_mod( 'shopup_two_col_promo_title_' . $i );
				$col_content   = get_theme_mod( 'shopup_two_col_promo_content_' . $i );
				$col_bg_url    = get_theme_mod( 'shopup_two_col_promo_background_image_' . $i );
				$col_btn_label = get_theme_mod( 'shopup_two_col_promo_button_label_' . $i );
				$col_btn_link  = get_theme_mod( 'shopup_two_col_promo_button_link_' . $i );
				$col_btn_link  = ! empty( $col_btn_link ) ? $col_btn_link : '#';
				?>
				<div class="shopup-deals-single">
					<div class="shopup-deals-img">
					<?php if ( !empty( $col_bg_url ) ): ?>
						<img src="<?php echo esc_url( $col_bg_url ); ?>" alt="<?php echo esc_attr( $col_title ); ?>">
					<?php endif; ?>
					</div>
					<div class="shopup-deals-detail">
						<h3 class="shopup-deals-title"><?php echo esc_html( $col_title ); ?></h3>
						<h4 class="shopup-deals-sub-title"><?php echo esc_html( $col_content ); ?></h4>
						<?php if ( ! empty( $col_btn_label ) ) { ?>
							<div class="shopup-button">
								<a href="<?php echo esc_url( $col_btn_link ); ?>"><?php echo esc_html( $col_btn_label ); ?></a>
							</div>
						<?php } ?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</section>
