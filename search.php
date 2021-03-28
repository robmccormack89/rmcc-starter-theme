<?php
/**
* The search
*
* @package Rmcc_Starter
*/

$context = Timber::context();
$templates = array( 'search.twig', 'archive.twig', 'index.twig' );

$context['posts'] = new Timber\PostQuery();

$context['title'] = 'Search results for - '. get_search_query();

$context['pagination'] = Timber::get_pagination();
$context['paged'] = $paged;

Timber::render( $templates, $context );