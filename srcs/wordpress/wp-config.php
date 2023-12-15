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


define( 'WP_CACHE', true);
//Salt for the cache objects, site-url, replace dot and forward slash with dash
define( 'WP_CACHE_KEY_SALT','fmira.42.fr' ); 
//IP or hostname of the target server. Either app/container name, i.e. redis1 or localhost
define( 'WP_REDIS_HOST', 'redis' ); 
// Either the default 6379 when using appName as host or 30xxx port number found in app quick view
define( 'WP_REDIS_PORT', '6379' ); 
//either not set as there is no password by default for Redis, or if you changed redis password, set it here 


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WP_DB') );

/** MySQL database username */
define( 'DB_USER', getenv('DB_USER') );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('DB_PASS') );

/** MySQL hostname */
define( 'DB_HOST', getenv('DB_HOST') );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'hSM%H{~)7i/A^O42$T<;|Y|hi _h&6,4owtC+bq-+}|_2z]YTGBu3(o]+Ly`B<S4');
define('SECURE_AUTH_KEY',  '-PFT X6,/~8tVg>[FJ|@X|Us#i*vSsO?+{G-W&3aQMixXf=lCdPMeEOxuE^fP?=~');
define('LOGGED_IN_KEY',    '`^h=TVJz:plG<-`PK.a`+kA!zA:8.%%(ISSAcz!,nUVnB0Pry. u-KeF>72__g/ ');
define('NONCE_KEY',        'k(UHNA@]-2.DpU068HU6LoJUI.jV=D/;/qN(1!_BH|W5~*h*PQW3;oK(ny$Ydt9o');
define('AUTH_SALT',        '=[,zH51B:+ 4O(V5K&aORZ6nybI[(qOoK5m;v?C^PqW:-SI%XE~i.!UyN<4DVKAP');
define('SECURE_AUTH_SALT', '+Cj?f&ln4<S1B-,IL=OIZ; ;}XO%66.@4!m;H}+j4d9<6%g=:VL}H0$BlxjB*KfQ');
define('LOGGED_IN_SALT',   ':] [llVp:zlZtU,wX4KmSkvnF$$}=U%(n~UkAs`EI g+dL&[Avnr)+p^2L.m )F&');
define('NONCE_SALT',       'BzF;9urk{MFe6&+-s2GC;|r@JiP{qqrB}z5:EUBQ`RjEa%m}>p-Xip1[P>QLq)Kz');

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
define( 'WP_DEBUG', true );

define( 'WP_DEBUG_LOG', true );

define( 'WP_DEBUG_DISPLAY', false );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
?>