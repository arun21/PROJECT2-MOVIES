<?php
/**
 * Theme functions.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */


/* ---------------------------------------------------------------------------
 * Theme support
 * --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_theme_setup' ) ) :


function mim_issue_theme_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, false ); // admin - featured image
	add_image_size( '50x50', 50, 50, false ); // admin - lists

	add_image_size( 'mim_issue_article_featured_thumbnail', 85 ,85,true); // Home Page right side feature slider
	add_image_size( 'mim_issue_article_master_category_thumbnail', 1600 ,900,true); // Home page master category first article
	add_image_size( 'mim_issue_article_carousel_thumbnail', 302 ,200,true); // Home Page carousel
	add_image_size( 'mim_issue_article_category_listing', 450 ,300,true); // Article of magazine category and home page master category another
	add_image_size( 'mim_issue_issue_category_listing', 450 ,300,true); // Issue Category page listing
	add_image_size( 'mim_issue_author_archive_listing', 450 ,300,true); //Author Archive listing page

}
endif; // mim_issue_theme_setup

add_action( 'after_setup_theme', 'mim_issue_theme_setup' );


//filter for custom posts per page

if ( ! function_exists( 'mim_issue_magazine_tax_filter_posts_per_page' ) ) :

function mim_issue_magazine_tax_filter_posts_per_page( $value ) {
  return (is_tax('magazine_category')) ? 1 : $value;
}
endif; // mim_issue_magazine_tax_filter_posts_per_page

add_filter( 'option_posts_per_page', 'mim_issue_magazine_tax_filter_posts_per_page' );


/***************** Pagination function *****************/

if ( ! function_exists( 'mim_issue_pagination' ) ):

function mim_issue_pagination($pages = '', $range = 2) {
 	$showitems = ($range * 2)+1;
	global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left'></i></a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left'></i></a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."' >".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'><i class='fa fa-angle-right'></i></a></li>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right'></i></a></li>";

     }


}
endif; //mim_issue_pagination

/***************** Breadcrumbs function *****************/
if ( ! function_exists( 'mim_issue_breadcrumbs' ) ):

