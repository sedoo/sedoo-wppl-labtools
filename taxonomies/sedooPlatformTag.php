<?php

/**
 * Registers the `sedooPlatformTag` taxonomy,
 * for use with 'sedoo-platform'.
 */
function sedooPlatformTag_init() {
	register_taxonomy( 'sedooPlatformTag', array( 'post', 'sedoo-platform' ), array(
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
			'name'                       => __( 'Platform Tags', 'sedoo-wppl-labtools' ),
			'singular_name'              => _x( 'Platform Tag', 'taxonomy general name', 'sedoo-wppl-labtools' ),
			'search_items'               => __( 'Search Platform Tags', 'sedoo-wppl-labtools' ),
			'popular_items'              => __( 'Popular Platform Tags', 'sedoo-wppl-labtools' ),
			'all_items'                  => __( 'All Platform Tags', 'sedoo-wppl-labtools' ),
			'parent_item'                => __( 'Parent Platform Tag', 'sedoo-wppl-labtools' ),
			'parent_item_colon'          => __( 'Parent Platform Tag:', 'sedoo-wppl-labtools' ),
			'edit_item'                  => __( 'Edit Platform Tag', 'sedoo-wppl-labtools' ),
			'update_item'                => __( 'Update Platform Tag', 'sedoo-wppl-labtools' ),
			'view_item'                  => __( 'View Platform Tag', 'sedoo-wppl-labtools' ),
			'add_new_item'               => __( 'Add New Platform Tag', 'sedoo-wppl-labtools' ),
			'new_item_name'              => __( 'New Platform Tag', 'sedoo-wppl-labtools' ),
			'separate_items_with_commas' => __( 'Separate Platform Tags with commas', 'sedoo-wppl-labtools' ),
			'add_or_remove_items'        => __( 'Add or remove Platform Tags', 'sedoo-wppl-labtools' ),
			'choose_from_most_used'      => __( 'Choose from the most used Platform Tags', 'sedoo-wppl-labtools' ),
			'not_found'                  => __( 'No Platform Tags found.', 'sedoo-wppl-labtools' ),
			'no_terms'                   => __( 'No Platform Tags', 'sedoo-wppl-labtools' ),
			'menu_name'                  => __( 'Platform Tags', 'sedoo-wppl-labtools' ),
			'items_list_navigation'      => __( 'Platform Tags list navigation', 'sedoo-wppl-labtools' ),
			'items_list'                 => __( 'Platform Tags list', 'sedoo-wppl-labtools' ),
			'most_used'                  => _x( 'Most Used', 'sedooPlatformTag', 'sedoo-wppl-labtools' ),
			'back_to_items'              => __( '&larr; Back to Platform Tags', 'sedoo-wppl-labtools' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'sedooPlatformTag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'sedooPlatformTag_init' );

/**
 * Sets the post updated messages for the `sedooPlatformTag` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedooPlatformTag` taxonomy.
 */
function sedooPlatformTag_updated_messages( $messages ) {

	$messages['sedooPlatformTag'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Platform Tag added.', 'sedoo-wppl-labtools' ),
		2 => __( 'Platform Tag deleted.', 'sedoo-wppl-labtools' ),
		3 => __( 'Platform Tag updated.', 'sedoo-wppl-labtools' ),
		4 => __( 'Platform Tag not added.', 'sedoo-wppl-labtools' ),
		5 => __( 'Platform Tag not updated.', 'sedoo-wppl-labtools' ),
		6 => __( 'Platform Tags deleted.', 'sedoo-wppl-labtools' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'sedooPlatformTag_updated_messages' );
