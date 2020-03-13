<?php
/**
 * template for Research Teams CPT (show post / platform associate by theme taxonomy)
*/

get_header(); 

while ( have_posts() ) : the_post();

$themes = get_the_terms( $post->ID, 'sedoo-theme-labo');  
$themeSlugRewrite = "sedoo-theme-labo";

$platformTag = get_the_terms( $post->ID, 'sedoo-platform-tag');  
$platformTagSlugRewrite = "sedoo-platform-tag";
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
         <div data-role="list-platformTag">
            <?php sedoo_labtools_show_categories($platformTag, $platformTagSlugRewrite);?>
         </div>
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
