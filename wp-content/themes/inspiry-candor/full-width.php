<?php
/*
 * Template Name: Full Width
 */

get_header(); ?>

<div id="content" class="site-content">
    <div class="container">
        <div id="primary" class="content-area content-width">
            <main id="main" class="site-main" >
                <?php

                if ( have_posts() ):

                    while ( have_posts() ):

                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
                            <?php

                            /* Display featured image */
                            inspiry_standard_thumbnail();
                            ?>
                            <h2 class="page-title"><?php the_title(); ?></h2>
                            <div class="entry-content clearfix">
                                <?php the_content(); ?>
                                <?php
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'inspiry' ),
                                    'after'  => '</div>',
                                ) );
                                ?>
                            </div>

                            <footer class="entry-footer">
                                <?php edit_post_link( esc_html__( 'Edit', 'inspiry' ), '<span class="edit-link">', '</span>' ); ?>
                            </footer>
                        </article>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile;

                endif;
                ?>
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div><!-- .container -->
</div><!-- .site-content -->

<?php get_footer(); ?>