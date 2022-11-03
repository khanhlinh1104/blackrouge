<?php

if ( ! get_theme_mod( 'shopup_enable_blog_section', false ) ) {
	return;
}

$blog_count = get_theme_mod( 'shopup_blog_count', 3 );

$content_ids = $section_content = array();

for ( $i = 1; $i <= $blog_count; $i++ ) {
	$content_ids[] = get_theme_mod( 'shopup_blog_content_post_' . $i );
}

$args = array(
	'post_type'           => 'post',
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( $blog_count ),
	'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$section_content[] = array(
			'id'            => get_the_ID(),
			'title'         => get_the_title(),
			'excerpt'       => get_the_excerpt(),
			'permalink'     => get_the_permalink(),
			'thumbnail_url' => get_the_post_thumbnail_url( get_the_ID(), 'full' ),
		);
	endwhile;
	wp_reset_postdata();

	$section_content = apply_filters( 'shopup_blog_section_content', $section_content );

	shopup_render_blog_section( $section_content );
endif;

/**
 * Render blog section
 */
function shopup_render_blog_section( $section_content ) {
	if ( empty( $section_content ) ) {
		return;
	}
	$blog_title        = get_theme_mod( 'shopup_blog_title', __( 'Blogs', 'shopup' ) );
	$blog_text         = get_theme_mod( 'shopup_blog_text' );
	$blog_button_label = get_theme_mod( 'shopup_blog_button_label', __( 'View All', 'shopup' ) );
	$blog_button_link  = get_theme_mod( 'shopup_blog_button_link' );
	$blog_button_link  = ! empty( $blog_button_link ) ? $blog_button_link : '#';
	?>
	<section id="shopup_blog_section" class="shopup-frontpage-section shopup-blog-section">
		<?php
		if ( is_customize_preview() ) :
			shopup_section_link( 'shopup_blog_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="section-header-subtitle">
				<h3 class="section-title"><?php echo esc_html( $blog_title ); ?></h3>
				<p class="section-subtitle"><?php echo esc_html( $blog_text ); ?></p>
			</div>
			<div class="shopup-section-body">
				<div class="shopup-blog-section-wrapper">
					<?php foreach ( $section_content as $content ) { ?>
						<div class="shopup-blog-single">
							<div class="shopup-blog-img">
								<a href="<?php echo esc_url( $content['permalink'] ); ?>">
									<img src="<?php echo esc_url( $content['thumbnail_url'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>">
								</a>
							</div>
							<div class="shopup-detail">
								<div class="shop-blog-category">
									<?php echo get_the_category_list( ', ', '', $content['id'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</div>
								<h3 class="shopup-blog-title">
									<a href="<?php echo esc_url( $content['permalink'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a>
								</h3>
								<div class="shopup-meta"></div>
								<div class="shopup-description"><?php echo esc_html( $content['excerpt'] ); ?></div>
								<div class="shopup-readmore shopup-button shopup-bordered-button">
									<a href="<?php echo esc_url( $content['permalink'] ); ?>"><?php echo esc_html( get_theme_mod( 'shopup_excerpt_more_text', __( 'Read More', 'shopup' ) ) ); ?></a>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<?php if ( ! empty( $blog_button_label ) ) : ?>
					<div class="shopup-blog-view-all shopup-button">
						<a href="<?php echo esc_url( $blog_button_link ); ?>"><?php echo esc_html( $blog_button_label ); ?></a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
}
