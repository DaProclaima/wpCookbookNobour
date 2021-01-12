<?php

add_action( 'wp_head', 'wpcookbook_head' );
/**
 * Adds <link> tag and other scripts to <head> tag.
 */
function wpcookbook_head() {
	if ( is_page( 'sample-page' ) ) {
		$stylesheet_url = get_theme_file_uri( 'assets/css/my-customstyles.
css' );
		printf( '<link rel="stylesheet" href="%s">', esc_url(
			$stylesheet_url ) );
	}
}
