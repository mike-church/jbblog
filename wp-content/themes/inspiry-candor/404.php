<?php
/**
 * 404 page
 */

get_header(); ?>

<div id="content" class="site-content">
    <div class="container">
        <div id="primary" class="content-area content-width">
            <main id="main" class="site-main" >
                <section class="error-404 not-found">
                    <small>Page Not Found</small>
                    <h2 class="title">4<span>0</span>4</h2>
                    <div class="content">
                        <p><?php esc_html_e( 'Oops! We are not able to find what you are looking for.', 'inspiry'); ?></p>
                        <a class="back-to-home" href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e( 'Go to Home','inspiry'); ?></a>
                    </div>
                </section>
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div><!-- .container -->
</div><!-- .site-content -->

<?php get_footer(); ?>