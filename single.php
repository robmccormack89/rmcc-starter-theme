<?php
/**
 * The default template for displaying all single posts
 *
 * @package Starter_Theme
 */

$context = Timber::context();
$post = Timber::query_post();
$context['post'] = $post;

$context['if_comments_open'] = comments_open();

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single-' . $post->slug . '.twig', 'single.twig' ), $context );
}