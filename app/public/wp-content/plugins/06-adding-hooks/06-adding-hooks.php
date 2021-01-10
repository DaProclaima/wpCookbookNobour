<?php
/**
 * Plugin Name: Plugin API - add contact form
 * Plugin URI: https://example.com/plugins/06-adding-hooks/
 * Description: This extension add contact form
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://sebastiennobour.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 06-adding-hooks
 * Domain Path: languages/
 */

defined( 'ABSPATH' ) || die();

add_shortcode( 'wpcookbook_form', 'wpcookbook_form' );

/**
 * Displays our form
 */
function wpcookbook_form( $atts ){
	ob_start();
	?>
	<form id="wpcookbook-form" action="" method="POST">
		<p>
			<label for="name" style="display: block;"><?php esc_html_e(
					'Your name', '06-adding-hooks' );?></label>
			<input type="text" id="name" name="name" required />
		</p>
		<p>
			<label for="email" style="display: block;"><?php esc_html_e(
					'Your email', '06-adding-hooks' );?></label>
			<input type="email" id="email" name="email" required />
		</p>
		<p>
			<label for="message" style="display: block;"><?php
				esc_html_e( 'Your message', '06-adding-hooks' );?></label>
			<textarea id="message" placeholder="<?php esc_attr_e( 'Type 
			something', '06-adding-hooks'); ?>"></textarea>
		</p>
		<p>
			<input type="submit" value="<?php esc_attr_e( 'Send
			message', '06-adding-hooks'); ?>">
		</p>
	</form>
	<?php
	return ob_get_clean();
}