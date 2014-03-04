<?php

/**
 * Main index file
 * 
 * @package WordPress
 * @subpackage Schwarzbrett
 * @author Oliver Schwarz <oliver@schwarzbrett.de>
 */

get_header(); ?>

  <?php while ( have_posts() ) : the_post(); ?>

     <?php get_template_part('content', get_post_format()); ?>

  <?php endwhile; // end of the loop. ?>

<?php get_footer();