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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         'o4~!F:6[E~?t83^be^V(2~UR{rL`I>nj_{6UyMFO<:&[0!-_rA];,g%9DXQ{%d36' );
define( 'SECURE_AUTH_KEY',  'x8(9ok#JMinuf0XjSp^><bCm~VmmhD}puF`nOR7c9*dV}i|evoNX!wbP}@=2&)!M' );
define( 'LOGGED_IN_KEY',    'z`t>Y#uW64YmP[)BI*VCBe(#i:TOQkG)b9 pl`Mjg],@>0;Mb4>{N3_W>;,VF$-k' );
define( 'NONCE_KEY',        'oibcLPY&).9NZ?JaZSw1CJ#7)Ue5C:fBG87V*C?wF$)ZI^cf[k,KfTp`q[:mGK28' );
define( 'AUTH_SALT',        'uW]pN3JoxIpWUT78?m=XYEw8O{cZSjdDvl6fv0w18H[|)IfG<1c%~WGVqHerWn[)' );
define( 'SECURE_AUTH_SALT', 'lwEe0C>a>Q@xL|D^D9qixs8ggmN^!!gZ~AM.W#aP;i.!FJK08h3S%!//hAYeE3KD' );
define( 'LOGGED_IN_SALT',   'Y[z]]K<RrI +=:;oj?`SZLp9QUDgKY7(wrN~ X?i) -r0vo:/oiO=nQ@veFcAtsb' );
define( 'NONCE_SALT',       'dAe%:? CDK,gc5vAO%Br6EqX+4x6`mbkY1Zq<Bn~bv}85&oQDxJ30v)NRit??NU[' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
