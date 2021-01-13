<footer id="colophon" class="site-footer">
	<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
	<div class="site-info">
		<?php
		if( $logo = (int) get_theme_mod( 'wpcookbook-footer-logo' ) ){
			$src = wp_get_attachment_url( $logo );
			$alt = ! empty( get_post_meta( $logo, '_wp_attachment_image_alt', true ) )
                ? get_post_meta( $logo, '_wp_attachment_image_alt', true )
                : get_bloginfo( 'name' );
			printf( '<img class="footer-logo" src="%s" alt="%s">',
				esc_url( $src ), esc_attr( $alt ) );
		}

		wpcookbook_site_copyright();
		if ( function_exists( 'the_privacy_policy_link' ) ) {
			the_privacy_policy_link( '', '<span role="separator" ariahidden="true"></span>' );
		}
		?>
		<?php if ( $footer_text = get_theme_mod( 'wpcookbook-copyright-text' ) ) : ?>
			<p class="site-copyright">
				<strong><?php echo esc_html( $footer_text ); ?></strong>
			</p>
		<?php else: ?>
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
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
		<?php endif; ?>
		...
</footer><!-- #colophon -->