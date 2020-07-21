<?php
/**
 * Template Name: No Sidebar Template
 *
 * @package Starter_Theme
 */

$context = Timber::context();
$post = Timber::query_post();
$context['post'] = $post;
Timber::render(  'no-sidebar-template.twig' , $context );