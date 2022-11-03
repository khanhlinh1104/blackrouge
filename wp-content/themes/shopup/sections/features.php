<?php

if ( ! get_theme_mod( 'shopup_enable_features_section', false ) ) {
	return;
}

$content_ids   = array();
$content_count = get_theme_mod( 'shopup_features_count', 4 );
$content_type  = get_theme_mod( 'shopup_features_content_type', 'page' );

if ( in_array( $content_type, array( 'post', 'page' ) ) ) {

	for ( $i = 1; $i <= $content_count; $i++ ) {
		$content_ids[] = get_theme_mod( 'shopup_features_content_' . $content_type . '_' . $i );
	}

	$args = array(
		'post_type'           => $content_type,
		'post__in'            => $content_ids,
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( $content_count ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'shopup_features_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( $content_count ),
	);
}

$args = apply_filters( 'shopup_features_section_args', $args );

shopup_render_features_section( $args );

/**
 * Render Features Section.
 */
function shopup_render_features_section( $args ) {
	$section_title = get_theme_mod( 'shopup_features_title', 'Our Features' );
	$section_text  = get_theme_mod( 'shopup_features_text' );

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="shopup_features_section" class="shopup-frontpage-section shopup-features-section shopup-grey-background">
			<?php
			if ( is_customize_preview() ) :
				shopup_section_link( 'shopup_features_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $section_text ) ) { ?>
					<div class="section-header-subtitle">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
					</div>
				<?php } ?>
				<div class="shopup-section-body">
					<div class="shopup-features-section-wrapper">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="shopup-features-single">
								<div class="features-icon">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="features-details">
									<h3 class="feature-title"><?php the_title(); ?></h3>
									<p class="feature-details"><?php the_excerpt(); ?></p>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
}
