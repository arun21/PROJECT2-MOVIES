<?php
/**
 * The template used for displaying page content in page.php and Page Templates
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

global $wp_query;

$mim_issue_post_id = $wp_query->get_queried_object_id();
$mim_issue_args=array(
  'page_id' => $mim_issue_post_id,
  'post_type' => 'page',
  'post_status' => 'publish',
  'posts_per_page' => 1,
  'ignore_sticky_posts' =>1
);

$mim_issue_myposts = get_posts( $mim_issue_args );

$mim_issue_image_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID, 'aboutus-thumbnail' ) );
$mim_issue_full_title =  get_the_title();
$mim_issue_sub_title = explode(' ',$mim_issue_full_title, 2); ?>

<div class="content">
<?php foreach ( $mim_issue_myposts as $mim_issue_post ) : setup_postdata( $mim_issue_post );
?>

        <h3 class="widget-title"><?php echo $mim_issue_sub_title[0]; ?>&nbsp;<span><?php echo ( ! empty( $mim_issue_sub_title[1] ) ) ? $mim_issue_sub_title[1] : '';  ?></span></h3>
        <div class="latest-post cms-section">
        	 <p><?php the_content(); ?></p>
        	 <?php if(!empty( $mim_issue_image_url )) { ?>
			 	<p><img src="<?php echo $mim_issue_image_url; ?>" alt="<?php echo $mim_issue_full_title; ?>" /></p>
			 <?php }  ?>

        </div>


<?php endforeach; ?>
<!--Comments Block-->
<?php if( get_theme_mod( 'hide_comments' ) == '' ) { ?>
    <?php
    	 if ( comments_open() || get_comments_number() ) {
        	global $mim_issue_withcomments;
            $mim_issue_withcomments = 1; ?>
            <div id="comments" class="post-comments clearfix">
		        <h3 class="widget-title"><?php _e( 'Comments','mim-issue' ); ?> <span> ( <?php echo get_comments_number(); ?> ) </span></h3>
		            <div class="col-xs-12 post-comments-section">
        	          <?php comments_template(); ?>
        	         </div>
            </div>
    <?php } ?>
<?php }
wp_reset_postdata();?>
</div>
