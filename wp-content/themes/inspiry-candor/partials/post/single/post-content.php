<?php
global $inspiry_post_layout;

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

        $inspiry_post_layout = get_theme_mod( 'inspiry_post_layout' );
        if ( empty( $inspiry_post_layout ) ) {
            $inspiry_post_layout = 'one';
        }

        $article_classes = 'positioned-categories single-post-variation-' . $inspiry_post_layout . ' clearfix';
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?>>
            <?php

            /* Display featured image */
            inspiry_standard_thumbnail();
            ?>
            <header class="entry-header">
                <?php
                /* title */
                get_template_part( 'partials/post/entry-title' );

                /* meta */
                get_template_part( 'partials/post/entry-meta' );
                ?>
            </header>
            <div class="entry-content clearfix">
                <?php the_content(); ?>
                <?php
                wp_link_pages( array (
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'inspiry' ),
                    'after' => '</div>',
                ) );
                ?>
            </div>
            <?php the_tags( '<footer class="entry-footer"><h4>' . esc_html__( 'Tags', 'inspiry' ) . '</h4><span class="tag-links">', '', '</span></footer>' ); ?>
        </article>
        <?php
    endwhile;
endif;