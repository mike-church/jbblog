<?php
/*
 * Search page
 */
get_header();

global $wp_query;

$inspiry_blog_variation = get_theme_mod( 'inspiry_blog_layout' );
$inspiry_blog_variation = ! empty( $inspiry_blog_variation ) ? $inspiry_blog_variation : 'one';
?>
	<div class="search-section">
		<div class="container">
			<h3 class="search-term pull-left"><i class="fa fa-search"></i><?php echo '<span>' . get_search_query() . '</span>'; ?></h3>
			<span class="pull-right"><?php printf( esc_html__( '%s Results Found', 'inspiry' ), $wp_query->found_posts) ?></span>
		</div>
	</div>
<?php
get_template_part( 'partials/blog-' . $inspiry_blog_variation );

get_footer();