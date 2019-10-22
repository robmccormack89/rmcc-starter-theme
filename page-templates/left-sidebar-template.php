<?php
/**
 * Template Name: Left Sidebar Template
 *
 * @package Starter_Theme
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
Timber::render(  'left-sidebar-template.twig' , $context );