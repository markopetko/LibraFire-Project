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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_librafire-project' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '(AF:.=W*E%8F/QnSp^nVcpa2jAz=/W>_I&fHN%T@YnF4?dp>H]-dU8u:6Ax9YV4R' );
define( 'SECURE_AUTH_KEY',  'WnfJcVJuDsE@!d.fB3T)4*V2_^X~=3a2931T2N.K/GG9,x-QpwtKR}b!m59Q<d-#' );
define( 'LOGGED_IN_KEY',    '}r|swLN3fw)F,$yeCbJYJjG;9U{9XE+?@Wqp^2Fj<a1 QrCw62Lho|Z4/E?<vq<%' );
define( 'NONCE_KEY',        'xO{*g)2=Lem4;+^}iu}{KmI+*}eO>vc8ArbF@Z|  [k}b!$h^4PH~Yt@roA*w(r7' );
define( 'AUTH_SALT',        '(}{s;~9I69z),9^BCo:-435,a.}OpXS2o4WGAe9io,>}gPuF%g~E=yON%[!_2,,=' );
define( 'SECURE_AUTH_SALT', '0O^PEcFYns6@_^*{f/Kox4QV_z}S4hc<kRcK8.Nj`J.4aR%o,1_60*GLAwcHFI /' );
define( 'LOGGED_IN_SALT',   'C#`cPZX<qFqSPlc$mc:LdzGv-r=R}ep[c&kl8dvpkW%;##{0R>#M/o#A+-npaI1S' );
define( 'NONCE_SALT',       'e7Grh[{cc,bYJ+0dMclu|EZ(jcBoVu#n~EZJ{O5Ysowh]Z#1TyC5kfon|FFQO-`{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
