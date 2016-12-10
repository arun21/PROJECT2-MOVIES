<?php
/**
 * Taxonomy Magazine categories
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();
global $wp_query;
$mim_issue_cat_id = $wp_query->get_queried_object_id();
$mim_issue_cat_data =  get_term_by('id', $mim_issue_cat_id, 'magazine_category');
$mim_issue_listing_page_id = get_option('page_for_archives');
$mim_issue_article_post_count = get_option('mim_post_per_page_article');

// Set page layout as it is in issue listing page
switch ( get_post_meta($mim_issue_listing_page_id, 'Layout', true) ) {

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
   <?php
   if( $mim_issue_class ) echo '<div class="row"><div class="' .$mim_issue_right_class.'">';

   $mim_issue_category_args = array(
		'post_type' => 'magazine',
		'posts_per_page' => ( !empty( $mim_issue_article_post_count ) ) ? $mim_issue_article_post_count : '8' ,
		'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
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
				'terms'    => $mim_issue_cat_id,
			),
		),
		'order' => 'DESC',
		'orderby'=>'date',
	);

	$temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query( $mim_issue_category_args );
    if ( $wp_query->have_posts() ){
    	$mim_issue_post_count = $wp_query->post_count ;
    ?>
	<div class="content">
	  <h3 class="widget-title"><?php _e('Magazine Category : ','mim-issue');?><span><?php echo $mim_issue_cat_data->name;?></span></h3>
	     <div class="latest-post category-list">
          <?php
           $i=1;
		   while ( have_posts() )
		   {
		      the_post();
		      if( get_option( 'mim_full_article_display' ) == 'Yes'  &&  $mim_issue_post_count == 1 ){
		      	get_template_part( 'libs/content', 'single-magazine' );
		      }else{
		      ?>
	            <div class="thumbnail">
	              <div class="col-sm-5 col-md-5">
	              	<div class="thumb-img">
	              	 <?php
	                   if( has_post_thumbnail() ):
					     the_post_thumbnail('mim_issue_article_category_listing');
				       else : ?>
					    <img src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-450x300.png';  ?>" alt="" />
				     <?php endif; ?>
	                   <div class="issue-title"><?php echo $mim_issue_cat_data->name;?></div>
	                </div>
	              </div>
	              <div class="col-sm-7 col-md-7">
	                  <div class="caption">
	                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					       <div class="meta"> <span class="date"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></span>&nbsp;&nbsp;|&nbsp;&nbsp;<span class="date"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span> </div>
	                    <p>
			             <?php echo mim_issue_excerpt(get_the_ID(),50,'','[...]'); ?>
			           </p>
	                  </div>
	                  <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read More...','mim-issue');?></a>
	               </div>
	          	</div>
	          	<?php if( $i != $mim_issue_post_count ){  ?>
                 <hr/>
                <?php } ?>
              <?php $i++; ?>
             <?php } ?>
             <?php }
               echo '<div class="pagination-wrap text-center">';
				    echo '<ul class="pagination">';
			           mim_issue_pagination();
				    echo '</ul>';
				echo '</div>';
             ?>
           </div>
	   </div>
	<?php }else{ ?>
		<div class="content">
	       <h3 class="widget-title"><?php _e('No Articles Found For Magazine Category : ','mim-issue');?><span><?php echo $mim_issue_cat_data->name;?></span></h3>
	    </div>
	<?php
	}
	$wp_query = $temp;
	wp_reset_query();
	the_post();
	?>
    <?php
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
