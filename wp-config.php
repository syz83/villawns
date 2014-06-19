<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home2/sprifir/public_html/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('MMAFF', 'hostgator' ); //Added by QuickInstall

define('DB_NAME', 'sprifir_wrdp1');

/** MySQL database username */
define('DB_USER', 'sprifir_wrdp1');

/** MySQL database password */
define('DB_PASSWORD', 'amv52TnPefOr8L0f');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'Am3jK\`^(|a/\`?ac^_:RtY/tp@:KmkwvSh18cfNx?UR2/Yuut98=iF<p3EOT<KmEL~VO7');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    '\`ezm^W<Hnw90^|*pGw2IatK\`2pz3J9O>/6*MJStZ_FrOX-Aqq!4Fq3P:$)ayaW|n8a?w');
define('NONCE_KEY',        'Jfn8Rq2\`9|;!Wj@8_<sHQ~DmjM8\`VQGtI3J#Ay9eLZRz-rLAqz-KaPac_n');
define('AUTH_SALT',        '?6vozo#y*O1T~0XYBtr2F9fA*DD7~s~HMPcH<eXs;RY;C2tuS~7n-q:~0NQ8kDD=*/yWx|#4');
define('SECURE_AUTH_SALT', '6?on<DBgxXoy;5LGB4B43Y_<gMx5f0|O7MWadFL=yyMb4#^8Eb8DzQD\`?dQo0FCR4|1!k?8o@kqi6)-C');
define('LOGGED_IN_SALT',   'fUwDBE1nOzq=bvMHzTtNzyKg$lX/qYMg^y(O_xsXV0>SnuLP*2LG?P!Ox?|U68!W2xt>g/69Z');
define('NONCE_SALT',       'SM)*9_/OUtK~hN\`*QZ@umoMFTk/@H4p8qz$B:D?1^S71lArDa1Z\`Rr;(NdNe1eCksN3?:P*D|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
