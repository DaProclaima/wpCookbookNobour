<?php
/**
 * Our contact form template.
 */
defined( 'ABSPATH' ) || die();
?>

<p><?php echo $strings['dummy_text']; ?></p>
<form id="wpcookbook-form" action="" method="POST">
<form id="wpcookbook-form" action="" method="POST">
	<p>
		<label for="name" style="display: block;"><?php esc_html_e(
				'Your name', '06-adding-hooks' );?></label>
		<input type="text" id="name" name="name" required />
	</p>
	<p>
		<label for="email" style="display: block;"><?php esc_html_e(
				'Your email', '06-adding-hooks' );?></label>
		<input type="email" id="email" name="email" required />
	</p>
	<p>
		<label for="message" style="display: block;"><?php
			esc_html_e( 'Your message', '06-adding-hooks' );?></label>
		<textarea id="message" placeholder="<?php esc_attr_e( 'Type
something', '06-adding-hooks'); ?>"></textarea>
	</p>
	<p>
		<input type="submit" value="<?php esc_attr_e( 'Send 
message', '06-adding-hooks'); ?>">
	</p>
</form>
