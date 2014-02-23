<?php

/**
 * Schwarzbrett functions file
 */
function schwarzbrett_setup()
{
  add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'twentytwelve_setup');