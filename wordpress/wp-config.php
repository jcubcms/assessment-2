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
define( 'DB_NAME', 'cms' );

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
define( 'AUTH_KEY',         '^&b84`+h I ;Ox^k HVY >[5k5vF?*[hA&;rHGhI+CgBCg5jo1;sH]ahP:=`hob0' );
define( 'SECURE_AUTH_KEY',  'tdu:|h;}xz^bX<*+=%@7W1R[*9W+tkf:do&||pA3JX%]K`yDa$%KRo|%fsv/urj)' );
define( 'LOGGED_IN_KEY',    'CoW9mv8=},G[`N<~QCX67Llz?71i30TKU7z?)>jRf{s-,MrQ?JQt~2AWDaGuGyDF' );
define( 'NONCE_KEY',        'n5JVfmHo4vf2XA13cKSuaTv/,;Vwz$7TE)JgOyRs]7q?|&]]Z_G9qp@=k)B#P-+?' );
define( 'AUTH_SALT',        '5F;2[jJ71c7s%.Rk-h?ob[L]1^b~U7iXb_`iHn3ws]^~8e{.~d~f%4K6$6!5p=-<' );
define( 'SECURE_AUTH_SALT', '/R%rb!-oC>N4?d7eG6:/|]M!bey?fxS6=CcEXR(9Q:k!N3[xlYM6I@#c.U^W%E!%' );
define( 'LOGGED_IN_SALT',   'P ~t-iK$W4$%VwM9Px&h=,`E2U<@jLI>d@XiaNPeUe;XU0$g3?|->#gd1FM*Vq.E' );
define( 'NONCE_SALT',       'j#lKxC$PxzxlZ!$+|7l{=[REk|eXniF8Gw[O=*PK)BY=L92o1Vtdc3Vsk/h ~#ak' );

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
