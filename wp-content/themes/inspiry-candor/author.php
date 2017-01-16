<?php
/*
 * Author Page
 */
get_header();

$inspiry_blog_variation = get_theme_mod( 'inspiry_blog_layout' );
$inspiry_blog_variation = ! empty( $inspiry_blog_variation ) ? $inspiry_blog_variation : 'one';
?>
<div class="post-author-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 clearfix">
                <div class="thumbnail">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 164 ); ?>
                </div>
                <div class="author-info">
                    <h2 class="author-name">
                        <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="url fn n" rel="author"><?php echo get_the_author(); ?></a>
                    </h2>

                    <small><?php esc_html_e( 'Author', 'inspiry' ); ?> @ <?php bloginfo( 'name' ); ?></small>

                    <?php get_template_part('partials/post/single/post-author-social-links'); ?>
                </div>
            </div>
            <div class="col-md-6 author-details">
                <p><?php the_author_meta( 'description' ); ?></p>
            </div>
        </div>
    </div>
</div>
<?php
get_template_part( 'partials/blog-' . $inspiry_blog_variation );

get_footer(); ?>