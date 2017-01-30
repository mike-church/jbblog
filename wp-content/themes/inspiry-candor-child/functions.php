<?php
/**
 * The current version of the theme.
 */
define( 'INSPIRY_CHILD_THEME_VERSION', '1.0.0' );

if ( !function_exists( 'inspiry_load_translation_from_child' ) ) {
    /**
     * Load translation files from child theme
     */
    function inspiry_load_translation_from_child() {
        load_child_theme_textdomain ( 'inspiry', get_stylesheet_directory () . '/languages' );
    }
    add_action ( 'after_setup_theme', 'inspiry_load_translation_from_child' );
}


if ( !function_exists( 'inspiry_enqueue_child_styles' ) ) {
    /**
     * Changes in styles enqueue due to child theme
     */
    function inspiry_enqueue_child_styles() {
        if ( !is_admin() ) {

            // de-queue and de-register parent default css
            wp_dequeue_style( 'inspiry-parent-default' );
            wp_deregister_style( 'inspiry-parent-default' );

            // de-queue parent custom css
            wp_dequeue_style( 'inspiry-parent-custom' );

            // enqueue parent default css
            wp_enqueue_style( 'inspiry-parent-default', get_template_directory_uri() . '/style.css' );

            // enqueue parent custom css
            wp_enqueue_style( 'inspiry-parent-custom' );

            // child default css
            wp_enqueue_style( 'inspiry-child-default', get_stylesheet_uri(), array( 'inspiry-parent-default' ), INSPIRY_CHILD_THEME_VERSION, 'all' );

            // child custom css
            wp_enqueue_style( 'inspiry-child-custom',  get_stylesheet_directory_uri() . '/child-custom.css', array( 'inspiry-child-default' ), '1.1' , 'all' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'inspiry_enqueue_child_styles', PHP_INT_MAX );
}

if ( ! function_exists( 'inspiry_theme_comment' ) ) {
    /**
     * Theme Custom Comment Template
     */
    function inspiry_theme_comment( $comment, $args, $depth ) {

        $GLOBALS[ 'comment' ] = $comment;
        switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li class="pingback">
                <p><?php esc_html_e( 'Pingback:', 'inspiry' ); ?><?php comment_author_link(); ?><?php edit_comment_link( esc_html__( '(Edit)', 'inspiry' ), ' ' ); ?></p>
            </li>
            <?php
            break;

        default :
            ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <article id="comment-<?php comment_ID(); ?>" class="comment-body">



                <div class="comment-wrapper">
                    <div class="comment-meta">
                        <div class="comment-author vcard">
                            <h5 class="fn"><?php echo get_comment_author_link(); ?></h5>
                        </div>
                        <div class="reply">
                            <?php comment_reply_link( array_merge( array ( 'before' => '' ), array ( 'depth' => $depth, 'max_depth' => $args[ 'max_depth' ] ) ) ); ?>
                        </div>
                    </div>

                    <div class="comment-content">
                        <?php comment_text(); ?>
                    </div>
                    <div class="comment-metadata">
                        <time datetime="<?php comment_time( 'c' ); ?>"><?php echo get_comment_date(); ?></time>
                    </div>
                </div>

            </article>
            <!-- end of comment -->
            <?php
            break;

        endswitch;
    }
}

if ( function_exists( 'add_theme_support' ) ) {
    add_image_size( 'feature-image', 650, 9999 ); // 300 pixels wide (and unlimited height)
 }