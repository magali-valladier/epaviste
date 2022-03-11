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
define('AUTH_KEY',         'jKqpkwfhsprehO/Tx0/dKFBmxEWA/R5YbZuc4fToWMz6noZEGDW/+bwDrQYMQ3ZjiInr6DAB94OQR0mZpqGw7A==');
define('SECURE_AUTH_KEY',  'cgA27Ru9n+QIGpedJfLSYHikl/2bqsDMNyQUxx3sZcEhBV4toR9HhOTa+io4zaVZZwHLEpPjgv1WaHvuw9gArA==');
define('LOGGED_IN_KEY',    '4UmoJUbmE7MFKwapM8NGWNp0D0Ndxp7FQNI4vP+Gw/NQMYlzrN9JX2Vg8zb4/CA/Fj1ozXSyc+S7VV0mUfT4YA==');
define('NONCE_KEY',        'xADhHCRbDOWDrxjtheM3/MWf7t9+iHQTzoA49zLQVEHo6PQnqlzMdY800OvrQ0ZTA+lXtBW4eAyu9dlNRRyohQ==');
define('AUTH_SALT',        'uaD03SaYqW2WaoQ8jbWsLDY1kXoDxaOAylehVH3y7YWPcSFL3vmE5KDgjWG044NoaOKZ0nCiQhQ1jBVq4eUaBg==');
define('SECURE_AUTH_SALT', 'rmsRgmMYqWa/KpUDl9DFgVUJWnhorTGVk21tZGRIKbarVrJvHcV42YVrTBlur75mrxplABMnfX+bJP2k6aLASg==');
define('LOGGED_IN_SALT',   '+n8KtUunvHY+ku0VGsW6XH2ukbB9YUqPRCDXj8YgsfCMKQvAynUmnfvQmI6V7jYEZ4DCbIwMxQ3xmBC7Wxl6bw==');
define('NONCE_SALT',       'Kw/Lm8vzUN6vTw7JBDaHdSUJwYDeZ0od6z9/d/72A3MBjT0RZxxKUdjB9dMZNz0oBWvFmXYq5PKRj9UnvzJPvw==');

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
