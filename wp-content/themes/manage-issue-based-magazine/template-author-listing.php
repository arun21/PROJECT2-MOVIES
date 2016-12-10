<?php
/**
 * Template Name:  Author-Listing
 * Description: The template for displaying magazine article of current issue
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();
global $wp_query, $wp_roles;
$mim_issue_post_id = $wp_query->get_queried_object_id();
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

$roles = $wp_roles->get_names();
$all_users = array();
foreach ($roles as $role) {
	$users = get_users('role='.$role);
	if ($users) $all_users = array_merge($all_users, $users);

}
?>
<div class="container">
   <?php
   if( $mim_issue_class ) echo '<div class="row"><div class="' .$mim_issue_right_class.'">'; ?>

  <div class="content register-form clearfix">
     <h3 class="widget-title"><?php _e('Author ','mim-issue');?><span><?php _e('Listing','mim-issue');?></span></h3>

		<?php foreach ($all_users as $user) {

					echo '<div class="latest-post category-list author-info">';
					echo '<div class="col-xs-12 post-author-info">';
						echo '<div class="post-author clearfix">';
						?>

								<!-- author-avatar -->
								<div class="image">
                                	<?php echo get_avatar( $user->ID,65 ); ?>
                                </div>
								<!-- #author-avatar -->
								<!-- blog-article-author-details -->
		 						<div class="info">
										<h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $user->ID ) ); ?>"><?php echo $user->display_name; ?></a></h5>
										<p><?php the_author_meta( 'description'  , $user->ID ); ?></p>
										<!-- #author-description -->
										<!-- social-media -->
									   <div class="widget-content">
								         <div class="social-icons">
								           <ul>
												<?php if ( get_the_author_meta( 'url' , $user->ID) ) : ?>
												<li>
													<a class="web" href="<?php the_author_meta( 'url', $user->ID ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( " 's site", 'IssueMag' ); ?>" target="_blank"><i class="fa fa-globe"></i></a>
												</li>
												<?php endif ?>
										</ul>
									</div>
								</div>
							</div>

				   			<!-- #blog-article-author-details -->

					<?php

					echo '</div>';
				echo '</div>';
			echo '</div>';
			}
		wp_reset_postdata();


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
