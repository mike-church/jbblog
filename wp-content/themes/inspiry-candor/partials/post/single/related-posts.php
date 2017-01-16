<?php
/* Related Posts */
$inspiry_related_posts = get_theme_mod( 'inspiry_related_posts' );
if ( $inspiry_related_posts == 'show' ) {
	$inspiry_related_posts_variation = get_theme_mod( 'inspiry_related_posts_variation' );
	if ( $inspiry_related_posts_variation == 'thumbnail-based' ) {
		/* Thumbnail based design for adjacent posts */
		get_template_part( 'partials/post/single/thumbnail-based-related-posts' );
	} else {
		/* Text based design for related posts */
		get_template_part( 'partials/post/single/text-based-related-posts' );
	}
}