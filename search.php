<?php
/**
 * The search
 *
 * @package Rmcc_Starter_Theme
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$context = Timber::context();

$context['title'] = 'Search results for - '. get_search_query();
$context['posts'] = new Timber\PostQuery();

$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

Timber::render( $templates, $context );