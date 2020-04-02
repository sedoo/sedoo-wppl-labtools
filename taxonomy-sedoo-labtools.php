<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aeris
 */

get_header(); 

// recup le slug de la taxonomie du term courant
$term = get_queried_object();
$taxonomy = $term->taxonomy;
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
		<header class="page-header">
			<?php
			// the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
		
		<?php

        // SHOW POST
        $defaultListPost = array(
            'title'         => 'News',
            'posttype'      => 'post',
            'taxonomy'      => $taxonomy,
            'post_number'   => '3', 
            'post_offset'   => '0',
        );
        // SHOW RESEARCH-TEAM
        $defaultListTeam = array(
                'title'         => 'Research teams',
                'posttype'      => 'sedoo-research-team',
                'taxonomy'      => $taxonomy,
                'post_number'   => '-1', 
                'post_offset'   => '0',
        );
        // SHOW AXE
        $defaultListAxe = array(
                'title'         => 'Axes',
                'posttype'      => 'sedoo-axe',
                'taxonomy'      => $taxonomy,
                'post_number'   => '-1', 
                'post_offset'   => '0',
        );
        // SHOW PLATFORM
        $defaultListPlatform =  array(
                'title'         => 'Platforms',
                'posttype'      => 'sedoo-platform',
                'taxonomy'      => $taxonomy,
                'post_number'   => '-1', 
                'post_offset'   => '0',
        );
        // SHOW PROJECT
        $defaultListProject =  array(
            'title'         => 'Projects',
            'posttype'      => 'sedoo-project',
            'taxonomy'      => $taxonomy,
            'post_number'   => '-1', 
            'post_offset'   => '0',
        );
        // SHOW SNO
        $defaultListSno =  array(
            'title'         => 'SNO',
            'posttype'      => 'sedoo-sno',
            'taxonomy'      => $taxonomy,
            'post_number'   => '-1', 
            'post_offset'   => '0',
        );

		switch ($taxonomy) {
			case 'sedoo-theme-labo':
				$whatToShow= array(
                    '1' => $defaultListPost,
                    '2' => $defaultListTeam,
                    '3' => $defaultListAxe,
                    '4' => $defaultListPlatform,
                );
				break;
            case 'sedoo-axe-tag':
				$whatToShow= array(
                    '1' => $defaultListPost,
                    '2' => $defaultListTeam,
                    '3' => $defaultListPlatform,
                );
				break;
            case 'sedoo-platform-tag':
                    $whatToShow= array(
                        '1' => $defaultListPost,
                        '2' => $defaultListPlatform,
                        '3' => $defaultListTeam,
                        '4' => $defaultListAxe,
                    );
                break;
            case 'sedoo-project-tag':
                    $whatToShow= array(
                        '1' => $defaultListPost,
                        '2' => $defaultListProject,
                        '3' => $defaultListTeam,
                    );
                break;
            case 'sedoo-ano-tag':
                    $whatToShow= array(
                        '1' => $defaultListPost,
                        '2' => $defaultListSno,
                        '3' => $defaultListTeam,
                    );
                break;
		}

        //sedoo_labtools_get_associate_content_arguments($title, $type_of_content, $taxonomy, $post_number, $post_offset)
        foreach ($whatToShow as $display) {
            sedoo_labtools_get_associate_content_arguments($display['title'], $display['posttype'], $display['taxonomy'], $display['post_number'], $display['post_offset']);
        }

		?>


<?php //endif;
//}?>
	
	</main><!-- #main -->
</div><!-- #content-area -->
<?php
get_footer();
?>