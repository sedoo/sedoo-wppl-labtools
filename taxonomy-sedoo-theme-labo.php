<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aeris
 */

get_header(); 

// recup le slug du term courant
$term = get_queried_object();
/**
 * WP_Query pour lister la page Theme correspondante
*/
$args = array(
	'post_type' => array('page'),
	'post_status'           => array( 'publish' ),
	'posts_per_page'        => 1,            // -1 pour liste sans limite
	// 'post__not_in'          => array($postID),    //exclu le post courant
	'tax_query' => array(
		array(
			'taxonomy' => 'sedoo-theme-labo',
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
	),
);
// $the_query = new WP_Query( $args );
// while ( $the_query->have_posts() ) {
// 	$the_query->the_post();

?>

<div class="site-branding" 
    <?php 
    if (get_the_post_thumbnail_url()) {
    ?>
    style="background-image:url(
    <?php //the_post_thumbnail_url( 'full' ); ?>
    );">
    <?php 
    }
    ?>
    <div>    
		<h1 class="site-title" rel="bookmark" style="<?php ?>"><span><?php echo $term->name;?></span></h1>
    </div>
</div><!-- .site-branding -->


<div id="content-area" class="wrapper archives">
	<main id="main" class="site-main" role="main">

	<?php //if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
			// the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		
		<?php
		//sedoo_labtools_get_associate_content_arguments($title, $type_of_content, $taxonomy, $post_number, $post_offset)
		$tax_slug = get_query_var( 'sedoo-theme-labo' );
			/* Start the Loop */
		// 	
		
		// SHOW POST OF THEME
		sedoo_labtools_get_associate_content_arguments('Actualités', 'post', 'sedoo-theme-labo', '3', '0');

		// SHOW EVENT OF THEME
		// sedoo_labtools_get_associate_content_arguments('Evenements', 'event', 'sedoo-theme-labo', '3', '0');

		// SHOW RESEARCH-TEAM OF THEME
		sedoo_labtools_get_associate_content_arguments('Research teams', 'sedoo-research-team', 'sedoo-theme-labo', '-1', '0');
		
		// SHOW axe OF axe TAG
        sedoo_labtools_get_associate_content_arguments('Axes', 'sedoo-axe', 'sedoo-axe-tag', '-1', '0');
		
		// SHOW PLATFORM OF THEME
		sedoo_labtools_get_associate_content_arguments('Platforms', 'sedoo-platform', 'sedoo-theme-labo', '-1', '0');

		?>


<?php //endif;
//}?>
	
	</main><!-- #main -->
</div><!-- #content-area -->
<?php
get_footer();
?>