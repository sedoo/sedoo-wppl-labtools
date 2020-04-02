<?php
/**
 * Plugin Name:     Sedoo Outils Lab
 * Plugin URI:      https://github.com/sedoo/sedoo-wppl-labtools
 * Description:     custom post pour les laboratoires
 * Author:          Pierre VERT - SEDOO DATA CENTER
 * Author URI:      https://www.sedoo.fr 
 * Text Domain:     sedoo-wppl-labtools
 * Domain Path:     /languages
 * Version:         0.7.14
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

// Prepare activation for thumbnail support for CPT
$thumbnailSupport=array();

if ( get_field('sedoo-platform', 'option') == 1) { 
    include 'post-types/sedoo-platform.php';
    array_push($thumbnailSupport, 'sedoo-platform');
}
if ( get_field('sedoo-research-team', 'option') == 1) {
    include 'post-types/sedoo-research-team.php';
    array_push($thumbnailSupport, 'sedoo-research-team');
}
if ( get_field('sedoo-axe', 'option') == 1) {
    include 'post-types/sedoo-axe.php';
    array_push($thumbnailSupport, 'sedoo-axe');
}
if ( get_field('sedoo-project', 'option') == 1) {
    include 'post-types/sedoo-project.php';
    array_push($thumbnailSupport, 'sedoo-project');
}
if ( get_field('sedoo-sno', 'option') == 1) {
    include 'post-types/sedoo-sno.php';
    array_push($thumbnailSupport, 'sedoo-sno');
}

if ( get_field('sedoo-theme-labo', 'option') == 1) {
    include 'taxonomies/sedoo-theme-labo.php';
}
if ( get_field('sedoo-platform-tag', 'option') == 1) {
    include 'taxonomies/sedooPlatformTag.php';
}
if ( get_field('sedoo-research-team-tag', 'option') == 1) {
    include 'taxonomies/sedooResearchTeamTag.php';
}
if ( get_field('sedoo-axe-tag', 'option') == 1) {
    include 'taxonomies/sedooAxeTag.php';
}
if ( get_field('sedoo-project-tag', 'option') == 1) {
    include 'taxonomies/sedooProjectTag.php';
}
if ( get_field('sedoo-ano-tag', 'option') == 1) {
    include 'taxonomies/sedooAnoTag.php';
}

// Active thumbnail support
function sedoo_wppl_labtools_thumbnail_support() {
    add_theme_support( 'post-thumbnails', $thumbnailSupport );
}

add_action('after_setup_theme','sedoo_wppl_labtools_thumbnail_support');

include 'sedoo-wppl-labtools-display.php';
include 'inc/sedoo-wppl-labtools-functions.php';
include 'inc/sedoo-wppl-labtools-acf.php';
include 'inc/sedoo-wppl-labtools-acf-fields.php';



