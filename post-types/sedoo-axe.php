<?php

/**
 * Registers the `sedoo_axe` post type.
 */
function sedoo_axe_init() {
	register_post_type( 'sedoo-axe', array(
		'labels'                => array(
			'name'                  => __( 'axes', 'sedoo-wppl-labtools' ),
			'singular_name'         => __( 'axe', 'sedoo-wppl-labtools' ),
			'all_items'             => __( 'All axes', 'sedoo-wppl-labtools' ),
			'archives'              => __( 'axe Archives', 'sedoo-wppl-labtools' ),
			'attributes'            => __( 'axe Attributes', 'sedoo-wppl-labtools' ),
			'insert_into_item'      => __( 'Insert into axe', 'sedoo-wppl-labtools' ),
			'uploaded_to_this_item' => __( 'Uploaded to this axe', 'sedoo-wppl-labtools' ),
			'featured_image'        => _x( 'Featured Image', 'sedoo-axe', 'sedoo-wppl-labtools' ),
			'set_featured_image'    => _x( 'Set featured image', 'sedoo-axe', 'sedoo-wppl-labtools' ),
			'remove_featured_image' => _x( 'Remove featured image', 'sedoo-axe', 'sedoo-wppl-labtools' ),
			'use_featured_image'    => _x( 'Use as featured image', 'sedoo-axe', 'sedoo-wppl-labtools' ),
			'filter_items_list'     => __( 'Filter axes list', 'sedoo-wppl-labtools' ),
			'items_list_navigation' => __( 'axes list navigation', 'sedoo-wppl-labtools' ),
			'items_list'            => __( 'axes list', 'sedoo-wppl-labtools' ),
			'new_item'              => __( 'New axe', 'sedoo-wppl-labtools' ),
			'add_new'               => __( 'Add New', 'sedoo-wppl-labtools' ),
			'add_new_item'          => __( 'Add New axe', 'sedoo-wppl-labtools' ),
			'edit_item'             => __( 'Edit axe', 'sedoo-wppl-labtools' ),
			'view_item'             => __( 'View axe', 'sedoo-wppl-labtools' ),
			'view_items'            => __( 'View axes', 'sedoo-wppl-labtools' ),
			'search_items'          => __( 'Search axes', 'sedoo-wppl-labtools' ),
			'not_found'             => __( 'No axes found', 'sedoo-wppl-labtools' ),
			'not_found_in_trash'    => __( 'No axes found in trash', 'sedoo-wppl-labtools' ),
			'parent_item_colon'     => __( 'Parent axe:', 'sedoo-wppl-labtools' ),
			'menu_name'             => __( 'axes', 'sedoo-wppl-labtools' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'menu_position'         => 30,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-chart-area',
		'show_in_rest'          => true,
		'rest_base'             => 'axe',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'sedoo_axe_init' );

/**
 * Sets the post updated messages for the `sedoo_axe` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo_axe` post type.
 */
function sedoo_axe_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sedoo-axe'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'axe updated. <a target="_blank" href="%s">View axe</a>', 'sedoo-wppl-labtools' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'sedoo-wppl-labtools' ),
		3  => __( 'Custom field deleted.', 'sedoo-wppl-labtools' ),
		4  => __( 'axe updated.', 'sedoo-wppl-labtools' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'axe restored to revision from %s', 'sedoo-wppl-labtools' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'axe published. <a href="%s">View axe</a>', 'sedoo-wppl-labtools' ), esc_url( $permalink ) ),
		7  => __( 'axe saved.', 'sedoo-wppl-labtools' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'axe submitted. <a target="_blank" href="%s">Preview axe</a>', 'sedoo-wppl-labtools' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'axe scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview axe</a>', 'sedoo-wppl-labtools' ),
		date_i18n( __( 'M j, Y @ G:i', 'sedoo-wppl-labtools' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'axe draft updated. <a target="_blank" href="%s">Preview axe</a>', 'sedoo-wppl-labtools' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sedoo_axe_updated_messages' );
