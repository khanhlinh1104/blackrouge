<?php
/**
 * The template part for displaying single post content
 *
 * @package Feminine Shop
 * @subpackage feminine-shop
 * @since feminine-shop 1.0
 */
?>

<?php 
    $feminine_shop_archive_year  = get_the_time('Y'); 
    $feminine_shop_archive_month = get_the_time('m'); 
    $feminine_shop_archive_day   = get_the_time('d'); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <h1><?php the_title(); ?></h1>
    <?php if( get_theme_mod( 'feminine_shop_toggle_postdate',true) != '' || get_theme_mod( 'feminine_shop_toggle_author',true) != '' || get_theme_mod( 'feminine_shop_toggle_comments',true) != '' || get_theme_mod( 'feminine_shop_toggle_time',true) != '') { ?>
        <div class="post-info p-2 mb-3">
          <?php if(get_theme_mod('feminine_shop_toggle_postdate',true)==1){ ?>
            <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $feminine_shop_archive_year, $feminine_shop_archive_month, $feminine_shop_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('feminine_shop_toggle_author',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('feminine_shop_single_post_meta_field_separator', '|'));?></span> <i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
          <?php } ?>

          <?php if(get_theme_mod('feminine_shop_toggle_comments',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('feminine_shop_single_post_meta_field_separator', '|'));?></span> <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'feminine-shop'), __('0 Comments', 'feminine-shop'), __('% Comments', 'feminine-shop') ); ?></span>
          <?php } ?>

          <?php if(get_theme_mod('feminine_shop_toggle_time',true)==1){ ?>
            <span><?php echo esc_html(get_theme_mod('feminine_shop_single_post_meta_field_separator', '|'));?></span> <i class="fas fa-clock"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
          <?php } ?>
        </div>
    <?php } ?>
    <?php if(has_post_thumbnail()) { ?>
        <div class="feature-box">
            <img class="page-image" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?> post thumbnail image">
            <hr>
        </div>
    <?php } ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <?php if(get_theme_mod('feminine_shop_toggle_tags',true)==1){ ?>
        <div class="tags-bg p-2 mt-3 mb-3">
            <?php the_tags(); ?>
        </div>
    <?php } ?>
        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
        comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'feminine-shop' ),
            ) );
        } elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'feminine-shop' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'feminine-shop' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'feminine-shop' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'feminine-shop' ) . '</span> ' .
                    '<span class="post-title">%title</span>',
            ) );
        }
    ?>
    <?php get_template_part('template-parts/related-posts'); ?>
</article>