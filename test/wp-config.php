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
define( 'WPCACHEHOME', '/home2/sprifir/public_html/test/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('MMAFF', 'hostgator' ); //Added by QuickInstall

define('DB_NAME', 'sprifir_wrdp2');

/** MySQL database username */
define('DB_USER', 'sprifir_wrdp2');

/** MySQL database password */
define('DB_PASSWORD', 'HCAOHdFUHTWyzgih');

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
define('AUTH_KEY',         '@Ki~fhmJ#V3!R=!^q|H_y>erhB\`)(<Crq@0YSI3Mo5J$mVFm^_rWjOf#I$b^$cM|:A\`-9J5>Q\`_gR/');
define('SECURE_AUTH_KEY',  '');
define('LOGGED_IN_KEY',    'v\`Os1IIJ$bD*fSX\`mXtN?f$A-j/(Vok9gj:Wlw3cRQg-I:SrJpQP!tMD~xDNo5KJ');
define('NONCE_KEY',        'hdYUO=zoES1kqh:mC@i14kaWTE-O5=MF~l\`(aNjEvN1tg6n?u1>9(-6Uf))E1>en/4>Bsem6');
define('AUTH_SALT',        'BD(GpvBt7xr3w6*z-y69I3-M^ZAjqntrxJI)$us@H^1(;Q~E:qxq>#MqN\`');
define('SECURE_AUTH_SALT', 'cSsJJ\`Pv0L4IwPBmWk_)=N(|NjU0(NIBQOJNzcr1PEmWWGIt<Zb84:Bbs38|PK$zeB6PFkB');
define('LOGGED_IN_SALT',   'Preo:U:_<bX>(Ur|J(sIx9r4vsc8STq342HZ$<Y4$2BD/BL1rVa-i*S4ietO<_rRa1');
define('NONCE_SALT',       '7~(L#mG5(v@VQrX|!HQo<V5FkEYMX)M)DMy014JA-07n5pI:_Y(pS/OM9Vc');

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
