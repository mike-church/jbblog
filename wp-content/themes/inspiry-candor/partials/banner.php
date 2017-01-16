<?php
$inspiry_header_image   = inspiry_get_header_image();
$inspiry_header_image_content = get_theme_mod( 'inspiry_header_image_content' );

if ( ! empty( $inspiry_header_image ) ) :
    ?>
    <div class="banner" role="banner">
        <?php
        $inspiry_banner_post = get_theme_mod( 'inspiry_banner_post' );

        if ( ( 'two' == $inspiry_header_image_content ) && ( 0 < $inspiry_banner_post ) ) :

            $recent_post_args  = array (
                'post_type' => 'post',
                'p' => $inspiry_banner_post,
                'ignore_sticky_posts' => 1,
            );

            // The Query
            $recent_post_query = new WP_Query( $recent_post_args );

            // The Loop
            if ( $recent_post_query->have_posts() ) :
                while ( $recent_post_query->have_posts() ) :
                    $recent_post_query->the_post();
                    ?>
                    <article id="banner-post-<?php the_ID(); ?>" <?php post_class( 'blog-post post-common hidden-xs clearfix' ); ?>>
                        <div class="post-content-wrapper">
                            <header class="entry-header">
                                <?php
                                get_template_part( 'partials/post/entry-title' );
                                get_template_part( 'partials/post/entry-meta' );
                                ?>
                            </header>
                            <div class="entry-summary visible-lg">
                                <p><?php inspiry_excerpt( 20 ); ?></p>
                            </div>
                            <a href="<?php the_permalink(); ?>" rel="bookmark" class="btn read-more-text visible-lg-inline-block"><?php esc_html_e( 'Continue Reading', 'inspiry' ); ?></a>
                        </div>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        <?php elseif ( 'one' == $inspiry_header_image_content ) : ?>
            <div class="hidden-xs">
                <?php get_template_part( 'partials/intro' ); ?>
            </div>
        <?php endif; ?>
        <img src="<?php echo esc_url( $inspiry_header_image ); ?>" alt="">
    </div>
    <?php
endif;
?>