<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ShopUp
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shopup_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = shopup_sidebar_layout();

	if ( get_theme_mod( 'shopup_enable_top_bar', true ) ) {
		$classes[] = 'topbar-active';
	}

	return $classes;
}
add_filter( 'body_class', 'shopup_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function shopup_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'shopup_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function shopup_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'shopup' ) );
	$args    = array( 'numberposts' => -1 );
	$posts   = get_posts( $args );

	foreach ( $posts as $post ) {
		$id             = $post->ID;
		$title          = $post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function shopup_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'shopup' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function shopup_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'shopup' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

/**
 * Get all list of taxonomies name.
 */
function shopup_get_taxonomy_choices() {
	$choices = array(
		'category' => esc_html__( 'Post Categories', 'shopup' ),
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$choices = array_merge(
			$choices,
			array(
				'product_cat' => esc_html__( 'Product Categories', 'shopup' ),
			)
		);
	}

	return $choices;
}

/**
 * Choices for customizer Banner content type
 */
function shopup_get_banner_choices() {
	$choices = array(
		'page' => esc_html__( 'Page', 'shopup' ),
		'post' => esc_html__( 'Post', 'shopup' ),
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$choices = array_merge(
			$choices,
			array(
				'product' => esc_html__( 'Product', 'shopup' ),
			)
		);
	}

	return $choices;
}

/**
 * Choices for trending topics.
 */
function shopup_get_trending_topics_choices() {
	$choices = array(
		'post'     => esc_html__( 'Post', 'shopup' ),
		'page'     => esc_html__( 'Page', 'shopup' ),
		'category' => esc_html__( 'Post Categories', 'shopup' ),
	);

	if ( class_exists( 'WooCommerce' ) ) {
		$choices = array_merge(
			$choices,
			array(
				'product_cat' => esc_html__( 'Product Categories', 'shopup' ),
			)
		);
	}

	return $choices;
}

/**
 * Get all product categories for customizer Product Category content type
 */
function shopup_get_product_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'shopup' ) );
	$args    = array(
		'taxonomy'   => 'product_cat',
		'orderby'    => 'name',
		'order'      => 'asc',
		'hide_empty' => false,
	);

	$product_cats = get_terms( $args );
	if ( ! empty( $product_cats ) && ! is_wp_error( $product_cats ) ) {
		foreach ( $product_cats as $product_cat ) {
			$choices[ $product_cat->term_id ] = $product_cat->name;
		}
	}
	return $choices;
}

/**
 * Get all products for customizer Product content type
 */
function shopup_get_product_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'shopup' ) );
	$loop    = new WP_Query(
		array(
			'post_type'      => array( 'product' ),
			'posts_per_page' => -1,
		)
	);
	while ( $loop->have_posts() ) :
		$loop->the_post();
		$choices[ get_the_ID() ] = get_the_title();
	endwhile;
	wp_reset_postdata();
	return $choices;
}

