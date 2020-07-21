<?php
/*
 * Template Name: Featured Post
 * Template Post Type: post
 *
 * @package Starter_Theme
 */
 
$context = Timber::context();
$post = Timber::query_post();
$context['post'] = $post;
$context['if_comments_open'] = comments_open();

$post_id = get_the_ID();

$terms = get_the_terms( get_the_ID(), 'category' );
$term_list = wp_list_pluck( $terms, 'slug' );

$related_articles_args = array(
   'post_type'      => 'post',
   'posts_per_page'=>  3,
   'post__not_in' => array($post_id),
   'tax_query' => array(
 		array(
 			'taxonomy' => 'category',
 			'field' => 'slug',
 			'terms' => $term_list
 		)
 	)
);
$context['related_articles'] = new Timber\PostQuery( $related_articles_args );

Timber::render(  'featured-post.twig' , $context );