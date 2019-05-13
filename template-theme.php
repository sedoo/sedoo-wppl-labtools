<?php
/*
Template Name: page Thématiques
*/
/**
 * template for thematics pages (show actus / Equipes / Platform liés)
 */

get_header(); 

while ( have_posts() ) : the_post();
   $postID=get_the_id();
   $categories = get_the_terms( get_the_id(), 'sedoo-theme-labo');  // recup des terms de la taxonomie $parameters['category']
   $terms=array();
   foreach ($categories as $term_slug) {        
       array_push($terms, $term_slug->slug);
   }

  include( 'template-parts/header-content-page.php' );
?>

	<div id="content-area" class="wrapper sidebar toc-left">
      <?php
      include('template-parts/content-tpl-page.php' );
      ?>
		
      <aside>
        <!-- NEWS --> 
        
        <?php
         $langNews=__( 'News', 'sedoo-wppl-labtools' );
         $langSec=__( 'Scientific Expertise Centres', 'sedoo-wppl-labtools' );
         $langProducts=__( 'Products', 'sedoo-wppl-labtools' );
         $langART=__( 'Regional Animation Networks', 'sedoo-wppl-labtools' );
            $parameters = array(
               'sectionTitle'    => 'News',
            );            
            $args = array(
              'post_type'             => 'post',
              'post_status'           => array( 'publish' ),
              'posts_per_page'        => '7',            // -1 pour liste sans limite
              'post__not_in'          => array(get_the_id()),    //exclu le post courant
              'orderby'               => 'date',
              'order'                 => 'DESC',
            //   'lang'                  => pll_current_language(),    // use language slug in the query
              'tax_query'             => array(
                                      array(
                                         'taxonomy' => 'sedoo-theme-labo',
                                         'field'    => 'slug',
                                         'terms'    => $terms,
                                      ),
                                   ),
              // 'meta_key'              => '_wp_page_template',
              // 'meta_value'            => '', // template-name.php
           );            
           sedoo_labtools_get_associate_content($parameters, $args);
          
            ?>
         <!-- SEC --> 

            <?php
            $parameters = array(
               'sectionTitle'    => 'Research teams',
            );
            
            $args = array(
              'post_type'             => 'sedoo-research-team',
              'post_status'           => array( 'publish' ),
              'posts_per_page'        => '-1',            // -1 pour liste sans limite
              'post__not_in'          => array(get_the_id()),    //exclu le post courant
              'orderby'               => 'title',
              'order'                 => 'ASC',
            //   'lang'                  => pll_current_language(),    // use language slug in the query
              'tax_query'             => array(
                                      array(
                                         'taxonomy' => 'sedoo-theme-labo',
                                         'field'    => 'slug',
                                         'terms'    => $terms,
                                      ),
                                   ),
              // 'meta_key'              => '_wp_page_template',
              // 'meta_value'            => '', // template-name.php
           );
            
           sedoo_labtools_get_associate_content($parameters, $args);

            ?>
         <!-- Products --> 
            <?php
            // faire double taxo query
            $parameters = array(
                'sectionTitle'    => 'Platforms',
             );
             
             $args = array(
               'post_type'             => 'sedoo-platform',
               'post_status'           => array( 'publish' ),
               'posts_per_page'        => '-1',            // -1 pour liste sans limite
               'post__not_in'          => array(get_the_id()),    //exclu le post courant
               'orderby'               => 'title',
               'order'                 => 'ASC',
               // 'lang'                  => pll_current_language(),    // use language slug in the query
               'tax_query'             => array(
                                       array(
                                          'taxonomy' => 'sedoo-theme-labo',
                                          'field'    => 'slug',
                                          'terms'    => $terms,
                                       ),
                                    ),
               // 'meta_key'              => '_wp_page_template',
               // 'meta_value'            => '', // template-name.php
            );
    
             sedoo_labtools_get_associate_content($parameters, $args);
            ?>
      </aside>


	</div><!-- #content-area -->


<?php
endwhile; // End of the loop.
// get_sidebar();
get_footer();
