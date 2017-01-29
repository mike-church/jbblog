<?php
/*
 * Single page
 */

get_header(); ?>

<div id="content" class="site-content">
    <div class="container">
        <?php
        $single_post_layout = get_theme_mod( 'inspiry_post_layout', 'one' );

        /*
         * For demo purpose only
         */
        if ( isset( $_GET[ 'post_layout' ] ) && in_array( $_GET[ 'post_layout' ], array( 'one', 'two' ) ) ) {
	        $single_post_layout = $_GET[ 'post_layout' ];
        }

        get_template_part( 'partials/post/single/layout-' . $single_post_layout );
        ?>
    </div>
    <!-- .container -->
</div><!-- .site-content -->

<?php get_footer(); ?>