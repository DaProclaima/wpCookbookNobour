<?php
/**
 * Plugin Name: 08 - Localizing
 * Plugin URI: https://example.com/plugins/08-localizing/
 * Description: Examples of how to load translations.
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://vincentdubroeucq.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 08-localizing
 * Domain Path: languages/
 */
defined( 'ABSPATH' ) || die();

add_action( 'init', 'wpcookbook_load_textdomain' );
/**
 * Load translations
 */
function wpcookbook_load_textdomain() {
	load_plugin_textdomain( '08-localizing', FALSE, basename( dirname(
			__FILE__ ) ) . '/languages/' );
}

add_action( 'wp_footer', 'wpcookbook_footer_message' );
/**
 * Displays a simple message in the footer of the site.
 */
function wpcookbook_footer_message(){
	?>
	<p><?php esc_html_e( 'Made with love with WordPress', '08-localizing' ); ?></p>
	<?php
}