<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
   <title><?php wp_title( '' , true, 'right' );?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="keywords" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="<?php bloginfo('name'); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
// If request was not set then get Current Issue from issue plugin settings Page
if( empty( $_SESSION['Current_Issue'] ) )
{
     $mim_issue_current_issue = do_shortcode('[MIM_Current_Issue]');
     if( !empty ( $mim_issue_current_issue ) && $mim_issue_current_issue > 0 )
 	  $_SESSION['Current_Issue'] = $mim_issue_current_issue;
}

if( !empty ( $_REQUEST['issue'] ) && $_REQUEST['issue'] > 0 )
   $_SESSION['Current_Issue'] = $_REQUEST['issue'];

global $mim_issue_slider;
$mim_issue_slider = true;

get_template_part( 'libs/header', 'top-area' );

if( get_post_type()=='page' && is_front_page() ) {
  get_template_part( 'libs/header', 'slider' ) ;
  $mim_issue_slider = false;
}
?>
