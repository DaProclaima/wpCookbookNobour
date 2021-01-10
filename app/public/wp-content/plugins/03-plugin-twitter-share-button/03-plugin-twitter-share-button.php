<?php
/**
 * Plugin Name: Plugin API - twitter share button plugin
 * Plugin URI: https://example.com/plugins/03-plugin-api-twitter-share-button/
 * Description: This extension show a twitter share button
 * Version: 1.0
 * Requires at least: 5.6
 * Requires PHP: 8.0.0
 * Author: Sébastien NOBOUR
 * Author URI: https://sebastiennobour.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 03-plugin-api-twitter-share-button
 * Domain Path: languages/
 */

defined( 'ABSPATH' ) || die();

add_filter( 'the_content', 'wpcookbook_twitter_share_button', 10 , 1 );

/**
 * Adds a Twitter share button after the content on single posts.
 *
 * @param string $content HTML content for the post
 * @return string $content
 */
function wpcookbook_twitter_share_button( $content ){
	if( is_single() ){
		$content .=
			'
				<div class="wpcookbook-share">
					<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
					<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
				</div>';
	}
	return $content;
}

