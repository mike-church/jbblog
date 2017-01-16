<?php
/*
 *  Blog Variation One
 */
?>
<div id="content" class="site-content">
    <div class="container">
        <div id="primary" class="content-area col-centered">
            <main id="main" class="site-main" >
                <?php
                /* Main loop */
                if ( have_posts() ) :

                    while ( have_posts() ) :

                        the_post();

                        $article_classes = 'blog-post positioned-categories post-common clearfix';
                        $article_classes .= ' ' . inspiry_category_color_class();
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
    <!-- .container -->
</div>
<!-- .site-content -->
