<?php
/**
 * Template Name: Left Sidebar Template
 *
 * @package Starter_Theme
 */

$context = Timber::context();
$post = Timber::query_post();
$context['post'] = $post;
Timber::render(  'left-sidebar-template.twig' , $context );