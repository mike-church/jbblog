<div class="entry-summary">
    <?php
    if ( strpos( get_the_content(), 'more-link' ) === false ) {
        the_excerpt();
    } else {
        the_content( '' );
    }
    ?>
</div>
<a href="<?php the_permalink(); ?>" rel="bookmark" class="btn read-more-text"><?php esc_html_e( 'Continue Reading', 'inspiry' ); ?></a>