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
   $themes = get_the_terms( $post->ID, 'sedoo-theme-labo');  
$themeSlugRewrite = "sedoo-theme-labo";
?>
<div id="content-area" class="wrapper">
   <main id="main" class="site-main">
      <?php
      if (get_the_post_thumbnail()) {
      ?>
            <header id="cover">
               <?php the_post_thumbnail(); ?>
            </header>
      <?php 
      }
      ?>
      <div class="wrapper-content">
      <?php
      // sedoo_labtools_show_categories($themes, $themeSlugRewrite);
      include( get_template_directory() . '/template-parts/content-page.php' );


      ?>
		</div>
	</main><!-- #main -->
   <?php // table_content ( value )
   if (get_field( 'table_content' )):
   ?>
   <aside id="stickyMenu" class="open">
      <div>
            <p>Sommaire</p>
            <nav role="sommaire">
               <ol id="tocList">
                  
               </ol>
            </nav>
            <button class="bobinette">
               <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <rect fill="none" width="30" height="30"/>
                        <polyline points="
                        10.71,2.41 23.29,15 10.71,27.59 	"/>
               </svg> 
            </button>
      </div>
   </aside>
   <?php endif; ?>
</div><!-- #primary -->
<?php
endwhile; // End of the loop.
// get_sidebar();
get_footer();
