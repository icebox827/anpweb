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
define( 'DB_NAME', 'anp' );

/** MySQL database username */
define( 'DB_USER', 'icebox827' );

/** MySQL database password */
define( 'DB_PASSWORD', '$0l01985Deni$' );

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
define( 'AUTH_KEY',         'rmBS9uSde` MewaQp?.N]#EC0P`/z$36_i^@o7$_=q0$=UvM_9ArcK6@?klpd8SM' );
define( 'SECURE_AUTH_KEY',  '3-+M!~KA=_NhxKd%`6{!!N[k.BOu:k[gc=+Y.FFMa{F=Y|sE,201VZ@?C6E^i}6<' );
define( 'LOGGED_IN_KEY',    'Qeop@!$Q0HX=Y&bouND=9sfj jpw~M_}WVDAb /Ltq/`#bIBo$`,TU(R/t}:a&_ ' );
define( 'NONCE_KEY',        'M2sWo}04m+a)gZ~h7;&Px>WhGe:m}49d[2YB7l.ivR^p.+O!i BahE9faT,oNEi9' );
define( 'AUTH_SALT',        'lw:-56.6Gw:]S*x%-D<ud|G!=L(h~Efj}WbL4QMN^Cx1K+uL+#pWP^s)NqV[YO=i' );
define( 'SECURE_AUTH_SALT', 'mhanbPjBBAN(ie,bRru|2f;ZHS|>50t[;I~ SkWXn%lRD;1>4-`Sqbc~uGWO(EV*' );
define( 'LOGGED_IN_SALT',   '7]_?WBKEPVt1,M(1>.BsR$oSUnj$_w_[X=$~H-G7x*aef??g4t,uX5i&pJ~4y4xx' );
define( 'NONCE_SALT',       'uN%K5:c?Z[gX<b;2w;GDT=lVFY#Q$}R(]>*t*Z!Hr|y<DQxaP:SD|),d2.nzTKO~' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

/** Adding new ressources */
define( 'FS_METHOD', 'direct' );
define('WP_MEMORY_LIMIT', '512M');

@ini_set( 'max_input_vars' , 6000);
@ini_set( 'max_execution_time' , 900);
@ini_set( 'max_input_time', 600);
