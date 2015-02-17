<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache



define( 'BWPS_FILECHECK', true );



/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information by
* visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
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
define('DB_NAME', 'irecruit_hrtech_blog');

/** MySQL database username */
define('DB_USER', 'irecruit_wptouch');

/** MySQL database password */
define('DB_PASSWORD', 'LA=B(zHa#_)R');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
* Change this to localize WordPress.  A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de.mo to wp-content/languages and set WPLANG to 'de' to enable German
* language support.
*/
define ('WPLANG', '');

/*Vadim*/

define('AUTH_KEY',        'h/~{3Sp?4W>wPX7l#K eQvLcp9&?/ZBI3s3E(_jxSRS`Isj !koFO 0I8;9US`CK');
define('SECURE_AUTH_KEY', 'bdoH5l[Z|x2J=Dwz^#%n073`e`n9b7`C>2[%`v1hbw4yE>diTmfcWa7$}~8wQQ`1');
define('LOGGED_IN_KEY',   '|_5G]+V+W__vs6k7JOXb/+-|-i)Z7SCX+):9M&|t|`J`:NvX754`!^2mTFJ|.cet');
define('NONCE_KEY',       '%m!.vy4i],+8w[^|9]hYCy2gY!05O.)2:$^B9##>yETY433g5a(HBgrMc8huwMm|');

/* That's all, stop editing! Happy blogging. */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
define('ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');