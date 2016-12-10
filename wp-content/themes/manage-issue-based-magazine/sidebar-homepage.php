<?php
/**
 * The Sidebar shown only on homepage
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */
?>

<aside class="sidebar">

    <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-2' ); ?>
    <?php endif; ?>

</aside>
