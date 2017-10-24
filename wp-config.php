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

$HTTP_HOST = $_SERVER['HTTP_HOST'];
if($HTTP_HOST == 'localhost')
{
	//Development
	define('DB_NAME', 'philipspainting');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'root');
	
}
else
{
	//Production
	define('DB_NAME', 'db198078_phillipspainting');

	/** MySQL database username */
	define('DB_USER', 'db198078_amr');

	/** MySQL database password */
	define('DB_PASSWORD', 'f1Wnr?#1bD,');
}


/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Upload themes without FTP connection */
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
define('AUTH_KEY',         'y:sMpv(g}&~RI8L5zBJy#SW2pS59Ya,Y1-vmS@P:K5*R^ 7!Bp6o9kR{QsWhc}=z');
define('SECURE_AUTH_KEY',  'GwZM#{qL!^dXTQW{!0Yfv>KF>bYuP!PR<q!)YwY!QAXO!{r[J0D:wzNTNVyn[,i<');
define('LOGGED_IN_KEY',    'OpTV8l{y208n9[gX>[!Fz3o}kjU4`%3WpXXo7o;:7j)-al/t>mo*A2?Yg2{grI=*');
define('NONCE_KEY',        'iy`1LJYad%}+lP[uq!X;bmJT@wEr~;EzThzstMT;W>>V,V@5dPT+B@C<}L#4^neT');
define('AUTH_SALT',        'W,Ps88G`}tOk]>K|i#GGg.7@T(.p8M ~&zekn:x]8%>$61pOOIA N-Bm10:-HDN#');
define('SECURE_AUTH_SALT', 'N/x8^-f?/:ka{}`i, 3b`pAPKUP}z&`mL|Ot@x6AL_KH)>p%K?cn)^*sAmZXrP(N');
define('LOGGED_IN_SALT',   'jyr:b&jz2IV>Z1k@X9)lMjqgQyDl)_Wch|sW(xJZ$gUhmmdxgUP>?9`e5elU6y.n');
define('NONCE_SALT',       'Jbes2pld#NHtY&ehSh?tdS,/Ku%j8ivU-^m.5JHsJG*JU)QL 5n~Pap.+@7qOA^>');

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