function mim_issue_breadcrumbs() {

global $post,$wp_query;
$homeLink = home_url();
$showCurrent = 1;

    echo '<div class="breadcrumb-area pull-right">';
	    echo '<ol class="breadcrumb">';
        	echo '<li><a href="'. $homeLink .'"><i class="glyphicon glyphicon-home"></i></a> <span class="breadcrum-sep">/</span></li>';

                 // Blog Category
        	    if ( is_category() ) {
        		    echo '<li><span class="active">' . __('Archive by category','mim-issue').' "' . single_cat_title('', false) . '"</span></li>';
                }
                elseif ( is_search() ) {
		            echo '<li><span class="active">' . __('Search results for','mim-issue').' "' . get_search_query() . '"</span></li>';

		        }
		        elseif ( is_author() ) {
			      global $author;
			      $userdata = get_userdata($author);
			      echo '<li><span class="active">' .  $userdata->display_name . '</span></li>';
			    }
        	    // Blog Day
        	    elseif ( is_day() ) {
        		    echo '<li><a href="'. get_year_link($wp_query->query_vars['year']) . '">'. $wp_query->query_vars['year'] .'</a> <span class="breadcrum-sep">/</span></li>';
        		    echo '<li><a href="'. get_month_link($wp_query->query_vars['year'],$wp_query->query_vars['monthnum']) .'">'. date_i18n("F", mktime(0, 0, 0, $wp_query->query_vars['monthnum'], 10)) .'</a> <span class="breadcrum-sep">/</span></li>';
        		    echo '<li><span class="active">'. $wp_query->query_vars['day'] .'</span></li>';
                }

        	    // Blog Month
        	    elseif ( is_month() ) {

        		    echo '<li><a href="' . get_year_link($wp_query->query_vars['year']) . '">' .$wp_query->query_vars['year'] . '</a> <span class="breadcrum-sep">/</span></li>';
        		    echo '<li><span class="active">'. date_i18n("F", mktime(0, 0, 0, $wp_query->query_vars['monthnum'], 10)) .'</span></li>';
                }

        	    // Blog Year
        	     elseif ( is_year() ) {

        		    echo '<li><span class="active">'. $wp_query->query_vars['year'] .'</span></li>';
                }

                elseif (  get_post_type() == 'post'  ) {
				      $post_for_page_id =get_option('page_for_posts');

				      if ( is_single() )
				      {
				      	  echo '<li><a href="' . get_page_link( $post_for_page_id ) . '">'. get_the_title( $post_for_page_id ) .'</a> <span class="breadcrum-sep">/</span></li>';
				      	  echo '<li><span class="active">'. get_the_title() .'</span></li>';
				      }
				      else
				      {
					   	  echo '<li><span class="active">'.  get_the_title( $post_for_page_id ) .'</span></li>';
					  }
                }

        	    // Single Post
        	     elseif ( is_single() && !is_attachment() ) {
	        		// Custom post type
	        		if ( get_post_type() != 'post' ) {

	        			global $wpdb;
	        			$post_type = get_post_type_object(get_post_type());
	        			$slug = $post_type->rewrite;
	        			if( $slug['slug'] == 'magazine'  &&  $article_listing_page_id = get_option('page_for_magazines') ){
	                        echo '<li><a href="' . get_page_link( $article_listing_page_id ) . '">'. get_the_title( $article_listing_page_id ) .'</a> <span class="breadcrum-sep">/</span></li>';
						} else {
							echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> <span class="breadcrum-sep">/</span></li>';
						}
	        			if ($showCurrent == 1)
	        			   echo '<li><span class="active">'. get_the_title() .'</span></li>';
	        		}
	                // Blog post
	                else {
	        			$cat = get_the_category();
	        			$cat = $cat[0];

	        			echo '<li>';
	        				echo get_category_parents($cat, TRUE, ' <span class="breadcrum-sep">/</span>');
	        			echo '</li>';
	        			echo '<li><span class="active">'. wp_title( '',false ) .'</span></li>';
	        		}


        	    }
        	    // Taxonomy
                elseif(is_tax() ){

                	global $wpdb;
                	$terms_object = get_queried_object();
        		    $post_type = get_post_type_object(get_post_type());
        		    $slug = $post_type->rewrite;

        		    if( $post_type->name == 'magazine' && $terms_object->taxonomy == 'magazine_category'){
					  if( $article_listing_page_id = get_option('page_for_magazines') ){
                        echo '<li><a href="' . get_page_link( $article_listing_page_id ) . '">'. get_the_title( $article_listing_page_id ) .'</a> <span class="breadcrum-sep">/</span></li>';
					  }
					}
        		    elseif( $post_type->name == 'magazine' && $terms_object->taxonomy == 'issues'){
					  if( $mim_issue_listing_page_id = get_option('page_for_archives') ){
                        echo '<li><a href="' . get_page_link( $mim_issue_listing_page_id ) . '">'. get_the_title( $mim_issue_listing_page_id ) .'</a> <span class="breadcrum-sep">/</span></li>';
					  }
					}

                    echo '<li><span class="active">'. $terms_object->name .'</span></li>';
                }
                // Page with parent
                elseif ( is_page() && $post->post_parent ) {
        		    $parent_id  = $post->post_parent;
        		    $breadcrumbs = array();
        		    while ($parent_id) {
            			$page = get_page($parent_id);
            			$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> <span class="breadcrum-sep">/</span></li>';
            			$parent_id  = $page->post_parent;

        		    }

                    $breadcrumbs = array_reverse($breadcrumbs);
                    for ($i = 0; $i < count($breadcrumbs); $i++) {
                        echo $breadcrumbs[$i];
                    }

                  if ($showCurrent == 1) echo '<li><span class="active">'. get_the_title() .'</span></li>';

        	    }
                // Default
                else {
        		    echo '<li><span class="active">'. get_the_title() .'</span></li>';
        	    }
        echo '</ol>';
	echo '</div>';
}
endif; //mim_issue_breadcrumbs

/***************** change the search behaviour *****************/

add_action('init', 'mim_issue_StartSession', 1);

if ( ! function_exists( 'mim_issue_StartSession' ) ):

function mim_issue_StartSession() {
    if(!session_id()) {
        session_start();
    }
}
endif; //mim_issue_StartSession

add_filter( 'pre_get_posts', 'mim_issue_search_posts' );

if ( ! function_exists( 'mim_issue_search_posts' ) ):

