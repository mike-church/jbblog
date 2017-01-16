<?php
if ( is_singular( 'post' ) ) :
    // Previous/next post navigation.
    $previous = get_adjacent_post( true, '', true );
    $next     = get_adjacent_post( true, '', false );

    if ( $previous || $next ) :
	    ?>
        <div class="similar-posts">
            <h4 class="similar-posts-title"><?php esc_html_e( 'Related Posts', 'inspiry' ); ?></h4>
            <nav class="navigation post-navigation post-navigation-with-image" >
                <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'inspiry' ); ?></h2>
                <div class="nav-links clearfix row">
                    <?php if ( $previous ) : ?>
                        <div class="nav-previous col-xs-6">
                            <a href="<?php echo esc_url( get_permalink( $previous->ID ) ); ?>">
                                <span class="screen-reader-text"><?php esc_html_e( 'Previous post:', 'inspiry' ); ?></span>
                                <?php
                                if ( has_post_thumbnail( $previous->ID ) ) {
                                    echo get_the_post_thumbnail( $previous->ID, 'navigation-post-thumb', array ( 'class' => 'post-image img-responsive' ) );
                                }
                                ?>
                                <span class="meta-nav btn" aria-hidden="true"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp;&nbsp;<?php esc_html_e( 'Previous', 'inspiry' ); ?></span>
                            </a>
                        </div>
                    <?php endif;
                    if ( $next ) : ?>
                        <div class="nav-next col-xs-6">
                            <a href="<?php echo esc_url( get_permalink( $next->ID ) ); ?>">
                                <span class="screen-reader-text"><?php esc_html_e( 'Next post:', 'inspiry' ); ?></span>
                                <?php
                                if ( has_post_thumbnail( $next->ID ) ) {
	                                echo get_the_post_thumbnail( $next->ID, 'navigation-post-thumb', array( 'class' => 'post-image img-responsive' ) );
                                }
                                ?>
                                <span class="meta-nav btn" aria-hidden="true"><?php esc_html_e( 'Next', 'inspiry' ); ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- .nav-links -->
            </nav>
            <!-- .navigation -->
        </div>
        <?php
    endif;
endif;