<?php
/**
 * Front Page Options
 *
 * @package ShopUp
 */

$wp_customize->add_panel(
	'shopup_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'shopup' ),
		'priority' => 130,
	)
);

// Associate Section.
require get_template_directory() . '/inc/customizer/front-page-options/associate.php';

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// Blog Section.
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';

// Categories Section.
require get_template_directory() . '/inc/customizer/front-page-options/categories.php';

// CTA Section.
require get_template_directory() . '/inc/customizer/front-page-options/cta.php';

// Deals Section.
require get_template_directory() . '/inc/customizer/front-page-options/deals.php';

// Features Section.
require get_template_directory() . '/inc/customizer/front-page-options/features.php';

// Instagram Section.
require get_template_directory() . '/inc/customizer/front-page-options/instagram.php';

// Newsletter Section.
require get_template_directory() . '/inc/customizer/front-page-options/newsletter.php';

// Products Section.
require get_template_directory() . '/inc/customizer/front-page-options/product.php';

// Product Carousal Section.
require get_template_directory() . '/inc/customizer/front-page-options/product-carousal.php';

// Two Column Promo Section.
require get_template_directory() . '/inc/customizer/front-page-options/two-col-promo.php';
