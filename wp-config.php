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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/opt/lampp/htdocs/cursowp/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'sinfonicadelimeirawp' );

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
define( 'AUTH_KEY',         '$RYjwM2Ug839B]MfDD-YMJc1whPQ84-4iwW:{Bi(Wa39w`:CgBkfC_hip_4qK&)B' );
define( 'SECURE_AUTH_KEY',  '&ss%F1[]aaz/^+OaI(`c2@,d=(-s#JS!=M;3vQxn_zV3aNj2 R<2@r=JUA5q1US`' );
define( 'LOGGED_IN_KEY',    '[NFtn1s16[L6NnM%3_<KZ-ot)AHf#;9}r2@4s6=L}06B@mx2-]G2gmi _u_zyoC*' );
define( 'NONCE_KEY',        'i?,YVp4Wkf2M*_NEm)~H;53)m3&Bi3Go,ybX0+(&sK.NL;?{p^PB(zN-+z_L> @.' );
define( 'AUTH_SALT',        '$i2`>bY$cW`M5d#5q4sV?kyZ0o}DsUv!Zx!#Kq2FV_=T01?{y8)/#@]9?y48&!zr' );
define( 'SECURE_AUTH_SALT', 'mO$~cALNol.1>o=AzA0:o%Q!^jB[8yE*,Hz>>f=KgV5[L6s$KTa2OK.2~jE=y2@r' );
define( 'LOGGED_IN_SALT',   'J&OXr)ozBn^VX1h0@;~@4tHhlUL95%ZSM7f^*[Ns29wNT.>VG>+1QKQls u2|L}4' );
define( 'NONCE_SALT',       '@O;SH*JMg}xq5fU<.9`>H:RuWNt%S~2MUM/&w)NA^AWLl$Hp3 ^T:s3^MY]mUK`4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sl_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'FS_METHOD', 'direct' );
