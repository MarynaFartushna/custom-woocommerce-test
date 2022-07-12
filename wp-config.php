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
define( 'DB_NAME', 'test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'PXA2FbO6vN8+)9uKUkMhbg7XH0uWV$m=YN.u98eeMvO0NGV.wNvB0x(F.&i/waYD' );
define( 'SECURE_AUTH_KEY',  '_(wNQZ}/UgT_=]t$cE8!x+bklaAByB8n26R7CvSB=o}<qc+?xALP}<EFFDRRh$Fg' );
define( 'LOGGED_IN_KEY',    'Th)fIIrkGM#[?D{S-+UR.Y~rlWLF5YpyAaA$f FfKGl}EetIWX)34A)pJHT].P2k' );
define( 'NONCE_KEY',        'x4hg#5(Wrf=lmVLVs^}#=1mr7aCy(cPLmuw9{$=*0~nhuG4AFLU)_kE_?A|.ze,A' );
define( 'AUTH_SALT',        'kX[M=m|hld^:9#y|MmMtgK*[$kAWOWSBiNSyyk!wwKt-Qqn X9N0AU_RRK+)FJr7' );
define( 'SECURE_AUTH_SALT', '(W%Cp|9]2oX~Jg>H#q Zilh4h.JS$je3.dEUO91wHyJ7pe#bL1!p8z-K+KLneKw%' );
define( 'LOGGED_IN_SALT',   ')I#(0k#2r/pf!_sALk??`E,H5rs) [q1Zb4SDD3!:d0R/[5N(-NUF|Xdbq3{:7n{' );
define( 'NONCE_SALT',       'r~R3vniGlkkc>Xa2 sR`1!v1F`Xw`Lr?uNA&#&P1(,EU:=]l6KTw|Sy(jJ{SuYyJ' );

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
