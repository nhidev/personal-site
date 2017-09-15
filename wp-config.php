<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache
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
define('DB_NAME', 'personal_site');
/** MySQL database username */
define('DB_USER', 'root');
/** MySQL database password */
define('DB_PASSWORD', '');
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
define('AUTH_KEY',         'X!nQzV0[X:Q~UKpt$H={S2`Q~_|K;#@.sgLRD?7pB&#1TwG(AJxkXeUH{,! TS[x');
define('SECURE_AUTH_KEY',  '(l,:U}@oABg$6{N_EJLA/u*mx$>,ThU>O3-I]hEp6H}Q3&$M|>n]+3S~nhgJ_dMf');
define('LOGGED_IN_KEY',    'buv%L+r~TuSAWfX+ob54h@8|O(P.>NuRa$ 4A^JLt>c`8b{|vV7 b^?a1jXhE$]+');
define('NONCE_KEY',        '1rHvoVDlYyu]5uv.E|FQAtQ8[j0j?mz/PyWVgPw.WW,48p+cW9^;Mi-e}bbnfbyo');
define('AUTH_SALT',        '{;Ll*E=vn>3xFE!:Yigu! aiG^L3_GW>emjy+-ILbAA`}tkK$Jk{]+Katj4b(13S');
define('SECURE_AUTH_SALT', 'ZC)4?C|X.BaF%QR[5+dA}hnZX&~-evN*j=8x3*bMt`,tMl$!3.tZ3IKI<o[Y]N<M');
define('LOGGED_IN_SALT',   '6X6+nr%_;Zq;se>G7Hr:yb~rjgne99|F]%#4RgB~0RkLprRjP8/|C=;cb=ceeA`=');
define('NONCE_SALT',       '$)$8x3-YrY|-?uJ%(BW#qR-[B~q6qve_=<<H3.zKTHb]ah?:B0@||pFQFNc3?YQb');
/**#@-*/
define ('WP_CONTENT_FOLDERNAME', 'assets');
define ('WP_CONTENT_DIR', ABSPATH . WP_CONTENT_FOLDERNAME);
define ('WP_CONTENT_URL', 'http://localhost/personal-site/'.WP_CONTENT_FOLDERNAME);
define ('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');
define ('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'npw_';
/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'vi');
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
