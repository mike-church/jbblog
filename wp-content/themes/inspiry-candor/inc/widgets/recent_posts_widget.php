<?php
if ( ! class_exists( 'Recent_Posts_Widget' ) ) {
    class Recent_Posts_Widget extends WP_Widget
    {

        function __construct() {
            $widget_ops = array ( 'classname' => 'recent_posts_widget', 'description' => esc_html__( 'This widget displays recent posts.', 'inspiry' ) );
            parent::__construct( 'Recent_Posts_Widget', esc_html__( 'Candor - Recent Posts', 'inspiry' ), $widget_ops );
        }

        function widget( $args, $instance ) {
            extract( $args );

            $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts', 'inspiry' );

            $title = apply_filters( 'widget_title', $title );

            if ( empty( $instance[ 'number' ] ) || ! $number = absint( $instance[ 'number' ] ) ) $number = 5;

            echo $before_widget;

            if ( $title ) {
                echo $before_title . $title . $after_title;
            }

            echo ' <ul class="widget-post-list clearfix">';

            $get_posts_query = new WP_Query( array (
                'post_type' => 'post',
                'posts_per_page'      => $number,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true
            ) );

            if ( $get_posts_query->have_posts() ):
                while ( $get_posts_query->have_posts() ):
                    $get_posts_query->the_post();
                    ?>
                    <li>
                        <?php
                        if ( has_post_thumbnail() ) {
                            ?>
                            <figure class="widget-post-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'thumbnail', array ( 'class' => 'widget-post-thumb' ) ); ?>
                                </a>
                            </figure>
                            <?php
                        }
                        ?>
                        <div class="widget-post-content">
                            <h3 class="widget-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="entry-meta">
                                <span class="author"><?php echo sprintf( '<a class="vcard fn" href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ); ?></span>
                                <span>
                                    <time class="entry-date published" datetime="<?php the_time( 'c' ); ?>"><?php the_time( 'M d, Y' ); ?></time>
                                </span>
                            </div>
                        </div>
                    </li>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;

            echo '</ul>';

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

/* Register Recent Post Widget */
if ( ! function_exists( 'inspiry_register_recent_posts_widget' ) ) {
    function inspiry_register_recent_posts_widget() {
        register_widget( 'Recent_Posts_Widget' );
    }
}
add_action( 'widgets_init', 'inspiry_register_recent_posts_widget' );

?>