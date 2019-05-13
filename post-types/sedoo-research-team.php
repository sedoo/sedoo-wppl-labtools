<?php

/**
 * Registers the `sedoo_research_team` post type.
 */
function sedoo_research_team_init() {
	register_post_type( 'sedoo-research-team', array(
		'labels'                => array(
			'name'                  => __( 'Research teams', 'sedoo-wppl-labtools' ),
			'singular_name'         => __( 'Research team', 'sedoo-wppl-labtools' ),
			'all_items'             => __( 'All Research teams', 'sedoo-wppl-labtools' ),
			'archives'              => __( 'Research team Archives', 'sedoo-wppl-labtools' ),
			'attributes'            => __( 'Research team Attributes', 'sedoo-wppl-labtools' ),
			'insert_into_item'      => __( 'Insert into Research team', 'sedoo-wppl-labtools' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Research team', 'sedoo-wppl-labtools' ),
			'featured_image'        => _x( 'Featured Image', 'sedoo-research-team', 'sedoo-wppl-labtools' ),
			'set_featured_image'    => _x( 'Set featured image', 'sedoo-research-team', 'sedoo-wppl-labtools' ),
			'remove_featured_image' => _x( 'Remove featured image', 'sedoo-research-team', 'sedoo-wppl-labtools' ),
			'use_featured_image'    => _x( 'Use as featured image', 'sedoo-research-team', 'sedoo-wppl-labtools' ),
			'filter_items_list'     => __( 'Filter Research teams list', 'sedoo-wppl-labtools' ),
			'items_list_navigation' => __( 'Research teams list navigation', 'sedoo-wppl-labtools' ),
			'items_list'            => __( 'Research teams list', 'sedoo-wppl-labtools' ),
			'new_item'              => __( 'New Research team', 'sedoo-wppl-labtools' ),
			'add_new'               => __( 'Add New', 'sedoo-wppl-labtools' ),
			'add_new_item'          => __( 'Add New Research team', 'sedoo-wppl-labtools' ),
			'edit_item'             => __( 'Edit Research team', 'sedoo-wppl-labtools' ),
			'view_item'             => __( 'View Research team', 'sedoo-wppl-labtools' ),
			'view_items'            => __( 'View Research teams', 'sedoo-wppl-labtools' ),
			'search_items'          => __( 'Search Research teams', 'sedoo-wppl-labtools' ),
			'not_found'             => __( 'No Research teams found', 'sedoo-wppl-labtools' ),
			'not_found_in_trash'    => __( 'No Research teams found in trash', 'sedoo-wppl-labtools' ),
			'parent_item_colon'     => __( 'Parent Research team:', 'sedoo-wppl-labtools' ),
			'menu_name'             => __( 'Research teams', 'sedoo-wppl-labtools' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'menu_position'         => 10,
		'supports'              => array( 'title', 'editor','excerpt', 'thumbnail', 'revisions' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-groups',
		'show_in_rest'          => true,
		'rest_base'             => 'sedoo-research-team',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'sedoo_research_team_init' );

/**
 * Sets the post updated messages for the `sedoo_research_team` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo_research_team` post type.
 */
function sedoo_research_team_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sedoo-research-team'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Research team updated. <a target="_blank" href="%s">View Research team</a>', 'sedoo-wppl-labtools' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'sedoo-wppl-labtools' ),
		3  => __( 'Custom field deleted.', 'sedoo-wppl-labtools' ),
		4  => __( 'Research team updated.', 'sedoo-wppl-labtools' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Research team restored to revision from %s', 'sedoo-wppl-labtools' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Research team published. <a href="%s">View Research team</a>', 'sedoo-wppl-labtools' ), esc_url( $permalink ) ),
		7  => __( 'Research team saved.', 'sedoo-wppl-labtools' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Research team submitted. <a target="_blank" href="%s">Preview Research team</a>', 'sedoo-wppl-labtools' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Research team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Research team</a>', 'sedoo-wppl-labtools' ),
		date_i18n( __( 'M j, Y @ G:i', 'sedoo-wppl-labtools' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Research team draft updated. <a target="_blank" href="%s">Preview Research team</a>', 'sedoo-wppl-labtools' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sedoo_research_team_updated_messages' );
