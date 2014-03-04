<?php

/**
 * Default sidebar
 * 
 * @package    Wordpress
 * @subpackage Elona
 * @author     Oliver Schwarz <oliver.schwarz@gmail.com>
 */
if (is_active_sidebar('sidebar-1')): ?>

    <div id="secondary" class="widget-area clearfix" role="complementary">
        <div class="content">

<?php dynamic_sidebar('sidebar-1'); ?>

        </div>
    </div><!-- #secondary -->

<?php endif;