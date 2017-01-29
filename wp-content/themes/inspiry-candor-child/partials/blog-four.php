<?php
/*
 *  Blog Variation Four
 */
?>
<div id="content" class="site-content">
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" >
                <?php
                /* Main loop */
                if ( have_posts() ) :
                    ?>
                    <div id="blog-masonry" class="row blog-masonry">
                        <?php

                        while ( have_posts() ) :

                            the_post();

                            $article_classes = 'post-common clearfix';
                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'feature-image' );
                            $url = $thumb['0'];
                            ?>
                            <div class="col-post col-xs-6 col-md-4">
                                <article id="post-<?php the_ID(); ?>" <?php post_class( $article_classes ); ?>>
                                    <a href="<?php the_permalink() ?>"><img src="<?php echo $url;?>" class="img-responsive"></a>
                                    <div class="post-content-wrapper">
                                        <header class="entry-header">
                                            <span class="cat-links"><?php the_category( ', ' ); ?></span>
                                            <?php get_template_part( 'partials/post/entry-title' ); ?>
                                            <div class="entry-meta">
                                                <span class="entry-meta-item author"><?php echo sprintf( '<a class="vcard fn" href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?></span>
                                                <span class="entry-meta-item">
                                                    <time class="entry-date published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'M d, Y' ); ?></time>
                                                </span>
                                            </div>
                                            <!-- .entry-meta -->
                                        </header>
                                        <!-- .entry-header -->
                                        <div class="entry-summary">
                                            <?php
                                            if ( strpos( get_the_content(), 'more-link' ) === false ) {
                                                the_excerpt();
                                            } else {
                                                the_content( '' );
                                            }
                                            ?>
                                        </div>
                                        <!-- .entry-summary -->
                                    </div>
                                </article>
                                <!-- .hentry -->
                            </div>
                            <?php

                        endwhile;

                        global $wp_query;
                        ?>
                    </div><!-- .blog-masonry -->
                    <div id="loader" class="loader-img-wrapper text-center" data-page-num="<?php echo esc_attr( $wp_query->max_num_pages ); ?>" data-loader-img="<?php echo get_template_directory_uri(); ?>/images/loader.gif"></div>
                    <div class="load-more-wrapper text-center">
                        <a rel="nofollow" id="load-more-btn" class="btn" href="#"><?php esc_html_e('Load More', 'inspiry'); ?></a>
                        <div id="load-more-msg" class="load-more-msg"><p><?php esc_html_e('No More Posts To Load', 'inspiry'); ?></p></div>
                    </div>
                    <?php
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