<?php
if ( ! get_theme_mod( 'shopup_enable_categories_section', false ) ) {
	return;
}
$section_content = array();

$section_content['title']    = get_theme_mod( 'shopup_categories_title', __( 'Product Categories', 'shopup' ) );
$section_content['text']     = get_theme_mod( 'shopup_categories_text' );
$section_content['taxonomy'] = get_theme_mod( 'shopup_taxonomy_name', 'product_cat' );
$section_content['count']    = get_theme_mod( 'shopup_categories_count', 3 );

$section_content = apply_filters( 'shopup_categories_section_content', $section_content );

shopup_render_categories_section( $section_content );

/**
 * Render categories section.
 */
function shopup_render_categories_section( $section_content ) {
	$categories_button_label = get_theme_mod( 'shopup_categories_button_label', __( 'Shop Now', 'shopup' ) );

	for ( $i = 1; $i <= $section_content['count']; $i++ ) {
		$item_id      = get_theme_mod( 'shopup_categories_content_' . $section_content['taxonomy'] . '_' . $i );
		$content_id[] = $item_id;
		if ( 'product_cat' !== $section_content['taxonomy'] ) {
			$cat_image[ $item_id ] = get_theme_mod( 'shopup_categories_image_' . $i );
		}
	}

	$args = array(
		'taxonomy'   => $section_content['taxonomy'],
		'include'    => (array) $content_id,
		'orderby'    => 'include',
		'order'      => 'asc',
		'hide_empty' => false,
		'number'     => $section_content['count'],
	);

	$terms = get_terms( $args );
	?>
	<section id="shopup_categories_section" class="shopup-frontpage-section shopup-categories-section">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_categories_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="section-header-subtitle">
				<h3 class="section-title"><?php echo esc_html( $section_content['title'] ); ?></h3>
				<p class="section-subtitle"><?php echo esc_html( $section_content['text'] ); ?></p>
			</div>
			<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) { ?>
				<div class="shopup-section-body">
					<div class="shopup-categories-section-wrapper">
						<?php
						$i = 0;
						foreach ( $terms as $value ) {
							$term_link = get_term_link( $value, $section_content['taxonomy'] );
							$cat_class = 'cat-big-single';

							$cat_btn_class = '';
							if ( 0 !== $i ) {
								$cat_class     = 'cat-small-single';
								$cat_btn_class = 'shopup-button-noborder-alternate';
							}
							?>
							<div class="shopup-categories-single <?php echo esc_attr( $cat_class ); ?>">
								<div class="shopup-categories-img">
									<?php if ( 'product_cat' === $section_content['taxonomy'] ) { ?>
										<img src="<?php echo esc_url( wp_get_attachment_url( get_term_meta( $value->term_id, 'thumbnail_id', true ) ) ); ?>" alt="<?php echo esc_attr( $value->name ); ?>">
									<?php } elseif ( ! empty( $cat_image[ $value->term_id ] ) ) { ?>
										<img src="<?php echo esc_url( $cat_image[ $value->term_id ] ); ?>" alt="<?php echo esc_attr( $value->name ); ?>">
									<?php } ?>
								</div>
								<div class="shopup-categories-detail">
									<h3 class="shopup-categories-title"><?php echo esc_html( $value->name ); ?></h3>
									<div class="shopup-button <?php echo esc_attr( $cat_btn_class ); ?>">
										<a href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html( $categories_button_label ); ?></a>
									</div>
								</div>
							</div>
							<?php
							$i++;
						}
						?>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
