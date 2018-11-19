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
define('DB_NAME', 'wordpress1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'g;gaf,TU=?6PW+m:]4H<CpWt*8kf>qqs!XKi3HI wlcEUM^j)?/1oQ>x<sUR!TxF');
define('SECURE_AUTH_KEY',  'de7l*O2DS3z(cEUXfEoC/SeGT?@_K>!:oZFPQ{/4%]k/7.TR/L@4c$AiwtKrjhKQ');
define('LOGGED_IN_KEY',    'OqWvH+x$}o-,gL*%ZLDQ ijjHXjgix96^;;)n Ksd01$cmz_;k35w[(jBnAo6lwU');
define('NONCE_KEY',        '?67Pw*mYRpF$NaY61]^8[MsL?FVs7ap5V+7>fp5$?=EVgOLax9)FQe>6.6o+MIE?');
define('AUTH_SALT',        'd~$YUAhx&Q]XeTUI}[}=HdbabY]OGDGz2@[kO?teU;ZWw`XK7br/[;T#=%lDlw@1');
define('SECURE_AUTH_SALT', 'Z~Ewp}&_{p>UKt0_B?*E6rK+;7ca-cAoh9R8{n& k=xno1`8)P*AyKR;/#xs|~F)');
define('LOGGED_IN_SALT',   'XLP&QRRoa2t!7^.Z`4.nF!~boyaMj *}i/aM6J/BjzboWLmy?6/@kK#TV=_+6jyU');
define('NONCE_SALT',       '/_4XOuUoyrfi|Mr2 dpEi?KdO1$4:GBbJ6$S.kbF!aF-[x1hobM%NN6{(=|g,zVW');

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
