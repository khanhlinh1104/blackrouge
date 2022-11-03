<?php
if ( ! class_exists( 'WooCommerce' ) || ! get_theme_mod( 'shopup_enable_product_section', false ) ) {
	return;
}

$content_type  = get_theme_mod( 'shopup_product_content_type', 'product' );
$product_count = get_theme_mod( 'shopup_product_count', 4 );
$column_count  = get_theme_mod( 'shopup_product_column', 4 );

switch ( $content_type ) {
	case 'product':
		$product_ids = array();

		for ( $i = 1; $i <= $product_count; $i++ ) {
			$item_id = get_theme_mod( 'shopup_product_content_product_' . $i );
			if ( ! empty( $item_id ) ) {
				$product_ids[] = $item_id;
			}
		}

		$product_shortcode = '[products limit="' . $product_count . '" columns="' . $column_count . '" ids="' . implode( ',', $product_ids ) . '" visibility="visible"]';
		break;

	case 'product_cat':
		$product_cat_id = get_theme_mod( 'shopup_product_content_category' );

		$product_term = get_term_by( 'id', $product_cat_id, 'product_cat' );

		$product_shortcode = '[products limit="' . $product_count . '" columns="' . $column_count . '" category="' . $product_term->slug . '" visibility="visible"]';
		break;

	case 'featured':
		$product_shortcode = '[products limit="' . $product_count . '" columns="' . $column_count . '" visibility="featured"]';
		break;

	case 'recent_product':
		$product_shortcode = '[products limit="' . $product_count . '" columns="' . $column_count . '" orderby="id" order="DESC" visibility="visible"]';
		break;

	default:
		break;
}

shopup_render_product_section( $product_shortcode );

/**
 * Render product section
 */
function shopup_render_product_section( $product_shortcode ) {
	$section_title = get_theme_mod( 'shopup_product_title', __( 'Our Products', 'shopup' ) );
	$section_text  = get_theme_mod( 'shopup_product_text' );
	$button_label  = get_theme_mod( 'shopup_product_button_label', __( 'View all', 'shopup' ) );
	$button_link   = get_theme_mod( 'shopup_product_button_link' );
	$button_link   = ! empty( $button_link ) ? $button_link : '#';
	?>
	<section id="shopup_product_section" class="shopup-frontpage-section shopup-product-grid-one-section">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_product_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php if ( ! empty( $section_title ) || ! empty( $section_text ) ) { ?>
				<div class="section-header-subtitle">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
				</div>
			<?php } ?>
			<div class="shopup-section-body">
				<div class="shopup-product-grid-one-section-wrapper">
					<?php echo do_shortcode( $product_shortcode ); ?> 
				</div>
			</div>
			<?php if ( ! empty( $button_label ) ) { ?>
				<div class="bottom-viewall-button shopup-button">
					<a href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
