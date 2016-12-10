<?php
/**
 * The main template file


 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();
global $wp_query;

if( is_tax( 'issues' ) )
 	get_template_part( 'template-magazine' );
else
{

    $mim_issue_post_id = $wp_query->get_queried_object_id();

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
	   <section class="row">

			<?php
			if( $mim_issue_class ) echo'<div class="' .$mim_issue_right_class.'">';
				while ( have_posts() ) {
					the_post();
					get_template_part( 'libs/content', get_post_type() );

				}
				?>
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="pagination-wrap text-center">
				            <ul class="pagination" id="">
				        <?php if( function_exists( 'mim_issue_pagination' ) ):
						 		 	mim_issue_pagination();
								else:
								 	wp_link_pages();
								endif;
				                ?>
				       		</ul>
				      	</div>
					</div>
		<?php
			if( $mim_issue_class ) echo '</div>';

			if( $mim_issue_class ) {
					echo '<div class="' .$mim_issue_left_class. '">';
				 		include get_template_directory(). '/sidebar.php';
				 	echo '</div>';
	     		}
			?>

	 	</section>
	</div>
	<!-- news listing section -->

<?php
get_footer();
}
?>
