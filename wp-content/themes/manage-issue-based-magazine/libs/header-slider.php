<!-- image slider section -->
<div class="container">
  <div class="row">
   <?php
   if( isset( $_SESSION['Current_Issue'] ) && !empty( $_SESSION['Current_Issue'] ) ){
	   $mim_issue_issue_banner_data = get_term_by('id', (int)$_SESSION['Current_Issue'], 'issues');
	   $mim_issue_issue_coverimage_data = get_metadata('taxonomy', $mim_issue_issue_banner_data->term_id, 'mim_issue_cover_image', true) ;
	   $mim_issue_issue_coverimage_path = wp_get_attachment_image_src($mim_issue_issue_coverimage_data,'full');
	   $mim_issue_issue_coverimage_url = $mim_issue_issue_coverimage_path[0];
	   if( !empty( $mim_issue_issue_banner_data ) ) {
	   ?>
	    <div id="slider" class="col-md-7 col-sm-12 col-xs-12">
	      <section class="slider">
	        <div class="flexslider">
	           <div class="issue-title">
	             <?php echo $mim_issue_issue_banner_data->name ; ?>
	           </div>
	           <div class="banner-img">
	              <?php if( !empty( $mim_issue_issue_coverimage_url ) ){ ?>
					    <img class="img-responsive" alt="<?php echo $mim_issue_issue_banner_data->name;?>" src="<?php  echo $mim_issue_issue_coverimage_url; ?>">
				<?php } else{ ?>
				  <img class="img-responsive" alt="<?php echo $mim_issue_issue_banner_data->name;?>" src="<?php  echo MIM_ISSUE_THEME_URI. '/images/No-Image-640x360.png';  ?>">
				<?php } ?>
	           </div>
	           <div class="banner-cont hidden-xs">
	          	<h2><?php echo $mim_issue_issue_banner_data->name;?></h2>
	            <p>
	            <?php
	            if( !empty ( $mim_issue_issue_banner_data->description ) ):
	                if( strlen ( $mim_issue_issue_banner_data->description ) < 150 ):
	                   echo $mim_issue_issue_banner_data->description;
	                else:
	                  echo substr(( strip_tags( $mim_issue_issue_banner_data->description ) ), 0, 150)."...";
	                endif;
	            endif;?>
	           </p>
	          </div>
	        </div>
	      </section>
	    </div>
     <?php } ?>
     <?php } ?>
    <?php
    if( isset( $_SESSION['Current_Issue'] ) && !empty( $_SESSION['Current_Issue'] ) ){
    ?>
      <div class="col-md-5 col-sm-12 col-xs-12">
      	<div class="issue-ticker issue-vertical">
	         <?php
	         $mim_issue_article_post_count = get_option('mim_post_per_page_article');
	         $mim_issue_featured_article_args = array(
									'post_type' => 'magazine',
									'posts_per_page' => ( !empty( $mim_issue_article_post_count ) ) ? $mim_issue_article_post_count : '8' ,
									'no_found_rows' => true,
									'meta_key' => 'featured-checkbox',
									'meta_value' => 'yes',
									'post_status' => 'publish',
						            'ignore_sticky_posts' => true,
						            'tax_query' => array(
										array(
											'taxonomy' => 'issues',
											'field'    => 'id',
											'terms'    => $_SESSION['Current_Issue'],
										),
									),
									'order' => 'DESC',
									'orderby' => 'date'
					);
			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query( $mim_issue_featured_article_args );
			if ( $wp_query->have_posts() )
	        {
	          echo '<ul>';
	          $i=0;
	          while ( have_posts() )
			  {
			  	 if($i % 2 == '0')
			  	  $mim_issue_class = 'class="even"';
			  	 else
			  	  $mim_issue_class = '';
			  	 the_post();
	             echo '<li '.$mim_issue_class.'>';
	               if( has_post_thumbnail() ):
					 the_post_thumbnail('mim_issue_article_featured_thumbnail');
				   else : ?>
					<img src="<?php  echo MIM_ISSUE_THEME_URI. '/images/No-Image-83x83.png';  ?>" alt="<?php get_the_title(); ?>" />
				  <?php endif;
	               echo '<a href="'. get_permalink() .'">'. get_the_title() .'</a>';
	                echo '<p>';
	                 echo mim_issue_excerpt(get_the_ID(),10,'','[...]');
	                 echo '<a href="'. get_permalink() .'">'.__( 'View More' , 'mim-issue' ).'</a>';
	               echo '</p>';
	             echo '</li>';
	             $i++;
	          }
	          echo '</ul>';
	        }
	        $wp_query = $temp;
	        wp_reset_query();
	        the_post();
	        ?>
      	</div>
     </div>
    <?php } ?>
  </div>
</div>
<!-- image slider section end -->
