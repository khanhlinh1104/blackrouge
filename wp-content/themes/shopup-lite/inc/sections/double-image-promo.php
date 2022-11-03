<?php
if ( ! get_theme_mod( 'shopup_lite_enable_double_image_promo_section', false ) ) {
	return;
}

$section_content = array();

$section_title   = get_theme_mod( 'shopup_lite_double_image_promo_section_title', __( 'Season Sale', 'shopup-lite' ) );
$section_content = get_theme_mod( 'shopup_lite_double_image_promo_section_content' );
$button_label    = get_theme_mod( 'shopup_lite_double_image_promo_button_label' );
$button_link     = get_theme_mod( 'shopup_lite_double_image_promo_button_link' );
$button_link     = ! empty( $button_link ) ? $button_link : '#';

$promos = array();
for ( $i = 1; $i <= 2; $i++ ) {
	$promos[ $i ]['title']    = get_theme_mod( 'shopup_lite_double_image_promo_title_' . $i );
	$promos[ $i ]['subtitle'] = get_theme_mod( 'shopup_lite_double_image_promo_subtitle_' . $i );
	$promos[ $i ]['bg_image'] = get_theme_mod( 'shopup_lite_double_image_promo_background_image_' . $i );
}
?>
<section id="shopup_double_image_promo_section" class="shopup-frontpage-section shopup-double-image-section">
	<?php
	if ( is_customize_preview() ) :
		shopup_section_link( 'shopup_double_image_promo_section' );
	endif;
	?>
	<div class="ascendoor-wrapper">
		<div class="shopup-double-image-section-wrapper">
			<div class="shopup-double-image-slider">
				<?php foreach ( $promos as $promo ) { ?>
					<div class="shopup-double-image-single" data-title="<?php echo esc_attr( $promo['title'] ); ?>" data-subtitle="<?php echo esc_attr( $promo['subtitle'] ); ?>">
						<?php if ( !empty( $promo['bg_image'] ) ): ?>
							<img src="<?php echo esc_url( $promo['bg_image'] ); ?>" alt="<?php echo esc_attr( $promo['title'] ); ?>">
						<?php endif ?>
					</div>
				<?php } ?>
			</div>
			<div class="shopup-double-image-section-detail">
				<h3 class="shopup-double-image-section-title"><?php echo esc_html( $section_title ); ?></h3>
				<p><?php echo esc_html( $section_content ); ?></p>
				<?php if ( ! empty( $button_label ) ) { ?>
					<div class="shopup-button shopup-button-noborder-alternate">
						<a href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
