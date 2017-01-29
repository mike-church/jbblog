<?php
$inspiry_post_author = get_theme_mod( 'inspiry_post_author' );

if ( $inspiry_post_author == 'show' ) :
    ?>
    <div class="about-author clearfix">
        <div class="image-thumb">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
        </div>
        <div class="author-info clearfix">
            <h4 class="author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn n" rel="author"><?php echo get_the_author(); ?></a></h4>
            <p><?php the_author_meta( 'description' ); ?></p>
            <?php get_template_part('partials/post/single/post-author-social-links'); ?>
        </div>
    </div>
    <?php
endif;