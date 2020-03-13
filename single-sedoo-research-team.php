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
<?php
if (get_the_post_thumbnail()) {
?>
<header id="cover">
   <?php the_post_thumbnail(); ?>
</header>
<?php 
}
?>
<?php 
    // Show title first on mobile
        if (get_field( 'table_content' )) {
    ?>
        <h1 class="onTop"><?php the_title();?></h1>
    <?php
    }
    ?>
<div id="content-area" class="wrapper<?php if (get_field( 'table_content' )) {echo " tocActive";}?>">

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
         </div>
      </aside>
      <?php endif; ?>
   <main id="main" class="site-main">
      
      <div class="wrapper-content">
      
      <?php
      // sedoo_labtools_show_categories($themes, $themeSlugRewrite);
      include( get_template_directory() . '/template-parts/content-page.php' );


      ?>
		</div>
	</main><!-- #main -->
   
</div><!-- #primary -->
<?php
endwhile; // End of the loop.
// get_sidebar();
get_footer();
