<?php
/**
 * The template used for displaying home page contents.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

if( isset( $_SESSION['Current_Issue'] ) && !empty( $_SESSION['Current_Issue'] ) ){
 $mim_issue_master_category = get_metadata('taxonomy', (int)$_SESSION['Current_Issue'], 'mim_issue_master_category', true) ;
 $mim_issue_master_category_args = array(
	'post_type' => 'magazine',
	'posts_per_page' => 3,
	'post_status' => 'publish',
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'issues',
			'field'    => 'id',
			'terms'    => $_SESSION['Current_Issue'],
		),
		array(
			'taxonomy' => 'magazine_category',
			'field'    => 'id',
			'terms'    => $mim_issue_master_category,
		),
	),
	'order' => 'DESC',
	'orderby'=>'date',
);
$temp = $wp_query;
$wp_query = null;
$wp_query = new WP_Query();
$wp_query->query( $mim_issue_master_category_args );
if ( $wp_query->have_posts() )
{
	$mim_issue_post_count = $wp_query->post_count ;
	if( $mim_issue_post_count > 1 )
	 $mim_issue_class = 'small-thumb' ;
?>
<div class="content">
<h3 class="widget-title"><?php _e('Latest Master Category','mim-issue');?> <span><?php _e('News','mim-issue');?></span></h3>
<div class="latest-post">
   <?php
   if( $mim_issue_class )
     $mim_issue_leftclass = 'class="col-sm-7 col-md-7"';
   else
     $mim_issue_leftclass = 'class="col-sm-12 col-md-12"';

   $i=1;
   while ( have_posts() )
   {
      the_post();
      if( $i == 1){
   ?>
	  <div <?php echo $mim_issue_leftclass;?>>
	    <div class="thumbnail ">
	      <div class="thumb-img">
	        <a href="<?php the_permalink(); ?>">
	          <?php
	           if( has_post_thumbnail() ):
				 the_post_thumbnail('mim_issue_article_master_category_thumbnail');
			   else : ?>
				<img src="<?php  echo MIM_ISSUE_THEME_URI. '/images/No-Image-1600x900.png';  ?>" alt="<?php get_the_title(); ?>" />
			  <?php endif;?>
	        </a>
	      </div>
	      <div class="caption">
	        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	        <div class="meta"> <span class="date"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span class="date"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span> </div>
	       <p>
             <?php echo mim_issue_excerpt(get_the_ID(),30,'','[...]'); ?>
           </p>
	      </div>
	    </div>
	  </div>
	 <?php } ?>
	  <?php
	  if( $mim_issue_class && ( $i != 1 ) ){
		  if( $i == 2 ){  ?>
		   <div class="col-md-5 col-sm-5 <?php echo $mim_issue_class;?>">
		  <?php } ?>
		    <div class="thumbnail">
		      <a href="<?php the_permalink(); ?>">
	          <?php
	           if( has_post_thumbnail() ):
				 the_post_thumbnail('mim_issue_article_category_listing');
			   else : ?>
				<img src="<?php  echo MIM_ISSUE_THEME_URI. '/images/No-Image-640x360.png';  ?>" alt="<?php get_the_title(); ?>" />
			  <?php endif;?>
	        </a>
		      <div class="caption">
		        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		       <div class="meta"> <span class="date"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span class="date"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span> </div>
		      </div>
		    </div>
		  <?php if( $i == $mim_issue_post_count ){  ?>
		   </div>
		  <?php } ?>
	   <?php } ?>
	  <?php $i++; ?>
	<?php } ?>
</div>
</div>
<?php }
	$wp_query = $temp;
	wp_reset_query();
	the_post();
}

if ( get_theme_mod('content_ad') != '' ) {

	echo '<div class="advertise-area">';
		echo wp_kses_post( get_theme_mod( 'content_ad_content' ) );
	echo '</div>';
} ?>
<?php
if( isset( $_SESSION['Current_Issue'] ) && !empty( $_SESSION['Current_Issue'] ) )
{
	$mim_issue_issue_categories = do_shortcode('[MIM_Issue_Menu issue_id="'.$_SESSION['Current_Issue'].'"]');
	$mim_issue_cat_count = 0;
	if( !empty( $mim_issue_issue_categories ) ){
	  echo '<div class="content">';
	    echo '<h3 class="widget-title">'. __('Latest Current Issue','mim-issue').'<span>'. __(' Articles','mim-issue').'</span></h3>';
	     echo '<div class="issue-slider">';
		    echo '<div class="owl-carousel owl-carousel-1">';
			  $mim_issue_issue_category_id = explode(",",$mim_issue_issue_categories);
			  foreach ($mim_issue_issue_category_id as $mim_issue_catid)
			  {
			  	 $mim_issue_cat_data =  get_term_by('id', $mim_issue_catid, 'magazine_category');
		         $mim_issue_cat_link = get_term_link($mim_issue_cat_data->slug,$mim_issue_cat_data->taxonomy);
			     $mim_issue_issue_category_args = array(
					'post_type' => 'magazine',
					'posts_per_page' => 1,
					'post_status' => 'publish',
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'issues',
							'field'    => 'id',
							'terms'    => $_SESSION['Current_Issue'],
						),
						array(
							'taxonomy' => 'magazine_category',
							'field'    => 'id',
							'terms'    => $mim_issue_catid,
						),
					),
					'order' => 'DESC',
					'orderby'=>'date',
				);
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query( $mim_issue_issue_category_args );
				if ( $wp_query->have_posts() )
				{
	                   the_post();
	                   echo '<div class="item">';
				         echo '<article class="entry-item">';
				           echo '<div class="entry-thumb">';
				            echo '<a href="'.get_the_permalink().'">';
					           if( has_post_thumbnail() ):
								 the_post_thumbnail('blog-sample');
							   else : ?>
								<img src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-302x200.png';  ?>" alt="<?php echo get_the_title(); ?>" />
							  <?php endif;
					        echo '</a>';
				           echo '</div>';
				           echo '<div class="entry-content style1">';
				              echo '<h5 class="h5-content"><a href="'.$mim_issue_cat_link.'">'.$mim_issue_cat_data->name.'</a></h5>';
				                echo '<h4 class="entry-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>';
				           echo '</div>';
				        echo '</article>';
					  echo '</div>';
					  $mim_issue_cat_count++;
	             }
	             $wp_query = $temp;
				 wp_reset_query();
				 the_post();
	          }
	          echo '</div>';
	       echo '</div>';
	       if($mim_issue_cat_count == 0){
	       	 echo '<p class="no-data">'. __('No Articles','mim-issue').'<span>'. __(' Found For Current Issue','mim-issue').'</span></p>';
	       }
	      echo '</div>';
	    }
} ?>
