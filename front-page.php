<?php
/**
* The front page template (when backend settings for front page display are set to static or latest posts)
*
* @package Rmcc_Starter_Theme
*/

$context = Timber::context();
$templates = array('front-page.twig');

$sticky = get_option('sticky_posts');

if ( get_query_var('paged') ) { $paged = get_query_var( 'paged' ); }
elseif ( get_query_var('page') ) { $paged = get_query_var( 'page' ); }
else { $paged = 1; }

// if sticky returns a result
if (!empty($sticky)) { 
	// home hero: 1st sticky post/s
	$home_hero_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page'=>  1,
		// 'p'   => $sticky[0], // if posts_per_page is more than one, turn this on
		'post__in'   => $sticky,
		'ignore_sticky_posts' => 1,
		'orderby' => 'date',
		'order'   => 'DESC',
	);
	$context['home_hero'] = new Timber\PostQuery( $home_hero_args );
	// home featured: next 3 sticky posts
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
// home rest of posts: number of posts here is according to reading->Blog pages show at most setting, with pagination working. using posts_per_page param causes issues with stickies & pagination
$home_posts_args = array(
 'post_type' => 'post',
 // 'posts_per_page'=>  6,
 'ignore_sticky_posts' => 1,
 'post__not_in' => $sticky,
 'paged' => $paged,
);
$context['posts'] = new Timber\PostQuery( $home_posts_args );
// $context['posts'] = new Timber\PostQuery();

Timber::render( $templates, $context );