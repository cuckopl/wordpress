<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'medal1');

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
define('AUTH_KEY',         '?,oLyd&*qC%`A4WfyH81OOC8wOl?7j#Si*:}Ri;&Sx.m<I!nS*-W<@>wiu5}U cW');
define('SECURE_AUTH_KEY',  'nWci,@RN-!UAD;c;l9t-|z9=foM1G@Sjk5H?R5b}bR7o-h3>g4A@K+F];V(bb{x ');
define('LOGGED_IN_KEY',    'c+Jl+d&pxq9(C_`}&.o=r%S>[3podY9y~ i/2!naKL *+6aPs-_fj K|Ka~uDr.g');
define('NONCE_KEY',        '^,aj_^R,}q%mZ)n[W9/4JR|=,R&ulLxGi#d%6[U(Ov(IN-@=?P$ndD%WqGh[N~vx');
define('AUTH_SALT',        'T%*SHS^8o`+<;$-H]$+R~#,a3rk-/V>$L,`2l{{oXqigO/FluM~VR|0z|p9+TkZm');
define('SECURE_AUTH_SALT', 're^v2Mn-J7rv?):<v0xutI/;QArDoKdMecu{]?D+-%+)m=o{//`3^}WSB0G x,t:');
define('LOGGED_IN_SALT',   '=]W|*k0oI|,Yuh+HU;g7fn{Qj+h>R>4M }M]vD=B# E]y&_(TfcHybDs4W>93-a_');
define('NONCE_SALT',       '/itP-+{k8;N&#~LG}jv!8ighraDnf#9RiZ|p%S8w^7[, W}Dy}C[P)$;{is-pI#:');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp1_';

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
