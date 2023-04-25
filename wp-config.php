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
define('DB_NAME', 'analogueDBqc49z');

/** MySQL database username */
define('DB_USER', 'analogueDBqc49z');

/** MySQL database password */
define('DB_PASSWORD', '4uzRXDJIO7');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xRV8G5~|osVdGN18-_lsVdGO5C|[s-doKS5C#:w~hpSZCK:5x~hpSaDK:5~#pwZhd');
define('SECURE_AUTH_KEY',  'PA.]t+emIP2A.{u+emPXA6E<_]t+elOW9H]1+_ltPW96D#;x*ipSaDL;5jrUbEM7');
define('LOGGED_IN_KEY',    'I3$.muXfIP{3$,nuXfIU7E<y^qybiLT6EA.]u+ema6E<{u+fmPXAI{2+.RYBJ}4');
define('NONCE_KEY',        'b48!>rzckNYBJ}4@,goRYCJ}4@|ovYgJRBJ}3$,nvYfIFM7^>jrUcFN07^>rzcjM');
define('AUTH_SALT',        'N8F>0z!t+elOW9H]1+_ltWe9HD#;x*ipSaDL;5*#w~hpSZCK:5~#pwZhDO19_]t-d');
define('SECURE_AUTH_SALT', '1#lsVdGO19_[XeHP2A<]u+emPaDL<y*iqTbEL;6*<qyipSaDL;5*#pxaiLHO]2+.');
define('LOGGED_IN_SALT',   'AD#;x*iqTa>y^jrUcFM7^>ryUcFN07^>rzcjMU7J3A.{u$fnQXAI{3$.fnQYBI{');
define('NONCE_SALT',       'teHP29_]t+IQ3E<y^jrUbEM7y^jrUcFBI{3$rybjTbXAI{2$.muXfIP2A$.nuXf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
