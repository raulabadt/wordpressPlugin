<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!]SfekI&Xe^|H%(ILNF@lx<^x~j90 @>D,0]Py4U*@,e/y|N%t{D/2K%gTD#&gq{' );
define( 'SECURE_AUTH_KEY',  'zNV8kLkU4K2,-rphm,NFI7UPPm=:]FVT H563N7p/u3tCKdyxqWe[c <tIZ.8WS ' );
define( 'LOGGED_IN_KEY',    'a:&q3bG<lx8IpOR.JF?r0kpkS]WVYr2zutL{H?>P|h{2ABZg4MN`,d5S(NF~[C:q' );
define( 'NONCE_KEY',        'fv[Z]E*jU?ZTMif[UN4yA?`~GtspGC|1u~A?aY?sRIl`l(4>A,rI1Qb7p_TeN3SV' );
define( 'AUTH_SALT',        'uSS#roLc,>^WdtHb=o2fI+wW[~j^nNhPtEYhqrii]o:ux-8:p$KVHJ{7lgfM#5&^' );
define( 'SECURE_AUTH_SALT', 'w^W:=DB{9H}s$<O_Ck@I{|{%v 0fW/8Nj $FwN`;@Y@Fb8eGz+y(A)&j|;|r<.lk' );
define( 'LOGGED_IN_SALT',   'HK:hwQMTzo/)V9E8O)M5fGc8ZBDg:v+=w.;}K>CKBwi:P0wVO7MBk#$Y T$#;?u)' );
define( 'NONCE_SALT',       '&@xyO[c=W^5;?O`|kK46KAghUdP)ZzsRwCjXuQhWKT)]v<r#+dOs^STl%$p4GWoB' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
