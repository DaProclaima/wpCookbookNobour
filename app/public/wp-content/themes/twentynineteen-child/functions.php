<?php

// in functions.php
add_action('wp_enqueue_scripts', 'twentynineteen_child_scripts');
/**
 * Loads parent styles
 */
function twentynineteen_child_scripts()
{
    wp_enqueue_style('parent-styles', get_parent_theme_file_uri(
        'style.css'));
}
