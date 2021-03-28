<?php
/**
 * Timber theme class & other functions for Twig.
 *
 * @package Rmcc_Starter
 */

// Define paths to Twig templates
Timber::$dirname = array(
  'views/',
  'views/archive',
  'views/parts',
  'views/parts/comments',
  'views/single',
);

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class RmccStarter extends Timber\Site
{
  /** Add timber support */
  public function __construct()
  {
    add_action('after_setup_theme', array( $this, 'theme_supports' ));
    add_action('wp_enqueue_scripts', array( $this, 'rmcc_starter_enqueue_assets'));
    add_action('widgets_init', array( $this, 'rmcc_starter_custom_uikit_widgets_init'));
    add_filter('timber/context', array( $this, 'add_to_context' ));
    add_filter('timber/twig', array( $this, 'add_to_twig' ));
    add_action('init', array( $this, 'register_post_types' ));
    add_action('init', array( $this, 'register_taxonomies' ));
    add_action('init', array( $this, 'register_widget_areas' ));
    add_action('init', array( $this, 'register_navigation_menus' ));
    parent::__construct();
  }

  public function register_post_types()
  {
    // Register Post Types
  }

  public function register_taxonomies()
  {
    // Register Taxonomies
  }

  public function register_widget_areas()
  {
    // Register widget areas
    if (function_exists('register_sidebar')) {
      register_sidebar(array(
        'name' => esc_html__('Sidebar Area', 'rmcc-starter'),
        'id' => 'sidebar',
        'description' => esc_html__('Sidebar widget area; you can add multiple widgets here. Try the rmcc custom html widget with uikit markup.', 'rmcc-starter'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3 class="uk-text-bold widget-title">',
        'after_title' => '</h3>'
      ));
      register_sidebar(array(
          'name' => esc_html__('Footer Area', 'rmcc-starter'),
          'id' => 'sidebar-footer',
          'description' => esc_html__('Footer widget area; use only one widget here. Try the rmcc custom html widget with uikit markup.', 'rmcc-starter'),
          'before_widget' => '',
          'after_widget' => '',
          'before_title' => '<h4 class="widget-title">',
          'after_title' => '</h4>'
      ));
    }
  }

  public function register_navigation_menus()
  {
    // This theme uses wp_nav_menu() in one locations.
    register_nav_menus(array(
      'main' => __('Main Menu', 'rmcc-starter'),
      'mobile' => __('Mobile Menu', 'rmcc-starter'),
    ));
  }

  public function add_to_context($context)
  {
    //add the site data to the context globally
    $context['site'] = $this;
    
    // optional args for Timber/Menu below. see options https://timber.github.io/docs/guides/menus/
    $main_menu_args = array(
      'depth' => 3,
    );
    // Initializing our menus
    $context['menu_main'] = new Timber\Menu('main');
    $context['menu_mobile'] = new Timber\Menu('mobile');
    // check for whether a menu exists
    $context['has_menu_main'] = has_nav_menu('main');
    $context['has_menu_mobile'] = has_nav_menu('mobile');

    // get the theme logo id
    $theme_logo_id = get_theme_mod('custom_logo');
    // get the theme logo url via the theme logo id
    $theme_logo_url = wp_get_attachment_image_url($theme_logo_id, 'full');
    // add theme logo url to the context
    $context['theme_logo_url'] = $theme_logo_url;

    // add sidebars to them context
    $context['sidebar_main']  = Timber::get_widgets('Sidebar Area');
    $context['sidebar_footer']   = Timber::get_widgets('Footer Area');

    return $context;
    
  }
  
  public function theme_supports()
  {
    // theme support for title tag
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('post-formats', array(
      'gallery',
      'quote',
      'video',
      'aside',
      'image',
      'link'
    ));
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('woocommerce');
    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    ));
    // Add support for core custom logo.
    add_theme_support('custom-logo', array(
      'height' => 30,
      'width' => 261,
      'flex-width' => true,
      'flex-height' => true
    ));

    load_theme_textdomain( 'rmcc-starter', get_template_directory() . '/languages' );
  }
  
  public function rmcc_starter_enqueue_assets()
  {
    
    wp_enqueue_style('rmcc-starter-base', get_template_directory_uri() . '/assets/css/base.css');
    
    wp_enqueue_script('rmcc-starter-base', get_template_directory_uri() . '/assets/js/base.js', '', '', false);
    
    wp_enqueue_script('rmcc-starter-global', get_template_directory_uri() . '/assets/js/global.js', '', '', true);
    
    wp_enqueue_script('rmcc-starter-theme', get_template_directory_uri() . '/assets/js/theme.js', '', '', true);
    
    wp_enqueue_style('rmcc-starter-theme', get_stylesheet_uri());
  }
  
  public function rmcc_starter_custom_uikit_widgets_init()
  {
    register_widget("Rmcc_Starter_Custom_Widget_Class");
  }

  public function add_to_twig($twig)
  {
    /* this is where you can add your own functions to twig */
    $twig->addExtension(new Twig_Extension_StringLoader());
    return $twig;
  }
}

new RmccStarter();
