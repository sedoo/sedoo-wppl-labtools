<?php
/**
 * template for Axe CPT (show post / axe associate by theme taxonomy)
*/

get_header(); 

while ( have_posts() ) : the_post();

if (taxonomy_exists('sedoo-theme-labo')) {
   $themes = get_the_terms( $post->ID, 'sedoo-theme-labo');  
   $themeSlugRewrite = "sedoo-theme-labo";
}
if (taxonomy_exists('sedoo-axe-tag')) {
   $axeTag = get_the_terms( $post->ID, 'sedoo-axe-tag');  
   $axeTagSlugRewrite = "sedoo-axe-tag";
}


?>
<!-- L'AFFICHAGE COMMENCE ICI -->
<?php
if (function_exists('sedoo_wpth_labs_test_if_post_thumbnail_and_display')) {
sedoo_wpth_labs_test_if_post_thumbnail_and_display();
}
// Show title first on mobile
if ((get_field( 'table_content' )) && (function_exists('sedoo_wpth_labs_display_title_on_top_on_mobile'))) {
   sedoo_wpth_labs_display_title_on_top_on_mobile();
}
?>
<div id="content-area" class="wrapper<?php if (get_field( 'table_content' )) {echo " tocActive";}?>">
   <?php // table_content ( value ) 
   if ((get_field( 'table_content' )) && (function_exists('sedoo_wpth_labs_display_sommaire'))) {
      sedoo_wpth_labs_display_sommaire('Sommaire');
   } ?>
   <main id="main" class="site-main">
      
      <div class="wrapper-content">
      <?php 
         if ( (function_exists('sedoo_labtools_show_categories')) && ($axeTag)){
         ?>
         <div data-role="list-platformTag">
            <?php sedoo_labtools_show_categories($axeTag, $axeTagSlugRewrite);?>
         </div>
         <?php
         }
      ?>
      <?php
         // sedoo_labtools_show_categories($themes, $themeSlugRewrite);
         include( get_template_directory() . '/template-parts/content-page.php' );
         ?>
		</div>
	</main>
</div>

<?php
endwhile; 
get_footer();

