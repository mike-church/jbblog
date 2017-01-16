<?php
$inspiry_social_share = get_theme_mod( 'inspiry_social_share' );
if ( $inspiry_social_share == 'show' ) {
	echo inspiry_social_sharing_buttons();
}
?>