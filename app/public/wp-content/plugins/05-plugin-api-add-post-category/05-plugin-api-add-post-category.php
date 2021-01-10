<?php
/**
 * Plugin Name: Plugin API - modify admin post add category feature
 * Plugin URI: https://example.com/plugins/05-plugin-api-add-post-category/
 * Description: This extension modifies the admin post add category feature
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://sebastiennobour.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 05-plugin-api-add-post-category
 * Domain Path: languages/
 */

defined( 'ABSPATH' ) || die();

add_action( 'category_add_form_fields',
	'wpcookbook_category_subtitle_field', 10, 1 );

/**
 * Adds a text input field for 'Subtitle' on new category page
 *
 * @param string $taxonomy Slug of the taxonomy ('category')
 */
function wpcookbook_category_subtitle_field( $taxonomy ){
	?>
	<div class="form-field term-subtitle-wrap">
		<label for="category-subtitle"><?php esc_html_e( 'Subtitle',
				'05-finding-hooks' ); ?></label>
		<input type="text" name="category-subtitle" id="categorysubtitle"
		       class="category-subtitle" size=40 />
		<p><?php esc_html_e( 'Type in a subtitle to display in your
theme.', '05-finding-hooks' ); ?></p>
	</div>
	<?php
}
