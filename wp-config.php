<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'localhost' );
define( 'PATH_CURRENT_SITE', '/wordpress/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );
/** The name of the database for WordPress */
define( 'DB_NAME', 'duongkhanhlinh' );

/** Database username */
define( 'DB_USER', 'duongkhanhlinh' );

/** Database password */
define( 'DB_PASSWORD', '1234567890' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_M_oGnm65*)^Y(`D[^a5;0IXJ|PKWGPC}wQH%r9$V+uUHO,h/z_ZcZKx`F<i0eVI' );
define( 'SECURE_AUTH_KEY',  'S{&QHFZJp]3rdDD0pf{PeucOo]YE@ypYDRbE$VhcK=|0G[+%=SJ&vd9Y4eMtn0og' );
define( 'LOGGED_IN_KEY',    '}rVJO6t]0i<X$4< ]`%&d{-D=GQ7D2_W-VK~#BAL5;v*Lyt3Z_40QV;G5[M{oA8F' );
define( 'NONCE_KEY',        'WS$=,l&D?.aIcf[V=V@ss~/?gc%]-.#h~h3DL.w-HPn2O6</8G@_EQS1%]Iq/W)y' );
define( 'AUTH_SALT',        'CmnZZ!l9v:9C}EZFe,9QMWA4s@,L7-X18#H4Ici00dDgomDpaXE^j_FNS*)Z1!s5' );
define( 'SECURE_AUTH_SALT', '4XDZN|I7FjUwj]oMj(a NXlm1tsp)`Lq?+.6caC%c!{=5}L;fCxj%x.=cNcmX;eg' );
define( 'LOGGED_IN_SALT',   '32|e[$GBW>26mkr~Bl`qc2W$COKU!F#:o{A/(qWIcKyZ!g6k}iR%tL#OXC>57q=v' );
define( 'NONCE_SALT',       'Jkmu9gReai.Uz5!(U IgrO[&qhz(TbE[i1C[w!oLjk 4,rgSl:l,?5T2%+?NwKyQ' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
