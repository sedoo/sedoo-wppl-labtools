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
             
            // $titleItem=mb_strimwidth(get_the_title(), 0, 100, '...');  
            ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
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