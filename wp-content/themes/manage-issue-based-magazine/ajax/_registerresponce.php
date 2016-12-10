<?php
add_action( 'wp_ajax_mim_issue_register_user', 'mim_issue_register_user');

add_action( 'wp_ajax_nopriv_mim_issue_register_user', 'mim_issue_register_user' );

function mim_issue_register_user() {

    $nonce = $_POST['registernonce'];

	if ( ! wp_verify_nonce( $nonce, 'signup-nonce' ) )
	{
	    // This nonce is not valid.
	    die( 'Security check' );
	}
	else
	{
      header('Content-type: application/json');
      header('Access-Control-Allow-Origin: *');

      require_once(ABSPATH . WPINC . '/user.php');

      if(empty($_POST['user_email']) || empty($_POST['user_login']) || empty($_POST['user_password']) || empty($_POST['user_password_repeat'])) {
	  	$messages[]=__( 'Please fill in all fields.', 'mim-issue' );
	  }
	  else {
			if(!is_email($_POST['user_email'])) {
				$messages[]=__('Invalid email address', 'mim-issue');
			} else if(email_exists($_POST['user_email'])) {
			   $messages[]=__('This email is already in use', 'mim-issue');
			}

			if(!validate_username($_POST['user_login']) || is_email($_POST['user_login']) || preg_match('/\s/', $_POST['user_login'])) {
				$messages[]=__('Invalid character used in username', 'mim-issue');
			} else	if(username_exists($_POST['user_login'])) {
				$messages[]=__('This username is already taken', 'mim-issue');
			}

			if(strlen($_POST['user_password'])<4) {
				$messages[]=__('Password must be at least 4 characters long', 'mim-issue');
			} else if(strlen($_POST['user_password'])>16) {
				$messages[]=__('Password must be not more than 16 characters long', 'mim-issue');
			} else if(preg_match("/^([a-zA-Z0-9]{1,20})$/", $_POST['user_password'])==0) {
				$messages[]=__('Password contains invalid characters', 'mim-issue');
			} else if($_POST['user_password']!=$_POST['user_password_repeat']) {
				$messages[]=__('Passwords do not match', 'mim-issue');
			}
	 }

	 if( empty( $messages ) ){
	   $user=wp_create_user($_POST['user_login'], $_POST['user_password'], $_POST['user_email']);
	   $admin_email = get_option( 'admin_email' );

       if ( empty( $admin_email ) )
         $admin_email = '';

       $headers = "MIME-Version: 1.0\n";
	   $headers .= "Content-type: text/html; charset=UTF-8\n";

       $messages[]=__('Registration complete! Check your mailbox', 'mim-issue');

	   //$message= __('Dear,' .$_POST['user_login'].'! Welcome to '.get_bloginfo('name').'. ');

	   $message= 'Dear,' .$_POST['user_login'].',<br/><br/> ';
	   $message .= __('Welcome to ' .get_bloginfo('name').'! To log in when visiting our site just click Login at the top of every page, and then enter your username and password. <br/><br/>');
	   $message .= __('For your reference, here are the credentials you have provided during the registration process. Please use them when prompted to log in: <br/><br/> ', 'mim-issue');
	   $message .= __('<Strong>Your Credentials</strong> <br/><br/> ', 'mim-issue');
	   $message .= '<Strong>Login      :</strong>' .$_POST['user_login'].' <br/><br/> ';
	   $message .= '<Strong>Password   :</strong>' .$_POST['user_password'].' <br/><br/> ';

	   $subject=__(get_bloginfo('name').' Registration Details.', 'mim-issue');
	   $adminsubject=__('New User Registration Details', 'mim-issue');

	   $adminmessage=__('Hi This Below User Is Requested to Our Site '.get_bloginfo('name').'.<br/><br/> ');
	   $adminmessage .='<strong>Username : </strong>'.$_POST['user_login']."<br/><br/>";
	   $adminmessage .='<strong>Email : </strong>'.$_POST['user_email']."<br/><br/>";

	   wp_mail($_POST['user_email'], $subject, $message, $headers);
	   wp_mail($admin_email, $adminsubject, $adminmessage, $headers);

	 }

	echo json_encode($messages);

	die();
  }
}
?>
