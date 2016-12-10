<?php
/**
 * Description: A Page Template that display all issues items.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();

global $wp_query;
$mim_issue_post_id = $wp_query->get_queried_object_id();

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

    $mim_issue_right_class = 'col-md-8 col-sm-12 col-xs-12 pull-right';
    $mim_issue_left_class = 'col-md-4 col-sm-12 col-xs-12 pull-left';
}
elseif( $mim_issue_class == 'right' ){

    $mim_issue_right_class = 'col-md-8 col-sm-12 col-xs-12';
    $mim_issue_left_class = 'col-md-4 col-sm-12 col-xs-12';
}
?>
<div class="container">
    <?php
   if( $mim_issue_class ) echo '<div class="row"><div class="' .$mim_issue_right_class.'">';

	  	echo '<div class="content">';
	    	echo '<div class="latest-post issue-listing">';
	     		$mim_issue_taxonomy = 'issues';
				$mim_issue_article_post_count = get_option('mim_post_per_page_article');

				$mim_issue_term_args=array(

				  'hide_empty' => false,
				  'orderby' => 'id',
				  'order' => 'DESC',
				);
				$mim_issue_terms = get_terms($mim_issue_taxonomy,$mim_issue_term_args);

				$i = 0;
				if ( ! empty( $mim_issue_terms )){
					$mim_issue_issue_data = array();
					foreach ( $mim_issue_terms as $mim_issue_term ) {
					  $mim_issue_image_path = '';
					  $mim_issue_term_id = $mim_issue_term->term_id;
					  $mim_issue_date=get_metadata('taxonomy', $mim_issue_term_id, 'mim_issue_publish_date', true) ;
					  if( !empty ($mim_issue_date) && $mim_issue_date <=  date('Y-m-d') ) {
					  	$mim_issue_issue_data[$i]['term_id'] = $mim_issue_term->term_id;
					  	$mim_issue_issue_data[$i]['term_name'] = $mim_issue_term->name;
					  	$mim_issue_coverimage=get_metadata('taxonomy',$mim_issue_term_id, 'mim_issue_cover_image', true) ;
						$mim_issue_coverimage_path=wp_get_attachment_image_src($mim_issue_coverimage,'full');
						$mim_issue_image_path=$mim_issue_coverimage_path[0];
					  	$mim_issue_issue_data[$i]['coverimage'] = $mim_issue_image_path;
					  	$mim_issue_issue_data[$i]['issue_link'] = site_url().'?issue='.$mim_issue_term_id;
					  	$i++;
					  }
					}
				}

				$mim_issue_issue_count = count( $mim_issue_issue_data ); //we want zero based
		        ( get_query_var( 'paged' ) ) > 1 ? $mim_issue_current = ( get_query_var( 'paged' ) ) : $mim_issue_current = 1;
		        $mim_issue_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		        if( !empty( $mim_issue_issue_count ) && !empty( $mim_issue_article_post_count ) )
					 $mim_issue_max_no_pages = ceil( $mim_issue_issue_count / $mim_issue_article_post_count );

		        if( ! $mim_issue_total = $mim_issue_max_no_pages ) $mim_issue_total = 1;

				if ( !empty( $mim_issue_article_post_count ) ) {
					$mim_issue_offset = ( $mim_issue_paged - 1 ) * $mim_issue_article_post_count;
					$mim_issue_issue_data = array_slice( $mim_issue_issue_data, $mim_issue_offset, $mim_issue_article_post_count );
				}
				foreach ( $mim_issue_issue_data as $mim_issue_key => $mim_issue_val ) {
						echo '<div class="col-md-6 col-sm-6 small-thumb">';
							echo '<div class="thumbnail">';
								echo '<a href="'. $mim_issue_val['issue_link'] .'">';
										if( !empty( $mim_issue_val['coverimage'] ) ) {
												echo '<img src="'. $mim_issue_val['coverimage'] .'" alt="">';
											}
											else {

												echo '<img src="'. MIM_ISSUE_THEME_URI. '/images/No-image-680x450.png' .'" alt="">';
											}
								echo '</a>';
						      	echo '<div class="caption">';
						        	echo'<h4><a href="'. $mim_issue_val['issue_link'] .'">' . $mim_issue_val['term_name'] .'</a></h4>';
						     	echo '</div>';
						    echo '</div>';
						echo ' </div>';
				}
			echo '</div>';
				?>

		       	<div class="pagination-wrap text-center">
		            <ul class="pagination">
		            <?php
					if( $mim_issue_total > 1 ){
					   if( $mim_issue_paged >1 ){
						 echo '<li><a class="prev_page" href="'. get_pagenum_link($mim_issue_current-1) .'">'. __('&lsaquo;','mim-issue') .'</a></li>';
					   }
					   for( $i=1; $i <= $mim_issue_total; $i++ ) {
						if( $i == $mim_issue_current ){
							echo '<li class="active">';
								echo '<a href="'. get_pagenum_link($i) .'">'. $i .'</a>&nbsp;';
							echo '</li>';
						} else {
							echo '<li>';
								echo '<a href="'. get_pagenum_link($i) .'">'. $i .'</a>&nbsp;';
							echo '</li>';
						}
					  }
					  if( $mim_issue_paged < $mim_issue_total ) {
						echo '<li><a class="next_page" href="'. get_pagenum_link($mim_issue_current+1) .'">'. __('&rsaquo;','mim-issue') .'</a></li>';
					  }
				    }
		            ?>
		            </ul>
		        </div> <!--pagination div close-->
<?php
		echo '</div>'; //content div close

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
