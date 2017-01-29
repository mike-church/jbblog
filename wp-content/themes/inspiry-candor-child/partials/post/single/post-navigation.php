<?php
global $post;
$inspiry_post_navigation = get_theme_mod( 'inspiry_post_navigation' );

if ( $inspiry_post_navigation == 'show' ) :
    if ( is_singular( 'attachment' ) ) :
        // Parent post navigation.
        the_post_navigation( array (
            'prev_text' =>  '<span class="meta-nav">' . _x( 'Published in:' , 'Parent post link', 'inspiry' ) . '</span><span class="post-title"> %title </span>',
        ) );
    elseif ( is_singular( 'post' ) ) :
        // Previous/next post navigation.
        $previous = get_previous_post();
        $next     = get_next_post();

        if ( $previous || $next ) :
            ?>
            <nav class="navigation post-navigation post-navigation-with-title" >
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'inspiry' ); ?></h2>
                <div class="nav-links clearfix">
                    <?php if ( $previous ) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo esc_url( get_permalink( $previous->ID ) ); ?>">
                                <span class="meta-nav" aria-hidden="true"><i class="fa fa-long-arrow-left"></i> <?php esc_html_e( 'Previous', 'inspiry' ); ?></span>
                                <span class="screen-reader-text"><?php esc_html_e( 'Previous post:', 'inspiry' ); ?></span>
                                <span class="post-title"><?php echo esc_html( $previous->post_title ); ?></span>
                            </a>
                        </div>
                    <?php endif;
                    if ( $next ) : ?>
                        <div class="nav-next">
                            <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
                                <span class="meta-nav" aria-hidden="true"><?php esc_html_e( 'Next', 'inspiry' ); ?> <i class="fa fa-long-arrow-right"></i></span>
                                <span class="screen-reader-text"><?php esc_html_e( 'Next post:', 'inspiry' ); ?></span>
                                <span class="post-title"><?php echo esc_html( $next->post_title ); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div><!-- .nav-links -->
            </nav><!-- .navigation -->
        <?php endif;
    endif;
endif;