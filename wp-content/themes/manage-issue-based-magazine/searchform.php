<?php
/**
 * The main template file.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

?>

<form id="menubar-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-default">
  <input type="search" autocomplete="off" id="menubar-search-query" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php _e( 'Type and hit Enter','mim-issue' ); ?>" />
</form>
