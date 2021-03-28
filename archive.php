<?php
/**
* The template for displaying general archive pages
*
* @package Rmcc_Starter
*/

// timber get the context
$context = Timber::context();
// set the templates variable, so we can add templates to the array depending on conditions set below
$templates = array( 'archive.twig', 'index.twig' );
// get the main query posts & set as posts variable
$context['posts'] = new Timber\PostQuery();
// setting the title variable
$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = esc_html__('Day:', 'rmcc-starter').' '.get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$context['title'] = esc_html__('Month:', 'rmcc-starter').' '.get_the_date( 'M Y' );
} else if ( is_year() ) {
	$context['title'] = esc_html__('Year:', 'rmcc-starter').' '.get_the_date( 'Y' );
} else if ( is_tag() ) {
	$context['title'] = esc_html__('Tag:', 'rmcc-starter').' '.single_tag_title( '', false );
} else if ( is_category() ) {
	$context['title'] = esc_html__('Category:', 'rmcc-starter').' '.single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}
// setting pagination & paged variables, for used on archives with pagination
$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

// timber render twig templates with the context
Timber::render( $templates, $context );