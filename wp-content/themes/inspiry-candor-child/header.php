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
    <header class="site-header">
        <?php
            if ( is_home() ) { ?>

            <?php                
            }
            else { ?>
                <a class="logo header-logo" href="<?php echo home_url('/'); ?>"></a>
                <a class="btn" href="https://julian-bakery.com">Shop</a>
            <?php
            }
        ?>
        
    </header>
    <div class="page-wrapper">
        
        <!-- .site-header -->

        <?php
        if ( ! is_home() && in_array( $inspiry_blog_variation, array ( 'two', 'three' ) ) ) {
            get_template_part( 'partials/page-head' );
        }
        ?>