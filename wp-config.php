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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio' );

/** MySQL database username */
define( 'DB_USER', 'wp' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wp' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'us%*4]QWtSAY+6RGQw,6mPg1JQZEY6UyZSPTg;z.!)4P&nIP7;M](KNb?6~vIi>2' );
define( 'SECURE_AUTH_KEY',  'g}yzgfoO6&5y%]w*QKqI>I/D&sS-qi|=eA)=0vSnF-l0-G0qSO[PfA~/EoY{]TTf' );
define( 'LOGGED_IN_KEY',    'k|/|ICY3:@_i=(YVJ,CByUWib#;~GmaXkpk-UOkD9E.3r$#UY-P$([Q )6*7NS?g' );
define( 'NONCE_KEY',        ',4lq}W,7)%|CYH~,L1LPZImjb]*wam1Iz?N[|_@(K}E!mVEOXtGYdpMGit`;D_ZU' );
define( 'AUTH_SALT',        '+MLjbzk^9jv#L5:cG`E6OFYUx:8`TcS;&.k%&aE?A2B)K,cz5@p24u?S]y=UbOq6' );
define( 'SECURE_AUTH_SALT', 'xd*GnmO3r(|fM.2;M 4{pBI?Fb<E^`ey]0Z1AmC3_i5&nSdL?)Sy&W:|E{)m_.Ma' );
define( 'LOGGED_IN_SALT',   'ir).F`B7UoO=A9e9Y0Mv(TLy6nLOUvP27Nr,u7dRGVi}0/^o*L!n`ADKZ/!1w@]{' );
define( 'NONCE_SALT',       '-w/^wI[!6Y.AP|hz_[OhjCE#U!GO!`m,5$ehjC52^eM}_1<U4i lJ@@^CDV|IVq_' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
define( 'SCRIPT_DEBUG', true );
define( 'JETPACK_DEV_DEBUG', true );
if ( isset( $_SERVER['HTTP_HOST'] ) && preg_match('/^(portfolio.)\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}(.xip.io)\z/', $_SERVER['HTTP_HOST'] ) ) {
define( 'WP_HOME', 'http://' . $_SERVER['HTTP_HOST'] );
define( 'WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] );
}


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
