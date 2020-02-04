<?php

/**
 * Registers the `sedoo-project-tag` taxonomy,
 * for use with 'sedoo-project'.
 */
function sedoo_project_tag_init() {
	register_taxonomy( 'sedoo-project-tag', array( 'sedoo-project', 'sedoo-sno', 'sedoo-research-team', 'sedoo-platform' ), array(
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
			'name'                       => __( 'Project Tags', 'sedoo-wppl-labtools' ),
			'singular_name'              => _x( 'Project Tag', 'taxonomy general name', 'sedoo-wppl-labtools' ),
			'search_items'               => __( 'Search project Tags', 'sedoo-wppl-labtools' ),
			'popular_items'              => __( 'Popular project Tags', 'sedoo-wppl-labtools' ),
			'all_items'                  => __( 'All project Tags', 'sedoo-wppl-labtools' ),
			'parent_item'                => __( 'Parent project Tag', 'sedoo-wppl-labtools' ),
			'parent_item_colon'          => __( 'Parent project Tag:', 'sedoo-wppl-labtools' ),
			'edit_item'                  => __( 'Edit project Tag', 'sedoo-wppl-labtools' ),
			'update_item'                => __( 'Update project Tag', 'sedoo-wppl-labtools' ),
			'view_item'                  => __( 'View project Tag', 'sedoo-wppl-labtools' ),
			'add_new_item'               => __( 'Add New project Tag', 'sedoo-wppl-labtools' ),
			'new_item_name'              => __( 'New project Tag', 'sedoo-wppl-labtools' ),
			'separate_items_with_commas' => __( 'Separate project Tags with commas', 'sedoo-wppl-labtools' ),
			'add_or_remove_items'        => __( 'Add or remove project Tags', 'sedoo-wppl-labtools' ),
			'choose_from_most_used'      => __( 'Choose from the most used project Tags', 'sedoo-wppl-labtools' ),
			'not_found'                  => __( 'No project Tags found.', 'sedoo-wppl-labtools' ),
			'no_terms'                   => __( 'No project Tags', 'sedoo-wppl-labtools' ),
			'menu_name'                  => __( 'Project Tags', 'sedoo-wppl-labtools' ),
			'items_list_navigation'      => __( 'Project Tags list navigation', 'sedoo-wppl-labtools' ),
			'items_list'                 => __( 'Project Tags list', 'sedoo-wppl-labtools' ),
			'most_used'                  => _x( 'Most Used', 'sedoo-project-tag', 'sedoo-wppl-labtools' ),
			'back_to_items'              => __( '&larr; Back to project Tags', 'sedoo-wppl-labtools' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'project-tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );
	register_taxonomy_for_object_type( 'sedoo-project-tag', 'post' );
}
add_action( 'init', 'sedoo_project_tag_init' );

/**
 * Sets the post updated messages for the `sedoo-project-tag` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo-project-tag` taxonomy.
 */
function sedoo_project_tag_updated_messages( $messages ) {

	$messages['sedoo-project-tag'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'project Tag added.', 'sedoo-wppl-labtools' ),
		2 => __( 'project Tag deleted.', 'sedoo-wppl-labtools' ),
		3 => __( 'project Tag updated.', 'sedoo-wppl-labtools' ),
		4 => __( 'project Tag not added.', 'sedoo-wppl-labtools' ),
		5 => __( 'project Tag not updated.', 'sedoo-wppl-labtools' ),
		6 => __( 'project Tags deleted.', 'sedoo-wppl-labtools' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'sedoo_project_tag_updated_messages' );
