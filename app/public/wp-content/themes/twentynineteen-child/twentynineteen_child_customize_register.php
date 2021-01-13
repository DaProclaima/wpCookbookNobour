<?php
add_action( 'customize_register', 'twentynineteen_child_customize_register'
);
/**
 * Registers our new Customizer settings, sections and panels
 *
 * @param WP_Customize_Manager $wp_customize The Customize Manager
instance
 */
function twentynineteen_child_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'wpcookbook-copyright-text', array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'default' => '',
		'transport' => 'refresh',
		'validate_callback' => '',
		'sanitize_callback' => '',
		'sanitize_js_callback' => '',
	) );

	$wp_customize->add_control( 'wpcookbook-copyright-text', array(
		'type' => 'text',
		'priority' => 10,
		'section' => 'wpcookbook-footer',
		'label' => __( 'Footer copyright text', '16-customizer' ),
		'description' => __( 'This is the text to display in the footer instead of the theme\'s credit line.' ),
//		'choices' => array(
//		    'first-value' => __( 'First value','16-customizer' ),
//  		'another-value' => __( 'Another value','16-customizer' ),
//		    'yet-another-value' => __( 'Yet Another value','16-customizer' ),
//      ),
		'active_callback' => '',
		'input_attrs' => array(
			'class' => 'footer-copyright',
			'style' => 'border: 2px solid black', // Just for fun
			'placeholder' => __( 'Copyright Vincent Dubroeucq, 2019', '16-customizer' ),
		),
	));

	$wp_customize->add_section( 'wpcookbook-footer', array(
		'title' => __( 'Footer settings', '16-customizer' ),
		'description' => __( 'Adjust your footer preferences here', '16-customizer' ),
		'description_hidden' => false,
		'type' => 'default',
		'panel' => 'wpcookbook-theme-options',
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'active_callback' => '',

	) );

	$wp_customize->add_panel( 'wpcookbook-theme-options', array(
		'title' => __( 'Theme options', '16-customizer' ),
		'description' => __( 'Adjust all your child theme\'s settings here.', '16-customizer' ),
		'type' => 'default',
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'active_callback' => '',
		'auto_expand_sole_section' => false,
	) );
}
