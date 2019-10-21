<?php
/**
 * Timber theme class & other functions for Twig.
 *
 * @package Organic_Theme
 */

// Define paths to Twig templates
Timber::$dirname = array(
  'views/',
  'views/archive',
  'views/parts',
  'views/singular',
  'views/header',
  'views/footer',
);

// Define RMcC Site Child Class
class OrganicTheme extends TimberSite
{
    public function __construct()
    {
        // timber stuff
        add_filter('timber_context', array( $this, 'add_to_context' ));
        add_filter('get_twig', array( $this, 'add_to_twig' ));
        add_action('init', array( $this, 'register_post_types' ));
        add_action('init', array( $this, 'register_taxonomies' ));
        add_action('init', array( $this, 'register_widget_areas' ));
        add_action('init', array( $this, 'register_navigation_menus' ));

        parent::__construct();
    }

    public function register_post_types()
    {
    
    }

    public function register_taxonomies()
    {
      // Register Custom Taxonomy
      
    }

    public function register_widget_areas()
    {
        // Register widget areas
        if (function_exists('register_sidebar')) {
          register_sidebar(array(
              'name' => esc_html__('Left Sidebar Area', 'organic-theme'),
              'id' => 'sidebar-left',
              'description' => esc_html__('Sidebar Area for Left Sidebar Templates, you can add multiple widgets here.', 'organic-theme'),
              'before_widget' => '',
              'after_widget' => '',
              'before_title' => '<h3 class="uk-text-bold widget-title"><span>',
              'after_title' => '</span></h3>'
          ));
            register_sidebar(array(
                'name' => esc_html__('Right Sidebar Area', 'organic-theme'),
                'id' => 'sidebar-right',
                'description' => esc_html__('Sidebar Area for Right Sidebar Templates, you can add multiple widgets here.', 'organic-theme'),
                'before_widget' => '',
                'after_widget' => '',
                'before_title' => '<h3 class="uk-text-bold widget-title"><span>',
                'after_title' => '</span></h3>'
            ));
            register_sidebar(array(
                'name' => esc_html__('Main Footer Area', 'organic-theme'),
                'id' => 'sidebar-footer',
                'description' => esc_html__('Main Footer Widget Area; works best with the current widget only.', 'organic-theme'),
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
            'main' => __('Main Menu', 'organic-theme'),
            'mobile' => __('Mobile Menu', 'organic-theme'),
        ));
    }


    // register custom context variables
    public function add_to_context($context)
    {
      $main_menu_args = array(
          'depth' => 3,
      );
      $context['menu_main'] = new \Timber\Menu( 'main' );
      $context['menu_mobile'] = new \Timber\Menu('mobile');
      $context['has_menu_main'] = has_nav_menu( 'main' );
      $context['has_menu_mobile'] = has_nav_menu( 'mobile' );
      $context['site']            = $this;
      $theme_logo_id = get_theme_mod( 'custom_logo' );
      $theme_logo_url = wp_get_attachment_image_url( $theme_logo_id , 'full' );
      $context['theme_logo_url'] = $theme_logo_url;
      $context['sidebar_left']  = Timber::get_widgets('Left Sidebar Area');
      $context['sidebar_right'] = Timber::get_widgets('Right Sidebar Area');
      $context['sidebar_footer']   = Timber::get_widgets('Main Footer Area');
      return $context;
    }

    public function add_to_twig($twig)
    {
        /* this is where you can add your own functions to twig */
        $twig->addExtension(new Twig_Extension_StringLoader());

        return $twig;
    }
}

new OrganicTheme();
