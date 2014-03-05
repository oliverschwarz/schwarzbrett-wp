<?php

/**
 * Recommended link format
 * 
 * @package    Wordpress
 * @subpackage schwarzbrett-wp
 * @author     Oliver Schwarz <oliver@schwarzbrett.de>
 */

?>

<!-- POST: <?php the_ID(); ?> -->
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content'); ?>>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
    <div class="meta">
        <time datetime="<?php the_time('c'); ?>" pubdate><?php the_time('d.m.y'); ?> um <?php the_time('G:i'); ?> Uhr</time>
    </div>
</article>