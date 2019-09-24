<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'sedoo_labtools_aside_block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sedoo_labtools_aside_block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if( get_field('relatedContentTitle') ):
    sedoo_labtools_get_associate_content_arguments( get_field('relatedContentTitle'), get_field('relatedContentTypeOfContent'), get_field('relatedContentTaxonomies'), get_field('post_number'), get_field('post_offset') );
    
endif;

// if( get_row_layout() == 'related_news' ):

//     $type_of_content = 'post';
//     sedoo_labtools_get_associate_content_arguments( get_field('title'), $type_of_content, get_field('taxonomies'), get_field('post_number'), get_field('post_offset') );

// endif;

?>