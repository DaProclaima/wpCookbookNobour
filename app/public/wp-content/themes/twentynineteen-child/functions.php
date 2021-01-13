<?php

// in functions.php
add_action( 'wp_enqueue_scripts', 'twentynineteen_child_scripts' );
/**
 * Loads parent styles
 */
function twentynineteen_child_scripts() {
	wp_enqueue_style( 'parent-styles', get_parent_theme_file_uri(
		'style.css' ) );
}

// TODO: Dans quel fichier doit-on mettre ça?  Chapitre charger les ressources JS et CSS correctement
//add_action( 'wp_head', 'wpcookbook_head' );
///**
// * Adds <link> tag and other scripts to <head> tag.
// */
//function wpcookbook_head() {
//	if ( is_page( 'sample-page' ) ) {
//		$stylesheet_url = get_theme_file_uri( 'assets/css/my-customstyles.
//css' );
//		echo $stylesheet_url;
//		printf( '<link rel="stylesheet" href="%s">', esc_url(
//			$stylesheet_url ) );
//	}
//}

//add_action( 'wp_enqueue_scripts', 'wpcookbook_styles_and_scripts' );
///**
// * Enqueues stylesheet and scripts.
// */
//function wpcookbook_styles_and_scripts() {
//	if ( is_page( 'sample-page' ) ) {
//		$stylesheet_url = get_theme_file_uri( 'assets/css/my-customstyles.css' );
//		wp_enqueue_style( 'my-custom-styles', esc_url( $stylesheet_url ), array(), time() );
////		wp_enqueue_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ));
//		wp_enqueue_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ), array(), time(), true );
//	}
//}

add_action( 'wp_enqueue_scripts', 'wpcookbook_styles_and_scripts' );
/**
 * Enqueues stylesheet and scripts.
 */
function wpcookbook_styles_and_scripts() {
	$stylesheet_url = get_theme_file_uri( 'assets/css/my-custom-styles.css'
	);
	wp_register_style( 'my-custom-styles', esc_url( $stylesheet_url ),
		array(), time() );
	if ( is_page( 'sample-page' ) ) {
		wp_enqueue_style( 'my-custom-styles' );
	}
	wp_register_script( 'alert', get_theme_file_uri( 'assets/js/alert.js' ),
		array(), time(), true );
	wp_enqueue_script( 'alert' );
}

add_action( 'admin_enqueue_scripts', 'wpcookbook_admin_scripts', 10, 1 );
/**
 * Loads styles only on the general options page
 */
function wpcookbook_admin_scripts( $hook_suffix ) {
	if ( 'options-general.php' === $hook_suffix ) {
		wp_enqueue_style( 'admin-styles', get_theme_file_uri(
			'assets/css/admin.css' ), array(), time() );
	}
}

add_action( 'widgets_init', 'wpcookbook_sidebars' );
function wpcookbook_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Header widgets', 'twentynineteen-child' ),
		'id'            => 'header-widgets',
		'description'   => __( 'The widgets added here will appear just below the header, and before the content.',
			'twentynineteen-child'
		),
		'before_widget' => '<div id="%1$s" class="widget header-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
}

add_action( 'after_setup_theme', 'twentynineteen_child_setup' );
/**
 * Setup all of our theme's functionnalities
 */
//function twentynineteen_child_setup(){
//	register_nav_menu( 'top-bar-menu', __( 'Top bar menu', 'twentynineteenchild'
//	) );
//}
function twentynineteen_child_setup() {
	register_nav_menus( array(
		'top-bar-menu' => __( 'Top bar menu', 'twentynineteen-child' ),
	) );
}

add_action( 'pre_get_posts', 'wpcookbook_pre_get_posts', 10, 1 );
/**
 * Modifies the query on main blog page.
 *
 * @param $query Query object
 */
function wpcookbook_pre_get_posts( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		$query->set( 'order', 'ASC' );
	}
//	if( ! is_admin() && $query->is_main_query() && $query->is_home() ){
//		$query->set( 'category__not_in', array( '1' ) );
//	}
//	if( ! is_admin() && $query->is_main_query() && $query->is_search() ){
//		$query->set( 'post_type', array( 'post', 'page', 'my-post-type' ) );
//	}
//	if( ! is_admin() && $query->is_main_query() ){
//		$query->set( 'meta_query', array(
//			'relation' => 'AND',
//			array(
//				'key' => 'my_custom_field',
//				'value' => 'display',
//			),
//			array(
//				'key' => 'my_second_custom_field',
//				'value' => 'another_value',
//			),
//		) );
//	}
//	if( ! is_admin() && $query->is_main_query() ){
//		$query->set( 'tax_query' , array(
//			'relation' => 'AND',
//			array(
//				'taxonomy' => 'category',
//				'field' => 'slug',
//				'terms' => array( 'wordpress' ),
//			),
//			array(
//				'taxonomy' => 'post_tag',
//				'field' => 'slug',
//				'terms' => array( 'snippet' ),
//			),
//		) );
//	}
}

