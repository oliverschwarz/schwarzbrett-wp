<?php

/**
 * Schwarzbrett functions file
 * 
 * @package     Wordpress
 * @subpackage  schwarzbrett-wp
 * @author      Oliver Schwarz <oliver@schwarzbrett.de>
 */

// Setup theme
if (!function_exists('schwarzbrett_setup'))
{

  /**
   * Setup the Wordpress engine
   * 
   * Configures the default settings for the theme and activates the
   * after the theme initialisation. Removes unnecessary stuff from
   * the header and defines the main navigation.
   * 
   * @return void
   */
  function schwarzbrett_setup()
  {

    add_theme_support('automatic-feed-links');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');

    // Start the custom menu usage
    register_nav_menu('primary', 'Main');
    register_nav_menu('standards', 'Standards');

    // Add theme support
    if (function_exists('add_theme_support')) {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails', array('post'));
        add_theme_support('post-formats', array('link'));
    }

  }
  add_action('after_setup_theme', 'schwarzbrett_setup');

}

// Widgets
if (!function_exists('schwarzbrett_widgets_init')) {

  /**
   * Theme widgets
   * 
   * Registers the default widgets for the theme.
   * 
   * @return void
   */
  function schwarzbrett_widgets_init()
  {
    register_sidebar(array(
      'name' => 'Front sidebar',
      'id' => 'sidebar-1',
      'description' => 'Used on the front page / home page.',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ));
    register_sidebar(array(
      'name' => 'Pages sidebar',
      'id' => 'sidebar-2',
      'description' => 'Used on the all posts and pages.',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ));
  }
  add_action('widgets_init', 'schwarzbrett_widgets_init');
}

// Remove recent comments style
if (!function_exists('schwarzbrett_remove_recent_comments_style')) {
    
    /**
     * Remove recent comments
     * 
     * @link http://webstractions.com/wordpress/remove-recent-comments-inline-styl/
     */
    function schwarzbrett_remove_recent_comments_style()
    {
        global $wp_widget_factory;  
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
    add_action('widgets_init', 'schwarzbrett_remove_recent_comments_style');
}

// PIWIK Analytics
if (!function_exists('schwarzbrett_analytics')) {
  
  /**
   * Add analytics to footer
   */
  function schwarzbrett_analytics()
  {
    if ($_SERVER['HTTP_HOST'] != 'schwarzbrett.de') {
      return '';
    }
    if (!current_user_can('level_10')) {
      $output .= <<<html
<!-- Piwik -->
<script type="text/javascript">
var _paq = _paq || []; _paq.push(['trackPageView']); _paq.push(['enableLinkTracking']);
(function() {
var u=(("https:" == document.location.protocol) ? "https" : "http") + "://schwarzbrett.de/analytics/";
_paq.push(['setTrackerUrl', u+'piwik.php']);
_paq.push(['setSiteId', 1]);
var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();
</script>
<noscript><p><img src="http://schwarzbrett.de/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
html;
            echo $output;
    }
  }

  /**
   * Add analytics to footer
   */
  add_action('wp_footer', 'schwarzbrett_analytics');
  
}