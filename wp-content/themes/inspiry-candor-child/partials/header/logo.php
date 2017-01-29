<div class="site-branding">
    <div class="site-branding-inner">
        <?php
        if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {

            /*
             * Image based logo
             */
	        if ( function_exists( 'the_custom_logo' ) ) {
		        the_custom_logo();
	        }

        } else {
            /*
             * Text based logo
             */
	        $inspiry_site_name  = get_bloginfo( 'name' );

            if ( is_front_page() || is_home() ) {
                ?><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $inspiry_site_name ); ?></a></h1><?php
            } else {
                ?><h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $inspiry_site_name ); ?></a></h2><?php
            }

        }
        ?>
    </div>
</div><!-- .site-branding -->