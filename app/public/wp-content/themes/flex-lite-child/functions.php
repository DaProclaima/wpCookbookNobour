<?php

// in functions.php
add_action( 'wp_enqueue_scripts', 'flex_lite_child_scripts' );
/**
 * Loads parent styles
 */
function flex_lite_child_scripts(){
	wp_enqueue_style( 'flex-lite-styles', get_parent_theme_file_uri(
		'style.css' ) );
//	wp_dequeue_style( 'wp-block-library' );
}

add_action( 'after_setup_theme', 'flex_lite_child_setup' );
/**
 * Adds support for various features of the new editor
 */
function flex_lite_child_setup(){
// Add support for additionnal block styles
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
}

add_theme_support( 'editor-color-palette', array(
	array(
		'name' => __( 'Flex blue', 'flex-lite-child' ),
		'slug' => 'flex-blue',
		'color' => '#0080ff',
	),
	array(
		'name' => __( 'Flex orange', 'flex-lite-child' ),
		'slug' => 'flex-orange',
		'color' => '#FF7F00',
	),

) );
// Remove custom color options
//add_theme_support( 'disable-custom-colors' );

// Add support for theme font sizes
add_theme_support( 'editor-font-sizes', array(
	array(
		'name' => __( 'Small', 'flex-lite-child' ),
		'slug' => 'small',
		'size' => 14,
	),
	array(
		'name' => __( 'Normal', 'flex-lite-child' ),
		'slug' => 'normal',
		'size' => 18,
	),
	array(
		'name' => __( 'Larger', 'flex-lite-child' ),
		'slug' => 'larger',
		'size' => 22,
	),
	array(
		'name' => __( 'Largest', 'flex-lite-child' ),
		'slug' => 'largest',
		'size' => 28,
	)
) );
//add_theme_support( 'disable-custom-font-sizes' );

// Add support for editor styles
add_theme_support( 'editor-styles' );
add_editor_style();