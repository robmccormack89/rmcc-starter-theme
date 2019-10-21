<?php
/**
 * The custom template for page with slug 'home'
 *
 * @package Organic_Theme
 */

$context = Timber::get_context();

$the_posts_args = array(
   'post_type' => 'post',
   'posts_per_page'=>  4,
);
$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

$context['posts'] = Timber::get_posts( $the_posts_args );

Timber::render(  'page-home.twig' , $context );