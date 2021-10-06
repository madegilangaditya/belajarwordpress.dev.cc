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
define('DB_NAME', 'belajarwDBao2qb');

/** MySQL database username */
define('DB_USER', 'belajarwDBao2qb');

/** MySQL database password */
define('DB_PASSWORD', 'mOLT6luXaD');

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
define('AUTH_KEY', 'v:!koNV4$7I,6$TU3F,I,rMtTeiDW5HimLTE2AaA*{mq.eqPu^f*bm<K]5-[:t-a');
define('SECURE_AUTH_KEY', 'q.P62I3,u{$nX$MXIfQ;]#xi#xhSpaK5L6#*+m]+mWteP9:@oZwN8cN4|C:@s~sdK');
define('LOGGED_IN_KEY', '}UMBJ7}D2#Hxm]*tqeTX<+6<$*uiXTI6OlZ9*t]*PxlaWH5]g0|G4|>@rgcRFVK-5');
define('NONCE_KEY', 'dZhROsdN8VG1!1_td-lDO9[G1_sF0^r>zkUJ}C}@o|wgRvgRBYJ4qbM6TEQA{PA{+');
define('AUTH_SALT', 'pjM6E;.AE.u5[-~p]-aswhVGSG15|9~pe+*KL9D;_vVJ48ZJ>zBF0,v!rgkUoN8:');
define('SECURE_AUTH_SALT', 'TfnQM3QM3taLHa2~O9#WieLPA<.D+i*+i!oORN48[ws~WClSDO5w9|drnUFJ0}Q7v');
define('LOGGED_IN_SALT', 'L*jIM7<y6<yi^qbM~paH5aK5#D:~p*paLiTDL5#x;*pasdN8VG44|wgwhSCaK[-K[');
define('NONCE_SALT', 'ulpG1hO85!95_sp~lWSS2;S95#95#tpC>zvY0NJ0!@:-kh-lhR8-$yfQzjQM7XUE');

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
