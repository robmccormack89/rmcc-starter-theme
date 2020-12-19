<?php
/**
 * Rmcc_Starter_Theme functions and definitions
 *
 * @package Rmcc_Starter_Theme
 */

/**
* Theme functions
*/
require get_template_directory() . '/inc/theme-functions.php';

/**
* Timber class
*/
if( class_exists( 'Timber' ) ) {
	require get_template_directory() . '/inc/timber-functions.php';
}

/**
* Custom Widget
*/
require get_template_directory() . '/widgets/rmcc-html-widget.php';

/**
* Timber Plugin Activation
*/
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';