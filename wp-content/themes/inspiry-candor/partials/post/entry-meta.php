<div class="entry-meta">
    <span class="entry-meta-item cat-links"><?php the_category( ', ' ); ?></span>
    <span class="entry-meta-item author"><?php echo sprintf( '<a class="vcard fn" href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?></span>
    <span class="entry-meta-item"><time class="entry-date published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'M d, Y' ); ?></time></span>
</div><!-- .entry-meta -->