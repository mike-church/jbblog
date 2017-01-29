<?php
global $post;
$user_link_facebook  = esc_url( get_the_author_meta( 'inspiry_facebook_url', $post->post_author ) );
$user_link_twitter   = esc_url( get_the_author_meta( 'inspiry_twitter_url', $post->post_author ) );
$user_link_linkedin  = esc_url( get_the_author_meta( 'inspiry_linkedin_url', $post->post_author ) );
$user_link_google    = esc_url( get_the_author_meta( 'inspiry_google_url', $post->post_author ) );
$user_link_instagram = esc_url( get_the_author_meta( 'inspiry_instagram_url', $post->post_author ) );
$user_link_skype     = esc_url( get_the_author_meta( 'inspiry_skype_username', $post->post_author ) );
$user_link_youtube   = esc_url( get_the_author_meta( 'inspiry_youtube_url', $post->post_author ) );
$user_link_pinterest = esc_url( get_the_author_meta( 'inspiry_pinterest_url', $post->post_author ) );

if ( ! empty( $user_link_facebook ) || ! empty( $user_link_twitter ) || ! empty( $user_link_linkedin ) || ! empty( $user_link_google )
     || ! empty( $user_link_instagram ) || ! empty( $user_link_skype ) || ! empty( $user_link_youtube ) || ! empty( $user_link_pinterest ) ) :
    ?>
    <div class="social-networks">
        <?php
        if ( ! empty( $user_link_facebook ) ) {
            ?>
            <a class="facebook" target="_blank" href="<?php echo esc_url( $user_link_facebook ); ?>"><i class="fa fa-facebook"></i></a>
            <?php
        }

        if ( ! empty( $user_link_twitter ) ) {
            ?>
            <a class="twitter" target="_blank" href="<?php echo esc_url( $user_link_twitter ); ?>"><i class="fa fa-twitter"></i></a>
            <?php
        }

        if ( ! empty( $user_link_linkedin ) ) {
            ?>
            <a class="linkedin" target="_blank" href="<?php echo esc_url( $user_link_linkedin ); ?>"><i class="fa fa-linkedin"></i></a>
            <?php
        }

        if ( ! empty( $user_link_google ) ) {
            ?>
            <a class="gplus" target="_blank" href="<?php echo esc_url( $user_link_google ); ?>"><i class="fa fa-google-plus"></i></a>
            <?php
        }

        if ( ! empty( $user_link_instagram ) ) {
            ?>
            <a class="instagram" target="_blank" href="<?php echo esc_url( $user_link_instagram ); ?>"><i class="fa fa-instagram"></i></a>
            <?php
        }

        if ( ! empty( $user_link_youtube ) ) {
            ?>
            <a class="youtube" target="_blank" href="<?php echo esc_url( $user_link_youtube ); ?>"><i class="fa fa-youtube"></i></a>
            <?php
        }

        if ( ! empty( $user_link_skype ) ) {
            ?>
            <a class="skype" target="_blank" href="skype:<?php echo esc_attr( $user_link_skype ); ?>?add"><i class="fa fa-skype"></i></a>
            <?php
        }

        if ( ! empty( $user_link_pinterest ) ) {
            ?>
            <a class="pinterest" target="_blank" href="<?php echo esc_url( $user_link_pinterest ); ?>"><i class="fa fa-pinterest"></i></a>
            <?php
        }
        ?>
    </div>
<?php endif; ?>
