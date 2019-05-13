<?php

/**
 * Registers the `sedoo_theme_labo` taxonomy,
 * for use with 'pages', 'post', 'sedoo-platform', 'sedoo-research-team'.
 */
function sedoo_theme_labo_init() {
	register_taxonomy( 'sedoo-theme-labo', array( 'pages', 'post', 'sedoo-platform', 'sedoo-research-team' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Themes', 'sedoo-wppl-labtools' ),
			'singular_name'              => _x( 'Theme', 'taxonomy general name', 'sedoo-wppl-labtools' ),
			'search_items'               => __( 'Search Themes', 'sedoo-wppl-labtools' ),
			'popular_items'              => __( 'Popular Themes', 'sedoo-wppl-labtools' ),
			'all_items'                  => __( 'All Themes', 'sedoo-wppl-labtools' ),
			'parent_item'                => __( 'Parent Theme', 'sedoo-wppl-labtools' ),
			'parent_item_colon'          => __( 'Parent Theme:', 'sedoo-wppl-labtools' ),
			'edit_item'                  => __( 'Edit Theme', 'sedoo-wppl-labtools' ),
			'update_item'                => __( 'Update Theme', 'sedoo-wppl-labtools' ),
			'view_item'                  => __( 'View Theme', 'sedoo-wppl-labtools' ),
			'add_new_item'               => __( 'Add New Theme', 'sedoo-wppl-labtools' ),
			'new_item_name'              => __( 'New Theme', 'sedoo-wppl-labtools' ),
			'separate_items_with_commas' => __( 'Separate Themes with commas', 'sedoo-wppl-labtools' ),
			'add_or_remove_items'        => __( 'Add or remove Themes', 'sedoo-wppl-labtools' ),
			'choose_from_most_used'      => __( 'Choose from the most used Themes', 'sedoo-wppl-labtools' ),
			'not_found'                  => __( 'No Themes found.', 'sedoo-wppl-labtools' ),
			'no_terms'                   => __( 'No Themes', 'sedoo-wppl-labtools' ),
			'menu_name'                  => __( 'Themes', 'sedoo-wppl-labtools' ),
			'items_list_navigation'      => __( 'Themes list navigation', 'sedoo-wppl-labtools' ),
			'items_list'                 => __( 'Themes list', 'sedoo-wppl-labtools' ),
			'most_used'                  => _x( 'Most Used', 'sedoo-theme-labo', 'sedoo-wppl-labtools' ),
			'back_to_items'              => __( '&larr; Back to Themes', 'sedoo-wppl-labtools' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'sedoo-theme-labo',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'sedoo_theme_labo_init' );

/**
 * Sets the post updated messages for the `sedoo_theme_labo` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo_theme_labo` taxonomy.
 */
function sedoo_theme_labo_updated_messages( $messages ) {

	$messages['sedoo-theme-labo'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Theme added.', 'sedoo-wppl-labtools' ),
		2 => __( 'Theme deleted.', 'sedoo-wppl-labtools' ),
		3 => __( 'Theme updated.', 'sedoo-wppl-labtools' ),
		4 => __( 'Theme not added.', 'sedoo-wppl-labtools' ),
		5 => __( 'Theme not updated.', 'sedoo-wppl-labtools' ),
		6 => __( 'Themes deleted.', 'sedoo-wppl-labtools' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'sedoo_theme_labo_updated_messages' );
