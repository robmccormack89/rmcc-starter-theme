<?php
/**
* Rmcc_Starter_Theme functions and definitions
*
* @package Rmcc_Starter_Theme
*/

// stuff to say we need timber activated!! see TGM Plugin activation library for php
require_once get_template_directory() . '/inc/lib/class-tgm-plugin-activation.php';

// stuff to say we need timber activated!! see TGM Plugin activation library
function starter_theme_register_required_plugins()
{
  $plugins = array(
    array(
      'name' => 'Timber',
      'slug' => 'timber-library',
      'required' => true
    )
  );
  $config  = array(
    'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '', // Default absolute path to bundled plugins.
    'menu' => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug' => 'themes.php', // Parent menu slug.
    'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices' => true, // Show admin notices or not.
    'dismissable' => true, // If false, a user cannot dismiss the nag message.
    'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false, // Automatically activate plugins after installation or not.
    'message' => '' // Message to output right before the plugins table.
  );
  tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'starter_theme_register_required_plugins');

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