<?php
/**
 * Active Callbacks
 *
 * @package ShopUp
 */

// Theme Options.
function shopup_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_pagination' )->value() );
}
function shopup_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_breadcrumb' )->value() );
}

// Associate section.
function shopup_is_associate_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_associate_section' )->value() );
}

// Banner section.
function shopup_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_banner_section' )->value() );
}
function shopup_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_banner_content' )->value();
	return ( shopup_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function shopup_is_banner_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_banner_content' )->value();
	return ( shopup_is_banner_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function shopup_is_banner_section_and_content_type_product_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_banner_content' )->value();
	return ( shopup_is_banner_section_enabled( $control ) && ( 'product' === $content_type ) );
}

// Categories Section.
function shopup_is_categories_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_categories_section' )->value() );
}
function shopup_is_categories_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_taxonomy_name' )->value();
	return ( shopup_is_categories_section_enabled( $control ) && ( 'category' === $content_type ) );
}
function shopup_is_categories_section_and_content_type_product_cat_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_taxonomy_name' )->value();
	return ( shopup_is_categories_section_enabled( $control ) && ( 'product_cat' === $content_type ) );
}
function shopup_is_categories_section_and_content_type_course_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_taxonomy_name' )->value();
	return ( shopup_is_categories_section_enabled( $control ) && ( 'course_category' === $content_type ) );
}
function shopup_is_categories_section_and_post_course_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_taxonomy_name' )->value();
	return ( shopup_is_categories_section_enabled( $control ) && ( in_array( $content_type, array( 'category', 'course_category' ) ) ) );
}

// Features section.
function shopup_is_features_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_features_section' )->value() );
}
function shopup_is_features_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_features_content_type' )->value();
	return ( shopup_is_features_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function shopup_is_features_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_features_content_type' )->value();
	return ( shopup_is_features_section_enabled( $control ) && ( 'page' === $content_type ) );
}
function shopup_is_features_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_features_content_type' )->value();
	return ( shopup_is_features_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Two col promo section.
function shopup_is_two_col_promo_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_two_col_promo_section' )->value() );
}

// Product section.
function shopup_is_product_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_product_section' )->value() );
}
function shopup_is_product_section_and_content_type_product_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_product_content_type' )->value();
	return ( shopup_is_product_section_enabled( $control ) && ( 'product' === $content_type ) );
}
function shopup_is_product_section_and_content_type_product_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_product_content_type' )->value();
	return ( shopup_is_product_section_enabled( $control ) && ( 'product_cat' === $content_type ) );
}

// Deals section.
function shopup_is_deals_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_deals_section' )->value() );
}

// CTA section.
function shopup_is_cta_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_cta_section' )->value() );
}

// Blog section.
function shopup_is_blog_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_blog_section' )->value() );
}

// Newsletter section.
function shopup_is_newsletter_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_newsletter_section' )->value() );
}

// Instagram Feed section.
function shopup_is_instagram_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_instagram_section' )->value() );
}

// Product Carousal Section.
function shopup_is_product_carousal_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'shopup_enable_product_carousal_section' )->value() );
}
function shopup_is_product_carousal_section_and_content_type_product_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_product_carousal_content_type' )->value();
	return ( shopup_is_product_carousal_section_enabled( $control ) && ( 'product' === $content_type ) );
}
function shopup_is_product_carousal_section_and_content_type_product_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'shopup_product_carousal_content_type' )->value();
	return ( shopup_is_product_carousal_section_enabled( $control ) && ( 'product_cat' === $content_type ) );
}

// Check if static home page is enabled.
function shopup_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
