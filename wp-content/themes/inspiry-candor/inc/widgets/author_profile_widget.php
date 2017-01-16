<?php

/**
 * Class Author Profile Widget
 */
class Inspiry_Author_Profile extends WP_Widget
{

	function __construct() {
		parent::__construct(
			'Inspiry_Author_Profile',
			__( 'Candor - Author Profile', 'inspiry' ),
			array( 'description' => esc_html__( 'This widget displays gravatar photo, name, bio and social icons for selected author.', 'inspiry' ) )
		);
	}

	public function form( $instance ) {
		$defaults = array(
			'inspiry_author_id' => 0,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'inspiry_author_id' ) ); ?>"><?php esc_html_e( 'Select User', 'inspiry' ); ?></label>
			<?php
			wp_dropdown_users( array(
				'id' => $this->get_field_id( 'inspiry_author_id' ),
				'name' => $this->get_field_name( 'inspiry_author_id' ),
				'selected' => $instance[ 'inspiry_author_id' ],
			) );
			?>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance[ 'inspiry_author_id' ] = isset( $new_instance[ 'inspiry_author_id' ] ) ? intval( $new_instance[ 'inspiry_author_id' ] ) : 0;
		return $instance;
	}

	public function widget( $args, $instance ) {

		$inspiry_author_id = $instance[ 'inspiry_author_id' ];

		echo $args['before_widget'];

		if ( $inspiry_author_id > 0 ) {

		?>
		<div class="inspiry-author-profile">

			<a href="<?php echo esc_url( get_author_posts_url( $inspiry_author_id ) ); ?>" class="author-gravatar">
				<?php echo get_avatar( $inspiry_author_id, 360 ); ?>
			</a>

            <h3 class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name', $inspiry_author_id ) ); ?></h3>

			<p><?php echo esc_html( get_the_author_meta( 'description', $inspiry_author_id ) ); ?></p>

			<?php
			/*
			 * Social Icons
			 */
			$user_link_facebook  = get_the_author_meta( 'inspiry_facebook_url', $inspiry_author_id );
			$user_link_twitter   = get_the_author_meta( 'inspiry_twitter_url', $inspiry_author_id );
			$user_link_linkedin  = get_the_author_meta( 'inspiry_linkedin_url', $inspiry_author_id );
			$user_link_google    = get_the_author_meta( 'inspiry_google_url', $inspiry_author_id );
			$user_link_instagram = get_the_author_meta( 'inspiry_instagram_url', $inspiry_author_id );
			$user_name_skype     = get_the_author_meta( 'inspiry_skype_username', $inspiry_author_id );
			$user_link_youtube   = get_the_author_meta( 'inspiry_youtube_url', $inspiry_author_id );
			$user_link_pinterest = get_the_author_meta( 'inspiry_pinterest_url', $inspiry_author_id );

			if ( ! empty( $user_link_facebook )
				|| ! empty( $user_link_twitter )
				|| ! empty( $user_link_linkedin )
				|| ! empty( $user_link_google )
				|| ! empty( $user_link_instagram )
				|| ! empty( $user_name_skype )
				|| ! empty( $user_link_youtube )
				|| ! empty( $user_link_pinterest ) ) :
			?>
			<div class="social-icons">
				<?php
				if ( ! empty( $user_link_facebook ) ) {
					?><a class="facebook" target="_blank" href="<?php echo esc_url( $user_link_facebook ); ?>"><i class="fa fa-facebook"></i></a><?php
				}

				if ( ! empty( $user_link_twitter ) ) {
					?><a class="twitter" target="_blank" href="<?php echo esc_url( $user_link_twitter ); ?>"><i class="fa fa-twitter"></i></a><?php
				}

				if ( ! empty( $user_link_linkedin ) ) {
					?><a class="linkedin" target="_blank" href="<?php echo esc_url( $user_link_linkedin ); ?>"><i class="fa fa-linkedin"></i></a><?php
				}

				if ( ! empty( $user_link_google ) ) {
					?><a class="gplus" target="_blank" href="<?php echo esc_url( $user_link_google ); ?>"><i class="fa fa-google-plus"></i></a><?php
				}

				if ( ! empty( $user_link_instagram ) ) {
					?><a class="instagram" target="_blank" href="<?php echo  esc_url( $user_link_instagram ); ?>"><i class="fa fa-instagram"></i></a><?php
				}

				if ( ! empty( $user_link_youtube ) ) {
					?><a class="youtube" target="_blank" href="<?php echo esc_url( $user_link_youtube ); ?>"><i class="fa fa-youtube"></i></a><?php
				}

				if ( ! empty( $user_name_skype ) ) {
					?><a class="skype" target="_blank" href="skype:<?php echo esc_attr( $user_name_skype ); ?>?add"><i class="fa fa-skype"></i></a><?php
				}

				if ( ! empty( $user_link_pinterest ) ) {
					?><a class="pinterest" target="_blank" href="<?php echo esc_html( $user_link_pinterest ); ?>"><i class="fa fa-pinterest"></i></a><?php
				}
				?>
			</div>
			<?php endif; ?>

		</div>
		<?php
		} else {
			esc_attr_e( 'Widget is not properly configured!', 'inspiry' );
		}

		echo $args['after_widget'];
	}

}

/* Register Author Profile Widget */
if ( ! function_exists( 'register_author_profile_widget' ) ) {
	function register_author_profile_widget() {
		register_widget( 'Inspiry_Author_Profile' );
	}
}
add_action( 'widgets_init', 'register_author_profile_widget' );