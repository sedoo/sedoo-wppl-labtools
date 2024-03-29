<?php

/**
 * Registers the `sedoo-research-team-tag` taxonomy,
 * for use with 'post', 'sedoo-research-team'.
 */
function sedoo_research_team_tag_init() {
	register_taxonomy( 'sedoo-research-team-tag', array( 'post', 'page', 'sedoo-platform', 'sedoo_instruments', 'sedoo-research-team', 'sedoo-axe', 'sedoo-project', 'sedoo-sno' ), array(
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
			// 'assign_terms'  => 'edit_posts',
			'assign_terms'  => 'read',    // Allow subscribers to add their team in their user profile
		),
		'labels'            => array(
			'name'                       => __( 'Research Teams', 'sedoo-wppl-labtools' ),
			'singular_name'              => _x( 'Research Team', 'taxonomy general name', 'sedoo-wppl-labtools' ),
			'search_items'               => __( 'Search Research Team Tags', 'sedoo-wppl-labtools' ),
			'popular_items'              => __( 'Popular Research Team Tags', 'sedoo-wppl-labtools' ),
			'all_items'                  => __( 'All Research Team Tags', 'sedoo-wppl-labtools' ),
			'parent_item'                => __( 'Parent Research Team Tag', 'sedoo-wppl-labtools' ),
			'parent_item_colon'          => __( 'Parent Research Team Tag:', 'sedoo-wppl-labtools' ),
			'edit_item'                  => __( 'Edit Research Team Tag', 'sedoo-wppl-labtools' ),
			'update_item'                => __( 'Update Research Team Tag', 'sedoo-wppl-labtools' ),
			'view_item'                  => __( 'View Research Team Tag', 'sedoo-wppl-labtools' ),
			'add_new_item'               => __( 'Add New Research Team Tag', 'sedoo-wppl-labtools' ),
			'new_item_name'              => __( 'New Research Team Tag', 'sedoo-wppl-labtools' ),
			'separate_items_with_commas' => __( 'Separate Research Team Tags with commas', 'sedoo-wppl-labtools' ),
			'add_or_remove_items'        => __( 'Add or remove Research Team Tags', 'sedoo-wppl-labtools' ),
			'choose_from_most_used'      => __( 'Choose from the most used Research Team Tags', 'sedoo-wppl-labtools' ),
			'not_found'                  => __( 'No Research Team Tags found.', 'sedoo-wppl-labtools' ),
			'no_terms'                   => __( 'No Research Team Tags', 'sedoo-wppl-labtools' ),
			'menu_name'                  => __( 'Research Team Tags', 'sedoo-wppl-labtools' ),
			'items_list_navigation'      => __( 'Research Team Tags list navigation', 'sedoo-wppl-labtools' ),
			'items_list'                 => __( 'Research Team Tags list', 'sedoo-wppl-labtools' ),
			'most_used'                  => _x( 'Most Used', 'sedoo-research-team-tag', 'sedoo-wppl-labtools' ),
			'back_to_items'              => __( '&larr; Back to Research Team Tags', 'sedoo-wppl-labtools' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'sedoo-research-team-tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'sedoo_research_team_tag_init',0 );

/**
 * Sets the post updated messages for the `sedoo-research-team-tag` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo-research-team-tag` taxonomy.
 */
function sedoo_research_team_tag_updated_messages( $messages ) {

	$messages['sedoo-research-team-tag'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Research Team Tag added.', 'sedoo-wppl-labtools' ),
		2 => __( 'Research Team Tag deleted.', 'sedoo-wppl-labtools' ),
		3 => __( 'Research Team Tag updated.', 'sedoo-wppl-labtools' ),
		4 => __( 'Research Team Tag not added.', 'sedoo-wppl-labtools' ),
		5 => __( 'Research Team Tag not updated.', 'sedoo-wppl-labtools' ),
		6 => __( 'Research Team Tags deleted.', 'sedoo-wppl-labtools' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'sedoo_research_team_tag_updated_messages' );
