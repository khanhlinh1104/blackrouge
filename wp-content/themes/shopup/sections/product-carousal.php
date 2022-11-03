<?php
if ( ! class_exists( 'WooCommerce' ) || ! get_theme_mod( 'shopup_enable_product_carousal_section', false ) ) {
	return;
}

$content_type  = get_theme_mod( 'shopup_product_carousal_content_type', 'featured' );
$product_count = get_theme_mod( 'shopup_product_carousal_count', 4 );
$column_count  = get_theme_mod( 'shopup_product_carousal_column', 4 );

switch ( $content_type ) {
	case 'product':
		$product_ids = array();

		for ( $i = 1; $i <= $product_count; $i++ ) {
			$item_id = get_theme_mod( 'shopup_product_carousal_content_product_' . $i );
			if ( ! empty( $item_id ) ) {
				$product_ids[] = $item_id;
			}
		}

		$args = array(
			'post_type'           => 'product',
			'posts_per_page'      => $product_count,
			'post__in'            => (array) $product_ids,
			'orderby'             => 'post__in',
			'ignore_sticky_posts' => true,
		);
		break;

	case 'product_cat':
		$product_cat_id = get_theme_mod( 'shopup_product_carousal_content_category' );

		$args = array(
			'post_type'           => 'product',
			'posts_per_page'      => absint( $product_count ),
			'ignore_sticky_posts' => true,
			'tax_query'           => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'id',
					'terms'    => $product_cat_id,
				),
			),
		);
		break;

	case 'featured':
		$args = array(
			'post_type'           => 'product',
			'posts_per_page'      => $product_count,
			'ignore_sticky_posts' => true,
			'tax_query'           => array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'featured',
					'operator' => 'IN',
				),
			),
		);
		break;

	case 'recent_product':
		$args = array(
			'post_type'           => 'product',
			'posts_per_page'      => $product_count,
			'ignore_sticky_posts' => true,
		);
		break;

	default:
		break;
}

$args = apply_filters( 'shopup_product_carousal_section_args', $args );

shopup_render_product_carousal_section( $args );

/**
 * Featured product section
 */
function shopup_render_product_carousal_section( $args ) {
	$section_title = get_theme_mod( 'shopup_product_carousal_title', __( 'Featured Products', 'shopup' ) );
	$section_text  = get_theme_mod( 'shopup_product_carousal_text' );
	$ul_class      = 'products product-ul shopup-featured-grid-two-product product-three-two-carousel';
	$arrow_class   = 'product_slide_three_arrow';

	$query = new WP_Query( $args );
	?>
	<section id="shopup_product_carousal_section" class="shopup-frontpage-section shopup-product-grid-two-section">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_product_carousal_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="section-header-subtitle section-header-subtitle-left">
				<div class="section-header-subtitle-wrapper">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
				</div>   
				<?php if ( $query->have_posts() ) : ?>
					<div class="product-grid-two-carousel-navigation">
						<button class="fas fa-chevron-left latest-<?php echo esc_attr( $arrow_class ); ?>-left slick-arrow-left"></button>
						<button class="fas fa-chevron-right latest-<?php echo esc_attr( $arrow_class ); ?>-right slick-arrow-next"></button>
					</div>        
				<?php endif; ?>
			</div>
			<?php if ( $query->have_posts() ) : ?>
				<div class="shopup-section-body">
					<div class="shopup-product-grid-three-section-wrapper">
						<ul class="<?php echo esc_attr( $ul_class ); ?>">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								global $product;
								?>
								<li class="product">
									<div class="shopup-product">
										<div class="product-img">
											<a href="<?php the_permalink(); ?>">
												<?php echo woocommerce_get_product_thumbnail(); ?>
											</a>
											<?php if ( class_exists( 'YITH_WCWL' ) || class_exists( 'YITH_WCQV' ) ) { ?>
												<div class="product-meta">
													<ul>
														<?php
														if ( class_exists( 'YITH_WCWL' ) ) {
															echo '<li>' . do_shortcode( '[yith_wcwl_add_to_wishlist product_id=' . get_the_ID() . ']' ) . '</li>';
														}
														if ( class_exists( 'YITH_WCQV' ) ) {
															echo '<li><a href="#" class="button yith-wcqv-button" data-product_id="' . esc_attr( get_the_ID() ) . '"></a></li>';
														}
														?>
													</ul>
												</div>
											<?php } ?>
										</div>
										<div class="product-details">
											<h3 class="product-name">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<span class="prices"><?php echo $product->get_price_html(); ?></span>
											<div class="shopup-readmore shopup-button shopup-button-noborder-alternate">
												<a href="<?php echo esc_url( do_shortcode( '[add_to_cart_url id="' . get_the_ID() . '"]' ) ); ?>">Add to cart</a>
											</div>
										</div>
									</div>
								</li>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</ul> 
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<?php
}
