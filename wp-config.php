<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'bd-recetario');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'fdc24f568c9b9de57453058a84044bbaff3728e8dde33bad');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'pm}I<~{E|_oz0M-WLExi2;8m%zj,bIC:evm#DCgiT>1Qm{?4M,2wbf+9j7OY-d$N');
define('SECURE_AUTH_KEY', 'YilPt(}ZSArw!njtSC3#%Y>27Cd!=F5$bI5nNm[q,$uamW.S9/%rbvtAMcEZoM+#');
define('LOGGED_IN_KEY', 'BF|3!Mg&J:[J28Yp- OcNP[c76A8CpO9$(%QQYScmTb(t7uH(RZzZYN>ATo3,DYV');
define('NONCE_KEY', 'Z)C(bJ?ghd=u8@+b;26)r$9k`?cmAneoK0Jv)N:bqT@7;$1K*OX7Jmj!AhMfx{)@');
define('AUTH_SALT', 'l}Z1~TW{]#dV^gYibQA]^NzjW|p>%S->P5];a`o#`t{;U|=RuZ?!iL;ld`^pu}II');
define('SECURE_AUTH_SALT', 'n<iY>&x+;-=60+rjlP[A XW-s B:j*F~_+um.7EN5fg?}_t}s_!Km{e8LSM~A%I*');
define('LOGGED_IN_SALT', 'r$YM6.&viiG2FkZ).bq_TgmC}<3yWsSu],:T%hA~4xlTtd:*u?H|dw1O#j#>+&M;');
define('NONCE_SALT', 'v-V.U1-Z.*{fs.$_^IslS:x2j_pdoQON{rZA}8|wE$BdF{#:,Fa+0?UzF8r3izGD');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */


 // Enable WP_DEBUG mode
 define( 'WP_DEBUG', true );

 // Enable Debug logging to the /wp-content/debug.log file
 define( 'WP_DEBUG_LOG', true );
 
 // Disable display of errors and warnings 
 define( 'WP_DEBUG_DISPLAY', false );
 @ini_set( 'display_errors', 0 );
 
 // Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
 define( 'SCRIPT_DEBUG', true );

 
/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

