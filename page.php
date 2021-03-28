<?php
/**
* The default template for displaying all pages
*
* @package Rmcc_Starter
*/

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );