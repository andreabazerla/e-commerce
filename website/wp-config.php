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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'username');

/** MySQL database password */
define('DB_PASSWORD', 'password');

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
define('AUTH_KEY',         '$7?-:Q~ph@(UY{6#1JOM?MgXhc+,N`@aQD)@;Gq[?U.1`l4&1sM0T$9*p@+!@0#w');
define('SECURE_AUTH_KEY',  'Q*}SZ<6n,HR0Zn1$%hhZr.&ic>I~i}@v2&BzkPd|qUw5EINu>UoHM1JI6zhNenUv');
define('LOGGED_IN_KEY',    '4M&XV;s2HoF!(2}#_#po7tP9|1]F`B 2J|i_d1b&uYwd89K]Ah9@_1YV=uu6M7!J');
define('NONCE_KEY',        'eWv~SB0}+6,/y2:~xo@JqUKc++^q.IZ_Wdv|MHQ.?.B{z*m8BRg=lE56K]?wt5=e');
define('AUTH_SALT',        'U#X 6+l5~gWq[F]?Is`4UG1(GJMt?s`?*Cb~Hnt2<!sEB,GbjtOtyf=>hY*Am A>');
define('SECURE_AUTH_SALT', '*@krs*|A]XQR#)bTmapARSgPcWg*p9dB[K-y_t0/H1?(|7$]VJ/@FNKf &]N%v.R');
define('LOGGED_IN_SALT',   'A19L*nn_2;  0iqbXD  z=j+g?hN.vWJ6ko60/a-7=me,&x[>l*;Nnp,.Qf)A;eQ');
define('NONCE_SALT',       'yAx?:hWfz$lj&>w<JT]l$CA:>w%J3SKVXY`8J4-i.pw~,hO-yI0t!L6k%A|==0l0');

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
