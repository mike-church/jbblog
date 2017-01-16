        <?php get_template_part( 'partials/instagram' ); ?>

        <footer id="colophon" class="site-footer" >
            <div class="site-info container">
                <?php
                /*
                * Footer copyright text
                */
                $inspiry_copyright_html = get_theme_mod( 'inspiry_copyright_html' );
                if ( ! empty( $inspiry_copyright_html ) ) :
                    ?>
                    <p class="copyright-text"><?php echo wp_kses( $inspiry_copyright_html, array (
                            'a' => array (
                                'href' => array (),
                                'title' => array (),
                                'target' => array (),
                            ),
                            'span' => array (),
                            'em' => array (),
                            'strong' => array (),
                            'br' => array (),
                        ) ); ?></p>
                    <?php
                else:
	                ?>
	                <a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">
		                <?php printf( esc_html__( 'Proudly powered by %s', 'inspiry' ), 'WordPress' ); ?>
	                </a>
	                <?php
                endif
                ?>
            </div>
            <!-- .site-info -->
        </footer><!-- .site-footer -->

    </div><!-- .page-wrapper -->

    <a href="#top" id="scroll-top"><i class="fa fa-chevron-up"></i></a>

    <?php wp_footer(); ?>
</body>
</html>