<?php
if ( ! class_exists( 'Top_Posts_Widget' ) ) {
    class Top_Posts_Widget extends WP_Widget
    {

        function __construct() {
            $widget_ops = array (
                'classname' => 'top_posts_widget',
	            'description' => esc_html__( 'This widget displays posts with respect to number of comments.', 'inspiry' )
            );
            parent::__construct( 'Top_Posts_Widget', esc_html__( 'Candor - Top Posts', 'inspiry' ), $widget_ops );
        }

        function widget( $args, $instance ) {
            extract( $args );

            $title = apply_filters( 'widget_title', $instance[ 'title' ] );

	        if ( empty( $instance[ 'number' ] ) || ! $number = absint( $instance[ 'number' ] ) ) {
		        $number = 5;
	        }

            echo $before_widget;

            if ( $title ) {
                echo $before_title . $title . $after_title;
            }

            $get_posts_query = new WP_Query( array (
                'post_type' => 'post',
                'posts_per_page' => $number,
                'orderby' => 'comment_count',
                'post_status' => 'publish',
                'ignore_sticky_posts' => true
            ) );

            if ( $get_posts_query->have_posts() ): ?>
                <div class="owl-carousel top-posts-carousel">
                    <?php
                    while ( $get_posts_query->have_posts() ):
                        $get_posts_query->the_post();
                        ?>
                        <article id="top-post-<?php the_ID(); ?>" <?php post_class( 'top-post clearfix' ); ?>>
                            <?php
                            if ( has_post_thumbnail() ) {
                                ?>
                                <figure class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'carousel-post-thumb', array ( 'class' => 'img-responsive' ) ); ?>
                                    </a>
                                </figure>
                                <?php
                            }
                            ?>
                            <div class="post-content-wrapper">
                                <header class="top-post-header">
                                    <span class="top-post-cat-links"><?php the_category( ', ' ); ?></span>
                                    <h2 class="top-post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                    <div class="top-post-entry-meta">
                                        <span class="top-post-meta-item author"><?php echo sprintf( '<a class="vcard fn" href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?></span>
                                        <span class="top-post-meta-item "><time class="entry-date published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'M d, Y' ); ?></time></span>
                                    </div><!-- .entry-meta -->
                                </header>
                                <!-- .entry-header -->
                                <div class="top-post-summary">
                                    <p><?php inspiry_excerpt( 10, '' ); ?></p>
                                </div>
                                <!-- .entry-summary -->
                                <a href="<?php the_permalink(); ?>" rel="bookmark" class="btn top-post-btn"><?php esc_html_e( 'Continue Reading', 'inspiry' ); ?></a>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
                <?php
                wp_reset_postdata();

            endif;

            echo $after_widget;
        }

        function update( $new_instance, $old_instance ) {
            $instance             = $old_instance;
            $instance[ 'title' ]  = sanitize_text_field( $new_instance[ 'title' ] );
            $instance[ 'number' ] = absint( $new_instance[ 'number' ] );

            return $instance;
        }

        function form( $instance ) {
            $title  = isset( $instance[ 'title' ] ) ? esc_attr( $instance[ 'title' ] ) : '';
            $number = isset( $instance[ 'number' ] ) ? absint( $instance[ 'number' ] ) : 3;
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'inspiry' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of items to show:', 'inspiry' ); ?></label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" size="5"/>
            </p>
            <?php
        }
    }
}

/* Register Top Post Widget */
if ( ! function_exists( 'inspiry_register_top_posts_widget' ) ) {
    function inspiry_register_top_posts_widget() {
        register_widget( 'Top_Posts_Widget' );
    }
}
add_action( 'widgets_init', 'inspiry_register_top_posts_widget' );

?>