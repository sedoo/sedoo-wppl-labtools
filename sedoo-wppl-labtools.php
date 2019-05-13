<?php
/**
 * Plugin Name:     Sedoo Outils Lab
 * Plugin URI:      https://github.com/sedoo/sedoo-wppl-labtools
 * Description:     custom post pour les laboratoires
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

// function sedoo_labtools_load_plugin_textdomain() {
//     $domain = 'sedoo-wppl-labtools';
//     $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
//     // wp-content/languages/plugin-name/plugin-name-fr_FR.mo
//     load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
//     // wp-content/plugins/plugin-name/languages/plugin-name-fr_FR.mo
//     load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    
// }
function sedoo_labtools_load_plugin_textdomain() {
    load_plugin_textdomain( 'sedoo-wppl-labtools', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'sedoo_labtools_load_plugin_textdomain' );

// LOAD CSS & SCRIPTS 
function sedoo_labtools_scripts() {
    wp_register_style( 'prefix-style', plugins_url('css/sedoo_labtools.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}
add_action('wp_enqueue_scripts','sedoo_labtools_scripts');



include 'post-types/sedoo-platform.php';
include 'post-types/sedoo-research-team.php';
include 'taxonomies/sedoo-theme-labo.php';
include 'taxonomies/sedooPlatformTag.php';
include 'taxonomies/sedooResearchTeamTag.php';
include 'sedoo-wppl-labtools-display.php';
include 'inc/sedoo-wppl-labtools-functions.php';


