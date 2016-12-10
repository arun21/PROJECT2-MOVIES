<?php
/**
 * The template for displaying blog posts.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

$mim_issue_blog_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID, 'full' ) );
?>
<div class="blog-list">
    <div class="post">
        <div class="entry-header">
            <?php if( !empty( $mim_issue_blog_url ) ) { ?>
            	<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo $mim_issue_blog_url; ?>" class="img-responsive"></a></div>
            <?php } else { ?>
			 	<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-1600x900.png'; ?>" class="img-responsive"></a></div>
			<?php } ?>
        </div>
        <div class="post-content">
            <h2 class="entry-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-meta">
                <ul>
	                <li class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></li>
	                <li class="publish-date"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></li>
	                <li class="tag"><i class="fa fa-tags"></i>
	                <?php
	                $mim_issue_tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'mim-issue' ) );
	                	if ( $mim_issue_tags_list ) {
						  	printf( $mim_issue_tags_list );
					    }
					    else {
					     	_e( 'No Tags Found' , 'mim-issue' );
					    } ?>

					</li>
	                <li class="comments"><a href="<?php echo get_comments_link( $post->ID ); ?>"><i class="fa fa-comments-o"></i><?php echo get_comments_number(); ?><?php _e( ' Comments','mim-issue' ); ?></a></li>
                </ul>
            </div>
            <div class="entry-summary">
              <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>
