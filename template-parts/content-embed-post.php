<?php
/**
 * Template part for displaying embed post 
 *
 */
$categories = get_the_terms( $post->ID, 'category');  
$themes = get_the_terms( $post->ID, 'theme');  
$slugRewrite = "theme";

$title = get_the_title();
$title = mb_strimwidth($title, 0, 50, '...');
?>

<article role="short-embed-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
    <?php sedoo_labtools_show_categories($themes, $slugRewrite);?>
    <?php 
    if (get_the_post_thumbnail()) {
    ?>
        <figure>
            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                <?php the_post_thumbnail( 'single-article' ); ?>
            </a>
        </figure>
    <?php 
    }
    ?> 
        
        <h3>
            <a href="<?php the_permalink(); ?>" title="<?php the_title();?>">
                <?php echo $title;?>
            </a>
        </h3>      
                 
    </header>
    <footer>
         
    </footer>
</article>