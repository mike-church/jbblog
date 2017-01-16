<?php
/*
 *  Blog Variation Two
 */
?>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" >
                        <?php
                        /* Main loop */
                        if ( have_posts() ) :

                            while ( have_posts() ) :

                                the_post();

                                $article_classes = 'blog-post positioned-categories post-common clearfix';
                                ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?>>
                                    <?php

                                    /* Display featured image */
                                    inspiry_standard_thumbnail();
                                    ?>
                                    <div class="post-content-wrapper">
                                        <header class="entry-header">
                                            <?php

                                            /* title */
                                            get_template_part( 'partials/post/entry-title' );

                                            /* meta */
                                            get_template_part( 'partials/post/entry-meta' );
                                            ?>
                                        </header>
                                        <?php

                                        /* summary */
                                        get_template_part( 'partials/post/entry-summary' );
                                        ?>
                                    </div>
                                </article>
                                <?php
                            endwhile;

                            global $wp_query;
                            inspiry_pagination( $wp_query );
                        else :
                            inspiry_nothing_found();
                        endif;
                        ?>
                    </main>
                    <!-- .site-main -->
                </div>
                <!-- .content-area -->
            </div>
            <!-- .col-md-8 -->
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
            <!-- .col-md-4 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div><!-- .site-content -->