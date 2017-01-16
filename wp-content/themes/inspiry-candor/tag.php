<?php
/*
 * Tag archive page
 */
get_header();

$inspiry_blog_variation = get_theme_mod( 'inspiry_blog_layout' );
$inspiry_blog_variation = ! empty( $inspiry_blog_variation ) ? $inspiry_blog_variation : 'one';
?>
    <div class="category-section">
        <div class="container">
            <h3 class="category-title"><?php single_tag_title(); ?></h3>
            <?php echo tag_description(); ?>
        </div>
    </div>
<?php
get_template_part( 'partials/blog-' . $inspiry_blog_variation );

get_footer();