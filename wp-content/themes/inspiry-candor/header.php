<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
    $inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
    $inspiry_header_variation = get_theme_mod( 'inspiry_header_variation' );
    $inspiry_post_layout      = get_theme_mod( 'inspiry_post_layout' );
    $inspiry_search_toggle    = get_theme_mod( 'inspiry_search_toggle' );
    $inspiry_slidable_sidebar = get_theme_mod( 'inspiry_search_toggle' );

    if ( empty( $inspiry_header_variation ) ) {
	    $inspiry_header_variation = 'left-aligned-header';
    }

    if ( $inspiry_search_toggle == 'true' ) {
        get_template_part( 'partials/search-form-overlay' );
    }

    if ( $inspiry_slidable_sidebar == 'true' ) {
        if ( is_home() && 'two' != $inspiry_blog_variation || is_single() && 'two' != $inspiry_post_layout ) {
            get_template_part( 'partials/slidable-sidebar' );
        }
    }
    ?>
    <div class="page-wrapper">
        <div id="mobile-menu" class="mobile-menu clearfix">
            <?php
            if ( $inspiry_search_toggle == 'true' ) : ?>
                <a class="search-toggle hidden-md hidden-lg" href="#"><i class="fa fa-search"></i></a>
                <?php
            endif;
            ?>
        </div>
        <header id="masthead" class="site-header <?php echo esc_attr( $inspiry_header_variation ); ?>" >
            <div class="site-header-main container-fluid clearfix">
                <div class="header-left">
                    <?php
                    if ( 'left-aligned-header' == $inspiry_header_variation ) {
                        get_template_part( 'partials/header/logo' );
                    }

                    get_template_part( 'partials/header/menu' );
                    ?>
                </div>

                <?php if ( 'center-aligned-header' == $inspiry_header_variation ) : ?>
                    <div class="header-center">
                        <?php get_template_part( 'partials/header/logo' ); ?>
                    </div>
                <?php endif; ?>

                <div class="header-right">
                    <?php get_template_part( 'partials/header/social-networks' ); ?>
                </div>
            </div>
            <!-- .site-header-main -->
        </header>
        <!-- .site-header -->

        <?php
        if ( ! is_home() && in_array( $inspiry_blog_variation, array ( 'two', 'three' ) ) ) {
            get_template_part( 'partials/page-head' );
        }
        ?>