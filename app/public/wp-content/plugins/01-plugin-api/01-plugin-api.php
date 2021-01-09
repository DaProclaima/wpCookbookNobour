<?php
/**
 * Plugin Name: Plugin API - Basic hook examples.
 * Plugin URI: https://example.com/plugins/01-plugin-api/
 * Description: This registers a few basic hooks, just to see how hooks work.
 * Version: 1.0
 * Requires at least: 5.2
 * Requires PHP: 8.0.0
 * Author: Vincent Dubroeucq
 * Author URI: https://vincentdubroeucq.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 01-plugin-api
 * Domain Path: languages/
 */

//
// execute die() if someone tries to directly access the file without passing through WordPress
defined( 'ABSPATH' ) || die();

/*
 * Functions declared outside of a PHP class are available globally.
   This means that they can come into conflict with functions of WordPress or other extensions
   (try to declare a function called the_title to see!).
   To avoid any name conflict, you must imperatively prefix your functions.
   By convention, the prefix should be the slug of your extension. So here, our function should normally
   be called 01_plugin_api_title( ).
   But, starting a function with a number is invalid, so to make it simpler I will use the prefix
   wpcookbook_ .
*/
//add_filter( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 2 )
//add_filter( 'the_title', 'wpcookbook_title' );
add_filter( 'the_title', 'wpcookbook_title', 10, 2 );

/*
 * Somewhere the system executes
 * return apply_filters( 'the_title', $title, $id );
 *  whose syntax is apply_filters( string $tag, mixed $value [, mixed $...] )
 * */
/**
 * Changes the post and page titles to 'TOTO'
 *
 * @param string $title The title of the post
 * @param int $id The post id
 * @return string $title
 */
function wpcookbook_title( $title, $id ){
    $title = 'TOTO ' . $id;
    return $title;
}

// add_action( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )
add_action( 'wp_footer', 'wpcookbook_footer', 15, 1 );
/**
 * Prints a custom message in the footer.
 *
 * @param mixed $args Arguments passed to the callback by corresponding
do_action() call. Defaults to empty string.
 */
function wpcookbook_footer( $args ){
    ?>
    <p>This is a custom message to print in the footer&nbsp;! </p>
    <p><?php var_dump( $args );?></p>
    <?php global $wp_filter; print_r($wp_filter[current_filter()]);
}

remove_action( 'wp_footer', 'wpcookbook_footer', 15 );
