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

//add_action( 'wp_enqueue_scripts', 'wpcookbook_styles_and_scripts' );
///**
// * Enqueues stylesheet and scripts.
// */
//function wpcookbook_styles_and_scripts() {
//	if ( is_page( 'sample-page' ) ) {
//		$stylesheet_url = get_theme_file_uri( 'assets/css/my-customstyles.css' );
//		wp_enqueue_style( 'my-custom-styles', esc_url( $stylesheet_url ), array(), time() );
////		wp_enqueue_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ));
//		wp_enqueue_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ), array(), time(), true );
//	}
//}

add_action( 'wp_enqueue_scripts', 'wpcookbook_styles_and_scripts' );
/**
 * Enqueues stylesheet and scripts.
 */
function wpcookbook_styles_and_scripts() {
	$stylesheet_url = get_theme_file_uri( 'assets/css/my-custom-styles.css'
	);
	wp_register_style( 'my-custom-styles', esc_url( $stylesheet_url ),
		array(), time() );
	if ( is_page( 'sample-page' ) ) {
		wp_enqueue_style( 'my-custom-styles' );
	}
	wp_register_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ),
		array(), time(), true );
	wp_enqueue_script( 'alert' );
}

add_action( 'admin_enqueue_scripts', 'wpcookbook_admin_scripts', 10, 1 );
/**
 * Loads styles only on the general options page
 */
function wpcookbook_admin_scripts( $hook_suffix ) {
	if ( 'options-general.php' === $hook_suffix ) {
		wp_enqueue_style( 'admin-styles', get_theme_file_uri(
			'assets/css/admin.css' ), array(), time() );
	}
}

add_action( 'widgets_init', 'wpcookbook_sidebars' );
function wpcookbook_sidebars(){
	register_sidebar( array(
		'name' => __( 'Header widgets', 'twentynineteen-child' ),
		'id' => 'header-widgets',
		'description' => __( 'The widgets added here will appear just below the header, and before the content.',
			'twentynineteen-child'
		),
		'before_widget' => '<div id="%1$s" class="widget header-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>'
	) );
}
