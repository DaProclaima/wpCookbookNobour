<?php

// in functions.php
add_action('wp_enqueue_scripts', 'twentynineteen_child_scripts');
/**
 * Loads parent styles
 */
function twentynineteen_child_scripts()
{
    wp_enqueue_style('parent-styles', get_parent_theme_file_uri(
        'style.css'));
}
// TODO: Dans quel fichier doit-on mettre ça?  Chapitre charger les ressources JS et CSS correctement
//add_action( 'wp_head', 'wpcookbook_head' );
///**
// * Adds <link> tag and other scripts to <head> tag.
// */
//function wpcookbook_head() {
//	if ( is_page( 'sample-page' ) ) {
//		$stylesheet_url = get_theme_file_uri( 'assets/css/my-customstyles.
//css' );
//		echo $stylesheet_url;
//		printf( '<link rel="stylesheet" href="%s">', esc_url(
//			$stylesheet_url ) );
//	}
//}

add_action( 'wp_enqueue_scripts', 'wpcookbook_styles_and_scripts' );
/**
 * Enqueues stylesheet and scripts.
 */
function wpcookbook_styles_and_scripts() {
	if ( is_page( 'sample-page' ) ) {
		$stylesheet_url = get_theme_file_uri( 'assets/css/my-customstyles.css' );
		wp_enqueue_style( 'my-custom-styles', esc_url( $stylesheet_url ), array(), time() );
//		wp_enqueue_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ));
		wp_enqueue_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ), array(), time(), true );
	}
}

