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
define('DB_NAME', 'estoque-wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         '>A|(vTZ#]o28X+}v4$9%X6^bM@7]cAj@Q0yRPRkbb(4*F8`eKoQ6A-6<c 4N-rC#');
define('SECURE_AUTH_KEY',  '.rYcuy_yw,hF>x*sp%`n$C8Uq~+-12$X~Vzb4?$2H+tB|d;bRA=!>baX}1e?qX63');
define('LOGGED_IN_KEY',    'V?ee8%TG4a_<wB(57rORI#xBiEDD0U@)[GQ!RN-tY.zH>.pEl-!R5|R~S,Znsh!L');
define('NONCE_KEY',        'MoC3GQ;y~<dr5E.>NEQz;E!$5V`>,s*)5Fh>>bcM|-^BkF[=iSmOr)u*P%o0;!I:');
define('AUTH_SALT',        '6o0S|bpD|ekAUt>R]p$ETKK+{+/`945wYl5PFV8.GNG$4a&(Jn;?!uojH*,N!aM2');
define('SECURE_AUTH_SALT', 'ODU>3?L)5/3z.*>1|%(aQ)kK%+;(}And~UV.pRW!:o1+[xY2G|d7%K.##=P`I_}u');
define('LOGGED_IN_SALT',   'Xf`vB1P#BA}%6Jl!lSEb@D <vQwYOjue)}-=Hp]3#o-S#j[6Wwr@ykaH5?9W;g!z');
define('NONCE_SALT',       '/cI_rv-oV9AcJ)a@Ln+N`.=k4L4$uhwuduWJZX.h^=M+HsQX[9IG:_?`[)?$rpEw');

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
