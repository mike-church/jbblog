<?php
/*
 * Archive page
 */
get_header();

$inspiry_blog_variation = get_theme_mod( 'inspiry_blog_layout' );
$inspiry_blog_variation = ! empty( $inspiry_blog_variation ) ? $inspiry_blog_variation : 'one';

get_template_part( 'partials/blog-' . $inspiry_blog_variation );

get_footer();