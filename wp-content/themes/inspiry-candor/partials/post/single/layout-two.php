<div class="row">
    <div class="col-md-8">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" >
                <?php
                /* Single Post Content */
                get_template_part( 'partials/post/single/post-content' );

                /* Post Social Share Links  */
                get_template_part( 'partials/post/single/post-social-share-links' );

                /* Related Posts */
                get_template_part( 'partials/post/single/related-posts' );

                /* Posts Author */
                get_template_part( 'partials/post/single/post-author' );

                /* Post Navigation */
                get_template_part( 'partials/post/single/post-navigation' );

                /* comments */
                get_template_part( 'partials/post/entry-comments' );
                ?>
            </main>
            <!-- .site-main -->
        </div>
        <!-- .content-area -->
    </div>
    <!-- .col-md-8 -->
    <div class="col-md-4">
        <?php get_sidebar( 'post' ); ?>
    </div>
    <!-- .col-md-4 -->
</div><!-- .row -->
