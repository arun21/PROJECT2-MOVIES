<?php
/**
 * The Sidebar containing the main widget area
 *
 *  @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */
?>

<aside class="sidebar">

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php endif; ?>

</aside>
