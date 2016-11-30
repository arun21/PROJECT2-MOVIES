<?php
/**
* Header.php
*
* Header file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<!DOCTYPE html <?php language_attributes(); ?>>
<html>
<head>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php echo nuovo_menu_containers(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php if (esc_attr(get_theme_mod('nuovo-top-menu')) == 1) { ?>
		<!--Begin Top Menu-->
		<nav class="top-menu nuovo-menu clearfix" role="navigation">
			<?php wp_nav_menu(
				array(
					'sort_column' => 'menu_order',
					'theme_location' => 'top-menu'
				)
			); ?>
		</nav>
		<!--End Top Menu-->
	<?php } ?>
	<!--Begin Header-->
	<header class="header-area clearfix">
		<!--Begin Masthead-->
		<?php echo nuovo_header(); ?>
		<!--End Masthead-->
	</header>
	<!--Begin Main Menu-->
	<nav class="main-menu nuovo-menu clearfix" role="navigation">
		<?php wp_nav_menu(
			array(
				'sort_column' => 'menu_order',
				'theme_location' => 'main-menu'
			)
		); ?>
	</nav>
	<div class="mobile-nav-area">
		<a href="#" class="hide-show-mobile-nav">
			<div class="mobile-nav-bar">
				<div class="mobile-nav-icon"><img src="<?php echo get_template_directory_uri() . '/images/mobile-nav-icon.png'; ?>" /></div>
				<h5><?php _e('Go to...', 'nuovo'); ?></h5>
			</div>
		</a>
		<nav class="mobile-nav clearfix" role="navigation">
			<?php if (esc_attr(get_theme_mod('nuovo-top-menu')) == 1) { ?>
				<div class="mobile-nav-left">
					<?php wp_nav_menu(
						array(
							'sort_column' => 'menu_order',
							'theme_location' => 'top-menu'
						)
					); ?>
				</div>
			<?php } ?>
			<div class="mobile-nav-right">
				<?php wp_nav_menu(
					array(
						'sort_column' => 'menu_order',
						'theme_location' => 'main-menu'
					)
				); ?>
			</div>
		</nav>
	</div>
	<!--End Main Menu-->
	<!--Begin Wrap-->
	<div class="wrap clearfix">
