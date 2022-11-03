<?php
if ( ! get_theme_mod( 'shopup_enable_deals_section', false ) ) {
	return;
}

$section_content            = array();
$section_content['title']   = get_theme_mod( 'shopup_deals_title', __( 'Deals of the day', 'shopup' ) );
$section_content['content'] = get_theme_mod( 'shopup_deals_content' );

$section_content = apply_filters( 'shopup_deals_section_content', $section_content );

shopup_render_normal_deals_section( $section_content );

/**
 * Render normal deals section
 */
function shopup_render_normal_deals_section( $section_content ) {
	?>
	<section id="shopup_deals_section" class="shopup-frontpage-section shopup-deals-of-day-section shopup-deals-of-day-one shopup-dark-background">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_deals_section' );
		endif;
		?>
		<?php
		$deals_bg_image     = get_theme_mod( 'shopup_deals_background_image' );
		$deals_deadline     = get_theme_mod( 'shopup_deals_deadline', date( 'Y-m-d 23:59:59' ) );
		$deals_button_label = get_theme_mod( 'shopup_deals_button_label', __( 'Shop Now', 'shopup' ) );
		$deals_button_link  = get_theme_mod( 'shopup_deals_button_link' );
		$deals_button_link  = ! empty( $deals_button_link ) ? $deals_button_link : '#';
		
		if ( !empty( $deals_bg_image ) ): ?>
			<div class="deal-one-img">
				<img src="<?php echo esc_url( $deals_bg_image ); ?>" alt="<?php echo esc_attr( $section_content['title'] ); ?>">
			</div>
		<?php endif ?>
		<div class="ascendoor-wrapper">
			<div class="shopup-section-body">
				<div class="shopup-deal-one-detail-wrapper">
					<div class="section-header-subtitle">
						<h3 class="section-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_content['content'] ); ?></p>
					</div>
					<div class="shopup-deals-of-day-single">
						<div class="product-detail">
							<?php if ( ! empty( $deals_deadline ) && $deals_deadline >= date( 'Y-m-d 23:59:59' ) ) { ?>
								<div class="shopup-countdown">
									<div class="shopup-sale-end-time" data-date="<?php echo esc_attr( $deals_deadline ); ?>">
										<span class="cdown day"></span>
										<span class="cdown hour"></span>
										<span class="cdown minutes"></span>
										<span class="cdown second"></span>
									</div>
								</div>
							<?php } ?>
							<?php if ( ! empty( $deals_button_label ) ) { ?>
								<div class="shopup-button">
									<a href="<?php echo esc_url( $deals_button_link ); ?>"><?php echo esc_html( $deals_button_label ); ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
}
