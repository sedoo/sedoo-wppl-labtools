<?php

/**
 * Options du plugin
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Lab Tools Settings',
		'menu_title'	=> 'Lab Tools Settings',
		'menu_slug' 	=> 'lab-tools-settings',
		'capability'	=> 'activate_plugins',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Lab Tools Custom Posts Type',
		'menu_title'	=> 'Custom Posts Type ',
		'parent_slug'	=> 'lab-tools-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Lab Tools Custom Taxonomies',
		'menu_title'	=> 'Custom Taxonomies ',
		'parent_slug'	=> 'lab-tools-settings',
	));
	
}


/**
 * ACF gutenberg Block
 */

function sedoo_labtools_register_acf_block_types() {

    // register related block content.
    acf_register_block_type(array(
        'name'              => 'sedoo_labtools_relatedBlock',
        'title'             => __('Related Block'),
        'description'       => __('Ajout de contenus en relation.'),
        'render_callback'	=> 'sedoo_labtools_relatedBlock_render_callback',
        'category'          => 'widgets',
        'icon'              => 'category',
        'keywords'          => array( 'équipe', 'plateforme' ),
    ));

    // register Post block.
    acf_register_block_type(array(
        'name'              => 'sedoo_labtools_relatedBlock',
        'title'             => __('Post Block'),
        'description'       => __('Ajout de contenus en relation.'),
        'render_callback'	=> 'sedoo_labtools_relatedBlock_render_callback',
        'category'          => 'widgets',
        'icon'              => 'category',
        'keywords'          => array( 'équipe', 'plateforme' ),
    ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'sedoo_labtools_register_acf_block_types');
}




/**
 * Charger dynamiquement les choix du menu déroulant
 * Filtre : acf/load_field
 */
function sedoo_labtools_acf_populate_post_type($field) {
    
    $content_type_list = [];

    $args = array(
        // 'name' => array('sedoo-platform', 'sedoo-research-team'),
        // 'labels' => array('Research team', 'Platform'),
        'public'   => true,
        '_builtin' => true
    );
    $output = 'object'; // names or objects, note names is the default
    $operator = 'or'; // 'and' or 'or'
    
    $post_types = get_post_types( $args, $output, $operator );    
    foreach ( $post_types as $post_type ) {        
        // array_push($content_type_list, $post_type->label);
        $content_type_list[$post_type->name] = $post_type->label;
     }    
	
	$field['choices'] = $content_type_list;
	return $field;
}
add_filter('acf/load_field/name=relatedContentTypeOfContent', 'sedoo_labtools_acf_populate_post_type');

function sedoo_labtools_acf_populate_taxonomies($field) {
    
    $taxonomies_list = [];

    $args = array(
        // 'name' => array('sedoo-platform', 'sedoo-research-team'),
        // 'labels' => array('Research team', 'Platform'),
        'public'   => true,
        '_builtin' => false
    );
    $output = 'object'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'
    
    $taxonomies = get_taxonomies( $args, $output, $operator ); 
    // $taxonomies = get_taxonomies();
    foreach ( $taxonomies as $taxonomy ) {
        $taxonomies_list[$taxonomy->name] = $taxonomy->label;
    } 
	
	$field['choices'] = $taxonomies_list;
	return $field;
}
add_filter('acf/load_field/name=relatedContentTaxonomies', 'sedoo_labtools_acf_populate_taxonomies');

?>