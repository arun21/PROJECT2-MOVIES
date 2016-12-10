<?php
/**
   Issue theme functions and definitions
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

define('MIM_ISSUE_THEME_DIR', get_template_directory());
define('MIM_ISSUE_THEME_URI', get_template_directory_uri());
define('MIM_ISSUE_SITE_URL', site_url());
define('MIM_ISSUE_LIBS_DIR', MIM_ISSUE_THEME_DIR. '/inc');
define('MIM_ISSUE_LIBS_URI', MIM_ISSUE_THEME_URI. '/inc');
define('MIM_ISSUE_LANG_DIR', MIM_ISSUE_THEME_DIR. '/languages');
define('MIM_ISSUE_THEME_VERSION', '1.0');


/* ---------------------------------------------------------------------------
 * Loads Theme Textdomain
 * --------------------------------------------------------------------------- */
load_theme_textdomain( 'mim-issue', MIM_ISSUE_LANG_DIR );

/* ---------------------------------------------------------------------------
 * Loads Theme Files
* --------------------------------------------------------------------------- */

// Loads Theme Functions ------------------------------------------------------------------
require_once( MIM_ISSUE_THEME_DIR. '/functions/theme-functions.php' );

// Load Header Theme Fucntion -------------------------------------------------------------
require_once( MIM_ISSUE_THEME_DIR. '/functions/theme-head.php' );

// Load Theme Layout ----------------------------------------------------------------------
require_once( MIM_ISSUE_THEME_DIR. '/functions/theme-layouts.php' );

// Load Theme Menu ------------------------------------------------------------------------
require_once( MIM_ISSUE_THEME_DIR. '/functions/theme-menu.php' );

// Load Required Ajax files for Registration ------------------------------------------------------------------------
require_once (MIM_ISSUE_THEME_DIR.'/ajax/_registerresponce.php');

// Load Theme Shortcode -------------------------------------------------------------------
require_once( MIM_ISSUE_THEME_DIR. '/functions/class-tgm-plugin-activation.php' );

require get_template_directory() . '/inc/customizer.php';


/**
 * Set up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

if ( ! function_exists( 'mim_issue_widgets_init' ) ) :

/**
 * Register three Issue theme widget areas.
 */

function mim_issue_widgets_init() {


	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'mim-issue' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar.', 'mim-issue' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
		'class'         => 'categories',
	) );
	register_sidebar( array(
		'name'          => __( 'HomePage Sidebar', 'mim-issue' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Sidebar shown only on homepage.', 'mim-issue' ),
		'class'         => 'categories',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'mim-issue' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears in the footer section of the site.', 'mim-issue' ),
		'class'         => 'categories',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}

endif; // Issuetheme_widgets_init
add_action( 'widgets_init', 'mim_issue_widgets_init' );


/**
 * filter for template redirect
*/

add_filter( 'template_include', 'mim_issue_page_template', 99 );

function mim_issue_page_template( $template ) {

// Code for redirect of issue template
	$mim_issue_listing_page_id = get_option('page_for_archives');
	if( !empty ( $mim_issue_listing_page_id ) && $mim_issue_listing_page_id > 0 )
    {
        $issue_listing_page_title = get_the_title( $mim_issue_listing_page_id );
        if ( is_page( $issue_listing_page_title )  ) {
            $mim_issue_template = locate_template( array( 'template-issue.php' ) );
            if ( '' != $mim_issue_template ) {
                return $mim_issue_template ;
            }
        }
    }

	// Code for redirect of magazine article template
	$mim_issue_magazine_listing_page_id = get_option('page_for_magazines');
	if( !empty ( $mim_issue_magazine_listing_page_id ) && $mim_issue_magazine_listing_page_id > 0)
    {
        $mim_issue_magazine_listing_page_title = get_the_title( $mim_issue_magazine_listing_page_id );
        if ( is_page( $mim_issue_magazine_listing_page_title )  ) {
            $mim_issue_magazine_template = locate_template( array( 'template-magazine.php' ) );
            if ( '' != $mim_issue_magazine_template ) {
                return $mim_issue_magazine_template ;
            }
        }
    }

	return $template;
}


