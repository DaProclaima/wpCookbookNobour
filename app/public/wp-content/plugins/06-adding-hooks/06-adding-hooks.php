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

define( 'ADDING_HOOKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'ADDING_HOOKS_URL', plugin_dir_url( __FILE__ ) );

add_shortcode( 'wpcookbook_form', 'wpcookbook_form' );


function wpcookbook_form( $atts ){
	$strings = apply_filters( 'wpcookbook_form_strings' , array(
		'name' => array(
			'label' => __( 'Your name', '06-adding-hooks' ),
			'placeholder' => __( 'John Doe', '06-adding-hooks' ),
		),
		'email' => array(
			'label' => __( 'Your email', '06-adding-hooks' ),
			'placeholder' => __( 'jdoe@example.com', '06-adding-hooks' ),
		),
		'message' => array(
			'label' => __( 'Your message', '06-adding-hooks' ),
			'placeholder' => __( 'Type something', '06-adding-hooks' ),
		),
	) );
	ob_start();
	include wpcookbook_locate_template( 'form.php' );
	return ob_get_clean();
}

/**
 * Returns the path to a template file.
 * Looks first if the file exists in the `wpcookbook/` folder in the child
theme,
 * then in the parent's theme `wpcookbook/` folder,
 * finally in the default plugin's template directory
 *
 * @param string $template_name The template we're looking for
 * @return string $located The path to the template file if found.
 */
function wpcookbook_locate_template( $template_name ) {
	$located = '';
	if ( file_exists( STYLESHEETPATH . '/wpcookbook/' . $template_name ) ) {
		$located = STYLESHEETPATH . '/wpcookbook/' . $template_name;
	} elseif ( file_exists( TEMPLATEPATH . '/wpcookbook/' . $template_name )
	) {
		$located = TEMPLATEPATH . '/wpcookbook/' . $template_name;
	} elseif ( file_exists( ADDING_HOOKS_PATH . '/templates/' .
	                        $template_name ) ) {
		$located = ADDING_HOOKS_PATH . '/templates/' . $template_name;
	}
	return str_replace( '..', '', $located ) ;
}

// Simulate an external user wanting to hook his own functions on my plugin (possible as I created hooks)
add_action( 'wpcookbook_after_fields', 'wpcookbook_newsletter_field', 10, 1
);
/**
 * Adds a simple checkbox field at the end of the form.
 *
 * @param array $strings Text strings used in the form.
 */
function wpcookbook_newsletter_field( $strings ){
	?>
    <p>
        <input id="newsletter" type="checkbox" name="newsletter" />
        <label for="newsletter"><?php echo esc_html(
				$strings['newsletter']['label'] );?></label>
    </p>
	<?php
}

add_filter( 'wpcookbook_form_strings', 'wpcookbook_form_strings' );
/**
 * Filters text strings used in the form
 *
 * @param array $strings Array of labels and placeholders
 * @return array $strings
 */
function wpcookbook_form_strings( $strings ){
	$strings['message']['label'] = __( 'Type in your message. Don’t hesitate to include lots of details.',
        '06-adding-hooks' );
	$strings['newsletter']['label'] = __( 'Subscribe to the newsletter',
		'06-adding-hooks' );
	return $strings;
}