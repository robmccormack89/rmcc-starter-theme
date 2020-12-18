<?php
/**
 * The template for displaying general archive pages
 *
 * @package Starter_Theme
 */

$templates = array( 'archive.twig', 'index.twig' );

$context = Timber::context();

$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = esc_html__('Day:', 'starter-wp-theme').' '.get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$context['title'] = esc_html__('Month:', 'starter-wp-theme').' '.get_the_date( 'M Y' );
} else if ( is_year() ) {
	$context['title'] = esc_html__('Year:', 'starter-wp-theme').' '.get_the_date( 'Y' );
} else if ( is_tag() ) {
	$context['title'] = esc_html__('Tag:', 'starter-wp-theme').' '.single_tag_title( '', false );
} else if ( is_category() ) {
	$context['title'] = esc_html__('Category:', 'starter-wp-theme').' '.single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}

$context['posts'] = new Timber\PostQuery();

Timber::render( $templates, $context );