<?php

/***
 * SUPPORTS
 * excerpt pour les pages
 * thumbnails
 */

add_post_type_support( 'page', 'excerpt' );

/***
 * Ajout du support des thumbnails
 */
add_theme_support( 'post-thumbnails' );

  /* ------------------------------------------------------------------------------------------------- */
/**
 * AJOUT DES FILTRES DES CUSTOM TAXONOMIES DANS LES LISTES DE POST / CUSTOM POST
 */

function sedoo_labtools_filter_by_custom_taxonomies( $post_type, $which ) {

	// Apply this only on a specific post type
	// if ( 'products' !== $post_type )
	// 	return;

    // A list of taxonomy slugs to filter by
    if ( 'sedoo-platform' == $post_type) {
        $taxonomies = array( 'sedoo-theme-labo', 'sedoo-platform-tag' );
    } elseif ( 'sedoo-research-team' == $post_type) {
        $taxonomies = array( 'sedoo-theme-labo', 'sedoo-research-team-tag' );
    } else {
        $taxonomies = array( 'sedoo-theme-labo', 'sedoo-research-team-tag', 'sedoo-platform-tag' );
    }

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name
            );
            /* Avec le compteur, mais qui est faux car il prend en compte tous les types de post
             printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
            );
            */
		}
		echo '</select>';
    }
}
add_action( 'restrict_manage_posts', 'sedoo_labtools_filter_by_custom_taxonomies' , 10, 2);
