<?php
/**
 * Header functions.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 *
 */


/* ---------------------------------------------------------------------------
 * Favicon
* --------------------------------------------------------------------------- */
if ( ! function_exists( 'mim_issue_favicon' ) ) :

function mim_issue_favicon()
{
    $mim_issue_favicon = (get_theme_mod( 'issue_favicon' ) != '') ? get_theme_mod( 'issue_favicon' ) : MIM_ISSUE_THEME_URI.'/ico/favicon.png';

    if( !empty( $mim_issue_favicon ) ){

		echo '<!-- favicon section -->'."\n";
		echo '<link rel="shortcut icon" type="image/x-icon" href="'.esc_url( $mim_issue_favicon ).'" />'."\n";
        echo '<!-- favicon section end -->'."\n";
	}
}
endif; //mim_issue_favicon
add_action('wp_head', 'mim_issue_favicon');


/* ---------------------------------------------------------------------------
 * IE fix
 * --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_ie_fix' ) ) :

function mim_issue_ie_fix() {

	if( ! is_admin() ){

		echo "\n".'<!--[if lt IE 9]>'."\n";
		echo '<script src="'.MIM_ISSUE_THEME_URI .'/js/html5shiv.min.js'.'"></script>'."\n";
		echo '<script src="'.MIM_ISSUE_THEME_URI .'/js/respond.min.js'.'"></script>'."\n";
		echo '<![endif]-->'."\n";
	}
}
endif; //mim_issue_ie_fix
add_action('wp_head', 'mim_issue_ie_fix');

/* ---------------------------------------------------------------------------
 * Scripts And Styles
 * --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_scripts' ) ) :

function mim_issue_scripts() {

	/* css section  */

    wp_enqueue_style('mim-issue-bootstrap', MIM_ISSUE_THEME_URI.'/css/bootstrap.min.css', array(), MIM_ISSUE_THEME_VERSION,'all');

    wp_enqueue_style('mim-issue-font-awesome', MIM_ISSUE_THEME_URI.'/css/font-awesome.min.css', array(), MIM_ISSUE_THEME_VERSION,'all');

    wp_enqueue_style('mim-issue-owl-carousel', MIM_ISSUE_THEME_URI.'/css/owl.carousel.css', array(), MIM_ISSUE_THEME_VERSION,'all');

    wp_enqueue_style('mim-issue-owl-theme', MIM_ISSUE_THEME_URI.'/css/owl.theme.css', array(), MIM_ISSUE_THEME_VERSION,'all');

	wp_enqueue_style('mim-issue-bootstrap-smartmenu', MIM_ISSUE_THEME_URI.'/css/jquery.smartmenus.bootstrap.css', array(), MIM_ISSUE_THEME_VERSION,'all');

    // Load our custom main stylesheet.
    wp_enqueue_style('mim-issue-main', MIM_ISSUE_THEME_URI.'/css/main.css', array(), MIM_ISSUE_THEME_VERSION,'all');

    // Load our theme default stylesheet.
	wp_enqueue_style( 'mim-issue-style', get_stylesheet_uri() );


    /* css section end  */

	/* Google Fonts ---------------------------------------------------------- */

	wp_enqueue_style('mim-issue-ubuntu-font','//fonts.googleapis.com/css?family=Ubuntu:400,500,700,300');

	wp_enqueue_style('mim-issue-source-sans-font','//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600,600italic');

	wp_enqueue_style('mim-issue-raleway-font','//fonts.googleapis.com/css?family=Raleway:400,300,500,600');

    /* google font section end */

	if( ! is_admin() ) {

	    /* included javascript section */
		wp_enqueue_script('jquery');

		wp_enqueue_script( 'mim-issue-jquery-easing', MIM_ISSUE_THEME_URI .'/js/jquery.easing.min.js', false, MIM_ISSUE_THEME_VERSION, true  );

		wp_enqueue_script( 'mim-issue-jquery-bootstrap', MIM_ISSUE_THEME_URI .'/js/bootstrap.min.js', false, MIM_ISSUE_THEME_VERSION, true );

		wp_enqueue_script( 'mim-issue-jquery-smartmenus', MIM_ISSUE_THEME_URI .'/js/jquery.smartmenus.js', false, MIM_ISSUE_THEME_VERSION, true  );

		wp_enqueue_script( 'mim-issue-jquery-smartmenus-bootstrap', MIM_ISSUE_THEME_URI .'/js/jquery.smartmenus.bootstrap.js', false, MIM_ISSUE_THEME_VERSION, true  );

		wp_enqueue_script( 'mim-issue-jquery-placeholders', MIM_ISSUE_THEME_URI. '/js/placeholders.jquery.min.js', true, MIM_ISSUE_THEME_VERSION, true );
		wp_enqueue_script( 'mim-issue-jquery-twbsPagination', MIM_ISSUE_THEME_URI. '/js/jquery.twbsPagination.min.js', true, MIM_ISSUE_THEME_VERSION, true );

        wp_enqueue_script( 'mim-issue-jquery-easy-ticker', MIM_ISSUE_THEME_URI. '/js/easy-ticker.js', false, MIM_ISSUE_THEME_VERSION, true );

        wp_enqueue_script( 'mim-issue-jquery-owl-carousel', MIM_ISSUE_THEME_URI. '/js/owl.carousel.min.js', false, MIM_ISSUE_THEME_VERSION, true );

        wp_enqueue_script( 'mim-issue-jquery-ai-menu', MIM_ISSUE_THEME_URI. '/js/ai-menu.js', false, MIM_ISSUE_THEME_VERSION, true );


		if ( is_singular() && get_option( 'thread_comments' ) )
		{
			wp_enqueue_script( 'comment-reply' );
		}

		 wp_enqueue_script( 'mim-issue-jquery-main', MIM_ISSUE_THEME_URI. '/js/main.js', false, MIM_ISSUE_THEME_VERSION, true );

	}
    /* included javascript section end */
}
endif; //mim_issue_scripts

add_action('wp_enqueue_scripts', 'mim_issue_scripts');


/* ---------------------------------------------------------------------------
 * Issue Theme logo
* --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_logo' ) ) :

function mim_issue_logo() {

    $mim_issue_logo_txt  = esc_attr( get_theme_mod( 'logo_text' ) );

    if ( get_theme_mod( 'issue_logo' ) ) {
		echo '<a href="'.MIM_ISSUE_SITE_URL.'" class="logo">';
        echo '<img src="'.esc_url( get_theme_mod( 'issue_logo' ) ).'" alt="" title="" />';
        echo '</a>';
	}
	else if ( get_theme_mod( 'logo_text' ) ) {
		echo '<a href="'.MIM_ISSUE_SITE_URL.'" class="logo">';
        echo '<h4><span>' .$mim_issue_logo_txt. '</span></h4>';
        echo '</a>';
	}
    else {
 	   echo '<a href="'.MIM_ISSUE_SITE_URL.'" class="logo">';
        echo '<h4>'.__( 'Theme','mim-issue') .'<span>'. __( ' Review', 'mim-issue') .'</span></h4>';
       echo '</a>';
 	}

}
endif; //mim_issue_logo
?>
