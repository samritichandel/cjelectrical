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
define('DB_NAME', 'cjelectr_dev');

/** MySQL database username */
define('DB_USER','cjelectr_dev');

/** MySQL database password */
define('DB_PASSWORD','#E6G4;N}fxm}');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'iy(Kh}@ 9Y%1]Mux$A43fI?Al3.%S3VPBD5oIXrTg|ep6$=5pClI^=Y6k)]L{o0g');
define('SECURE_AUTH_KEY',  'h95|%ux#4F *6h>r~1LnIKjtb:rWN`Px0l9E8Sw%xd3-6=gV(hJ6wY<R U?xdjNY');
define('LOGGED_IN_KEY',    '*X=CRLC{l9s.fBSazNzKk>4e/vFy^T,1?EgB7E1=i2j7Ke/?eDPNz~RHgE(VrVt#');
define('NONCE_KEY',        'A(xXR>O.1p0o[7Xu&sA 1#J5,x6#^_S-FI$tZ`sdDi*V>2H|PcrVM;|!9xHOtTii');
define('AUTH_SALT',        '(ey44BmzC6r%KZ%/~L=}s[f:zM>GvO65<|J&{>y08304HZC)l/ULfZ%sb$K~]VAC');
define('SECURE_AUTH_SALT', '6d5{3J+kWogv#Pl/jl&v(6$R9w$M2M,G%2,2PCnT=KbA-#nFZ#=vHyico0nu`AL/');
define('LOGGED_IN_SALT',   '-]T)UUd>0_S(u]]eg<VBkJ.</M2_#5&g<ZZB@jp9<ElqJUyTOJns|unL>OMX#3-V');
define('NONCE_SALT',       '80tK%]}m2`*trL?V8Rp3Dhw*E/f8_VC>H6Mn_nQ$;@#Nf[F6/Un!VS8.CTU0hS,J');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
