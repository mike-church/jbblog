<?php
/**
 * The current version of the theme.
 */
define( 'INSPIRY_THEME_VERSION', '1.1.0' );

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since 1.0
 */
if ( ! isset( $content_width ) ) {
    $content_width = 650;
}

if ( ! function_exists( 'inspiry_theme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since 1.0.0
     */
    function inspiry_theme_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'inspiry', get_template_directory() . '/languages' );

        /* Add default posts and comments RSS feed links to head. */
        add_theme_support( 'automatic-feed-links' );

	    /*
	     * Custom Background Support
	     */
	    add_theme_support( 'custom-background' );

	    /*
	     * Custom Logo
	     */
	    add_theme_support( 'custom-logo' );

	    /*
	     * Custom Header Support
	     */
	    $header_args = array(
		    'width'         => 2000,
		    'height'        => 1200,
	    );
	    add_theme_support( 'custom-header', $header_args );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1140, 9999, true );
        add_image_size( 'carousel-post-thumb', 570, 430, true );
        add_image_size( 'navigation-post-thumb', 457, 257, true );

        /*
         * Theme theme uses wp_nav_menu in one location.
         */
        register_nav_menus( array ( 'primary' => esc_html__( 'Primary Menu', 'inspiry' ), ) );

    }

    add_action( 'after_setup_theme', 'inspiry_theme_setup' );

endif; // inspiry_theme_setup

/*
 * TGM plugin activation
 */
require_once( get_template_directory() . '/inc/tgm/inspiry-required-plugins.php' );

/**
 * Customizer
 */
require_once( get_template_directory() . '/inc/customizer/customizer.php' );

/**
 * Google Fonts
 */
require_once( get_template_directory() . '/inc/google-fonts/google-fonts.php' );

/*
 * Dynamic CSS
 */
require_once( get_template_directory() . '/css/dynamic-css.php' );


