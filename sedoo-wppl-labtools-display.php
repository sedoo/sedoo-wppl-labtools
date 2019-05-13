<?php

/**
 * Enqueue Javascript files sur template CPT
 */
function theia_wpthchild_load_javascript_files() {
	if ( is_singular('sedoo-research-team') || is_singular('sedoo-platform') || is_page_template('template-theme.php')) {
		wp_enqueue_script('theme_aeris_jquery_sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), '', false );
		wp_enqueue_script('theme_aeris_toc', get_template_directory_uri() . '/js/toc.js', array('jquery'), '', false );
	}
}
add_action( 'wp_enqueue_scripts', 'theia_wpthchild_load_javascript_files' );

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
        $template = plugin_dir_path(__FILE__ ).'taxonomy-sedoo-theme-labo.php';

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



/** ----------------------------------------------------------------------------------------------
 * ADD TEMPLATE THEME FOR PAGES
 */

class PageTemplater {

	/**
	 * A reference to an instance of this class.
	 */
	private static $instance;

	/**
	 * The array of templates that this plugin tracks.
	 */
	protected $templates;

	/**
	 * Returns an instance of this class. 
	 */
	public static function get_instance() {

		if ( null == self::$instance ) {
			self::$instance = new PageTemplater();
		} 

		return self::$instance;

	} 

	/**
	 * Initializes the plugin by setting filters and administration functions.
	 */
	private function __construct() {

		$this->templates = array();


		// Add a filter to the attributes metabox to inject template into the cache.
		if ( version_compare( floatval( get_bloginfo( 'version' ) ), '4.7', '<' ) ) {

			// 4.6 and older
			add_filter(
				'page_attributes_dropdown_pages_args',
				array( $this, 'register_project_templates' )
			);

		} else {

			// Add a filter to the wp 4.7 version attributes metabox
			add_filter(
				'theme_page_templates', array( $this, 'add_new_template' )
			);

		}

		// Add a filter to the save post to inject out template into the page cache
		add_filter(
			'wp_insert_post_data', 
			array( $this, 'register_project_templates' ) 
		);


		// Add a filter to the template include to determine if the page has our 
		// template assigned and return it's path
		add_filter(
			'template_include', 
			array( $this, 'view_project_template') 
		);


		// Add your templates to this array.
		$this->templates = array(
			'template-theme.php' => 'Page theme',
		);
			
	} 

	/**
	 * Adds our template to the page dropdown for v4.7+
	 *
	 */
	public function add_new_template( $posts_templates ) {
		$posts_templates = array_merge( $posts_templates, $this->templates );
		return $posts_templates;
	}

	/**
	 * Adds our template to the pages cache in order to trick WordPress
	 * into thinking the template file exists where it doens't really exist.
	 */
	public function register_project_templates( $atts ) {

		// Create the key used for the themes cache
		$cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

		// Retrieve the cache list. 
		// If it doesn't exist, or it's empty prepare an array
		$templates = wp_get_theme()->get_page_templates();
		if ( empty( $templates ) ) {
			$templates = array();
		} 

		// New cache, therefore remove the old one
		wp_cache_delete( $cache_key , 'themes');

		// Now add our template to the list of templates by merging our templates
		// with the existing templates array from the cache.
		$templates = array_merge( $templates, $this->templates );

		// Add the modified cache to allow WordPress to pick it up for listing
		// available templates
		wp_cache_add( $cache_key, $templates, 'themes', 1800 );

		return $atts;

	} 

	/**
	 * Checks if the template is assigned to the page
	 */
	public function view_project_template( $template ) {
		
		// Get global post
		global $post;

		// Return template if post is empty
		if ( ! $post ) {
			return $template;
		}

		// Return default template if we don't have a custom one defined
		if ( ! isset( $this->templates[get_post_meta( 
			$post->ID, '_wp_page_template', true 
		)] ) ) {
			return $template;
		} 

		$file = plugin_dir_path( __FILE__ ). get_post_meta( 
			$post->ID, '_wp_page_template', true
		);

		// Just to be safe, we check if the file exist first
		if ( file_exists( $file ) ) {
			return $file;
		} else {
			echo $file;
		}

		// Return template
		return $template;

	}

} 
add_action( 'plugins_loaded', array( 'PageTemplater', 'get_instance' ) );

?>