add_filter( 'the_content', 'wpcookbook_related_posts', 10, 1 );
/**
 * Adds a related posts block to the content
 */
function wpcookbook_related_posts( $content ) {
	if ( is_single() ) {
//		$category_ids = array();
//		$q = new WP_query( array(
//			'posts_per_page ' => 3,
//			'category__in' => $category_ids,
//		) );
		$category_ids = wp_list_pluck( get_the_category(), 'term_id' );
		$q = new WP_query( array(
			'posts_per_page ' => 3,
			'category__in' => $category_ids,
			'post__not_in' => array( get_the_ID() ),
		) );
		if ( $q->have_posts() ) {
			ob_start();
			?>
            <div class="wpcookbook-related-posts">
                <h3><?php esc_html_e( 'Related posts', '15-loops' ) ?></h3>
                <ul class="wpcookbook-related-posts-list">
					<?php
					while ( $q->have_posts() ) {
						$q->the_post();
						the_title( sprintf( '<li class="wpcookbook-relatedpost"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></li>' );
					}
					?>
                </ul>
            </div>
			<?php
			$content .= ob_get_clean();
			wp_reset_postdata();
		}
	}

	return $content;
}

add_action( 'wp_head', 'wpcookbook_text_color' );
/**
 * Prints <style> tag to change the body text color
 */
function wpcookbook_text_color(){
	$color = get_theme_mod( 'wpcookbook-text-color' );
	if( $color ){
		echo '<style>body{color:' . sanitize_hex_color( $color ) . ';}
</style>';
	}
}

///**
// * Validates our footer text setting
// *
// * @param WP_Error $validity Empty WP_Error initially. If
//there are problems, use `add()` method to add error messages.
// * @param mixed $value The value to validate.
// * @param WP_Customize_Setting $setting The corresponding setting.
// */
//function wpcookbook_validate_footer_text( $validity , $value, $setting ){
//	if( wp_kses_post( $value ) !== $value ){
//		$validity->add( 'invalid', __( 'Invalid string. Use only basic
//HTML.', 'twentynineteen-child' ) );
//	}
//	return $validity;
//}

/**
 * Sanitizes our footer text setting
 * Now our field only accepts <em> and <a> tags with href attributes
 *
 * @param mixed $value The value to sanitize.
 * @param WP_Customize_Setting $setting The corresponding setting.
 */
function wpcookbook_sanitize_footer_text( $value, $setting ){
	return wp_kses( $value, array(
		'em' => array(),
		'a' => array(
			'href' => array(),
		),
	) );
}


/**
 * Validates our footer text setting
 *
 * @param WP_Error $validity Empty WP_Error initially. If
there are problems, use `add()` method to add error messages.
 * @param mixed $value The value to validate.
 * @param WP_Customize_Setting $setting The corresponding setting.
 */
function wpcookbook_validate_footer_text( $validity , $value, $setting ){
	if( wpcookbook_sanitize_footer_text( $value, $setting ) !== $value ){
		$validity->add( 'invalid',
            esc_html__( 'Invalid string. You are only allowed to use <em> and <a> tags.',
                'twentynineteen-child' )
        );
	}
	return $validity;
}

/**
 * Displays the custom footer text.
 * Can be used as a partial for the customizer.
 */
function wpcookbook_site_copyright(){
	echo '<p class="site-copyright">';
	if( $footer_text = get_theme_mod( 'wpcookbook-copyright-text' ) ) {
		echo '<strong>' . $footer_text .'</strong>';
	} else {
		$blog_info = get_bloginfo( 'name' );
		if ( ! empty( $blog_info ) ) : ?>
            <a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>,
		<?php endif; ?>
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentynineteen' ) ); ?>" class="imprint">
			<?php
			/* translators: %s: WordPress. */
			printf( __( 'Proudly powered by %s.', 'twentynineteen' ),
				'WordPress' );
			?>
        </a>
		<?php
		echo '</p>';
	}
}

add_action( 'customize_preview_init', 'wpcookbook_enqueue_customizer_js' );
/**
 * Enqueues our Customizer JavaScript handler
 */
function wpcookbook_enqueue_customizer_js() {
	wp_enqueue_script( 'wpcookbook_customizer', get_theme_file_uri(
		'assets/js/customizer.js' ), array( 'customize-preview', 'jquery' ), null,
		true );
}

include 'twentynineteen_child_customize_register.php';
