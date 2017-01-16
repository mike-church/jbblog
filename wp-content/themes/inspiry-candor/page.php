<?php
/*
 *  Page
 */

get_header(); ?>

<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" >
						<?php

						if ( have_posts() ):

							while ( have_posts() ):

								the_post();
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> >
									<?php

									/* Display featured image */
									inspiry_standard_thumbnail();
									?>
									<h1 class="page-title"><?php the_title(); ?></h1>
									<div class="entry-content clearfix">
										<?php the_content(); ?>
										<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'inspiry' ),
											'after'  => '</div>',
										) );
										?>
									</div>

									<footer class="entry-footer">
										<?php edit_post_link( esc_html__( 'Edit', 'inspiry' ), '<span class="edit-link">', '</span>' ); ?>
									</footer>

								</article>
								<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() ) :
									comments_template();
								endif;

							endwhile;

						endif;
						?>
					</main><!-- .site-main -->
				</div><!-- .content-area -->
			</div><!-- .col-md-8 -->

			<div class="col-md-4">
				<?php get_sidebar( 'page' ); ?>
			</div><!-- .col-md-4 -->

		</div><!-- .row -->
	</div><!-- .container -->
</div><!-- .site-content -->

<?php get_footer(); ?>