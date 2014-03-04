<?php

/**
 * Schwarzbrett functions file
 */
function schwarzbrett_setup()
{
  add_theme_support('automatic-feed-links');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'rsd_link');
}
add_action('after_setup_theme', 'schwarzbrett_setup');