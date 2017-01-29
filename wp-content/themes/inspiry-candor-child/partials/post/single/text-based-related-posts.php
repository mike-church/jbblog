<?php
$tags = wp_get_post_tags( get_the_ID() );
if ( $tags ) {

	$tags_ids = array();
	foreach ( $tags as $individual_tag ) {
		$tags_ids[] = $individual_tag->term_id;
	}

	$args = array(
		'tag__in' => $tags_ids,
		'post__not_in' => array( get_the_ID() ),
		'posts_per_page' => 2,
		'ignore_sticky_posts' => 1
	);

	$related_posts = new WP_Query( $args );
	if ( $related_posts->have_posts() ) : ?>
		<div class="related-posts">
			<h3><?php esc_html_e( 'Related Posts', 'inspiry' ); ?></h3>

			<div class="row">
				<?php
				while ( $related_posts->have_posts() ) :
					$related_posts->the_post();
					?>
					<div class="col-sm-6">
						<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<span class="post-cat"><?php esc_html_e( 'in', 'inspiry' ); ?> "<?php the_category( ', ' ); ?>"</span>
					</div>
					<?php
				endwhile;
				?>
			</div>
		</div>
		<?php
	endif;
	wp_reset_postdata();
}