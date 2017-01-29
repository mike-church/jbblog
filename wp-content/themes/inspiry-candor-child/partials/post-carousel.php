<?php
/*
 *  Featured Post Carousel
 */
$inspiry_featured_posts      = get_theme_mod( 'inspiry_featured_posts' );
$inspiry_featured_posts_tag = get_theme_mod( 'inspiry_featured_posts_tag' );

if ( 'true' == $inspiry_featured_posts && ! empty( $inspiry_featured_posts_tag ) ) {

    $number_of_posts = intval( get_theme_mod( 'inspiry_number_of_featured_posts' ) );
    if ( ! $number_of_posts ) {
        $number_of_posts = 4;
    }

    $featured_posts_args = array (
        'post_type' => 'post',
        'posts_per_page' => $number_of_posts,
        'ignore_sticky_posts' => 1,
        'tag' => $inspiry_featured_posts_tag
    );

    // The Query
    $featured_posts_query = new WP_Query( $featured_posts_args );

    // The Loop
    if ( $featured_posts_query->have_posts() ) {
        ?>
        <div class="owl-carousel post-carousel">
            <?php
            while ( $featured_posts_query->have_posts() ) {

                $featured_posts_query->the_post();

                $article_classes = 'clearfix ' . inspiry_category_color_class();
                ?>
                <div class="feature-post">
                    <article <?php post_class( $article_classes ) ?>>
                        <figure class="post-thumbnail">
                            <a href="<?php the_permalink() ?>">
                            <?php the_post_thumbnail( 'carousel-post-thumb' ); ?>
                            </a>
                        </figure>
                        <div class="inner-wrapper">
                            <header class="entry-header">
                                <span class="cat-links"><?php the_category( ', ' ); ?></span>
                                <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-summary">
                                <p><?php inspiry_excerpt( 13 ); ?></p>
                                <a class="read-more-text" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'inspiry' ); ?></a>
                            </div>
                        </div>
                    </article>
                </div>
                <?php
            }
            wp_reset_postdata();
            ?>
        </div>
        <?php
    }
}