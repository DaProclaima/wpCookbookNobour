<?php
/**
 * Uninstallation file.
 * This code is executed when clicking the delete link on the plugins page.
 */
// If uninstall.php is not called via standard WordPress uninstall process, die
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

$clients = get_users( array(
	'role' => 'client'
) );
if ( $clients ){
	foreach ( $clients as $client ) {
		if( 1 === count( $client->roles ) ){
			$client->add_role( 'subscriber' );
		}
	}
}
