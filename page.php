<?php
/**
 * The default template for displaying all pages
 *
 * @package Starter_Theme
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );