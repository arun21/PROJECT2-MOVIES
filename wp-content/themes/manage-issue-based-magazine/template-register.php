<?php
/**
 * Template Name: Register
 * Description: The template for register to user
 *
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

get_header();

global $wp_query;

$mim_issue_registration_page_id = $wp_query->get_queried_object_id();

// Set page layout
switch ( get_post_meta($mim_issue_registration_page_id, 'Layout', true) ) {

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
   ?>
   <div class="content register-form clearfix">
     <h3 class="widget-title"><?php _e('Registration ','mim-issue');?><span><?php _e('Page','mim-issue');?></span></h3>
     <?php while ( have_posts() ) : the_post(); ?>
		<div class="latest-post cms-section">
		<p><?php the_content();?></p>
        </div>
	 <?php endwhile; ?>
	 <?php if( get_option('users_can_register') ) { ?>
      <div id="result"></div>
       <div class="comment-form">
	     <form method="post" id="mim_issue_signup" name="mim_issue_signup">
                <div class="col-sm-6">
                  <div class="form-group"> <span class="form-icon"><i class="fa fa-user"></i></span>
                    <input type="text" name="user_login" placeholder="<?php _e( 'Username *','mim-issue' ); ?>" class="form-with-icon">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group"> <span class="form-icon"><i class="fa fa-envelope"></i></span>
                    <input type="text" name="user_email" placeholder="<?php _e('Email *','mim-issue'); ?>" class="form-with-icon">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group"> <span class="form-icon"><i class="fa fa-key"></i></span>
                    <input type="password" name="user_password" placeholder="<?php _e( 'Password *','mim-issue' ); ?>" class="form-with-icon">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group"> <span class="form-icon"><i class="fa fa-key"></i></span>
                    <input type="password" name="user_password_repeat" placeholder="<?php _e('Repeat Password *','mim-issue'); ?>" class="form-with-icon">
                  </div>
                </div>
                <div class="col-sm-6">
                  <input type="submit" id="submitbtn" class="button" name="submit" value="<?php _e('Register','mim-issue'); ?>" />
                  <img src="<?php echo MIM_ISSUE_THEME_URI. '/images/loader.gif';?>" class="loader" alt="<?php _e('Loading..','mim-issue'); ?>"/>
                </div>
                <input type="hidden" name="registernonce" class="nonce" value="<?php echo wp_create_nonce('signup-nonce'); ?>" />
		        <input type="hidden" name="action" class="action" value="mim_issue_register_user" />
         </form>
         <script type="text/javascript">
        	var Ajax_Url = "<?php echo home_url(); ?>/wp-admin/admin-ajax.php";
        </script>
       </div>
       <?php } ?>
     </div>
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
