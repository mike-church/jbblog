<?php
/*
 * Index page ( Blog Page )
 */
get_header();

$inspiry_blog_variation = get_theme_mod( 'inspiry_blog_layout' );
$inspiry_blog_variation = !empty( $inspiry_blog_variation ) ? $inspiry_blog_variation : 'one';

switch ( $inspiry_blog_variation ) {
    case 'two':
        get_template_part( 'partials/banner' );
        break;
    case 'three':
        get_template_part( 'partials/banner' );
        break;
    case 'four':
        get_template_part( 'partials/intro' );
        break;
    default:
        get_template_part( 'partials/intro' );
        get_template_part( 'partials/post-carousel' );
}

get_template_part( 'partials/blog-' . $inspiry_blog_variation );

get_footer();