<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package ShopUp
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function shopup_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'product_grid' => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'shopup_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function shopup_woocommerce_scripts() {
	wp_enqueue_style( 'shopup-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), SHOPUP_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'shopup-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'shopup_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function shopup_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'shopup_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function shopup_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'shopup_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'shopup_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function shopup_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'shopup_woocommerce_wrapper_before' );

if ( ! function_exists( 'shopup_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function shopup_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'shopup_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'shopup_woocommerce_header_cart' ) ) {
			shopup_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'shopup_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function shopup_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		shopup_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'shopup_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'shopup_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function shopup_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'shopup' ); ?>">
			<?php
			$item_count_text = WC()->cart->get_cart_contents_count();
			?>
			<span class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="count"><?php echo esc_html( $item_count_text ); ?></span></span> 
		</a>
		<?php
	}
}

if ( ! function_exists( 'shopup_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function shopup_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php shopup_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_shop_loop_item_title', 'shopup_woocommerce_template_loop_add_to_cart_before', 8 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 8 );
add_action( 'woocommerce_shop_loop_item_title', 'shopup_woocommerce_template_loop_add_to_cart_after', 8 );
add_action( 'woocommerce_shop_loop_item_title', 'shopup_woocommerce_template_loop_product_link_open_after', 9 );
add_action( 'woocommerce_shop_loop_item_title', 'shopup_woocommerce_template_loop_product_title_before', 9 );

add_action( 'woocommerce_after_shop_loop_item_title', 'shopup_woocommerce_template_loop_rating_price_before', 4 );
add_action( 'woocommerce_after_shop_loop_item_title', 'shopup_woocommerce_template_loop_rating_price_after', 11 );
add_action( 'woocommerce_after_shop_loop_item_title', 'shopup_woocommerce_template_loop_product_title_after', 11 );

add_action( 'woocommerce_before_shop_loop_item', 'shopup_woocommerce_template_loop_product_link_open_before', 9 );

function shopup_woocommerce_template_loop_product_link_open_before() {
	?>
	<div class="shopup-product-image">
	<?php
}

function shopup_woocommerce_template_loop_add_to_cart_before() {
	?>
	<div class="shopup-add-to-cart-wrapper">
	<?php
}
function shopup_woocommerce_template_loop_add_to_cart_after() {
	?>
	</div><!-- .shopup-add-to-cart-wrapper -->
	<?php
}
function shopup_woocommerce_template_loop_product_link_open_after() {
	?>
	</div><!-- .shopup-product-image -->
	<?php
}
function shopup_woocommerce_template_loop_product_title_before() {
	?>
	<div class="shopup-product-description">
	<?php
}
function shopup_woocommerce_template_loop_rating_price_before() {
	?>
	<div class="shopup-price-and-rating">
	<?php
}
function shopup_woocommerce_template_loop_rating_price_after() {
	?>
	</div><!-- .shopup-price-and-rating -->
	<?php
}
function shopup_woocommerce_template_loop_product_title_after() {
	?>
	</div><!-- .shopup-product-description -->
	<?php
}

function shopup_yith_hooks() {
	add_action( 'woocommerce_shop_loop_item_title', 'shopup_woocommerce_template_loop_additional_button_before', 8 );

	if ( class_exists( 'YITH_WCWL' ) ) {
		// Wishlist.
		$yith_wcwl_frontend = YITH_WCWL_Frontend();
		remove_action( 'woocommerce_after_shop_loop_item', array( $yith_wcwl_frontend, 'print_button' ), 15 );
		add_action( 'woocommerce_shop_loop_item_title', array( $yith_wcwl_frontend, 'print_button' ), 8 );
	}

	if ( class_exists( 'YITH_WCQV' ) ) {
		// Quick View.
		$yith_wcqv_frontend = YITH_WCQV_Frontend();
		remove_action( 'woocommerce_after_shop_loop_item', array( $yith_wcqv_frontend, 'yith_add_quick_view_button' ), 15 );
		add_action( 'woocommerce_shop_loop_item_title', array( $yith_wcqv_frontend, 'yith_add_quick_view_button' ), 8 );
	}

	add_action( 'woocommerce_shop_loop_item_title', 'shopup_woocommerce_template_loop_additional_button_after', 8 );
}
add_action( 'init', 'shopup_yith_hooks', 15 );

function shopup_woocommerce_template_loop_additional_button_before() {
	?>
	<div class="additional-button-wrapper">
	<?php
}
function shopup_woocommerce_template_loop_additional_button_after() {
	?>
	</div><!-- .additional-button-wrapper -->
	<?php
}
