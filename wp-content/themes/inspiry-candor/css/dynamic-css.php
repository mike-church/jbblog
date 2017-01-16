<?php
if( !function_exists( 'generate_dynamic_css' ) ){
    function generate_dynamic_css(){

        // Basic Styles
        $inspiry_text_color       = get_theme_mod( 'inspiry_text_color' );
        $inspiry_heading_color    = get_theme_mod( 'inspiry_heading_color' );
        $inspiry_link_color       = get_theme_mod( 'inspiry_link_color' );
        $inspiry_link_hover_color = get_theme_mod( 'inspiry_link_hover_color' );

        $dynamic_css = array(
                            // Body
                            array(
                                'elements'	=>	'body',
                                'property'	=>	'color',
                                'value'		=> 	$inspiry_text_color
                            ),
                            // Headings
                            array(
                                'elements'	=>	'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6',
                                'property'	=>	'color',
                                'value'		=> 	$inspiry_heading_color
                            ),
                            // Link
                            array(
                                'elements'	=>	'a',
                                'property'	=>	'color',
                                'value'		=> 	$inspiry_link_color
                            ),
	                        // Link Hover
                            array(
                                'elements'	=>	'a:hover',
                                'property'	=>	'color',
                                'value'		=> 	$inspiry_link_hover_color
                            )

                        );

        // Heading Font
        if ( get_theme_mod( 'inspiry_heading_font', 'Default') !== 'Default' ) {
            $dynamic_css[] = array (
                'elements' => 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6,
                              .post-author-section small, .btn, .pagination, .site-title, .main-navigation,
                              .site-footer, .post-carousel .read-more-text, .post-meta-common .entry-meta,
                              .position-cat-link .cat-links:not(:empty), cite, .inspiry-blog-variation-three
                              .site-main .read-more-text, .error-404 small, .widget_latest_tweets_widget .tweet-details,
                              .instagram-feeds .widget-title, .post-carousel .cat-links:not(:empty), button[type="submit"],
                              input[type="submit"], .post-common .entry-meta, .blog-post .cat-links:not(:empty),
                              .single-post .entry-meta, .single-post .cat-links:not(:empty), .widget-post-content .entry-meta,
                              .top-posts-carousel .top-post-cat-links:not(:empty), .top-posts-carousel .top-post-entry-meta,
                              .null-instagram-feed p a',
                'property' => 'font-family',
                'value'    => get_theme_mod( 'inspiry_heading_font', 'Default')
            );
        }

        // Body Font
        if ( get_theme_mod( 'inspiry_body_font', 'Default') !== 'Default' ) {
            $dynamic_css[] = array (
                'elements' => 'body',
                'property' => 'font-family',
                'value'    => get_theme_mod( 'inspiry_body_font', 'Default')
            );
        }

        $prop_count = count($dynamic_css);

        if($prop_count > 0)
        {
            echo "<style type='text/css' id='dynamic-css'>\n\n";

            foreach($dynamic_css as $css_unit )
            {
                if(!empty($css_unit['value']))
                {
                    echo $css_unit['elements']."{\n";
                    echo $css_unit['property'].":".$css_unit['value'].";\n";
                    echo "}\n\n";
                }
            }

            echo '</style>';
        }
    }
}

add_action('wp_head', 'generate_dynamic_css');