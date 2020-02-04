<?php

/**
 * Registers the `sedoo-axe-tag` taxonomy,
 * for use with 'sedoo-axe'.
 */
function sedoo_axe_tag_init() {
	register_taxonomy( 'sedoo-axe-tag', array( 'page', 'sedoo-axe', 'sedoo-platform', 'sedoo-research-team' ), array(
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
			'name'                       => __( 'axe Tags', 'sedoo-wppl-labtools' ),
			'singular_name'              => _x( 'axe Tag', 'taxonomy general name', 'sedoo-wppl-labtools' ),
			'search_items'               => __( 'Search axe Tags', 'sedoo-wppl-labtools' ),
			'popular_items'              => __( 'Popular axe Tags', 'sedoo-wppl-labtools' ),
			'all_items'                  => __( 'All axe Tags', 'sedoo-wppl-labtools' ),
			'parent_item'                => __( 'Parent axe Tag', 'sedoo-wppl-labtools' ),
			'parent_item_colon'          => __( 'Parent axe Tag:', 'sedoo-wppl-labtools' ),
			'edit_item'                  => __( 'Edit axe Tag', 'sedoo-wppl-labtools' ),
			'update_item'                => __( 'Update axe Tag', 'sedoo-wppl-labtools' ),
			'view_item'                  => __( 'View axe Tag', 'sedoo-wppl-labtools' ),
			'add_new_item'               => __( 'Add New axe Tag', 'sedoo-wppl-labtools' ),
			'new_item_name'              => __( 'New axe Tag', 'sedoo-wppl-labtools' ),
			'separate_items_with_commas' => __( 'Separate axe Tags with commas', 'sedoo-wppl-labtools' ),
			'add_or_remove_items'        => __( 'Add or remove axe Tags', 'sedoo-wppl-labtools' ),
			'choose_from_most_used'      => __( 'Choose from the most used axe Tags', 'sedoo-wppl-labtools' ),
			'not_found'                  => __( 'No axe Tags found.', 'sedoo-wppl-labtools' ),
			'no_terms'                   => __( 'No axe Tags', 'sedoo-wppl-labtools' ),
			'menu_name'                  => __( 'axe Tags', 'sedoo-wppl-labtools' ),
			'items_list_navigation'      => __( 'axe Tags list navigation', 'sedoo-wppl-labtools' ),
			'items_list'                 => __( 'axe Tags list', 'sedoo-wppl-labtools' ),
			'most_used'                  => _x( 'Most Used', 'sedoo-axe-tag', 'sedoo-wppl-labtools' ),
			'back_to_items'              => __( '&larr; Back to axe Tags', 'sedoo-wppl-labtools' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'axe-tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );
	register_taxonomy_for_object_type( 'sedoo-axe-tag', 'post' );
}
add_action( 'init', 'sedoo_axe_tag_init' );

/**
 * Sets the post updated messages for the `sedoo-axe-tag` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo-axe-tag` taxonomy.
 */
function sedoo_axe_tag_updated_messages( $messages ) {

	$messages['sedoo-axe-tag'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'axe Tag added.', 'sedoo-wppl-labtools' ),
		2 => __( 'axe Tag deleted.', 'sedoo-wppl-labtools' ),
		3 => __( 'axe Tag updated.', 'sedoo-wppl-labtools' ),
		4 => __( 'axe Tag not added.', 'sedoo-wppl-labtools' ),
		5 => __( 'axe Tag not updated.', 'sedoo-wppl-labtools' ),
		6 => __( 'axe Tags deleted.', 'sedoo-wppl-labtools' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'sedoo_axe_tag_updated_messages' );
