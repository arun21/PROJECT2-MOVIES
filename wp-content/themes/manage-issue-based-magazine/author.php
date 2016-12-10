<?php
/**
 * The template for displaying Author archive pages
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 *
 */

get_header();
global $wp_query, $wp_roles;
$roles = $wp_roles->get_names();
$all_users = array();
foreach ($roles as $role) {
	$users = get_users('role='.$role);
	if ($users) $all_users = array_merge($all_users, $users);

}
$mim_issue_author_name = get_the_author();
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12">
		<?php if ( have_posts() ) {  ?>
			<div class="content">
				<div class="latest-post category-list author-info">
					<div class="post-author clearfix">
		            	<h3 class="widget-title"><?php _e( 'About','mim-issue' ); ?> <span><?php _e( 'Author','mim-issue' ); ?></span></h3>
			            <div class="col-xs-12 post-author-info">
			            	<div class="image"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $user->ID ) ); ?>"><?php echo get_avatar( $user->ID,65 ); ?></a></div>
			                <div class="info">
					              <h5><?php echo $mim_issue_author_name; ?></h5>
					              <p><?php the_author_meta( 'description'  , $user->ID ); ?></p>
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
			            </div>
		        	</div>

		        	<div class="post-comments clearfix">
		        		<?php $mim_issue_author_name = get_the_author(); ?>
		        		<h3 class="widget-title"><?php _e( 'Author Archives :','mim-issue' ); ?>
		        			<span class="author-title"><?php echo $mim_issue_author_name; ?></span>
		        		</h3>
            			<?php
            			global $wp_query;
            			$mim_issue_post_id = $wp_query->get_queried_object_id();
            			$mim_issue_article_post_count = get_option('mim_post_per_page_article');
						$mim_issue_author_args = array(
							'author_name' => $mim_issue_author_name,
							'post_status' => 'publish',
							'posts_per_page' => ( !empty( $mim_issue_article_post_count ) ) ? $mim_issue_article_post_count : '2' ,
							'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
							'post_type' => array('post','magazine'),
						);

						$wp_query = new WP_Query();
    					$wp_query->query( $mim_issue_author_args );

	            			while ( have_posts() ) 	{
							  the_post();
            				  ?>
								<div class="thumbnail">
									<div class="col-sm-5 col-md-5">
						              	<div class="thumb-img">
						                	<a href="<?php the_permalink() ?>">
						                	<?php if( has_post_thumbnail() ):
												     	the_post_thumbnail('mim_issue_author_archive_listing');
											       	else : ?>
												    	<img src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-450x300.png';  ?>" alt="<?php get_the_title(); ?>" />
											<?php endif; ?>
						                    </a>
						                </div>
								 	</div>
									<div class="col-sm-7 col-md-7">
						                  <div class="caption">
						                    <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
						                    <div class="meta"> <span class="date"><a href="<?php echo get_comments_link( $post->ID ); ?>"><i class="fa fa-comments-o"></i><?php echo get_comments_number(); ?><?php _e( ' Comments','mim-issue'); ?> </a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span class="date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></span></div>
						                   <?php the_excerpt(); ?>
						                  </div>
						                  <a href="<?php the_permalink() ?>" class="read-more"><?php _e('Read More...','mim-issue'); ?></a>
						            </div>
								</div>
			        		<?php
			        		}
			        		 ?>
		        		<div class="pagination-wrap text-center">
						   	<ul class="pagination">
					        	<?php mim_issue_pagination(); ?>
						   	</ul>
						</div>
						<?php

						wp_reset_query();
						the_post();
						?>
					</div>
				</div>
			</div>
			<?php }
			else { ?>
			<div class="content">
				<h3 class="widget-title"><?php _e('No Articles related to this author Found! ','IssueMag');?></h3>

			</div>
			<?php }
			?>
		</div>
		<div class="col-md-4 col-sm-12 col-xs-12">
			<?php include get_template_directory(). '/sidebar.php'; ?>
		</div>
	</div>
</div>
<?php
get_footer();
?>
