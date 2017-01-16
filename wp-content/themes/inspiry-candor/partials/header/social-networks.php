<?php
$show_social              = get_theme_mod( 'inspiry_show_social_menu' );
$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout' );
$inspiry_post_layout      = get_theme_mod( 'inspiry_post_layout' );
$inspiry_search_toggle    = get_theme_mod( 'inspiry_search_toggle' );
$inspiry_slidable_sidebar = get_theme_mod( 'inspiry_slidable_sidebar' );
?>
<nav id="social-navigation" class="social-navigation clearfix" aria-label="Social Links Menu">
    <ul class="social-links-menu clearfix">
        <?php

        if ( $show_social == 'true' ) :

            $sl_facebook  = get_theme_mod( 'inspiry_facebook_url' );
            $sl_twitter   = get_theme_mod( 'inspiry_twitter_url' );
            $sl_linkedin  = get_theme_mod( 'inspiry_linkedin_url' );
            $sl_google    = get_theme_mod( 'inspiry_google_url' );
            $sl_instagram = get_theme_mod( 'inspiry_instagram_url' );
            $sl_skype     = get_theme_mod( 'inspiry_skype_username' );
            $sl_youtube   = get_theme_mod( 'inspiry_youtube_url' );
            $sl_pinterest = get_theme_mod( 'inspiry_pinterest_url' );
            $sl_rss       = get_theme_mod( 'inspiry_rss_url' );

            if ( ! empty( $sl_facebook ) ) {
                ?>
                <li class="facebook">
                    <a target="_blank" href="<?php echo esc_url( $sl_facebook ); ?>"><i class="fa fa-facebook"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_twitter ) ) {
                ?>
                <li class="twitter">
                    <a target="_blank" href="<?php echo esc_url( $sl_twitter ); ?>"><i class="fa fa-twitter"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_linkedin ) ) {
                ?>
                <li class="linkedin">
                    <a target="_blank" href="<?php echo esc_url( $sl_linkedin ); ?>"><i class="fa fa-linkedin"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_google ) ) {
                ?>
                <li class="gplus">
                    <a target="_blank" href="<?php echo esc_url( $sl_google ); ?>"><i class="fa fa-google-plus"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_instagram ) ) {
                ?>
                <li class="instagram">
                    <a target="_blank" href="<?php echo esc_url( $sl_instagram ); ?>"> <i class="fa fa-instagram"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_youtube ) ) {
                ?>
                <li class="youtube">
                    <a target="_blank" href="<?php echo esc_url( $sl_youtube ); ?>"> <i class="fa fa-youtube-square"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_skype ) ) {
                ?>
                <li class="skype">
                    <a target="_blank" href="skype:<?php echo esc_attr( $sl_skype ); ?>?add"> <i class="fa fa-skype"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_pinterest ) ) {
                ?>
                <li class="pinterest">
                    <a target="_blank" href="<?php echo esc_url( $sl_pinterest ); ?>"> <i class="fa fa-pinterest"></i></a>
                </li>
                <?php
            }

            if ( ! empty( $sl_rss ) ) {
                ?>
                <li class="rss">
                    <a target="_blank" href="<?php echo esc_url( $sl_rss ); ?>"> <i class="fa fa-rss"></i></a>
                </li>
                <?php
            }

        endif;


        if ( $inspiry_search_toggle == 'true' || $inspiry_slidable_sidebar == 'true' ) : ?>

            <?php
            // Search Toggle Button
            if ( $inspiry_search_toggle == 'true' ) : ?>
                <li class="hidden-xs hidden-sm"><a class="search-toggle" href="#"><i class="fa fa-search"></i></a></li>
                <?php
            endif;

            // Slidable Sidebar Toggle Button
            if ( $inspiry_slidable_sidebar == 'true' ) :
                if ( is_home() && 'two' != $inspiry_blog_variation || is_single() && 'two' != $inspiry_post_layout ) :
                    ?>
                    <li><a class="show-slidable-sidebar" href="#"><i class="fa fa-navicon"></i></a></li>
                    <?php
                endif;
            endif;

        endif; ?>
    </ul>
</nav><!-- .social-navigation -->


