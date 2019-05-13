<?php
/**
 * Plugin Name:     Outils Lab
 * Plugin URI:      https://github.com/sedoo/sedoo-wppl-labtools
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Pierre VERT - SEDOO DATA CENTER
 * Author URI:      https://www.sedoo.fr 
 * Text Domain:     sedoo-wppl-labtools
 * Domain Path:     /languages
 * Version:         0.1.0
 * GitHub Plugin URI: sedoo/sedoo-wppl-labtools
 * GitHub Branch:     master
 * @package         Sedoo_Wppl_Labtools
 */

/* 
* LOAD TEXT DOMAIN FOR TEXT TRANSLATIONS
*/

function sedoo_labtools_load_plugin_textdomain() {
    $domain = 'sedoo-wppl-labtools';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
    // wp-content/languages/plugin-name/plugin-name-fr_FR.mo
    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
    // wp-content/plugins/plugin-name/languages/plugin-name-fr_FR.mo
    load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    
}
add_action( 'init', 'sedoo_labtools_load_plugin_textdomain' );

/***
 * Ajout de l'excerpt pour les pages
 */

add_post_type_support( 'page', 'excerpt' );

/***
 * Ajout du support des thumbnails
 */
add_theme_support( 'post-thumbnails' );

include 'post-types/sedoo-platform.php';
include 'post-types/sedoo-research-team.php';
include 'taxonomies/sedoo-theme-labo.php';
include 'inc/sedoo-wppl-labtools-display.php';
include 'inc/sedoo-wppl-labtools-functions.php';



