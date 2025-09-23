<?php
/**
 * The base configuration for WordPress
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME') ?: 'wordpress' );
define( 'DB_USER', getenv('WORDPRESS_DB_USER') ?: 'root' );
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD') ?: 'password' );
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST') ?: 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
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
 */
$table_prefix = 'wp_';

/* Custom values */
if ( !defined('WP_DEBUG') ) {
    define('WP_DEBUG', false);
}

define('WP_HOME', 'https://cristiandux.com');
define('WP_SITEURL', 'https://cristiandux.com');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
