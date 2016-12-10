<?php
/**
 * The search template file.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();

global $wp_query;

?>
<div class="container">
    <section class="news-section search-result">
        <section class="row">

		<?php
	      if ( have_posts() ) :
       			while ( have_posts() ) {
				the_post();
				$mim_issue_post_id = $wp_query->get_queried_object_id();
				$mim_issue_blog_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'full' ) );
                ?>
			      <div class="news-list">
					  <figure class="news">
					    <figure class="col-xs-12 col-sm-12 col-md-12">
					    <div class="entry-header">
				            <?php if( !empty( $mim_issue_blog_url ) ) { ?>
				            	<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo $mim_issue_blog_url; ?>" class="img-responsive"></a></div>
				            <?php } else { ?>
							 	<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-1600x900.png'; ?>" class="img-responsive"></a></div>
							<?php } ?>
				        </div>
			              <figcaption class="news-info">
			                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			                <div class="meta">
			                   <span class="date">
			                     <i class="glyphicon glyphicon-calendar"></i>
			                     <?php echo get_the_date(); ?>
			                   </span>
			                   <span class="category">
			                    <i class="glyphicon glyphicon-tag"></i>
			                	<?php
			                	$mim_issue_tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'mim-issue' ) );
			                	if ( $mim_issue_tags_list ) {
								  	printf( $mim_issue_tags_list );
							    }
							    else {
							     	_e( 'No Tags Found' , 'mim-issue' );
							    } ?>
							   </span>
			                </div>
			                <?php //the_excerpt(); ?>
			                <?php the_content(); ?>

			                <!--<a class="more-news" href="<?php the_permalink(); ?>"><?php _e( 'Find Out More' , 'mim-issue' );?></a> -->
			              </figcaption>
			            </figure>
			          </figure>
				  </div>
			<?php
			}

			 // pagination
			 echo '<div class="pagination-wrap text-center">';
	    			echo '<ul class="pagination">';
						if(function_exists( 'mim_issue_pagination' )):
							mim_issue_pagination();
						else:
							?>
							<div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'mim-issue')) ?></div>
							<div class="nav-previous"><?php previous_posts_link(__('Newer Entries &rarr;', 'mim-issue')) ?></div>
							<?php
						endif;
                    echo '</ul>';
			echo '</div>';
          else :
	         ?>
	         <section class="about-section page-not">
			      <div class="title-area">
			        <div class="page-not-found text-center">
			            <i class="fa fa-warning fa-2x"></i>
			        	<span><?php _e( 'No Data Found ' , 'mim-issue' ); ?></span>
			        </div>
			        <p class="section-sub-text"><?php _e( 'Sorry, It looks like nothing was found at this location.</br>Would you like to go to  <a href="' .site_url().  '">homepage</a> instead?' , 'mim-issue' );?></p>
			     	</div>
			    </section>

         <?php endif; ?>
 		</section>
    </section>
</div>
<!-- news listing section -->

<?php get_footer(); ?>
