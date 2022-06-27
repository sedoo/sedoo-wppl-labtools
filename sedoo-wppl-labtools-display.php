<?php

/**
 * Enqueue Javascript files sur template CPT
 */
function sedoo_labtools_load_javascript_files() {
	if ( is_singular('sedoo-research-team') || is_singular('sedoo-platform') || is_page_template('template-theme.php')) {
		wp_enqueue_script('theme_aeris_jquery_sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '', false );
		wp_enqueue_script('theme_aeris_toc', get_template_directory_uri() . '/js/toc.js', array('jquery'), '', false );
	}
}
//add_action( 'wp_enqueue_scripts', 'sedoo_labtools_load_javascript_files' );

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
        $single_template = plugin_dir_path( __FILE__ ) . 'single-sedoo-research-team.php';
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
        $single_template = plugin_dir_path( __FILE__ ) . 'single-sedoo-platform.php';
    }
    return $single_template;
}

/*
* REGISTER TPL SINGLE SEDOO-AXE
*/

add_filter ( 'single_template', 'sedoo_axe_single' );
function sedoo_axe_single($single_template) {
    global $post;
    
    if ($post->post_type == 'sedoo-axe') {
        $single_template = plugin_dir_path( __FILE__ ) . 'single-sedoo-axe.php';
    }
    return $single_template;
}

/*
* REGISTER TPL SINGLE SEDOO-PROJECT
*/

add_filter ( 'single_template', 'sedoo_project_single' );
function sedoo_project_single($single_template) {
    global $post;
    
    if ($post->post_type == 'sedoo-project') {
        $single_template = plugin_dir_path( __FILE__ ) . 'single-sedoo-project.php';
    }
    return $single_template;
}

/*
* REGISTER TPL SINGLE SEDOO-SNO
*/

