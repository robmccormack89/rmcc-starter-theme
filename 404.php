<?php
/**
* The template for displaying 404 error pages
*
* @package Rmcc_Starter_Theme
*/
 
// timber get the context
$context = Timber::context();

// timber render twig template with the context
Timber::render( '404.twig', $context );