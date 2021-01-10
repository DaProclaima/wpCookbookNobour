<?php
/**
 * Our contact form template.
 */
defined( 'ABSPATH' ) || die();
?>

<?php do_action( 'wpcookbook_before_form', $strings ); ?>
    <form id="wpcookbook-form" action="" method="POST">
		<?php do_action( 'wpcookbook_before_fields', $strings ); ?>
        <p>
            <label for="name" style="display: block;"><?php echo esc_html( $strings['name']['label'] ); ?></label>
            <input type="text" id="name" name="name"
                   placeholder="<?php echo esc_attr( $strings['name']['placeholder'] ); ?>" required
            />
        </p>
        <p>
            <label for="email" style="display: block;"><?php echo esc_html( $strings['email']['label'] ); ?></label>
            <input type="email" id="email" name="email"
                   placeholder="<?php echo esc_attr( $strings['email']['placeholder'] ); ?>" required
            />
        </p>
        <p>
            <label for="message" style="display: block;"><?php echo esc_html( $strings['message']['label'] ); ?></label>
            <textarea id="message" placeholder="<?php echo esc_attr(
				$strings['message']['placeholder'] ); ?>"
            ></textarea>
        </p>
		<?php do_action( 'wpcookbook_after_fields', $strings ); ?>
        <p>
            <input type="submit" value="<?php esc_attr_e( 'Send message', '06-adding-hooks' ); ?>">
        </p>
    </form>
<?php do_action( 'wpcookbook_after_form', $strings ); ?>