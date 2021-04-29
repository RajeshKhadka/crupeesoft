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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'crupee_web' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1|d,vK1iIY$^?a5gYq22]`d-qnyYVX=oLj/Mpa3XBelj`>8{(ji/?;8yQ9naMSLF' );
define( 'SECURE_AUTH_KEY',  '&rne vfBZnE3pQ%fdvdCvndA@>P_.,#AmEloO7:y26O2oz 9xBSGJwHz+}xXb)qt' );
define( 'LOGGED_IN_KEY',    'vuL}dt;DsS6QOW-POsGtRH6x%C=XI3.H)Op1!|h8gD%SvaGKN?cS(E(~?{{e~YjO' );
define( 'NONCE_KEY',        'XHo~NL,+[v-x[lkH=8)Ud}M^$Q_-^3wR}X2i?0bvNRt*|_Ut1T  xe,JJs<q1Z[.' );
define( 'AUTH_SALT',        'e#@OK)fjX|m|o$0HlRm/f15GL.r;;#FXk7!l__8Bt#r.q+B.  6rDGy-v1y+5wK_' );
define( 'SECURE_AUTH_SALT', '&K{:%Xm-vV!G!+Ub=o3iRTMe`,/T[2IULGGz+,JV~y]udd(Ftzu3)S0#Gl9P)BJ&' );
define( 'LOGGED_IN_SALT',   ',)-w>|`Cqs$NkugEbu%)!p&=PYu+1uc*&hK44W{BmGrZ:dm?}I9?.j+ET2Q,$_YU' );
define( 'NONCE_SALT',       ',EB$,r*a{g2pzt5^RFUK-9o6J>+Do21AfY1lh}yCire/[9G[AK{t1]S)gheG54F{' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'cr_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
