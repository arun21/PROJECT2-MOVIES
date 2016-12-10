<?php
/**
 * The Template for displaying all single posts.
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

switch ( get_post_meta($mim_issue_post_id, 'Layout', true) ) {

	case 'left_sidebar':
		$mim_issue_class = 'left';
        break;
	case 'right_sidebar':
		$mim_issue_class = 'right';
		break;
	default:
		$mim_issue_class = 'full';
		break;
}

if($mim_issue_class == 'left'){

    $mim_issue_right_class = 'col-md-8 col-sm-12 col-xs-12 pull-right';
    $mim_issue_left_class = 'col-md-4 col-sm-12 col-xs-12 pull-left';
    $mim_issue_class = 'left';
}

elseif($mim_issue_class == 'right'){

    $mim_issue_right_class = 'col-md-8 col-sm-12 col-xs-12';
    $mim_issue_left_class = 'col-md-4 col-sm-12 col-xs-12';
    $mim_issue_class = 'right';
}

else{

	$mim_issue_class = '';
}

?>

<div class="container">
	<div class="row">

		<?php if( $mim_issue_class ) echo'<div class="' .$mim_issue_right_class.'">';
				echo '<div class="content">';
					echo '<div class="latest-post category-list">';
						get_template_part( 'libs/content', 'blog' );
					echo '</div>';
				echo '</div>';
		 if( $mim_issue_class ) echo '</div>';

		 if( $mim_issue_class ) {
				echo '<div class="' .$mim_issue_left_class. '">';
			 		include get_template_directory(). '/sidebar.php';
			 	echo '</div>';
     		}
		?>
  	</div>
</div>
<?php get_footer(); ?>
