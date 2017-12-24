<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wp_initiation');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<a]ED?uIOsB%.hHKb_.@+4x6v{*}Rm?>;@}-^e[sDI4:F]VVV2TE3Y#-t BLP@K*');
define('SECURE_AUTH_KEY',  'd)Tgb-6Fp,|a#`#ycfn)ax=i1iO{s1L{ma-`5N2@-3Ln4s2YmsD]ku%_|,5sYL4Y');
define('LOGGED_IN_KEY',    '.t_#f}7}it&q4G>g%)f@Qy.8]%$^hY.Sdq-@_BwtBoXw)zB9X[$@^(5|`{sNr?76');
define('NONCE_KEY',        'W,r;$BkK}O6qR[+(Zwwbxu_8Doy9JgIW1JWtlin=!=,k9Y3a Opza(j0^+ud)E N');
define('AUTH_SALT',        '{^r}s4t!V;{i%!+gL?O=7`Fpv-V41Fnwl]p}SjQ&}@ uYNO*JyzX%sOy<>sU-q&Q');
define('SECURE_AUTH_SALT', 'd!/NX}R7Biym},c}IxWr;/-%c$(1R6dwLDL|UCKo?@F7DSd{>}w3nUZ$%FAy+b~W');
define('LOGGED_IN_SALT',   '7jSP]12cX-Gx#I~yhT5rUc#J$v8a7ntD_~A1>a?eT/cRs.eh?Z8khtHDqhT=X:wL');
define('NONCE_SALT',       'hMu/5`]]P:^$HhWM4L+ | TFBp(oPKNYb6cN0S9-K}gW.qr*@-q5)#,URO-c^Mm}');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');