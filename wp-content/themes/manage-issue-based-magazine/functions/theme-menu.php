<?php
/**
 * Menu functions.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 *
 */

/* ---------------------------------------------------------------------------
 * Registers a menu location to use with navigation menus.
 * --------------------------------------------------------------------------- */
register_nav_menu( 'primary', __( 'Main menu' , 'mim-issue' ) );

/* ---------------------------------------------------------------------------
 * Main menu
 * --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_wp_nav_menu' ) ) :

function mim_issue_wp_nav_menu() {

	$mim_issue_theme_locations = get_nav_menu_locations();
	if( !empty( $mim_issue_theme_locations ) )
	 $mim_issue_menu_obj = get_term( $mim_issue_theme_locations['primary'], 'nav_menu' );

	$mim_issue_args = array(
	    'container' 	  => 'div',
		'container_id'	  => 'bs-example-navbar-collapse-1',
		'container_class' => 'collapse navbar-collapse',
		'menu_class'      => 'nav navbar-nav',
		'menu_id'         => 'mainmenu',
		'fallback_cb'	  => 'mim_issue_wp_page_menu',
		'menu'            => ( ! empty( $mim_issue_menu_obj->slug ) ) ? $mim_issue_menu_obj->slug : '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth' 		  => 3,

	);

	wp_nav_menu( $mim_issue_args );
}
endif;

if ( ! function_exists( 'mim_issue_wp_page_menu' ) ) :

function mim_issue_wp_page_menu() {
	$mim_issue_args = array(
		'title_li' => '0',
		'sort_column'     => 'menu_order',
		'depth'           => 3
	);
	echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">'."\n";
		echo '<ul class="nav navbar-nav" id="mainmenu">'."\n";
			wp_list_pages( $mim_issue_args );
		echo '</ul>'."\n";
	echo '</div>'."\n";
}
endif;
?>
