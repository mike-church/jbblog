<?php
/*
 *  Blog Variation Three
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

                        $article_classes = 'post-common clearfix';
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?>>
                            <div class="post-content-wrapper">
                                <header class="entry-header">
                                    <div class="entry-meta">
                                        <span class="entry-meta-item author"><?php echo sprintf( '<a class="vcard fn" href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?></span>
                                        <span class="entry-meta-item"><time class="entry-date published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'M d, Y' ); ?></time></span>
                                        <span class="entry-meta-item cat-links"><?php the_category( ', ' ); ?></span>
                                    </div><!-- .entry-meta -->
                                    <?php

                                    /* title */
                                    get_template_part( 'partials/post/entry-title' );
                                    ?>
                                </header>
                                <div class="entry-summary">
                                    <?php
                                    if ( strpos( get_the_content(), 'more-link' ) === false ) {
                                        the_excerpt();
                                    } else {
                                        the_content( '' );
                                    }
                                    ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" rel="bookmark" class="read-more-text"><?php esc_html_e( 'Continue Reading', 'inspiry' ); ?></a>
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
</div><!-- .site-content -->