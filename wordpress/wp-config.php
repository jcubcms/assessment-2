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
define( 'AUTH_KEY',         '{_-b/kqq~sC687LxL+&&aDP8O8_WVPx9)>n$r,,*2[MJ0#Rybf:w?$rafHBo1/j6' );
define( 'SECURE_AUTH_KEY',  '3 Ikp-C/.[9aFn;sg.T (O?,CdG+9f ce5}Z93z(wcN@UEuPUkc5uY %.]ox{Mus' );
define( 'LOGGED_IN_KEY',    'E=,e:B0W 5Cf4KjU*J4zFJJN7M#<3+vM4kMe>(#6d/@,%:lr6lnJ3w3b9Y>L@O{[' );
define( 'NONCE_KEY',        'FC4/vivY}Y~8BzV^oO^Uz@e8%AH4D&Y3jKu21pc<ugjsl)9>Fp_eO|&c$6$ln4(X' );
define( 'AUTH_SALT',        'ID1=`5!vt__7zf2j1{_Od.#hMGrd;FS`=a/co.m}smnP,.7n^jEGG$VG04}WiWE8' );
define( 'SECURE_AUTH_SALT', 'ODlY;:yz :,GFx,e<Lsv&#Mx0<W*/Uyyar1<w0n)q,<C9w7hs5IqdAXyHR#-.7&N' );
define( 'LOGGED_IN_SALT',   'Th/0|MzFth09$0h6ZkJE.Fkve9{Ajhw0[u4Y,p:2|ujqA^~OV/J]Ua#8)Ng9R0,_' );
define( 'NONCE_SALT',       '|3+qOM[ZOyDk>qL`q/4RU&o63[2@:0=_&2MjsqU.,(r]l$.U<@7uGrt1y5k=2ga[' );

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
