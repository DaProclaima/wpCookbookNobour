<?php
/**
 * Plugin Name: 11 - Loading css and js
 * Plugin URI: https://example.com/plugins/11-loading-css-and-js
 * Description: Examples of how to load translations.
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://vincentdubroeucq.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 11-loading-css-and-js
 * Domain Path: languages/
 */
add_shortcode( 'wpcookbook_table', 'wpcookbook_table' );
/**
 * Adds a simple shortcode displaying a table
 *
 * @param string $atts shortcode attributes
 */
function wpcookbook_table( $atts ) {
// Enqueue our scripts.
	$stylesheet_url = plugins_url( 'assets/css/custom-table.css', __FILE__
	); // Assuming this function is in bootstrap file
	$script_url = plugins_url( 'assets/js/custom-table.js', __FILE__ );
	wp_enqueue_style( 'custom-table-styles', esc_url( $stylesheet_url ),
		array(), time() );
	wp_enqueue_script( 'custom-table-script', esc_url( $script_url ),
		array(), time(), true );
// Get the HTML content.
	ob_start();
	printf( '<h2>%s</h2>', __( 'My custom table', 'wpcookbook' ) );
	/** include table template here with include() for example */
	return ob_get_clean();
}