<?php
/**
 * Plugin Name: 13 Roles
 * Plugin URI: https://example.com/plugins/13-roles
 * Description: Examples of how to load translations.
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://sebastiennobour.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 13-roles
 * Domain Path: languages/
 */

add_shortcode( 'wpcookbook_roles', 'wpcookbook_roles' );
/**
 * User Table shortcode display callback
 *
 * @param array $atts Shortcode attributes
 */
function wpcookbook_roles( $atts ){
	$users = get_users();
	ob_start();
	if( current_user_can( 'administrator' ) ) : ?>
	<table>
		<thead>
		<tr>
			<th style="width:25%"><?php _e( 'Username', '22-rolescapabilities'); ?></th>
			<th style="width:25%"><?php _e( 'Role', '22-rolescapabilities' ); ?></th>
			<th><?php _e( 'Capabilities', '22-roles-capabilities' ); ?></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach( $users as $user ) : ?>
			<tr>
				<td style="word-break: break-word;"><?php echo esc_html( $user->user_login ); ?></td>
				<td style="word-break: break-word;"><?php echo join( '<br>', $user->roles); ?></td>
				<td style="word-break: break-word;">
					<?php echo join( '<br>', array_keys( $user->allcaps ) ); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php else : ?>
		<p><?php _e( 'Sorry, you are not allowed to view this content.', '13-roles' ); ?></p>
	<?php
	endif;
	return ob_get_clean();
}

add_action( 'init', 'wpcookbook_add_role' );
/**
 * Adds a new user role
 */
function wpcookbook_add_role(){
	if ( get_role( 'chief-editor' ) ){
// remove_role( 'chief-editor' );
		return;
	}
	$editor_capabilities = array(
		'moderate_comments' => true,
		'manage_categories' => true,
		'manage_links' => true,
		'upload_files' => true,
		'unfiltered_html' => true,
		'edit_posts' => true,
		'edit_others_posts' => true,
		'edit_published_posts' => true,
		'publish_posts' => true,
		'edit_pages' => true,
		'read' => true,
		'edit_others_pages' => true,
		'edit_published_pages' => true,
		'publish_pages' => true,
		'delete_pages' => true,
		'delete_others_pages' => true,
		'delete_published_pages' => true,
		'delete_posts' => true,
		'delete_others_posts' => true,
		'delete_published_posts' => true,
		'delete_private_posts' => true,
		'edit_private_posts' => true,
		'read_private_posts' => true,
		'delete_private_pages' => true,
		'edit_private_pages' => true,
		'read_private_pages' => true,
		'editor' => true,
	);

	$additionnal_capabilities = array(
		'edit_users' => true,
		'delete_users' => true,
		'create_users' => true,
		'list_users' => true,
		'remove_users' => true,
		'promote_users' => true,
		'chief-editor' => true,
	);
	add_role(
		'chief-editor',
		'Chief Editor',
		array_merge( $editor_capabilities, $additionnal_capabilities )
	);
}

add_filter( 'gettext_with_context', 'wpcookbook_translate_role', 20, 4 );
/**
 * @param string $translation Translated text
 * @param string $text Text to translate
 * @param string $context Context for translators
 * @param string $domain Text domain
 * @return string $translation
 */
function wpcookbook_translate_role( $translation, $text, $context, $domain
){
	if( 'Chief Editor' === $text && 'User role' === $context && '13-roles' !== $domain ){
		$translation = translate_with_gettext_context( $text, $context, '13-roles' );
	}
	return $translation;
}

//add_action( 'init', 'wpcookbook_add_another_user_role' );
///**
// * Adds the 'subscriber' role to chief editor
// */
//function wpcookbook_add_another_user_role(){
//	$chief_editor = get_userdata(8);
//	if ( $chief_editor && ! in_array( 'subscriber', $chief_editor->roles )
//	) {
//		$chief_editor->add_role('subscriber');
//	}
//}

//add_action( 'init', 'wpcookbook_remove_another_user_role' );
///**
// * Removes the 'subscriber' role to chief editor
// */
//function wpcookbook_remove_another_user_role(){
//	$chief_editor = get_userdata(8);
//	if ( $chief_editor && in_array( 'subscriber', $chief_editor->roles ) )
//	{
//		$chief_editor->remove_role('subscriber');
//	}
//}

add_action( 'init', 'wpcookbook_add_capabilities' );
/**
 * Adds theme-related capabilities to chief editor
 */
function wpcookbook_add_capabilities(){
	$chief_editor = get_role( 'chief-editor' );
	if( $chief_editor ){
		$chief_editor->add_cap( 'edit_theme_options' );
		$chief_editor->add_cap( 'customize' );
	}
}

add_action( 'init', 'wpcookbook_add_user_cap' );
/**
 * Adds the 'manage_my_plugin' capability to chief editor
 */
function wpcookbook_add_user_cap(){
	$chief_editor = get_userdata(8);
	if ( $chief_editor && ! $chief_editor->has_cap( 'manage_my_plugin' ) )
	{
		$chief_editor->add_cap( 'manage_my_plugin' );
		// opposite remove_cap()
	}
}