function mim_issue_search_posts( $query ) {

	global $wpdb,$wp_query;
	$cat_n=get_query_var('magazine_category');
	$idObj = get_term_by( 'slug', $cat_n, 'magazine_category' );

	if( !empty( $idObj ) )
	  $id = $idObj->term_id;

	if ( $query->is_search() && get_option('mim_search_behaviour')== 'Yes') {
	 if( isset( $_SESSION['Current_Issue'] ) && !empty( $_SESSION['Current_Issue'] ) ){
		$taxonomy_query = array(
		array(
		'taxonomy' => 'issues',
		'field' => 'id',
		'terms' => $_SESSION['Current_Issue']
		)
		);
		$query->set('post_type','magazine');
		$query->set('relation','AND');
		$query->set('tax_query', $taxonomy_query);
	  }
	}
	return $query;
}
endif; //mim_issue_search_posts

/* ---------------------------------------------------------------------------
*	TGM Plugin Activation
* --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_register_required_plugins' ) ) :

function mim_issue_register_required_plugins() {

	$plugins = array(

			array(
					'name'     				=> 'Manage Issue Based Magazine', // The plugin name
					'slug'     				=> 'manage-issue-based-magazine', // The plugin slug (typically the folder name)
					'required' 				=> false, // If false, the plugin is only 'recommended' instead of required

			),

			array(
					'name'     				=> 'AI Twitter Feeds', // The plugin name
					'slug'     				=> 'ai-twitter-feeds', // The plugin slug (typically the folder name)
					'required' 				=> false, // If false, the plugin is only 'recommended' instead of required

			),

			array(
					'name'     				=> 'Responsive Contact Form', // The plugin name
					'slug'     				=> 'responsive-contact-form', // The plugin slug (typically the folder name)
					'required' 				=> false, // If false, the plugin is only 'recommended' instead of required

			),


	);
	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'mim-issue';

	$config = array(

				'id' => 'tgmpa-mim-issue'
				);
				tgmpa( $plugins, $config );


}
endif; // mim_issue_register_required_plugins

add_action( 'tgmpa_register', 'mim_issue_register_required_plugins' );


/* ---------------------------------------------------------------------------
 * Excerpt
* --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_excerpt' ) ) :

function mim_issue_excerpt($post, $length = 180, $tags_to_keep = '<a><em><strong>', $extra = '') {

	if(is_int($post)) {
		$post = get_post($post);
	}
	elseif(!is_object($post)) {
		return false;
	}

	if(has_excerpt($post->ID)) {
		$the_excerpt = $post->post_excerpt;
		return apply_filters('the_content', $the_excerpt);
	}
	else {
		$the_excerpt = $post->post_content;
	}

	$the_excerpt = strip_shortcodes(strip_tags($the_excerpt, $tags_to_keep));
	$the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
	$excerpt_waste = array_pop($the_excerpt);
	$the_excerpt = implode($the_excerpt);
	$the_excerpt .= ' '.$extra;

	return apply_filters('the_content', $the_excerpt);
}
endif; //mim_issue_excerpt

/* ---------------------------------------------------------------------------
 * Excerpt length
 * --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_excerpt_length' ) ) :

function mim_issue_excerpt_length( $length ) {
	return 40;
}
endif; //mim_issue_excerpt_length

add_filter( 'excerpt_length', 'mim_issue_excerpt_length', 999 );


// custom excerpt ellipses for 2.9+
if ( ! function_exists( 'mim_issue_custom_excerpt_more' ) ) :

function mim_issue_custom_excerpt_more($more) {
	return '...';
}
endif; //mim_issue_custom_excerpt_more

add_filter('excerpt_more', 'mim_issue_custom_excerpt_more');

/* ---------------------------------------------------------------------------
* Filter to add class for get_avatar
* --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_gravatar_class' ) ) :

function mim_issue_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar img-responsive", $class);
    return $class;
}

endif; //mim_issue_gravatar_class

add_filter('get_avatar','mim_issue_gravatar_class');

/* ---------------------------------------------------------------------------
* Filter to add pagination in author page
* --------------------------------------------------------------------------- */

if ( ! function_exists( 'mim_issue_pagination_to_author_page_query_string' ) ) :

function mim_issue_pagination_to_author_page_query_string( $query_string )
{
    if (isset($query_string['author_name'])) $query_string['post_type'] = array('post','magazine');
    return $query_string;

}
endif; //mim_issue_pagination_to_author_page_query_string

add_filter('request', 'mim_issue_pagination_to_author_page_query_string');

/*-----------------------------------------------------------------------------------
 * Check if Manage Issue Base Magazine Plugin is activated
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'mim_issue_is_manage_issuebase_magazine_activated' ) ) {

	function mim_issue_is_manage_issuebase_magazine_activated() {

		if ( class_exists( 'MIM_Issue' ) ) { return true; } else { return false; }

	}

}
?>
