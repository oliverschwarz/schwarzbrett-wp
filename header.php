<?php

/**
 * The header file for the Schwarzbrett theme
 *
 * @package WordPress
 * @subpackage Schwarzbrett
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?><?php echo bloginfo( 'name' ); ?></title>
<?php wp_head(); ?>
</head>