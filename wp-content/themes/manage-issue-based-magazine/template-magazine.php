<?php
/**
 * The template for displaying magazine article of current issue
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();
global $wp_query;

// check it's issue category page or basic page
if( is_tax( 'issues' ) )
{

  //if someone goes from issue listing page then display articles of that issue
  $mim_issue_id = $wp_query->get_queried_object_id();
  $mim_issue_article_listing_page_id = get_option('page_for_magazines');
}
elseif( is_page() )
{
  //if particular page was made and want to display articles of that issue
  $mim_issue_id = $_SESSION['Current_Issue'];
  $mim_issue_article_listing_page_id = $wp_query->get_queried_object_id();
}

$mim_issue_article_post_count = get_option('mim_post_per_page_article');
$mim_issue_issues_data =  get_term_by('id', $mim_issue_id, 'issues');
// Set page layout
switch ( get_post_meta($mim_issue_article_listing_page_id, 'Layout', true) ) {

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

   $mim_issue_issue_article_args = array(
		'post_type' => 'magazine',
		'posts_per_page' => ( !empty( $mim_issue_article_post_count ) ) ? $mim_issue_article_post_count : '8' ,
		'paged' => ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1,
		'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'tax_query' => array(
			array(
				'taxonomy' => 'issues',
				'field'    => 'id',
				'terms'    => $mim_issue_id,
			),
		),
		'order' => 'DESC',
		'orderby' => 'date'
    );
    $temp = $wp_query;
    $wp_query = null;
    $wp_query = new WP_Query();
    $wp_query->query( $mim_issue_issue_article_args );
    if ( $wp_query->have_posts() ){
    	$mim_issue_post_count = $wp_query->post_count ;

    if( $mim_issue_post_count == 1 )
     {
     	  echo '<div class="content">';
			echo '<div class="latest-post category-list">';

				while ( have_posts() ) {
        			   the_post();
					   get_template_part( 'libs/content', 'single-magazine' );
				}

			echo '</div>';
		echo '</div>';
     }
     else
     {
?>
<h3 class="widget-title"><?php _e('Article Listing Of Issue : ','mim-issue');?><span><?php echo $mim_issue_issues_data->name;?></span></h3>
<div class="blog-list">
  <?php
  while ( have_posts() )
  {
	 the_post();
	 ?>
      <div class="post">
        <div class="entry-header">
            <?php
            $mim_issue_magazineurl = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID(), 'full' ) );
            if( !empty( $mim_issue_magazineurl ) ) { ?>
            	<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $mim_issue_magazineurl; ?>" class="img-responsive"></a></div>
            <?php } else { ?>
			 	<div class="entry-thumbnail"><a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo MIM_ISSUE_THEME_URI. '/images/No-Image-1600x900.png'; ?>" class="img-responsive"></a></div>
			<?php } ?>
        </div>
        <div class="post-content">
            <h2 class="entry-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-meta">
                <ul>
	                <li class="author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a></li>
	                <li class="publish-date"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></li>
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
  <?php
  } //end of while
 echo '<div class="pagination-wrap text-center">';
    echo '<ul class="pagination">';
       mim_issue_pagination();
    echo '</ul>';
 echo '</div>';
  ?>
</div>
<?php }
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
