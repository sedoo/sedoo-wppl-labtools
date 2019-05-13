<?php
/**
 * DISPLAYS TEMPLATE FOR CTP & CTax
 * 
 */

//---------------------------------------------------------------------------------------------------------------------------------------------------------
/*
* REGISTER TPL SINGLE SEDOO-RESEARCH-TEAM
*/

add_filter ( 'single_template', 'sedoo_research_team_single' );
function sedoo_research_team_single($single_template) {
    global $post;
    
    if ($post->post_type == 'sedoo-research-team') {
        $single_template = plugin_dir_url ( __FILE__ ) . 'templates/single-sedoo-research-team.php';
    }
    return $single_template;
}

/*
* REGISTER TPL SINGLE SEDOO-PLATFORM-TEAM
*/

add_filter ( 'single_template', 'sedoo_platform_single' );
function sedoo_platform_single($single_template) {
    global $post;
    
    if ($post->post_type == 'sedoo-platform') {
        $single_template = plugin_dir_url ( __FILE__ ) . 'templates/single-sedoo-platform.php';
    }
    return $single_template;
}

/**
 * REGISTER TPL FOR CUSTOM TAXONOMY sedoo-theme-labo
 * 
 * READ NOTE FROM STEPHEN HARRIS: https://wordpress.stackexchange.com/questions/50201/custom-taxonomy-in-plugin-and-template 
 * 
 * la fonction sedoo_theme_labo_is_template() regarde si le template existe dans le thème(-enfant) avant d'utiliser celui du plugin
 * cela permet de surcharger le template directement dans le thème 
 */


add_filter('template_include', 'sedoo_theme_labo_set_template');
function sedoo_theme_labo_set_template( $template ){

    //Add option for plugin to turn this off? If so just return $template

    //Check if the taxonomy is being viewed 
    //Suggested: check also if the current template is 'suitable'

    if( is_tax('sedoo-theme-labo') && !sedoo_theme_labo_is_template($template))
        $template = plugin_dir_url(__FILE__ ).'templates/taxonomy-sedoo-theme-labo.php';

    return $template;
}

function sedoo_theme_labo_is_template( $template_path ){

    //Get template name
    $template = basename($template_path);

    //Check if template is taxonomy-sedoo-theme-labo.php
    //Check if template is taxonomy-sedoo-theme-labo-{term-slug}.php
    if( 1 == preg_match('/^taxonomy-sedoo-theme-labo((-(\S*))?).php/',$template) )
         return true;

    return false;
}


?>