if ( ! function_exists( 'shopup_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function shopup_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'shopup_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'shopup_excerpt_length', 999 );

if ( ! function_exists( 'shopup_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function shopup_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'shopup_excerpt_more' );

if ( ! function_exists( 'shopup_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function shopup_sidebar_layout() {
		$sidebar_position      = get_theme_mod( 'shopup_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'shopup_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'shopup_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$sidebar_position = $sidebar_position_post;
		} elseif ( is_page() ) {
			$sidebar_position = $sidebar_position_page;
		}

		return $sidebar_position;
	}
}

if ( ! function_exists( 'shopup_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function shopup_is_sidebar_enabled() {
		$sidebar_position      = get_theme_mod( 'shopup_sidebar_position', 'right-sidebar' );
		$sidebar_position_post = get_theme_mod( 'shopup_post_sidebar_position', 'right-sidebar' );
		$sidebar_position_page = get_theme_mod( 'shopup_page_sidebar_position', 'right-sidebar' );

		$sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $sidebar_position ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_post ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_page ) {
				$sidebar_enabled = false;
			}
		}
		return $sidebar_enabled;
	}
}

if ( ! function_exists( 'shopup_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function shopup_get_homepage_sections() {
		$sections = array(
			'banner'           => esc_html__( 'Banner Section', 'shopup' ),
			'product'          => esc_html__( 'Product Section', 'shopup' ),
			'categories'       => esc_html__( 'Categories Section', 'shopup' ),
			'two-col-promo'    => esc_html__( 'Two Column Promo', 'shopup' ),
			'product-carousal' => esc_html__( 'Product Carousal', 'shopup' ),
			'deals'            => esc_html__( 'Deals Section', 'shopup' ),
			'associate'        => esc_html__( 'Associate Section', 'shopup' ),
			'cta'              => esc_html__( 'CTA Section', 'shopup' ),
			'features'         => esc_html__( 'Features Section', 'shopup' ),
			'blog'             => esc_html__( 'Blog Section', 'shopup' ),
			'newsletter'       => esc_html__( 'Newsletter Section', 'shopup' ),
			'instagram'        => esc_html__( 'Instagram Section', 'shopup' ),
		);
		return $sections;
	}
}

if ( ! function_exists( 'shopup_get_default_color' ) ) {
	/**
	 * Returns default colors.
	 */
	function shopup_get_default_color() {
		$color['primary'] = '#fe411b';
		return $color;
	}
}

function shopup_section_link( $section_id ) {
	$section_name      = str_replace( 'shopup_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

function shopup_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}
			.section-link-title {
				padding: 0 10px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'shopup_section_link_css' );

/**
 * Breadcrumb.
 */
function shopup_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'shopup_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'shopup_breadcrumb', 'shopup_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function shopup_breadcrumb_trail_print_styles() {
	$breadcrumb_separator = get_theme_mod( 'shopup_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'shopup_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'shopup_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function shopup_render_posts_pagination() {
	$is_pagination_enabled = get_theme_mod( 'shopup_enable_pagination', true );
	if ( $is_pagination_enabled ) {
		$pagination_type = get_theme_mod( 'shopup_pagination_type', 'default' );
		if ( 'default' === $pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'shopup_posts_pagination', 'shopup_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function shopup_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'shopup_post_navigation', 'shopup_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function shopup_output_footer_copyright_content() {
	$theme_data = wp_get_theme();
	$search     = array( '[the-year]', '[site-link]' );
	$replace    = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
	/* translators: 1: Year, 2: Site Title with home URL. */
	$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'shopup' ), '[the-year]', '[site-link]' );
	$copyright_text    = get_theme_mod( 'shopup_footer_copyright_text', $copyright_default );
	$copyright_text    = str_replace( $search, $replace, $copyright_text );
	$copyright_text   .= esc_html( ' | ' . $theme_data->get( 'Name' ) ) . '&nbsp;' . esc_html__( 'by', 'shopup' ) . '&nbsp;<a target="_blank" href="' . esc_url( $theme_data->get( 'AuthorURI' ) ) . '">' . esc_html( ucwords( $theme_data->get( 'Author' ) ) ) . '</a>';
	/* translators: %s: WordPress.org URL */
	$copyright_text .= sprintf( esc_html__( ' | Powered by %s', 'shopup' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'shopup' ) ) . '" target="_blank">WordPress</a>. ' );
	?>
	<div class="copyright">
		<span><?php echo wp_kses_post( $copyright_text ); ?></span>					
	</div>
	<?php
}
add_action( 'shopup_footer_copyright', 'shopup_output_footer_copyright_content' );


if ( ! function_exists( 'shopup_get_categories_dropdown' ) ) {
	/**
	 * Renders header category dropdown
	 */
	function shopup_get_categories_dropdown() {
		$args = array(
			'hide_empty' => false,
			'parent'     => 0,
			'count'      => true,
		);

		$product_categories = get_terms( 'product_cat', $args );
		?>
		<div class="ascen__category-menu-wrap ascen__category-dropdown-hide ascen__category-menu-with-header-menu">
			<div class="ascen__category-menu-title">
				<button class="category-head"><i class="fas fa-bars"></i><?php echo esc_html( get_theme_mod( 'shopup_header_categories_dropdown_title', __( 'Categories', 'shopup' ) ) ); ?></button>
			</div>
			<?php if ( $product_categories ) { ?>
				<div class="ascen__category-menu-toggle ascen__one-line-active">
					<ul>
						<?php
						foreach ( $product_categories as $cat ) {
							if ( 'uncategorized' !== $cat->slug ) {
								?>
								<li class="ascen__category-menu-item ascen__category-menu-drop">
									<a href="<?php echo esc_url( get_term_link( $cat, $cat->taxonomy ) ); ?>">
										<span class="category-menu-product-name"><?php echo esc_html( $cat->name ); ?></span>
										<span class="category-menu-product-count">
											<?php
											printf(
												/* translators: %d: product count. */
												esc_html( _n( '%d item', '%d items', $cat->count, 'shopup' ) ),
												number_format_i18n( $cat->count ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											);
											?>
										</span>
									</a>
								</li>
								<?php
							}
						}
						?>
					</ul>
				</div>
			<?php } ?>
		</div>
		<?php
	}
}
