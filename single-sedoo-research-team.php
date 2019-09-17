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

   $sedooResearchTeamtags = get_the_terms( get_the_id(), 'sedoo-research-team-tag');  // recup des terms de la taxonomie $parameters['category']
   $sedooResearchTeamTerms=array();
   if (is_array($sedooResearchTeamtags) || is_object($sedooResearchTeamtags))
   {
     foreach ($sedooResearchTeamtags as $sedooResearchTeamTerm_slug) {        
        array_push($sedooResearchTeamTerms, $sedooResearchTeamTerm_slug->slug);
     }
   }
   // include( 'template-parts/header-content-page.php' );
?>

	<div id="content-area" class="wrapper sidebar toc-left">
      <?php
      include( get_template_directory() . '/template-parts/content-page.php' );
      ?>
				
      <aside>
         <?php
            // check if the flexible content field has rows of data
            if( have_rows('right_column') ):

               // loop through the rows of data
            while ( have_rows('right_column') ) : the_row();

                  if( get_row_layout() == 'related_content' ):

                     sedoo_labtools_get_associate_content_arguments( get_sub_field('title'), get_sub_field('type_of_content'), get_sub_field('taxonomies'), get_sub_field('post_number'), get_sub_field('post_offset') );
                     
                  endif;

                  if( get_row_layout() == 'related_news' ):

                     $type_of_content = 'post';
                     sedoo_labtools_get_associate_content_arguments( get_sub_field('title'), $type_of_content, get_sub_field('taxonomies'), get_sub_field('post_number'), get_sub_field('post_offset') );

                  endif;

            endwhile;

            else :

            // no layouts found

            endif;

            ?>
      </aside>


	</div><!-- #content-area -->


<?php
endwhile; // End of the loop.
// get_sidebar();
get_footer();
