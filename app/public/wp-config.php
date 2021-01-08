<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'UuO1HG7n9hBKKrlbt487g8MG28yLLGcK8/ALgwFbxbL+7WnPoHwJfvt3wQx0NiJeVOMVGF3gLDBu7ZWZ1nNaQA==');
define('SECURE_AUTH_KEY',  '3ePXHu2xbEoCplWtj0G66GdyFvTjfJ2qQYPygwsVCGIGUzjJRduVUAmnJqbGwPTssYNzGHkvxwsim+C5M7NwYA==');
define('LOGGED_IN_KEY',    'dq+Yh5nkz4m5xnlHhY0V/1G1ZOInQYs73UeKN0RoEqpBw6rzmCFWpLN1W/Zfk9g95caHA1jieRcCXrXF0y7GZQ==');
define('NONCE_KEY',        'im5b/H02t1rA5hr5ovrQnpVxaOhSPqt/GrHptEIyOYWcAEihhw+OVb1bTkON1XHQA38TywUuwuX7/t6TI2KO9A==');
define('AUTH_SALT',        'ZsvnPvIQ+O1xAWKGBAa9eRzzkNYlLgxfmM6L33NfTLOnnAYaRtA20EtUbVHHA8q27NRbD+IKIXc2YUc8jdMhig==');
define('SECURE_AUTH_SALT', 'j3cZtuxt/OJgRKo5yPPov7iwC+JgYzw+kFLQ1hdTym8WD81HYKSslDeRwKeI9PrdvBTeqAyxEFDrLTzOBBOoAw==');
define('LOGGED_IN_SALT',   '3V3QS0HH2hMitcysA7TbYKji4KFmOhDCj3GjPmwkSfj2cfDsHljBnHNJe6KPsuSV7Nnqs4RrspNJBh0UDJvuig==');
define('NONCE_SALT',       'AsSsOB3uEbPcvG/neF//tajyQf+L7IqWwj0DhpB4waAa8NDCgJDrz0N7NwwIl9Nc5BpCYt1HhGkQAzDAEQqCNg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
