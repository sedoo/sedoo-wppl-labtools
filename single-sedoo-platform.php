<?php
/**
 * template for Research Teams CPT (show post / platform associate by theme taxonomy)
*/

get_header(); 

while ( have_posts() ) : the_post();

   $categories = get_the_terms( get_the_id(), 'sedoo-theme-labo');  // recup des terms de la taxonomie $parameters['category']
   $terms=array();
   if (is_array($categories) || is_object($categories))
   {
      foreach ($categories as $term_slug) {        
         array_push($terms, $term_slug->slug);
      }
   }

   $sedooPlatformTags = get_the_terms( get_the_id(), 'sedoo-platform-tag');  // recup des terms de la taxonomie $parameters['category']
   $sedooPlatformTerms=array();
   if (is_array($sedooPlatformTags) || is_object($sedooPlatformTags))
   {
     foreach ($sedooPlatformTags as $sedooPlatformTerm_slug) {        
        array_push($sedooPlatformTerms, $sedooPlatformTerm_slug->slug);
     }
   }
   include( 'template-parts/header-content-page.php' );
?>

	<div id="content-area" class="wrapper sidebar toc-left">
      <?php
      include( 'template-parts/content-tpl-page.php' );
      ?>
				
      <aside>
         <!-- NEWS --> 
         <?php
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
                                         'taxonomy' => 'sedoo-platform-tag',
                                         'field'    => 'slug',
                                         'terms'    => $sedooPlatformTerms,
                                      ),
                                   ),
              // 'meta_key'              => '_wp_page_template',
              // 'meta_value'            => '', // template-name.php
           );            
           sedoo_labtools_get_associate_content($parameters, $args);
         ?>

         <!-- Research Teams --> 
         <?php
            $parameters = array(
                'sectionTitle'    => "Research teams",
             );
             
             $args = array(
               'post_type'             => 'sedoo-research-team',
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
