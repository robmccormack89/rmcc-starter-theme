<?php
/**
 * The template for displaying the footer
 *
 * @package Rmcc_Starter_Theme
 */

 $timberContext = $GLOBALS['timberContext']; // @codingStandardsIgnoreFile
 if ( ! isset( $timberContext ) ) {
 	throw new \Exception( 'Timber context not set in footer.' );
 }
 $timberContext['content'] = ob_get_contents();
 ob_end_clean();
 $templates = array( 'page-plugin.twig' );
 Timber::render( $templates, $timberContext );