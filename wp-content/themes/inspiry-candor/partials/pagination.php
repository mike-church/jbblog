<nav class="paging-navigation pagination clearfix">
    <a class="prev page-numbers" href="#">Newer Posts</a>
    <a class="next page-numbers" href="#">Older Posts</a>
    <?php
    the_posts_pagination( array(
        'prev_text'          => esc_html__( 'Previous page', 'inspiry' ),
        'next_text'          => esc_html__( 'Next page', 'inspiry' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'inspiry' ) . ' </span>',
    ) );
    ?>
</nav><!-- .pagination -->