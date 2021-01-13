<?php get_sidebar( 'header' ); ?>
<div id="content" class="site-content">
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">
            <?php _e( 'Skip to content', 'twentynineteen' ); ?>
        </a>
        <nav class="top-bar-navigation" aria-label="<?php esc_attr_e( 'Top bar Menu',
            'twentynineteen-child' ); ?>"
        >
		    <?php // wp_nav_menu( array( 'theme_location' => 'top-bar-menu' ) ); ?>
		    <?php
		    wp_nav_menu( array(
			    'container' => 'ul',
			    'menu_class' => 'menu top-bar-menu',
			    'menu_id' => 'top-bar-menu',
			    'link_before' => '<span class="top-bar-link-text">',
			    'link_after' => '</span>',
			    'theme_location' => 'top-bar-menu',
		    ) );
		    ?>
        </nav><!-- #top-bar-navigation -->