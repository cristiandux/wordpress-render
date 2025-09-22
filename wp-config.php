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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress' );
define( 'DB_USER', getenv('WORDPRESS_DB_USER') ?: 'root' );
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: 'password' );
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'localhost' );


/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          '6IUu4|qq/S[SVVF|Qe?HQ` 2w`t5GNQblSzg2]:yx3v1Z&n3G;6_bqHQB{cd:$y!' );
define( 'SECURE_AUTH_KEY',   '+}<K!tW8xpc~iIb>pcfk1W>6XNJ1uM.nv.%$u&fbV<~)gB:E2h=]L9SUw`MUvH6b' );
define( 'LOGGED_IN_KEY',     '5*5~iu6L:Z`Q+M}2j5!v/8E}3*l+=z>ebI|*TMu!8(.]#](%S`1zVjbfg,[Ds3;h' );
define( 'NONCE_KEY',         'VpW:^bxxLuN}nIYi}/)t9X>m5Yszt#_|)8_kMo-L9.L`1@7q bp,g!Q]k8)?Usj_' );
define( 'AUTH_SALT',         'LRuiowqfM*E)n@&UV/!;Q<2|`BwOw=tPZgp*zS96-~8h)P=NO1 ZOi6oaL*[-T-}' );
define( 'SECURE_AUTH_SALT',  '/H;-aO??WFRJ7X $g]XVUe S3RFeoMaw[-h?p+7F,-H1Sz}#h-M)K2InF[nALAD`' );
define( 'LOGGED_IN_SALT',    '`cM#)a:&bGLH4(A~e=Ou`LXO*nhB63Tsti5-ApdWUpinZF<bZ[ZM9hU|?j~|%H9s' );
define( 'NONCE_SALT',        '<|9=N.DfTt9pPXhw,f_viKk2eK7qT:7lsfqhe-!6<CJGM[7q nGT+WGokZy@Y.Nx' );
define( 'WP_CACHE_KEY_SALT', '}QZ*gl.npXB1Dp(jAm-*~gEsG;am5NYjmXNu:%Yo[=+}UO ~*!i(z<smI{kac3+e' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
// Forzar WordPress a usar HTTPS
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

define('FORCE_SSL_ADMIN', true);

define('WP_HOME', 'https://cristiandux.com');
define('WP_SITEURL', 'https://cristiandux.com');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
