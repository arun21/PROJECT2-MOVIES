<?php
/**
 * The template for displaying magazine content
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

$mim_issue_magazine_detail_url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'full' ) );
?>
<div class="thumbnail">
    <div class="col-xs-12">
    <?php if( !empty( $mim_issue_magazine_detail_url ) ) { ?>
          <div class="thumb-img"><img src="<?php echo $mim_issue_magazine_detail_url; ?>" alt="<?php echo get_the_title();?>"></div>
      <?php } else { ?>
          <div class="thumb-img"><img src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-1600x900.png'; ?>" alt="">
          </div>
      <?php } ?>
       <div class="caption">
        <strong class="title"><?php the_title(); ?></strong>
        <div class="meta">
        	<span class="date"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></span>
        	&nbsp;&nbsp;|&nbsp;&nbsp;
        	<span class="date"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span>
        </div>
        <p><?php the_content(); ?></p>
       </div>
  	   <div class="simple-social-icons">
        	<a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;t=<?php echo strip_tags( the_title() ); ?>"><i class="fa fa-facebook"></i></a>
        	<a href="whatsapp://send?text=<?php echo strip_tags( the_title() ); ?> - <?php echo urlencode( the_permalink( '' , '' , false ) ); ?>" class="hidden-md hidden-lg visible-sm visible-xs"><i class="fa fa-whatsapp"></i></a>
      		<a href="https://twitter.com/intent/tweet?original_referer=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;text=<?php echo strip_tags( the_title() ); ?>&amp;tw_p=tweetbutton&amp;url=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>"><i class="fa fa-twitter"></i></a>
      		<a href="https://plus.google.com/share?url=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;title=<?php echo strip_tags( the_title() ); ?>"><i class="fa fa-google-plus"></i></a>
      		<a href="//pinterest.com/pin/create/button/?url=<?php echo urlencode( the_permalink( '' , '' , false ) ); ?>&amp;media=<?php echo $mim_issue_magazine_detail_url; ?>&amp;description=<?php echo strip_tags( the_title() ); ?>"><i class="fa fa-pinterest"></i></a>

      </div>
    </div>
</div>

<!--Author block-->
<?php if ( get_theme_mod( 'hide_author_bio' ) == '' ) { ?>
<div class="post-author clearfix">
    <h3 class="widget-title"><?php _e( 'About','mim-issue' ); ?><span><?php _e( ' Author','mim-issue' ); ?></span></h3>
	    <div class="col-xs-12 post-author-info">
	    <?php?>
	    	<div class="image"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></a></div>
	      	<div class="info">
		        <h5><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )  ); ?>"><?php echo get_the_author_meta( 'user_nicename' ); ?></a></h5>
		        <p><?php echo get_the_author_meta( 'description' ); ?></p>
			</div>
	   	</div>
</div>
<?php } ?>

<!--Comments Block-->
<?php if( get_theme_mod( 'hide_comments' ) == '' ) { ?>

	            <?php
	            	 if ( comments_open() || get_comments_number() ) { ?>
	            	 	<div id="comments" class="post-comments clearfix">
					        <h3 class="widget-title"><?php _e( 'Comments','mim-issue' ); ?> <span> ( <?php echo get_comments_number(); ?> ) </span></h3>
					            <div class="col-xs-12 post-comments-section">
								    <?php
						        	global $mim_issue_withcomments;
			                        $mim_issue_withcomments = 1;
						        	comments_template(); ?>
			        			</div>
     					 </div>
			   <?php } ?>

<?php }
