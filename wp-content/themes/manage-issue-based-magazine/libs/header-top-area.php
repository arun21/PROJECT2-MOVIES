<!-- header section -->
<header>
    <div class="container">
	    <div class="row">
	      	<div class="col-md-3 col-sm-12 col-xs-12"><?php mim_issue_logo(); ?> </div>
		      <div class="col-md-6 col-sm-12 col-xs-12">
		      <?php
		      	if ( get_theme_mod('header_ad') != '' ) {
					echo '<div class="advertise-area">';
						echo wp_kses_post( get_theme_mod( 'header_ad_content' ) );
					echo '</div>';
				} ?>
		      </div>

		      <?php if ( get_theme_mod( 'header_social_checkbox' ) != '' ) { ?>
			    	<div class="col-md-3 col-sm-12 col-xs-12 social-links pull-right">
			      		<ul class="clearfix">
			        	<?php
				            	if( get_theme_mod( 'twitter_url' ) )
							        echo '<li><a href="'.esc_url( get_theme_mod( 'twitter_url' ) ).'" target="_blank" title="'. __('Share on Twitter','mim-issue') .'"><i class="fa fa-twitter"></i></a></li>';

				               	if( get_theme_mod( 'facebook_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'facebook_url' ) ).'" target="_blank" title="'. __('Share on Facebook','mim-issue') .'"><i class="fa fa-facebook"></i></a></li>';

				               	if( get_theme_mod( 'googleplus_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'googleplus_url' ) ).'" target="_blank" title="'. __('Share on Google Plus','mim-issue') .'"><i class="fa fa-google-plus"></i></a></li>';

				               	if( get_theme_mod( 'linkedin_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'linkedin_url' ) ).'" target="_blank" title="'. __('Share on LinkedIn','mim-issue'). '"><i class="fa fa-linkedin"></i></a></li>';

				               	if( get_theme_mod( 'pinterest_url' ) )
				               		echo ' <li><a href="'.esc_url( get_theme_mod( 'pinterest_url' ) ).'" target="_blank" title="'. __('Link to your Pinterest profile','mim-issue') .'"><i class="fa fa-pinterest"></i></a></li>';


				               	if( get_theme_mod( 'blogger_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'blogger_url' ) ).'" target="_blank" title="'. __('Share on RSS','mim-issue'). '"><i class="fa fa-rss"></i></a></li>';

				               	if( get_theme_mod( 'youtube_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'youtube_url' ) ).'" target="_blank" title="'. __('Share on YouTube','mim-issue'). '"><i class="fa fa-youtube"></i></a></li>';

				               	if( get_theme_mod( 'flikr_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'flikr_url' ) ).'" target="_blank" title="'. __('Share on Flickr','mim-issue'). '"><i class="fa fa-flickr"></i></a></li>';

				               	if( get_theme_mod( 'vimeo_url' ) )
				               		echo '<li><a href="'.esc_url( get_theme_mod( 'vimeo_url' ) ).'" target="_blank" title="'. __('Share on Vimeo','mim-issue'). '"><i class="fa fa-vimeo-square"></i></a></li>';
					    ?>
			        	</ul>
			      	</div>
		      <?php } ?>
	    </div>
	    <div class="row">
		    <div class="col-md-12">
		        <nav class="navbar navbar-default menu">
			        <div class="row">
			            <div class="navbar-header">
			              	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only"><?php _e('Main Menu','mim-issue');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			           </div>
			           <?php mim_issue_wp_nav_menu(); ?>
			           <?php get_search_form(); ?>
			        </div>
		        </nav>
		      <?php
		     // Get current issue menu if Issue Category dropdown checked from mim plugin

		      $mim_issue_menu_category=get_option('mim_issue_menu_category');
		      if( !empty ( $_SESSION['Current_Issue'] ) && $mim_issue_menu_category )
		      {
		      	$mim_issue_menu = do_shortcode('[MIM_Issue_Menu issue_id="'.$_SESSION['Current_Issue'].'"]');
                if( !empty( $mim_issue_menu ) )
			    {
		      	?>
		      	<nav class="navbar navbar-default menu">
		        	<div class="row">
			            <div class="navbar-header">
			              <button type="button" class="navbar-toggle secondarytoggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2"> <span class="sr-only"><?php _e('Issue Category Navigation','mim-issue');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			            </div>
			              <?php

									echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">';
					                echo '<ul class="nav navbar-nav" id="secondarymenu">';

									$mim_issue_menuItems = explode(",",$mim_issue_menu);
									$mim_issue_len = sizeOf( $mim_issue_menuItems );
									$mim_issue_size = 7;
									if( $mim_issue_len < 7 )
										$mim_issue_size = $mim_issue_len;

									if( is_tax('magazine_category') )
									{
										$mim_issue_cat = get_queried_object_id();
										if( isset( $mim_issue_cat ) && !empty( $mim_issue_cat ) ){
											$mim_issue_child_term = get_term( $mim_issue_cat, 'magazine_category' );
										  if( !empty( $mim_issue_child_term ) )
										    $mim_issue_child_parent = $mim_issue_child_term->parent;
										}
									}

								    for( $i=0; $i<$mim_issue_size; $i++ ){
								      $mim_issue_classname = '';
								      $mim_issue_parentcat_data =  get_term_by('id', $mim_issue_menuItems[$i], 'magazine_category');

				                      $mim_issue_cat_link = get_term_link($mim_issue_parentcat_data->slug,$mim_issue_parentcat_data->taxonomy);

				                      if( ( $mim_issue_cat == $mim_issue_menuItems[$i] ) || ($mim_issue_child_term->parent == $mim_issue_menuItems[$i]))
				                        $mim_issue_classname = 'current_page_item';

				                      // get children of category
									  $mim_issue_childcategories = get_terms('magazine_category',array('parent' => $mim_issue_parentcat_data->term_id,'hide_empty' => 0) ) ;


				                      echo '<li class="'.$mim_issue_classname.'"><a href="'.$mim_issue_cat_link.'">'.$mim_issue_parentcat_data->name.'</a>';

				                      if( !empty( $mim_issue_childcategories ) )
				                    	echo '<ul class="dropdown-menu">';

				                      foreach( $mim_issue_childcategories as $mim_issue_term ){

				                            $mim_issue_childcat_data =  get_term_by('id', $mim_issue_term->term_id, 'magazine_category');
				    				        $mim_issue_sub_cat_link = get_term_link($mim_issue_childcat_data->slug,$mim_issue_childcat_data->taxonomy);

				    						$mim_issue_child_class = '';
				    						if( $mim_issue_cat == $mim_issue_term )
				    						  $mim_issue_child_class = 'current_page_item';

									        $mim_issue_sub_childcategories = get_terms('magazine_category',array('parent' => $mim_issue_childcat_data->term_id,'hide_empty' => 0) ) ;

						                    echo '<li class="'. $mim_issue_child_class.'"><a href="'.$mim_issue_sub_cat_link.'">'.$mim_issue_childcat_data->name.'</a>';

						                    if( !empty( $mim_issue_sub_childcategories ) )
				                    	     echo '<ul class="dropdown-menu">';

				                    	      foreach( $mim_issue_sub_childcategories as $mim_issue_subcategory ){
				                                 $mim_issue_sub_child_cat_name=  get_term_by('id', $mim_issue_subcategory->term_id, 'magazine_category');
				    				             $mim_issue_sub_child_cat_link = get_term_link($mim_issue_sub_child_cat_name->slug,$mim_issue_sub_child_cat_name->taxonomy);

				    				             $mim_issue_sub_child_class = '';
					    						if( $mim_issue_cat == $mim_issue_subcategory )
					    						  $mim_issue_sub_child_class = 'current_page_item';

					    						echo '<li class="'. $mim_issue_sub_child_class.'"><a href="'.$mim_issue_sub_child_cat_link.'">'.$mim_issue_sub_child_cat_name->name.'</a>';
				    				          }

				    				        if(!empty($mim_issue_sub_childcategories))
				    						 echo '</ul>';
				    					}

				    					if(!empty($mim_issue_childcategories))
				    						echo '</ul>';

				    					echo '</li>';
								    }
								    echo '</ul></div>';

			               ?>
			          </div>
		        </nav>
		        <?php
		          } //end of if for menu navigation
		         }//end of if for category menu

		        if(get_option('users_can_register') && !is_user_logged_in() ) { ?>
		    	 <div class="user-options hidden-xs">
		    	    <ul>
					  <li><a href="<?php echo MIM_ISSUE_SITE_URL.'/wp-login.php'; ?>"><?php echo _e( 'Login', 'mim-issue');  ?></a></li>
					  <li><a href="<?php echo MIM_ISSUE_SITE_URL.'/register';?>"><?php echo _e( 'Register', 'mim-issue');  ?></a></li>
				    </ul>
				 </div>
				<?php } ?>
		      </div>
		    </div>
	  </div>
</header>
<!-- header section end -->

<!-- Current Issue & Breadcrumb -->
<div class="container">
<?php
if( isset( $_SESSION['Current_Issue'] ) && !empty( $_SESSION['Current_Issue'] ) ){
?>
<!-- Current Issue Browse section -->

  <div class="news-scroll pull-left">
  	<span>
       <i class="fa fa-newspaper-o"></i>
       <small class="ra-title hidden-xs"><?php _e('Currently you are browsing :','mim-issue');?></small>
    </span>
    <small>
	     <?php
	      $mim_issue_issuedata = get_term_by('id', (int)$_SESSION['Current_Issue'], 'issues');
		  if( !empty( $mim_issue_issuedata ) )
			echo $mim_issue_issuedata->name ;
	      ?>
    </small>
  </div>

<!-- Current Issue Browse section end -->
<?php } ?>
<?php
global $mim_issue_slider;
if ( get_theme_mod( 'hide_breadcrumbs_from_bar' ) == '' ) {
        if( ! is_404() && $mim_issue_slider == 1 ) {
            if( trim( wp_title( '', false ) ) ) {
               mim_issue_breadcrumbs();
            }
        }
    }//end of if
?>
</div>
<!-- Current Issue & Breadcrumb  End -->
