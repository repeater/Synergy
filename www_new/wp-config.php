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
define('DB_NAME', 'synerhd8_synergyWP');

/** MySQL database username */
define('DB_USER', 'synerhd8_WPuser');

/** MySQL database password */
define('DB_PASSWORD', 'syn3rgy2012!');

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
define('AUTH_KEY',         '~:bV=_4=9XL$7aOv]x5:btd95:>vI]#+Gb9Zh%87hlpr#tSrTw0C/<H`ohY|KwA|');
define('SECURE_AUTH_KEY',  '8`*9&*3(NbU{$,~.j,MdyT(<[Kk#CLHtlVYx|bO^A{m&-2[q~%4jiND$mOeTrCB8');
define('LOGGED_IN_KEY',    'K27{DjZ^@d38-Qnbjdj+pgD<H{VLA-tg/1(-<-GG%{ZOIV$gE?0%O(}9Zk=U?l01');
define('NONCE_KEY',        '5WSo-8@7kBd+(/u}o~(.p4t0}s=XZv&j%6-70+lZoVovB,L]6:#Cp?mQ3-i!:]fG');
define('AUTH_SALT',        'T)!M!-3:tZ_k@E=VojjRWKsT7?;xD1QLO}g%^&s&0u.ULT_)$Q[,$T#.rVS:Ib/x');
define('SECURE_AUTH_SALT', '97D4gc6GB*wTRO)bwSBBtCzr[!!|;+w0i=6#+p/#9L([}K*FjLiU>D:4j(P%7`YY');
define('LOGGED_IN_SALT',   'RGy0yxvs<%vBaU*6k*npB*,WP*dGl@rse9jUe+A~8}fP:bBjX|iX$a++ad^H,+]D');
define('NONCE_SALT',       '.M;m? k=,96n{l+x,eTX@|<Xv(!=a]|*,A^Cw#U-ai@I*Da`mja]tA}wU @+e{B1');

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
