<?php
/**
* The main template file
*
* @package Rmcc_Starter_Theme
*/

$context = Timber::context();
$templates = array( 'index.twig' );
$post = new Timber\Post();
$context['posts'] = new Timber\PostQuery();

if ( is_home() && is_front_page() ) {
	$context['title'] =  get_bloginfo( 'name' );
} else {
	$context['title'] =  get_the_title( $post->ID );
};

$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

Timber::render( $templates, $context );