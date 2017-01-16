<div id="primary" class="content-area content-width">
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

        /* Comments */
        get_template_part( 'partials/post/entry-comments' );
        ?>
    </main>
    <!-- .site-main -->
</div>
<!-- .content-area -->