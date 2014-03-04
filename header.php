<?php

/**
 * The header file for the schwarzbrett-wp theme
 *
 * @package WordPress
 * @subpackage Schwarzbrett
 * @author Oliver Schwarz <oliver@schwarzbrett.de>
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?><?php echo bloginfo( 'name' ); ?></title>
<?php wp_head(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  
</head>
<body>
  
  <header role="banner" class="content">
    <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
  </header>