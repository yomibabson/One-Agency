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
define( 'DB_NAME', 'oneagenc_one' );

/** MySQL database username */
define( 'DB_USER', 'oneagenc_one' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Un1ver$1ty@' );

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
define( 'AUTH_KEY',         '@%b`hTOuiY8+``;hEi=>Y<jX(eP8^MsO9V4Mce?9B+dSG20Gg(@F2a^gn#ukSdqP' );
define( 'SECURE_AUTH_KEY',  '+1~UJs+94mbLi&;}IOw,sjiYC6MCI~;T7:EV|d7r.S{(Ff/<J:s_Gv&j4aE``LW8' );
define( 'LOGGED_IN_KEY',    'O#+]^`+3ys|`U>`IVT8eE%[oZ:*(KPVZ4UfGGi3iAIT%i;FHG+w4FTH4,i&T[eRN' );
define( 'NONCE_KEY',        '#YQL7R j$PgkTz&W()@;0y+|Zs+_krK06]fuq@IX{M] ~Kpd=9%KH-m`Gv ml_g1' );
define( 'AUTH_SALT',        'd97l{&hJfgO@1>s4wOr,BsgNdWds&|,Fe~./s:{0|J:49V|].T.pB4n$hE!g7!7g' );
define( 'SECURE_AUTH_SALT', 'OJfE!xBAr?vT>cZBv/w-2%}lDGJ*|lOPD$D[IVA<^GY6hhL#T;?im&L+}/>nPR/q' );
define( 'LOGGED_IN_SALT',   '=J!6|;.}9SR*.DLO?n1!34HHTRB@C*kSqq$tgmI#k*0,SRAqS(S@p2@()so&Rc!0' );
define( 'NONCE_SALT',       'TB!=`j-/Iq&5Q%/W&r_&-uS{T[Va7<AJw=QEXdoValbr+Vzh~P|Y?jT?hb%,bx=g' );

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
