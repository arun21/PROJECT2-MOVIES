<?php
/**
 * The template for displaying the footer.
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

$mim_issue_logo_text = esc_attr( get_theme_mod( 'logo_text' ) );
$mim_issue_sub_title = explode(' ', $mim_issue_logo_text , 2);
?>
<!-- footer section -->
<footer>
<?php
if ( get_theme_mod( 'about_magazine_checkbox' ) != '' || is_active_sidebar( 'sidebar-3' ) || get_theme_mod( 'footer_social_checkbox' ) != '' || get_theme_mod( 'footer_address_checkbox' ) != '' )  { ?>
	<div class="fat-footer">
	    <div class="container">
	      <div class="row">
	      	<?php if ( get_theme_mod( 'about_magazine_checkbox' ) != '' )  { ?>
		        <div class="col-md-4 col-sm-4">
		          	<div class="about">

			            <h3 class="widget-title"><?php  echo  esc_attr(  get_theme_mod( 'about_magazine_title' ) )?  esc_attr(  get_theme_mod( 'about_magazine_title' ) ): 'About Issue Magazine'  ?></h3>
			            <?php  if ( get_theme_mod( 'issue_logo' ) ) { ?>
			            	<div class="logo"><img alt="" class="img-responsive"  src="<?php echo esc_url( get_theme_mod( 'issue_logo' ) );?>"></div>
			            <?php } else if( get_theme_mod( 'logo_text' ) ) { ?>
							<div class="logo"><h4><?php echo $mim_issue_sub_title[0]; ?>&nbsp;<span><?php echo $mim_issue_sub_title[1];  ?></span></h4></div>
						<?php } else { ?>
							<div class="logo"><h4><?php _e ('Theme', 'mim-issue'); ?> <span><?php _e ('Review' , 'mim-issue'); ?> </span></h4></div>
						<?php }  ?>
			            <div class="introduction"><?php echo esc_textarea( get_theme_mod( 'about_magazine_content' ) ); ?></div>
		          	</div>
		        </div>
	        <?php } ?>

	        <!--To display footer widget contents-->
	         <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	        <div class="col-md-4 col-sm-4">
	       		<div class="tweets">
	     				<?php dynamic_sidebar( 'sidebar-3' ); ?>
	    		</div>
	        </div>
	        <?php endif; ?>

	        <div class="col-md-4 col-sm-4">
		        <?php  if ( get_theme_mod( 'footer_social_checkbox' ) != '' ) { ?>
		           <h3 class="widget-title"><?php _e( 'Follow Us' , 'mim-issue'); ?></h3>
		          <ul class="social-icons">
		          <?php
		            	if( get_theme_mod( 'twitter_url' ) )
					        echo '<li><div class="icon twitter"><a href="'.esc_url( get_theme_mod( 'twitter_url' ) ).'" target="_blank" title="'. __('Share on Twitter','mim-issue') .'"><i class="fa fa-twitter"></i></a></div></li>';

		               	if( get_theme_mod( 'facebook_url' ) )
		               		echo '<li><div class="icon facebook"><a href="'.esc_url( get_theme_mod( 'facebook_url' ) ).'" target="_blank" title="'. __('Share on Facebook','mim-issue') .'"><i class="fa fa-facebook"></i></a></div></li>';

		               	if( get_theme_mod( 'googleplus_url' ) )
		               		echo '<li><div class="icon googleplus"><a href="'.esc_url( get_theme_mod( 'googleplus_url' ) ).'" target="_blank" title="'. __('Share on Google Plus','mim-issue') .'"><i class="fa fa-google-plus"></i></a></div></li>';

		               	if( get_theme_mod( 'linkedin_url' ) )
		               		echo '<li><div class="icon linkedin"><a href="'.esc_url( get_theme_mod( 'linkedin_url' ) ).'" target="_blank" title="'. __('Share on LinkedIn','mim-issue') .'"><i class="fa fa-linkedin"></i></a></div></li>';

		               	if( get_theme_mod( 'pinterest_url' ) )
		               		echo ' <li><div class="icon pinterest"><a href="'.esc_url( get_theme_mod( 'pinterest_url' ) ).'" target="_blank" title="'. __('Link to your Pinterest profile','mim-issue') .'"><i class="fa fa-pinterest"></i></a></div></li>';

		               	if( get_theme_mod( 'blogger_url' ) )
		               		echo '<li><div class="icon rss"><a href="'.esc_url( get_theme_mod( 'blogger_url' ) ).'" target="_blank" title="'. __('Share on RSS','mim-issue'). '"><i class="fa fa-rss"></i></a></div></li>';

		               	if( get_theme_mod( 'youtube_url' ) )
		               		echo ' <li><div class="icon youtube"><a href="'.esc_url( get_theme_mod( 'youtube_url' ) ).'" target="_blank" title="'. __('Share on YouTube','mim-issue') .'"><i class="fa fa-youtube"></i></a></div></li>';

		               	if( get_theme_mod( 'flikr_url' ) )
		               		echo '<li><div class="icon flickr"><a href="'.esc_url( get_theme_mod( 'flikr_url' ) ).'" target="_blank" title="'. __('Share on Flickr','mim-issue') .'"><i class="fa fa-flickr"></i></a></div></li>';

		               	if( get_theme_mod( 'vimeo_url' ) )
		               		echo '<li><div class="icon vimeo"><a href="'.esc_url( get_theme_mod( 'vimeo_url' ) ).'" target="_blank" title="'. __('Share on Vimeo','mim-issue') .'"><i class="fa fa-vimeo-square"></i></a></div></li>';

			       ?>
		          </ul>
		          <?php } ?>

		          <?php  if ( get_theme_mod( 'footer_address_checkbox' ) != '' ) { ?>
		           		<h3 class="widget-title"><?php _e( 'Contact Us', 'mim-issue'); ?></h3>
			       		<?php if ( get_theme_mod( 'footer_address' ) != '' ) {  ?>
					          <ul class="contactus">
					            <?php echo wp_kses_post( get_theme_mod( 'footer_address' ) ); ?>
					          </ul>
		          			<?php }
		           		} ?>
	        </div>
	      </div>
	    </div>
	</div>
 <?php } ?>
	<div class="thin-footer">

	    <div class="container">
	     <?php if ( get_theme_mod( 'footer_text' ) != '' ) { ?>
	      	<span class="pull-left"><?php echo esc_textarea( get_theme_mod( 'footer_text' ) ); ?></span>
	      <?php } ?>

	        	<?php if(get_option('users_can_register') && !is_user_logged_in() ) { ?>
	        	   <ul class="pull-right">
					 <li><a href="<?php echo SITE_URL.'/wp-login.php'; ?>"><?php echo _e( 'Login', 'mim-issue');  ?></a></li>
					 <li><a href="<?php echo SITE_URL.'/register';?>"><?php echo _e( 'Register', 'mim-issue');  ?></a></li>
				   </ul>
				<?php } ?>
	    </div>

	</div>

</footer>
<!-- footer section end-->

<!-- main body section end -->
<!-- wp_footer() -->
<!-- included javascript section -->
<?php wp_footer(); ?>
</body>
</html>
