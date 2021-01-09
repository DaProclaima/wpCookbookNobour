<?php
/**
 * Plugin Name: Plugin API - pre_get_posts hook
 * Plugin URI: https://example.com/plugins/02-plugin-api/
 * Description: This extension should trigger before and add content before showing any post
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://sebastiennobour.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 02-plugin-api
 * Domain Path: languages/
 */

// execute die() if someone tries to directly access the file without passing through WordPress
defined( 'ABSPATH' ) || die();

add_action( 'pre_get_posts', 'wpcookbook_query' );
// in main plugin file
function wpcookbook_query( $query ){
//    echo '<pre>';
//    wp_die( print_r( $query ) );
//    $query->set( 'post__not_in', array( 1 ) );
    if( $query->is_main_query() && ! is_admin() ){
        $query->set( 'post__not_in', array( 1 ) );
    }
}