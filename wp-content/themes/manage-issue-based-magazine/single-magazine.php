<?php
/**
 * The Template for displaying all single magazine posts.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();


global $wp_query;
$mim_issue_post_id = $wp_query->get_queried_object_id();
$mim_issue_article_listing_page_id = get_option('page_for_magazines');
// Set page layout
switch ( get_post_meta($mim_issue_post_id, 'Layout', true) ) {

	case 'left_sidebar':
		$mim_issue_class = 'left';
        break;
	case 'right_sidebar':
		$mim_issue_class = 'right';
		break;
	default:
		$mim_issue_class = '';
		break;
}

if( $mim_issue_class == 'left' ){

    $mim_issue_right_class = 'col-xs-12 col-sm-12 col-md-8 pull-right';
    $mim_issue_left_class = 'col-xs-12 col-sm-12 col-md-4 pull-left';
}
elseif( $mim_issue_class == 'right' ){

    $mim_issue_right_class = 'col-xs-12 col-sm-12 col-md-8';
    $mim_issue_left_class = 'col-xs-12 col-sm-12 col-md-4';
}
?>
<div class="container">
  <?php
   if( $mim_issue_class ) echo '<div class="row"><div class="' .$mim_issue_right_class.'">';
		echo '<div class="content">';
			echo '<div class="latest-post category-list">';

				while ( have_posts() ) {
        			   the_post();
					   get_template_part( 'libs/content', 'single-magazine' );
				}

			echo '</div>';
		echo '</div>';

   if( $mim_issue_class ) echo '</div>';

   if( $mim_issue_class ){
       echo '<div class="' .$mim_issue_left_class. '">';
            echo'<aside>';
                echo'<div class="sidebar">';
                    include get_template_directory(). '/sidebar.php';
                echo '</div>';
            echo '</aside>';
    echo'</div></div>';
   }
?>
</div>
<?php get_footer(); ?>
