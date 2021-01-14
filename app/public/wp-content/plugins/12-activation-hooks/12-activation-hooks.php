<?php
/**
 * Plugin Name: 12 Activation hooks
 * Plugin URI: https://example.com/plugins/11-loading-css-and-js
 * Description: Examples of how to load translations.
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://sebastiennobour.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 12-activation-hooks
 * Domain Path: languages/
 */

add_shortcode( 'wpcookbook_roles', 'wpcookbook_roles' );
/**
 * Callback function for our shortcode
 * Displays available user roles
 *
 * @param array $atts Shortcode attributes
 */
function wpcookbook_roles( $atts ){
//	ob_start();
//	$roles = wp_roles();
//	echo '<pre>';
//	var_dump($roles->roles);
//	echo '</pre>';
//	return ob_get_clean();
	ob_start();
	$current_user = wp_get_current_user();
	$user_role = ( array ) $current_user->roles;
	printf( __('<p>Your current role is&nbsp;: <strong>%s</strong></p>',
		'12-activation-hooks' ), join( ', ', $user_role ) );
	$roles = wp_roles();
	echo '<pre>';
	var_dump($roles->roles);
	echo '</pre>';
	return ob_get_clean();
}

register_activation_hook( __FILE__ , 'wpcookbook_activation' );
/**
 * Actions to perform on activation
 */
function wpcookbook_activation() {
	if ( get_role( 'client' ) ) {
		return;
	}
	add_role( 'client', 'Client', array(
		'read' => true,
	) );
}

register_uninstall_hook( __FILE__ , 'wpcookbook_deactivation' );
/**
 * Do not remove 'client' role, but adds a basic 'subscriber' role to user
who only had the 'client' role before
 */
function wpcookbook_deactivation(){
	$clients = get_users( array(
		'role' => 'client',
	) );
	if ( $clients ){
		foreach ( $clients as $client ) {
			if( 1 === count( $client->roles ) ){
				$client->add_role( 'subscriber' );
			}
		}
	}
}



