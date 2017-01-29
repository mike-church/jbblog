<?php
global $inspiry_post_layout;

if ( have_posts() ):
    while ( have_posts() ):
        the_post();

        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-image' );
        $url = $thumb['0'];
        $alt_text = get_post_meta($img_id , '_wp_attachment_image_alt', true);

        $inspiry_post_layout = get_theme_mod( 'inspiry_post_layout' );
        if ( empty( $inspiry_post_layout ) ) {
            $inspiry_post_layout = 'one';
        }

        $article_classes = 'positioned-categories single-post-variation-' . $inspiry_post_layout . ' clearfix';
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?>>
            <!--<?php

            /* Display featured image */
            inspiry_standard_thumbnail();
            ?>-->

            
            <header class="entry-header">
                <?php
                
                get_template_part( 'partials/post/entry-title' ); ?>

                <div style="text-align: center; margin-bottom:30px;">
                    <div style="display:inline-block;">
                        <img src="<?php echo $url;?>" <?php if ( ! empty($alt_text) ) { ?> alt="<?php echo $alt_text;?>" <?php } ;?> class="img-responsive">
                    </div>
                </div>

            
                <?php get_template_part( 'partials/post/entry-meta' ); ?>

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