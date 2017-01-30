<?php
/*
* Intro Section
*/

$inspiry_intro_title      = get_theme_mod( 'inspiry_intro_title' );
$inspiry_intro_description = get_theme_mod( 'inspiry_intro_decription' );
$inspiry_blog_variation   = get_theme_mod( 'inspiry_blog_layout' );

if ( ! empty( $inspiry_intro_title ) || ! empty( $inspiry_intro_description ) ) :

    $intro_title      = '';
    $intro_description = '';

    ?>
    <section class="intro">
        <?php if ( 'one' == $inspiry_blog_variation ) : ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-title">
                        <?php
                        /*
                         * Title
                         */
                        if ( ! empty( $inspiry_intro_title ) ) {
                            echo '<h2 class="intro-title">' . esc_html( $inspiry_intro_title ) . '</h2>';
                        }
                        ?>
                    </div>
                    <div class="col-lg-6 col-description">
                        <?php
                        /*
                         * Description
                         */
                        if ( ! empty( $inspiry_intro_description ) ) {
                            echo '<p class="intro-description">' . wp_kses( $inspiry_intro_description, array(
                                    'a' => array(
                                        'href' => array(),
                                        'title' => array(),
                                        'target' => array(),
                                    ),
                                    'em' => array(),
                                    'strong' => array(),
                                    'br' => array(),
                                ) ) . '</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php elseif ( in_array( $inspiry_blog_variation, array ( 'two', 'three', 'four' ) ) ) : ?>
            <div class="intro-inner">
                <?php
                /*
                 * Title
                 */
                if ( ! empty( $inspiry_intro_title ) ) {
                    echo '<h2 class="intro-title">' . esc_html( $inspiry_intro_title ) . '</h2>';
                }

                /*
                 * Description
                 */
                if ( ! empty( $inspiry_intro_description ) ) {
	                echo '<p class="intro-description">' . wp_kses( $inspiry_intro_description, array(
			                'a' => array(
				                'href' => array(),
				                'title' => array(),
				                'target' => array(),
			                ),
			                'em' => array(),
			                'strong' => array(),
			                'br' => array(),
		                ) ) . '</p>';
                }
                ?>
            </div>
        <?php endif; ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <a class="btn" href="https://julian-bakery.com" style="margin-top:30px;">Shop Julian Bakery</a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>