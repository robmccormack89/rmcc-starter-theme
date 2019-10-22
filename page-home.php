<?php
/**
 * The custom template for page with slug 'home'
 *
 * @package Starter_Theme
 */

$context = Timber::get_context();

$the_posts_args = array(
   'post_type' => 'post',
   'posts_per_page'=>  4,
);
$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;
if ( is_front_page() ) {
	$context['title'] =  get_bloginfo( 'name' );
} else {
	$context['title'] =  get_the_title( $post->ID );
};

$context['posts'] = Timber::get_posts( $the_posts_args );

Timber::render(  'page-home.twig' , $context );