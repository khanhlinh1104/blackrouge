<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ShopUp_Lite
 */

get_header();

if ( is_front_page() && is_home() ) {
	require get_template_directory() . '/home.php';
} elseif ( is_front_page() && ! is_home() ) {
	?>
	<main id="primary" class="site-main">
		<?php
		require get_template_directory() . '/sections/sections.php';

		$homepage_sections = array( 'banner', 'categories', 'product', 'cta', 'product-carousal', 'double-image-promo', 'deals', 'blog', 'newsletter', 'instagram' );
		foreach ( $homepage_sections as $value ) {
			if ( in_array( $value, array( 'banner', 'cta', 'double-image-promo' ) ) ) {
				require get_theme_file_path() . '/inc/sections/' . $value . '.php';
			} else {
				require get_template_directory() . '/sections/' . $value . '.php';
			}
		}
		?>
	</main><!-- #main -->
	<?php
}

if ( true === get_theme_mod( 'shopup_enable_frontpage_content', false ) ) {
	?>
	<div id="content" class="site-content ascendoor-wrapper">
		<div class="ascendoor-page">
			<main id="primary" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
			<?php
			if ( shopup_is_sidebar_enabled() ) {
				get_sidebar();
			}
			?>
		</div>
	</div>
	<?php
}

get_footer();
