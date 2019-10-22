<?php
/**
 * The main template file
 *
 * @package Starter_Theme
 */

$context = Timber::get_context();

$context['posts'] = Timber::get_posts();
$post = new TimberPost();
$context['title'] =  get_the_title( $post->ID );
if ( is_home() && is_front_page() ) {
	$context['title'] =  get_bloginfo( 'name' );
}
$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );