<?php

/**
 * Default content
 * 
 * @package WordPress
 * @subpackage Schwarzbrett
 * @author Oliver Schwarz <oliver@schwarzbrett.de>
 */

?>

<!-- POST: <?php the_ID(); ?> -->
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix content'); ?>>
<?php if (is_single()): ?>
    <header>
        <h1><?php the_title(); ?></h1>
        <div class="meta"><?php the_author(); ?> in <?php the_category(', '); ?> on <time datetime="<?php the_time('c'); ?>" pubdate><?php the_time('d.m.y'); ?></time></div>
    </header>
    <div class="article-content">
        <?php the_content(); ?>
    </div>
<?php else: ?>
    <header>
        <h1><a href="<?php the_permalink(); ?>" title="" rel="bookmark"><?php the_title(); ?></a></h1>
    </header>
<?php if (has_post_thumbnail()): ?>
    <div class="featured-image">
        <?php the_post_thumbnail(); ?>
    </div>
<?php endif; ?>
    <div class="excerpt">
        <?php the_excerpt(); ?>
    </div>
    <footer>
        <div class="meta">In <?php the_category(', '); ?> on <time datetime="<?php the_time('c'); ?>" pubdate><?php the_time('d.m.y'); ?></time></div>
    </footer>
<?php endif; ?>
</article>