add_filter ( 'single_template', 'sedoo_sno_single' );
function sedoo_sno_single($single_template) {
    global $post;
    
    if ($post->post_type == 'sedoo-sno') {
        $single_template = plugin_dir_path( __FILE__ ) . 'single-sedoo-sno.php';
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

/**  REGISTER TAXONOMY TPL FOR THEME LABO */
add_filter('template_include', 'sedoo_theme_labo_set_template');
function sedoo_theme_labo_set_template( $template ){

    //Add option for plugin to turn this off? If so just return $template

    //Check if the taxonomy is being viewed 
    //Suggested: check also if the current template is 'suitable'

    if( is_tax('sedoo-theme-labo') && !sedoo_theme_labo_is_template($template))
        $template = plugin_dir_path(__FILE__ ).'taxonomy-sedoo-labtools.php';

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

/**  REGISTER TAXONOMY TPL FOR PLATFORM TAG */

add_filter('template_include', 'sedoo_platform_tag_set_template');
function sedoo_platform_tag_set_template( $template ){

    //Add option for plugin to turn this off? If so just return $template

    //Check if the taxonomy is being viewed 
    //Suggested: check also if the current template is 'suitable'

    if( is_tax('sedoo-platform-tag') && !sedoo_platform_tag_is_template($template))
        $template = plugin_dir_path(__FILE__ ).'taxonomy-sedoo-labtools.php';

    return $template;
}

function sedoo_platform_tag_is_template( $template_path ){

    //Get template name
    $template = basename($template_path);

    //Check if template is taxonomy-sedoo-platform-tag.php
    //Check if template is taxonomy-sedoo-platform-tag-{term-slug}.php
    if( 1 == preg_match('/^taxonomy-sedoo-platform-tag((-(\S*))?).php/',$template) )
         return true;

    return false;
}

/**  REGISTER TAXONOMY TPL FOR AXE TAG */

add_filter('template_include', 'sedoo_axe_tag_set_template');
function sedoo_axe_tag_set_template( $template ){

    //Add option for plugin to turn this off? If so just return $template

    //Check if the taxonomy is being viewed 
    //Suggested: check also if the current template is 'suitable'

    if( is_tax('sedoo-axe-tag') && !sedoo_axe_tag_is_template($template))
        $template = plugin_dir_path(__FILE__ ).'taxonomy-sedoo-labtools.php';

    return $template;
}

function sedoo_axe_tag_is_template( $template_path ){

    //Get template name
    $template = basename($template_path);

    //Check if template is taxonomy-sedoo-axe-tag.php
    //Check if template is taxonomy-sedoo-axe-tag-{term-slug}.php
    if( 1 == preg_match('/^taxonomy-sedoo-axe-tag((-(\S*))?).php/',$template) )
         return true;

    return false;
}

/**  REGISTER TAXONOMY TPL FOR PROJECT TAG */

add_filter('template_include', 'sedoo_project_tag_set_template');
function sedoo_project_tag_set_template( $template ){

    //Add option for plugin to turn this off? If so just return $template

    //Check if the taxonomy is being viewed 
    //Suggested: check also if the current template is 'suitable'

    if( is_tax('sedoo-project-tag') && !sedoo_project_tag_is_template($template))
        $template = plugin_dir_path(__FILE__ ).'taxonomy-sedoo-labtools.php';

    return $template;
}

function sedoo_project_tag_is_template( $template_path ){

    //Get template name
    $template = basename($template_path);

    //Check if template is taxonomy-sedoo-project-tag.php
    //Check if template is taxonomy-sedoo-project-tag-{term-slug}.php
    if( 1 == preg_match('/^taxonomy-sedoo-project-tag((-(\S*))?).php/',$template) )
         return true;

    return false;
}

/**  REGISTER TAXONOMY TPL FOR ANO TAG */

add_filter('template_include', 'sedoo_ano_tag_set_template');
function sedoo_ano_tag_set_template( $template ){

    //Add option for plugin to turn this off? If so just return $template

    //Check if the taxonomy is being viewed 
    //Suggested: check also if the current template is 'suitable'

    if( is_tax('sedoo-ano-tag') && !sedoo_ano_tag_is_template($template))
        $template = plugin_dir_path(__FILE__ ).'taxonomy-sedoo-labtools.php';

    return $template;
}

function sedoo_ano_tag_is_template( $template_path ){

    //Get template name
    $template = basename($template_path);

    //Check if template is taxonomy-sedoo-ano-tag.php
    //Check if template is taxonomy-sedoo-ano-tag-{term-slug}.php
    if( 1 == preg_match('/^taxonomy-sedoo-ano-tag((-(\S*))?).php/',$template) )
         return true;

    return false;
}

function sedoo_labtools_relatedBlock_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	$templateURL = plugin_dir_path(__FILE__) . "template-parts/blocks/contentblock/sedoo-labtools-relatedblock.php";
	// include a template part from within the "template-parts/block" folder
	if( file_exists( $templateURL)) {
		include $templateURL;
    }
}

/**
 * Prepare WP_Query for related content 
 * 
 */
if(!function_exists('sedoo_labtools_get_associate_content_arguments')) {
    function sedoo_labtools_get_associate_content_arguments($title, $type_of_content, $taxonomy, $post_number, $post_offset, $layout, $className, $show_more, $show_more_text) {
        
        $parameters = array(
            'sectionTitle'    => $title,
            );
        if (function_exists('pll_current_language')) {
            $args['lang']=pll_current_language();
        }

        if ($type_of_content== 'post') {
            $orderby = 'date';
            $order = 'DESC';
        } else {
            $orderby = 'title';
            $order = 'ASC';
        }

        $terms_fields=array();
        
        if (!is_archive()) {
            $args['post__not_in']=array(get_the_id()); //exclude current post if not archive template

            $categories_field = get_the_terms( get_the_id(), $taxonomy);  // get terms of taxonomy
            if (is_array($categories_field) || is_object($categories_field))
            {
            foreach ($categories_field as $term_slug) {        
                array_push($terms_fields, $term_slug->slug);
                }
            }
        } else {
            // If archive, get only term slug , not post ID! 
            $term = get_queried_object();
            array_push($terms_fields, $term->slug);
        }

        $args = array(
        'post_type'             => $type_of_content,
        'post_status'           => array( 'publish' ),
        'posts_per_page'        => $post_number,            // -1 no limit
        'orderby'               => $orderby,
        'order'                 => $order,
        'tax_query'             => array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field'    => 'slug',
                                    'terms'    => $terms_fields,
                                    ),
                                ),
        );

        sedoo_labtools_get_associate_content($parameters, $args, $type_of_content);
    }

    /**
     * Show related content
     * 
     */
    function sedoo_labtools_get_associate_content($parameters, $args, $type_of_content) {
        $the_query = new WP_Query( $args );
        // The Loop
        if ( $the_query->have_posts() ) {
            echo '<h2>'.__( $parameters['sectionTitle'], 'sedoo-wppl-labtools' ).'</h2>';
            echo '<section role="listNews" class="post-wrapper sedoo-labtools-listCPT">';
            while ( $the_query->have_posts() ) {
                $the_query->the_post();

                $titleItem=mb_strimwidth(get_the_title(), 0, 65, '...');
                if (get_post_type()== "post") {
                    get_template_part( 'template-parts/content', get_post_type() );
                } else {
                    get_template_part('template-parts/content', 'sedoo-cpt');
                }
            }
            echo '</section>';
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }
    }
}
?>