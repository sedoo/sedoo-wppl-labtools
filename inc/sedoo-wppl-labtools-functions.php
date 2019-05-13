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


/**
 * Affichage des contenus associés
 * 
 */

function sedoo_labtools_get_associate_content($parameters, $args) {
   
    $the_query = new WP_Query( $args );
    
    // The Loop
    if ( $the_query->have_posts() ) {

        echo '<section><h3>'.__( $parameters['sectionTitle'], 'sedoo-wppl-labtools' ).'</h3>';
        echo '<ul>';
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
             
            $titleItem=mb_strimwidth(get_the_title(), 0, 65, '...');  
            ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php echo $titleItem ?>
                    </a>
                </li>
            <?php
        }
        echo '</ul></section>';
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        // no posts found
    }
}

/******************************************************************
 * Afficher les archives des custom taxonomies
 * $categories = get_the_terms( $post->ID, 'category');  
 */

function sedoo_labtools_show_categories($categories, $slugRewrite) {
 
    if( $categories ) {
    ?>
    <div class="tag">
    <?php
        foreach( $categories as $categorie ) { 
            if ($categorie->slug !== "non-classe") {
                // if ( "en" == pll_current_language()) {
                //     echo '<a href="'.site_url().'/'.pll_current_language().'/'.$slugRewrite.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';
                // } else {
                    echo '<a href="'.site_url().'/'.$slugRewrite.'/'.$categorie->slug.'" class="'.$categorie->slug.'">';
                // }
                echo $categorie->name; 
                ?>                    
            </a>
    <?php 
            }
        }
    ?>
    </div>
  <?php
      } 
  }

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