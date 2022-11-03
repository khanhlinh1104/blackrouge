<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ShopUp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'right-sidebar' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'shopup' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="top-header-part">
			<div class="ascendoor-wrapper">
				<div class="top-header-part-wrapper">
					<div class="top-header-left-part">
						<div class="site-branding">
							<?php
							the_custom_logo();
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
							else :
								?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
							endif;
							$shopup_description = get_bloginfo( 'description', 'display' );
							if ( $shopup_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $shopup_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
					</div>
					<div class="top-header-right-part">
						<?php if ( get_theme_mod( 'shopup_enable_search_form', true ) ) { ?>
							<div class="header-search">
								<?php get_search_form(); ?>
							</div>
						<?php } ?>
						<?php if ( class_exists( 'WooCommerce' ) ) { ?>
							<div class="cart-part">
								<div class="header-cart">
									<?php shopup_woocommerce_header_cart(); ?>
								</div>
								<div class="header-user">
									<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>" title="<?php esc_attr_e( 'Account', 'shopup' ); ?>"></a>
								</div>
								<?php if ( class_exists( 'YITH_WCWL' ) ) { ?>
									<div class="header-wishlist">
										<a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" title="<?php esc_attr_e( 'View your wishlist', 'shopup' ); ?>"></a>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-header-outer-wrapper">
			<div class="bottom-header-part">
				<div class="ascendoor-wrapper">
					<div class="bottom-header-part-wrapper">
						<div class="navigation-part">
							<?php
							if ( class_exists( 'WooCommerce' ) ) {
								echo shopup_get_categories_dropdown();
							}
							?>
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span></span>
									<span></span>
									<span></span>
								</button>
								<div class="main-navigation-links">
									<?php
									if ( has_nav_menu( 'primary' ) ) {
										wp_nav_menu(
											array(
												'theme_location' => 'primary',
											)
										);
									}
									?>
								</div>
							</nav><!-- #site-navigation -->
						</div>
						<?php if ( get_theme_mod( 'shopup_enable_social_menu', true ) ) { ?>
							<div class="social-icons-part">
								<?php
								if ( has_nav_menu( 'social' ) ) {
									wp_nav_menu(
										array(
											'menu_class'  => 'menu social-links',
											'link_before' => '<span class="screen-reader-text">',
											'link_after'  => '</span>',
											'theme_location' => 'social',
										)
									);
								}
								?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<?php if ( ! is_front_page() || is_home() ) { ?>
		<div id="content" class="site-content ascendoor-wrapper">
			<div class="ascendoor-page">
	<?php } ?>
