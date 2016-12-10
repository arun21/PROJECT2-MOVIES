<?php
/**
 * The template for displaying blog content
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

global $wp_query;
$mim_issue_post_id = $wp_query->get_queried_object_id();
$mim_issue_blog_detail_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full' ) );
while ( have_posts() ) {
	the_post(); ?>
		<div class="thumbnail">
            <div class="col-xs-12">
	            <?php if( !empty( $mim_issue_blog_detail_url ) ) { ?>
		            <div class="thumb-img"><img src="<?php echo $mim_issue_blog_detail_url; ?>" alt="<?php the_title(); ?>"></div>
		        <?php } else { ?>
					<div class="thumb-img"><img src=" <?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-1600x900.png'; ?>" alt="<?php the_title(); ?>"></div>
		        <?php } ?>
              	<div class="caption">
	                <strong class="title"><?php the_title(); ?></strong>
	                <div class="meta">
	                	<span class="date"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></span>
	                	&nbsp;&nbsp;|&nbsp;&nbsp;
	                	<span class="date"><i class="fa fa-clock-o"></i>&nbsp;<?php echo get_the_date(); ?></span>
	                	<?php if( has_category() == true ) { ?>
						  <span class="categories"><i class="fa fa-bookmark" title="Categories"></i>&nbsp;<?php the_category(', '); ?></span>
						<?php } ?>
						<span class="tag"><i class="fa fa-tags"></i>
						<?php
		                $mim_issue_tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'mim-issue' ) );
		                	if ( $mim_issue_tags_list )
							  printf( $mim_issue_tags_list ); ?>
						</span>
						<?php
							$user_exists = (is_user_logged_in() && current_user_can( 'edit_posts') )? true:false;
							if( $user_exists == 1 ) {
								echo '<div class="postmetabottom">'; ?>
									<span class="edit"><i class="fa fa-edit" title="Edit"></i>&nbsp;<?php edit_post_link(__('Edit','mim-issue')); ?></span>
							   <?php
							  echo '</div>';
							 }
						?>
	                </div>
	                <p><?php the_content(); ?></p>
	                <?php
	                $link_pages_exist = (wp_link_pages('echo=0') != '' )? true:false;
	                if( $link_pages_exist ): ?>
	                  <span class="pagelist"><?php $page_text = '<i class="fa fa-copy" title="Pages"></i>&nbsp;'; wp_link_pages('before='.$page_text.':&after='); ?></span>

	                <?php endif; ?>
              	</div>
              	<div class="simple-social-icons">
                	<a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;t=<?php echo strip_tags( $post->post_title ); ?>"><i class="fa fa-facebook"></i></a>
                	<a href="whatsapp://send?text=<?php echo strip_tags( $post->post_title ); ?> - <?php echo urlencode( the_permalink( '' , '' , false ) ); ?>" class="hidden-md hidden-lg visible-sm visible-xs><i class="fa fa-whatsapp"></i></a>
              		<a href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;text=<?php echo strip_tags( $post->post_title ); ?>&amp;tw_p=tweetbutton&amp;url=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>"><i class="fa fa-twitter"></i></a>
              		<a href="https://plus.google.com/share?url=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;title=<?php echo strip_tags( $post->post_title ); ?>""><i class="fa fa-google-plus"></i></a>
              		<a href="//pinterest.com/pin/create/button/?url=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;media=<?php echo $mim_issue_blog_detail_url; ?>&amp;description=<?php echo strip_tags( $post->post_title ); ?>"><i class="fa fa-pinterest"></i></a>

			    </div>
			    <div class="postpagenav">
			      <ul>
					<?php if (is_attachment()) {
						   previous_image_link( '<li class="prev_page">'.__('&lsaquo;','mim-issue').'&nbsp;&nbsp;%link </li>','%title',false);
						   next_image_link( '<li class="next_page">%link&nbsp;&nbsp;'.__('&rsaquo;','mim-issue').' </li>','%title',false);

                        } else {
						    previous_post_link( '<li class="prev_page">'.__('&lsaquo;','mim-issue').'&nbsp;&nbsp;%link </li>','%title',false);
						   next_post_link( '<li class="next_page">%link&nbsp;&nbsp;'.__('&rsaquo;','mim-issue').' </li>','%title',false);

					} ?>
				  </ul>
				</div>
             </div>
        </div>
        <!--Author block-->
        <?php if ( get_theme_mod( 'hide_author_bio' ) == '' ) { ?>
		    <div class="post-author clearfix">
	            <h3 class="widget-title"><?php _e( 'About','mim-issue'); ?> <span><?php _e( 'Author','mim-issue' ); ?></span></h3>
	            <div class="col-xs-12 post-author-info">
	            	<div class="image"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></a></div>
	                <div class="info">
			              <h5><?php the_author_posts_link(); ?></h5>
			              <p><?php the_author_meta( 'description' ); ?></p>
			        </div>
	            </div>
		    </div>
		<?php } ?>

		<!--Comments Block-->
		<?php if( get_theme_mod( 'hide_comments' ) == '' ) {

		            	 if ( comments_open() || get_comments_number() ) { ?>
		            	 	<div id="comments" class="post-comments clearfix">
					            <h3 class="widget-title"><?php _e( 'Comments','mim-issue' ); ?> <span> ( <?php echo get_comments_number(); ?> ) </span></h3>
						            <div class="col-xs-12 post-comments-section">
						            <?php comments_template(); ?>
				        			</div>
            				</div>
				  	 <?php } ?>
		 <?php }
}
?>