if ( ! function_exists( 'inspiry_google_fonts' ) ) :
    /**
     * Google fonts enqueue url
     */
    function inspiry_google_fonts() {
        $fonts_url            = '';
        $font_families        = array ();
        $inspiry_heading_font = get_theme_mod( 'inspiry_heading_font', 'Default' );
        $inspiry_body_font    = get_theme_mod( 'inspiry_body_font', 'Default' );

        if ( $inspiry_heading_font !== "Default" ) {
            /*
            * Translators: If there are characters in your language that are not
            * supported by Josefin Sans, translate this to 'off'. Do not translate
            * into your own language.
            */
            $selected_heading_font = _x( 'on', 'Heading Font: on or off', 'inspiry' );
            if ( 'off' !== $selected_heading_font ) {
                $font_families[] = $inspiry_heading_font;
            }
        } else {
            /*
            * Translators: If there are characters in your language that are not
            * supported by selected heading font, translate this to 'off'. Do not translate
            * into your own language.
            */
            $Josefin_Sans = _x( 'on', 'Josefin Sans Font: on or off', 'inspiry' );

            if ( 'off' !== $Josefin_Sans ) {
                $font_families[] = 'Josefin Sans:400,400italic,300italic,600,600italic,700,300,700italic';
            }
        }

        if ( $inspiry_body_font !== "Default" ) {
            /*
            * Translators: If there are characters in your language that are not
            * supported by selected body font, translate this to 'off'. Do not translate
            * into your own language.
            */
            $selected_body_font = _x( 'on', 'Body Font: on or off', 'inspiry' );
            if ( 'off' !== $selected_body_font ) {
                $font_families[] = $inspiry_body_font;
            }
        } else {
            /*
            * Translators: If there are characters in your language that are not
            * supported by PT Serif, translate this to 'off'. Do not translate
            * into your own language.
            */
            $PT_Serif = _x( 'on', 'PT Serif Font: on or off', 'inspiry' );

            if ( 'off' !== $PT_Serif ) {
                $font_families[] = 'PT Serif:400,400italic,700,700italic';
            }
        }

        if ( $font_families ) {
            $query_args = array (
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }
endif;


if ( ! function_exists( 'inspiry_enqueue_styles' ) ) :
    /**
     * Enqueue required styles for front end
     * @since   1.0.0
     * @return  void
     */
    function inspiry_enqueue_styles() {

        if ( ! is_admin() ) :

            $inspiry_template_directory_uri = get_template_directory_uri();

            // Google Font
            wp_enqueue_style (
                'inspiry-google-fonts',
                inspiry_google_fonts(),
                array(),
                INSPIRY_THEME_VERSION
            );

            // flexslider
            wp_enqueue_style( 'flexslider',
                $inspiry_template_directory_uri . '/js/flexslider/flexslider.css',
                array (),
                '2.5.0'
            );

            // owl carousel
            wp_enqueue_style( 'owl-carousel',
                $inspiry_template_directory_uri . '/js/owl.carousel/owl.carousel.css',
                array (),
                '2.0.0-beta.3'
            );

            // swipebox
            wp_enqueue_style( 'swipebox',
                $inspiry_template_directory_uri . '/js/swipebox/css/swipebox.min.css',
                array (),
                '1.3.0'
            );

            // Mean Menu
            wp_enqueue_style( 'mean-menu',
                $inspiry_template_directory_uri . '/js/meanmenu/meanmenu.min.css',
                array (),
                '2.0.7'
            );

            // font awesome
            wp_enqueue_style( 'font-awesome',
                $inspiry_template_directory_uri . '/css/font-awesome.min.css',
                array (),
                '4.5.0'
            );

            // main styles
            wp_enqueue_style( 'inspiry-main',
                $inspiry_template_directory_uri . '/css/main.css',
                array ( 'font-awesome' ),
                INSPIRY_THEME_VERSION
            );

            // theme styles
            wp_enqueue_style( 'inspiry-theme',
                $inspiry_template_directory_uri . '/css/theme.css',
                array ( 'inspiry-main' ),
                INSPIRY_THEME_VERSION
            );

            // if rtl is enabled
            if ( is_rtl() ) {

                wp_enqueue_style(
                    'inspiry-main-rtl',
                    $inspiry_template_directory_uri . '/css/main-rtl.css',
                    array( 'inspiry-main' ),
                    INSPIRY_THEME_VERSION
                );

                wp_enqueue_style(
                    'inspiry-theme-rtl',
                    $inspiry_template_directory_uri . '/css/theme-rtl.css',
                    array( 'inspiry-main', 'inspiry-theme', 'inspiry-main-rtl' ),
                    INSPIRY_THEME_VERSION
                );
            }

            // parent theme style.css
            wp_enqueue_style( 'inspiry-parent-default',
                get_stylesheet_uri(),
                array ( 'inspiry-main' ),
                INSPIRY_THEME_VERSION
            );

            // parent theme css/custom.css
            wp_enqueue_style( 'inspiry-parent-custom',
                $inspiry_template_directory_uri . '/css/custom.css',
                array ( 'inspiry-parent-default' ),
                INSPIRY_THEME_VERSION
            );

        endif;

    }

    add_action( 'wp_enqueue_scripts', 'inspiry_enqueue_styles' );

endif; // inspiry_enqueue_styles


if( !function_exists( 'inspiry_add_editor_style' ) ) :
	/**
	 * Add editor style
	 */
    function inspiry_add_editor_style() {
        add_editor_style( get_template_directory_uri() . '/css/editor-style.css' );
    }
	add_action( 'admin_init', 'inspiry_add_editor_style' );
endif;


if ( ! function_exists( 'inspiry_enqueue_scripts' ) ) :
    /**
     * Enqueue required java scripts for front end
     * @since   1.0.0
     * @return  void
     */
    function inspiry_enqueue_scripts() {

        if ( ! is_admin() ) :

            $inspiry_template_directory_uri = get_template_directory_uri();

            // JQuery
            wp_enqueue_script( 'jquery' );

            // Flex Slider
            wp_enqueue_script( 'flexslider',
                $inspiry_template_directory_uri . '/js/flexslider/jquery.flexslider-min.js',
                array ( 'jquery' ),
                '2.5.0',
                true
            );

            // owl Carousel
            wp_enqueue_script( 'owl-carousel',
                $inspiry_template_directory_uri . '/js/owl.carousel/owl.carousel.min.js',
                array ( 'jquery' ),
                '2.0.0-beta.3',
                true
            );

            // swipebox
            wp_enqueue_script( 'swipebox',
                $inspiry_template_directory_uri . '/js/swipebox/js/jquery.swipebox.min.js',
                array ( 'jquery' ),
                '1.4.1',
                true
            );

            // Mean Menu
            wp_enqueue_script( 'meanmenu',
                $inspiry_template_directory_uri . '/js/meanmenu/jquery.meanmenu.min.js',
                array ( 'jquery' ),
                '2.0.8',
                true
            );

            // Isotope
            wp_enqueue_script( 'isotope',
                $inspiry_template_directory_uri . '/js/isotope.pkgd.min.js',
                array ( 'jquery' ),
                '2.2.2',
                true
            );

            // Images Loaded
            wp_enqueue_script( 'imagesLoaded',
                $inspiry_template_directory_uri . '/js/imagesloaded.pkgd.min.js',
                array ( 'jquery' ),
                '4.1.0',
                true
            );

            // Infinite Scroll
            wp_enqueue_script( 'infinite-scroll',
                $inspiry_template_directory_uri . '/js/infinite-scroll/jquery.infinitescroll.min.js',
                array ( 'jquery' ),
                '2.1.0',
                true
            );

            // Comment reply script
            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }

            // Main js
            wp_enqueue_script( 'custom',
                $inspiry_template_directory_uri . '/js/custom.js',
                array ( 'jquery' ),
                INSPIRY_THEME_VERSION,
                true
            );

        endif;

    }

    add_action( 'wp_enqueue_scripts', 'inspiry_enqueue_scripts' );

endif; // inspiry_enqueue_scripts


if ( ! function_exists( 'inspiry_theme_sidebars' ) ) :
    /**
     * Register theme sidebars
     *
     * @since 1.0.0
     */
    function inspiry_theme_sidebars() {

        // Location: Default Sidebar
        register_sidebar( array (
            'name' => esc_html__( 'Default Sidebar', 'inspiry' ),
            'id' => 'default-sidebar',
            'description' => esc_html__( 'Sidebar for main blog page and archive pages.', 'inspiry' ),
            'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Location: Post Sidebar
        register_sidebar( array (
            'name' => esc_html__( 'Post Sidebar', 'inspiry' ),
            'id' => 'post-sidebar',
            'description' => esc_html__( 'Sidebar for single blog post.', 'inspiry' ),
            'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

	    // Location: Page Sidebar
	    register_sidebar( array (
		    'name' => esc_html__( 'Page Sidebar', 'inspiry' ),
		    'id' => 'page-sidebar',
		    'description' => esc_html__( 'Sidebar for single page.', 'inspiry' ),
		    'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
		    'after_widget' => '</section>',
		    'before_title' => '<h3 class="widget-title">',
		    'after_title' => '</h3>',
	    ) );

        // Location: Slidable Sidebar
        register_sidebar( array (
            'name' => esc_html__( 'Slidable Sidebar', 'inspiry' ),
            'id' => 'slidable-sidebar',
            'description' => esc_html__( 'Widget area for slidable sidebar', 'inspiry' ),
            'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

        // Location: Instagram Sidebar
        register_sidebar( array (
            'name' => esc_html__( 'Instagram Feed', 'inspiry' ),
            'id' => 'instagram-feed',
            'description' => esc_html__( 'Widget area for instagram feed on bottom.', 'inspiry' ),
            'before_widget' => '<section id="%1$s" class="widget clearfix %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ) );

    }

    add_action( 'widgets_init', 'inspiry_theme_sidebars' );

endif;

// Widgets
require_once( get_template_directory() . '/inc/widgets/' . 'recent_posts_widget.php' );
require_once( get_template_directory() . '/inc/widgets/' . 'top_posts_widget.php' );
require_once( get_template_directory() . '/inc/widgets/' . 'author_profile_widget.php' );

if ( ! function_exists( 'inspiry_home_body_classes' ) ) :
    /**
     * Adds custom classes to the array of body classes.
     *
     * @since 1.0.0
     *
     * @param array $classes Classes for the body element.
     *
     * @return array (Maybe) filtered body classes.
     */
    function inspiry_body_classes( $classes ) {

        $inspiry_blog_variation = get_theme_mod( 'inspiry_blog_layout' );
        $inspiry_post_layout    = get_theme_mod( 'inspiry_post_layout' );
        $inspiry_header_shadow = get_theme_mod( 'inspiry_header_shadow' );


        $inspiry_post_layout = ! empty( $inspiry_post_layout ) ? $inspiry_post_layout : 'one';
        if ( is_single() ) {
            $classes[] = 'inspiry-blog-single-' . $inspiry_post_layout;
        }

        $inspiry_blog_variation = ! empty( $inspiry_blog_variation ) ? $inspiry_blog_variation : 'one';
        if ( is_home() || is_archive() || is_search() ) {
            $classes[] = 'inspiry-blog-variation-' . $inspiry_blog_variation;
        }else{
            if ( in_array( $inspiry_blog_variation, array ( 'two', 'three' ) ) ) {
                $classes[] = 'floated-area';
            } else {
                $classes[] = 'none-floated-area';
            }
        }

        if ( in_array( $inspiry_blog_variation, array ( 'two', 'three' ) ) ) {
            $classes[] = 'positioned-site-header';

            if ( 'true' == $inspiry_header_shadow ) {
                $classes[] = 'banner-overlay';
            }
        }

        return $classes;
    }

    add_filter( 'body_class', 'inspiry_body_classes' );

endif;

if ( ! function_exists( 'inspiry_generate_background' ) ) :
    /**
     * Generate background styles
     *
     * @since 1.0.0
     *
     * @param null $color
     * @param null $url
     */
    function inspiry_generate_background( $color = null, $url = null ) {
        if ( ! empty( $url ) && ! empty( $color ) ) {
            echo 'background: url(' . esc_url( $url ) . ') ' . $color . ' no-repeat center top; background-size:cover;';
        } elseif ( ! empty( $url ) ) {
            echo 'background: url(' . esc_url( $url ) . ') no-repeat center top; background-size:cover;';
        } elseif ( ! empty( $color ) ) {
            echo 'background-color:' . $color . ';';
        }
    }

endif;

if ( ! function_exists( 'inspiry_standard_thumbnail' ) ) :
    /**
     * Generate standard thumbnail for this theme
     *
     * @since 1.0.0
     *
     * @param   string $size
     */
    function inspiry_standard_thumbnail( $size = 'post-thumbnail' ) {

        global $post;

        if ( has_post_thumbnail( $post->ID ) ) :

            if ( is_single() ) :
                $featured_image_id  = get_post_thumbnail_id();
                $original_image_url = wp_get_attachment_url( $featured_image_id );
                ?>
                <figure class="entry-thumbnail post-thumbnail">
                    <a class="swipebox" href="<?php echo esc_url( $original_image_url ); ?>" title="<?php the_title(); ?>">
                        <?php the_post_thumbnail( $size, array ( 'class' => "img-responsive" ) ); ?>
                    </a>
                </figure>
                <?php
            else :
                ?>
                <figure class="entry-thumbnail post-thumbnail">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                        <?php the_post_thumbnail( $size, array ( 'class' => 'img-responsive' ) ); ?>
                    </a>
                </figure>
                <?php
            endif;

        endif;
    }

endif;


if ( ! function_exists( 'inspiry_nothing_found' ) ) :
    /**
     * Display nothing found message
     *
     * @param $message
     */
    function inspiry_nothing_found() {
        ?>
        <section class="no-results not-found">
            <h2><?php esc_html_e( 'Nothing Found', 'inspiry' ); ?></h2>
            <p><?php esc_html_e( 'It seems we can not find what you are looking for. Perhaps search can help.', 'inspiry' ); ?></p>
            <?php get_search_form(); ?>
        </section>
        <!-- .no-results -->
        <?php
    }

endif;

if ( ! function_exists( 'inspiry_pagination' ) ) :
    /**
     * Output pagination
     *
     * @param $query
     */
    function inspiry_pagination( $query ) {

        echo "<nav class='paging-navigation pagination clearfix'>";

        $big = 999999999; // need an unlikely integer
        echo paginate_links( array (
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'prev_text' => esc_html__( 'Newer Posts', 'inspiry' ),
            'next_text' => esc_html__( 'Older Posts', 'inspiry' ),
            'current' => max( 1, get_query_var( 'paged' ) ),
            'total' => $query->max_num_pages,
        ) );
        echo "</nav><!-- .pagination -->";

    }

endif;

if ( ! function_exists( 'inspiry_excerpt' ) ) {
    /**
     * Output excerpt for given number of words
     *
     * @param int    $len
     * @param string $trim
     */
    function inspiry_excerpt( $len = 15, $trim = "&hellip;" ) {
        echo get_inspiry_excerpt( $len, $trim );
    }
}


if ( ! function_exists( 'get_inspiry_excerpt' ) ) {
    /**
     * Return excerpt for given number of words.
     *
     * @param int    $len
     * @param string $trim
     *
     * @return string
     */
    function get_inspiry_excerpt( $len = 15, $trim = "&hellip;" ) {
        $limit     = $len + 1;
        $excerpt   = explode( ' ', get_the_excerpt(), $limit );
        $num_words = count( $excerpt );
        if ( $num_words >= $len ) {
            $last_item = array_pop( $excerpt );
        } else {
            $trim = "";
        }
        $excerpt = implode( " ", $excerpt ) . $trim;

        return $excerpt;
    }
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

                <div class="author-photo">
                    <a class="avatar" href="<?php comment_author_url(); ?>">
                        <?php echo get_avatar( $comment, 96 ) ?>
                    </a>
                </div>

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

if ( ! function_exists( 'inspiry_user_social_profiles' ) ) :
    /**
     * Adds user social profiles to contact info.
     *
     * @since 1.0.0
     *
     * @param array $user_contact
     *
     * @return array Array of contact methods with theme additions.
     */
    function inspiry_user_social_profiles( $user_contact ) {
        $user_contact[ 'inspiry_facebook_url' ]   = esc_html__( 'Facebook URL', 'inspiry' );
        $user_contact[ 'inspiry_twitter_url' ]    = esc_html__( 'Twitter URL', 'inspiry' );
        $user_contact[ 'inspiry_linkedin_url' ]   = esc_html__( 'LinkedIn URL', 'inspiry' );
        $user_contact[ 'inspiry_google_url' ]     = esc_html__( 'Google Plus URL', 'inspiry' );
        $user_contact[ 'inspiry_instagram_url' ]  = esc_html__( 'Instagram URL', 'inspiry' );
        $user_contact[ 'inspiry_skype_username' ] = esc_html__( 'Skype Username', 'inspiry' );
        $user_contact[ 'inspiry_youtube_url' ]    = esc_html__( 'Youtube URL', 'inspiry' );
        $user_contact[ 'inspiry_pinterest_url' ]  = esc_html__( 'Pinterest URL', 'inspiry' );

        return $user_contact;
    }

    add_filter( 'user_contactmethods', 'inspiry_user_social_profiles' );

endif;


/**
 * Category color counter
 */
if ( ! isset( $category_color_counter ) ) {
    $category_color_counter = 0;
}

if ( ! function_exists( 'inspiry_category_color_class' ) ) :
    /**
     * return class for category color
     *
     * @since 1.0.0
     *
     * @return string
     */
    function inspiry_category_color_class() {

        global $category_color_counter;
        $color_classes = 6;

        $category_color_counter++;

        if ( $category_color_counter > $color_classes ) {
            $category_color_counter = 1;
        }

        return "cat-color-$category_color_counter";
    }

endif;


if( !function_exists( 'inspiry_get_header_image' ) ) :
	/**
	 *
	 * @return false|string
	 */
    function inspiry_get_header_image() {
	    $inspiry_header_image = get_header_image();
	    if ( ! $inspiry_header_image ) {
		    $inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout', 'one' );
		    if ( 'three' == $inspiry_blog_variation ) {
			    $inspiry_header_image = get_template_directory_uri() . '/images/default-header-2.jpg';
		    } else {
			    $inspiry_header_image = get_template_directory_uri() . '/images/default-header.jpg';
		    }
	    }
	    return $inspiry_header_image;
    }
endif;


if ( !function_exists( 'inspiry_log' ) ) {
	/**
	 * Log a given message to wp-content/debug.log file, if debug is enabled from wp-config.php file
	 *
	 * @param $message
	 */
	function inspiry_log( $message ) {
		if ( WP_DEBUG === true ) {
			if ( is_array( $message ) || is_object( $message ) ) {
				error_log( print_r( $message, true ) );
			} else {
				error_log( $message );
			}
		}
	}
}


if ( ! function_exists( 'inspiry_quick_css' ) ) {
	/**
	 * Output Quick CSS
	 */
	function inspiry_quick_css() {
		// Quick CSS from customizer settings
		$quick_css = stripslashes( get_theme_mod( 'inspiry_quick_css' ) );
		if ( ! empty( $quick_css ) ) {
			echo "<style type='text/css' id='inspiry-quick-css'>" . $quick_css . "</style>";
		}
	}

	add_action( 'wp_head', 'inspiry_quick_css' );
}


if ( ! function_exists( 'inspiry_social_sharing_buttons' ) ) :
    /**
     * Output social sharing buttons
     *
     * @param string $title
     *
     * @since 1.0.0
     */
    function inspiry_social_sharing_buttons( $title = null ) {

        global $post;

        // Holds HTML structure of social sharing buttons
        $inspiry_html = '';

        // Get current page URL
        $inspiry_URL = get_permalink();

        // Get current page title
        $inspiry_title = str_replace( ' ', '%20', get_the_title() );

        // Get Post Thumbnail for pinterest
        $inspiry_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        // Social Sharing Links data array
        $social_sharing_links = array (
            'facebook' => array (
                'icon' => '<i class="fa fa-facebook"></i>',
                'url' => 'https://www.facebook.com/sharer/sharer.php?u=' . $inspiry_URL,
                'new_window' => true,
                'window_width' => 600,
                'window_height' => 300,
            ),
            'twitter' => array (
                'icon' => '<i class="fa fa-twitter"></i>',
                'url' => 'https://twitter.com/intent/tweet?text=' . $inspiry_title . '&amp;url=' . $inspiry_URL,
                'new_window' => true,
                'window_width' => 600,
                'window_height' => 300,
            ),
            'google_plus' => array (
                'icon' => '<i class="fa fa-google-plus"></i>',
                'url' => 'https://plus.google.com/share?url=' . $inspiry_URL,
                'new_window' => true,
                'window_width' => 500,
                'window_height' => 500,
            ),
            'pinterest' => array (
                'icon' => '<i class="fa fa-pinterest"></i>',
                'url' => 'https://pinterest.com/pin/create/button/?url=' . $inspiry_URL . '&amp;media=' . $inspiry_thumbnail[ 0 ] . '&amp;description=' . $inspiry_title,
                'new_window' => true,
                'window_width' => 600,
                'window_height' => 600,
            ),
            'mail' => array (
                'icon' => '<i class="fa fa-envelope"></i>',
                'url' => 'mailto:?body=' . $inspiry_URL,
                'new_window' => false,
            ),
        );

        $title = $title ? $title : esc_html__( 'Share', 'inspiry' );

        $inspiry_html .= '<div class="inspiry-post-share">';
        $inspiry_html .= '<h3 class="inspiry-post-share-title">' . $title . '</h3>';
        $inspiry_html .= '<div class="inspiry-post-share-links">';

        foreach ( $social_sharing_links as $social_media_title => $social_sharing_data ) {

            $icon                    = $social_sharing_data[ 'icon' ];
            $url                     = $social_sharing_data[ 'url' ];
            $new_window              = $social_sharing_data[ 'new_window' ];
            $open_in_separate_window = '';

            if ( $new_window ) {
                $window_width            = $social_sharing_data[ 'window_width' ];
                $window_height           = $social_sharing_data[ 'window_height' ];
                $open_in_separate_window = sprintf( 'onclick="window.open(this.href, \'%s\', \'width=%d,height=%d\'); return false;"', $social_media_title, $window_width, $window_height );
            }

            $inspiry_html .= sprintf( '<a rel="nofollow" href="%s" ' . $open_in_separate_window . '" title="Share on %s">%s</a>', $url, $social_media_title, $icon );
        }

        $inspiry_html .= '</div>';
        $inspiry_html .= '</div>';

        return $inspiry_html;

    }
endif;