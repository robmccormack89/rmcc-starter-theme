<?php
/**
 * Theme functions & bits
 *
 * @package Rmcc_Starter
 */

// removes sticky posts from main loop, this function fixes issue of duplicate posts on archive. see https://wordpress.stackexchange.com/questions/225015/sticky-post-from-page-2-and-on
add_action('pre_get_posts', function ($q)
{

  if ($q->is_home() && $q->is_main_query()) {

    // Remove sticky posts
    $q->set('ignore_sticky_posts', 1);
    // Get the sticky posts array
    $stickies = get_option('sticky_posts');
    // Make sure we have stickies before continuing, else, bail
    if (!$stickies) {
      return;
    }
    // Great, we have stickies, lets continue
    // Lets remove the stickies from the main query
    $q->set('post__not_in', $stickies);
    // Lets add the stickies to page one via the_posts filter
    if ($q->is_paged()) {
      return;
    }

    add_filter('the_posts', function ($posts, $q) use ($stickies) {

      // Make sure we only target the main query
      if (!$q->is_main_query()) {
        return $posts;
      }
      // Get the sticky posts
      $args = [
        'posts_per_page' => count($stickies),
        'post__in'       => $stickies
      ];
      $sticky_posts = get_posts($args);
      // Lets add the sticky posts in front of our normal posts
      $posts = array_merge($sticky_posts, $posts);

      return $posts;

    }, 10, 2);

  }

});