<?php

if ( ! get_theme_mod( 'shopup_enable_banner_section', false ) ) {
	return;
}

$content_ids = $btn_label = $btn_link = $section_content = array();

$content_count = get_theme_mod( 'shopup_banner_slide_count', 3 );
$content_type  = get_theme_mod( 'shopup_banner_content', 'page' );

if ( ! in_array( $content_type, array( 'post', 'page', 'product' ) ) ) {
	return;
}

for ( $i = 1; $i <= $content_count; $i++ ) {
	$item_id               = get_theme_mod( 'shopup_banner_content_' . $content_type . '_' . $i );
	$content_ids[]         = $item_id;
	$btn_label[ $item_id ] = get_theme_mod( 'shopup_banner_button_label' . $i, __( 'Shop Now', 'shopup-lite' ) );
	$btn_link[ $item_id ]  = get_theme_mod( 'shopup_banner_button_link' . $i );
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => (array) $content_ids,
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( $content_count ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'excerpt'       => get_the_excerpt(),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'shopup_banner_section_content', $section_content );

	shopup_render_banner_section( $section_content, $btn_label, $btn_link );
endif;

/**
 * Render Banner Section
 */
function shopup_render_banner_section( $section_content, $btn_label, $btn_link ) {
	if ( empty( $section_content ) ) {
		return;
	}
	?>
	<section id="shopup_banner_section" class="shopup-main-banner-section">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_banner_section' );
		endif;
		?>
		<div class="main-slider">
			<?php
			$i = 1;
			foreach ( $section_content as $content ) {
				$item_id              = $content['id'];
				$btn_link[ $item_id ] = ! empty( $btn_link[ $item_id ] ) ? $btn_link[ $item_id ] : $content['permalink'];
				?>
				<div class="shopup-banner-slider-single">
					<div class="shopup-banner-slider-img">
						<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
					</div>
					<div class="shopup-banner-slider-detail">
						<div class="ascendoor-wrapper">
							<div class="shopup-banner-slider-detail-inside">
								<h3 class="shopup-banner-sub-head-title"><?php echo esc_html( sprintf( '%02d', $i ) ); ?>.</h3>
								<h3 class="shopup-banner-head-title"><?php echo esc_html( $content['title'] ); ?></h3>
								<p><?php echo esc_html( $content['excerpt'] ); ?></p>
								<div class="shopup-button banner-slider-btn shopup-button-alternate">
									<?php if ( $btn_label[ $item_id ] ) { ?>
										<a href="<?php echo esc_url( $btn_link[ $item_id ] ); ?>"><?php echo esc_html( $btn_label[ $item_id ] ); ?></a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$i++;
			}
			?>
		</div>
	</section>
	<?php
}
