<?php
/**
 * The main template file
 *
 * @package Starter_Theme
 */

$context = Timber::context();

$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

$context['posts'] = new Timber\PostQuery();

$post = new Timber\Post();
if ( is_home() && is_front_page() ) {
	$context['title'] =  get_bloginfo( 'name' );
} else {
	$context['title'] =  get_the_title( $post->ID );
};

$sticky = get_option( 'sticky_posts' );

if (!empty($sticky)) {   
	$home_hero_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page'=>  1,
		// 'p'   => $sticky[0],
		'post__in'   => $sticky,
		'ignore_sticky_posts' => 1,
		'orderby' => 'date',
		'order'   => 'DESC',
	);
	$context['home_hero'] = new Timber\PostQuery( $home_hero_args );
	$home_featured_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page'=>  3,
		'post__in'   => $sticky,
		'offset' => 1,
		'ignore_sticky_posts' => 1,
		'orderby' => 'date',
		'order'   => 'DESC',
	);
	$context['home_featured'] = new Timber\PostQuery( $home_featured_args );
}
$home_posts_args = array(
 'post_type' => 'post',
 'posts_per_page'=>  4,
 'post__not_in'=> $sticky,
);
$context['home_posts'] = new Timber\PostQuery( $home_posts_args );

$templates = array( 'index.twig' );
if ( is_home() && is_front_page() ) {
	array_unshift( $templates, 'front-page.twig', 'home.twig' );
}
elseif ( is_home() && !is_front_page() ) {
	array_unshift( $templates, 'index.twig' );
}
Timber::render( $templates, $context );