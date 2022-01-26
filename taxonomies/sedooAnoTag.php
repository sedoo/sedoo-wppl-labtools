<?php

/**
 * Registers the `sedoo-ano-tag` taxonomy,
 * for use with 'sedoo-ano'.
 */
function sedoo_ano_tag_init() {
	register_taxonomy( 'sedoo-ano-tag', array( 'page', 'post', 'sedoo-platform', 'sedoo_instruments', 'sedoo-research-team', 'sedoo-axe', 'sedoo-project', 'sedoo-sno' ), array(
		'hierarchical'      => true,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_tagcloud'     => true,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Actions Nationales pour l\'Observation', 'sedoo-wppl-labtools' ),
			'singular_name'              => _x( 'Action Nationale pour l\'Observation', 'taxonomy general name', 'sedoo-wppl-labtools' ),
			'search_items'               => __( 'Search ano Tags', 'sedoo-wppl-labtools' ),
			'popular_items'              => __( 'Popular ano Tags', 'sedoo-wppl-labtools' ),
			'all_items'                  => __( 'All ano Tags', 'sedoo-wppl-labtools' ),
			'parent_item'                => __( 'Parent ano Tag', 'sedoo-wppl-labtools' ),
			'parent_item_colon'          => __( 'Parent ano Tag:', 'sedoo-wppl-labtools' ),
			'edit_item'                  => __( 'Edit ano Tag', 'sedoo-wppl-labtools' ),
			'update_item'                => __( 'Update ano Tag', 'sedoo-wppl-labtools' ),
			'view_item'                  => __( 'View ano Tag', 'sedoo-wppl-labtools' ),
			'add_new_item'               => __( 'Add New ano Tag', 'sedoo-wppl-labtools' ),
			'new_item_name'              => __( 'New ano Tag', 'sedoo-wppl-labtools' ),
			'separate_items_with_commas' => __( 'Separate ano Tags with commas', 'sedoo-wppl-labtools' ),
			'add_or_remove_items'        => __( 'Add or remove ano Tags', 'sedoo-wppl-labtools' ),
			'choose_from_most_used'      => __( 'Choose from the most used ano Tags', 'sedoo-wppl-labtools' ),
			'not_found'                  => __( 'No ano Tags found.', 'sedoo-wppl-labtools' ),
			'no_terms'                   => __( 'No ano Tags', 'sedoo-wppl-labtools' ),
			'menu_name'                  => __( 'ano Tags', 'sedoo-wppl-labtools' ),
			'items_list_navigation'      => __( 'ano Tags list navigation', 'sedoo-wppl-labtools' ),
			'items_list'                 => __( 'ano Tags list', 'sedoo-wppl-labtools' ),
			'most_used'                  => _x( 'Most Used', 'sedoo-ano-tag', 'sedoo-wppl-labtools' ),
			'back_to_items'              => __( '&larr; Back to ano Tags', 'sedoo-wppl-labtools' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'sedoo-ano-tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );
	register_taxonomy_for_object_type( 'sedoo-ano-tag', 'post' );
}
add_action( 'init', 'sedoo_ano_tag_init' );

/**
 * Sets the post updated messages for the `sedoo-ano-tag` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo-ano-tag` taxonomy.
 */
function sedoo_ano_tag_updated_messages( $messages ) {

	$messages['sedoo-ano-tag'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'ano Tag added.', 'sedoo-wppl-labtools' ),
		2 => __( 'ano Tag deleted.', 'sedoo-wppl-labtools' ),
		3 => __( 'ano Tag updated.', 'sedoo-wppl-labtools' ),
		4 => __( 'ano Tag not added.', 'sedoo-wppl-labtools' ),
		5 => __( 'ano Tag not updated.', 'sedoo-wppl-labtools' ),
		6 => __( 'ano Tags deleted.', 'sedoo-wppl-labtools' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'sedoo_ano_tag_updated_messages' );
