<?php
/*
	Customize Style

 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
*/




$mim_issue_style = array();
$mim_issue_style['font_heading'] = esc_attr( get_theme_mod('font_heading', 'Raleway') );
$mim_issue_style['font_content'] = esc_attr( get_theme_mod('font_content', 'Source Sans Pro') );
$mim_issue_style['bodybg_color'] = esc_attr( get_option('bodybg_color') );
$mim_issue_style['headerbg_color'] = esc_attr( get_option('headerbg_color') );
$mim_issue_style['primary_footerbg_color'] = esc_attr( get_option('primary_footerbg_color') );
$mim_issue_style['secondary_footerbg_color'] = esc_attr( get_option('secondary_footerbg_color') );
$mim_issue_style['menubg_color'] = esc_attr( get_option('menubg_color') );
$mim_issue_style['link_bg_color'] = esc_attr( get_option('link_bg_color') );
$mim_issue_style['menu_color'] = esc_attr( get_option('menu_color') );
$mim_issue_style['hover_menu_font_color'] = esc_attr( get_option('hover_menu_font_color') );
$mim_issue_style['hover_menu_bg_color'] = esc_attr( get_option('hover_menu_bg_color') );
$mim_issue_style['breadcrumb_bg_color'] = esc_attr( get_option('breadcrumb_bg_color') );
$mim_issue_style['link_color'] = esc_attr( get_option('link_color') );
$mim_issue_style['link_hover_color'] = esc_attr( get_option('link_hover_color') );
$mim_issue_style['title_font_color'] = esc_attr( get_option('title_font_color') );
$mim_issue_style['sub_title_font_color'] = esc_attr( get_option('sub_title_font_color') );
$mim_issue_style['content-title-background'] = esc_attr( get_option('content-title-background') );
$mim_issue_style['content_font_color'] = esc_attr( get_option('content_font_color') );
$mim_issue_style['post-caption-background'] = esc_attr( get_option('post-caption-background') );
//for homepage
$mim_issue_style['hp_link_color'] = esc_attr( get_option('hp_link_color') );
$mim_issue_style['hp_link_hover_color'] = esc_attr( get_option('hp_link_hover_color') );
$mim_issue_style['hp_title_font_color'] = esc_attr( get_option('hp_title_font_color') );
$mim_issue_style['hp_sub_title_font_color'] = esc_attr( get_option('hp_sub_title_font_color') );
$mim_issue_style['hp_content-title-background'] = esc_attr( get_option('hp_content-title-background') );
$mim_issue_style['hp_content_font_color'] = esc_attr( get_option('hp_content_font_color') );
$mim_issue_style['hp_post-caption-background'] = esc_attr( get_option('hp_post-caption-background') );
?>


<?php if( !empty( $mim_issue_style['font_heading'] ) ):
        wp_enqueue_style('mim_issue_font_css','//fonts.googleapis.com/css?family='.$mim_issue_style['font_heading']);
 	  endif ;

 	 if( !empty( $mim_issue_style['font_content'] ) ):
        wp_enqueue_style('mim_issue_font_content_css','//fonts.googleapis.com/css?family='.$mim_issue_style['font_content']);
      endif ; ?>

<style>

	<?php if( !empty( $mim_issue_style['bodybg_color'] ) ): ?>
	body {
		background: <?php echo $mim_issue_style['bodybg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['headerbg_color'] ) ): ?>
	header {
		background: <?php echo $mim_issue_style['headerbg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['primary_footerbg_color'] ) ): ?>
	.fat-footer {
		background: <?php echo $mim_issue_style['primary_footerbg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['secondary_footerbg_color'] ) ): ?>
	.thin-footer {
		background-color: <?php echo $mim_issue_style['secondary_footerbg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['menubg_color'] ) ): ?>
	#mainmenu, #secondarymenu, .dropdown-menu, .menu.navbar-default .navbar-toggle, .menu.navbar-default .navbar-toggle:hover, .h5-content, .category-list .issue-title {
		background-color: <?php echo $mim_issue_style['menubg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['hp_link_hover_color'] ) ): ?>
	.owl-theme .owl-controls .owl-page.active span, .owl-theme .owl-controls .owl-page:hover span {
		border-color: <?php echo $mim_issue_style['hp_link_hover_color'] ; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['menu_color'] ) ): ?>
	.menu.navbar-default .navbar-nav > li > a, .dropdown-menu > li > a, .navbar-toggle, .thin-footer span, .user-options ul li a,.thin-footer ul li a, .home .entry-content.style1 .h5-content a {
		color: <?php echo $mim_issue_style['menu_color'] ; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['menu_color'] ) ): ?>
	.menu.navbar-default .navbar-toggle .icon-bar {
		background-color: <?php echo $mim_issue_style['menu_color'] ; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['hover_menu_font_color'] ) ): ?>
	.menu.navbar-default .navbar-nav > li > a:hover, .menu.navbar-default .navbar-nav > .current_page_item > a, .menu.navbar-default .navbar-nav > .current_page_item > a:hover, .menu.navbar-default .navbar-nav > .current_page_item > a:focus, .menu.navbar-default .dropdown-menu > li > a:hover, .menu.navbar-default .navbar-nav > .open > a, .menu.navbar-default .navbar-nav > .open > a:hover, .menu.navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .user-options ul li a:hover, .thin-footer ul li a:hover, .home .entry-content.style1 .h5-content a:hover, footer .social-icons .icon a:hover, footer .social-icons .icon a {
		color: <?php echo $mim_issue_style['hover_menu_font_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['hover_menu_bg_color'] ) ): ?>
	.menu.navbar-default .navbar-nav > li > a:hover, .menu.navbar-default .navbar-nav > .current_page_item > a, .menu.navbar-default .navbar-nav > .current_page_item > a:hover, .menu.navbar-default .navbar-nav > .current_page_item > a:focus, .menu.navbar-default .navbar-nav > .open > a, .menu.navbar-default .navbar-nav > .open > a:hover, .menu.navbar-default .navbar-nav > .open > a:focus, .menu.navbar-default .dropdown-menu > li > a:hover {
		background-color: <?php echo $mim_issue_style['hover_menu_bg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['breadcrumb_bg_color'] ) ): ?>
	.breadcrumb-area {
		background: <?php echo $mim_issue_style['breadcrumb_bg_color']; ?>
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['link_color'] ) ): ?>
	.post-list li h5 a, .tweets ul li a, .social-icons .icon a, ul.contactus li a, .social-links ul li a,.widget li a, .breadcrumb li a, .post .entry-meta ul li a, .post-author .info h5 a, .contact-info .info a, .category-list a.read-more, .simple-social-icons > a, .comment-meta a,.comment-list .comment .comment-body .reply a, .caption strong, .caption h4 a, .small-thumb .thumbnail .caption h4 a, .entry-title a, .date a, .meta a  {
		color: <?php echo $mim_issue_style['link_color']; ?>
	}
	<?php endif; ?>

	/* for homepage */
	<?php if( !empty( $mim_issue_style['hp_link_color'] ) ): ?>
	.home .issue-vertical a, .home .issue-vertical p a, .home .caption h4 a, .home .small-thumb .thumbnail .caption h4 a, .home .date a, .home .entry-content.style1 a, .home .entry-title a, .home .small-thumb .thumbnail .caption .meta .date a, .home .widget li a
    {
		color: <?php echo $mim_issue_style['hp_link_color']; ?>
	}
	<?php endif; ?>
	/* for homepage end */

	<?php if( !empty( $mim_issue_style['link_hover_color'] ) ): ?>
	.issue-vertical a:hover, .issue-vertical p a:hover, .caption h4 a:hover, .date a:hover, .small-thumb .thumbnail .caption h4 a:hover, .small-thumb .thumbnail .caption .meta .date a:hover, .post-list li h5 a:hover, .entry-content.style1 a:hover, .tweets ul li a:hover, .social-icons .icon a:hover, ul.contactus li a:hover, .social-links ul li a:hover,
	.widget li a:hover, .breadcrumb li a:hover, .entry-title a:hover, .post .entry-meta ul li a:hover, .post-author .info h5 a:hover, .contact-info .info a:hover, .category-list a.read-more:hover, .simple-social-icons > a:hover, .comment-meta a:hover,.comment-list .comment .comment-body .reply a:hover, .meta a:hover
	{
		color: <?php echo $mim_issue_style['link_hover_color']; ?>
	}
    <?php endif; ?>

    /* for homepage */

    <?php if( !empty( $mim_issue_style['hp_link_hover_color'] ) ): ?>
	.home .issue-vertical a:hover, .home .issue-vertical p a:hover, .home .caption h4 a:hover, .home .date a:hover, .home .small-thumb .thumbnail .caption .meta .date a:hover, .home .small-thumb .thumbnail .caption h4 a:hover, .home .entry-title a:hover, .home .widget li a:hover
	{
		color: <?php echo $mim_issue_style['hp_link_hover_color']; ?>
	}
    <?php endif; ?>
    /* for homepage end */

    <?php if( !empty( $mim_issue_style['header_social_bg_color'] ) ): ?>
    .social-links ul li a {
        background-color: <?php echo $mim_issue_style['header_social_bg_color']; ?> !important;
		border-color: <?php echo $mim_issue_style['header_social_bg_color']; ?> !important;
    }
    <?php endif; ?>

    <?php if( !empty( $mim_issue_style['pagination_color'] ) ): ?>
    .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .comment-form input[type="submit"] {
        background-color: <?php echo $mim_issue_style['pagination_color']; ?> !important;
		border-color: <?php echo $mim_issue_style['pagination_color']; ?> !important;
    }
    <?php endif; ?>


    <?php if( !empty( $mim_issue_style['title_font_color'] ) ): ?>
	.contact-info, h1, h2, h3, h4, h5, h6, .widget-title span, .logo h4 span, footer .widget-title {
		color: <?php echo $mim_issue_style['title_font_color']; ?> !important;
	}
	<?php endif; ?>

	/* for homepage */

	 <?php if( !empty( $mim_issue_style['hp_title_font_color'] ) ): ?>
	 .banner-cont h2, .home .content .widget-title, .home .widget-title {
		color: <?php echo $mim_issue_style['hp_title_font_color']; ?> !important;
	}
	<?php endif; ?>
	/* for homepage end */

	<?php if( !empty( $mim_issue_style['sub_title_font_color'] ) ): ?>
	.widget-title span, .logo h4 span, .post-author .info h5 {
			color: <?php echo $mim_issue_style['sub_title_font_color']; ?> !important;
	}
	<?php endif; ?>


	<?php if( !empty( $mim_issue_style['sub_title_font_color'] ) ): ?>
	.widget-title::before {
		background: <?php echo $mim_issue_style['sub_title_font_color']; ?> !important;
	}
	<?php endif; ?>

	/* for homepage */

	<?php if( !empty( $mim_issue_style['hp_sub_title_font_color'] ) ): ?>
	.home .widget-title span {
			color: <?php echo $mim_issue_style['hp_sub_title_font_color']; ?> !important;
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['hp_sub_title_font_color'] ) ): ?>
	.home .content .widget-title::before, .home aside .widget-title::before {
		background: <?php echo $mim_issue_style['hp_sub_title_font_color']; ?> !important;
	}
	<?php endif; ?>
	/* for homepage end */

	<?php if( !empty( $mim_issue_style['content-title-background'] ) ): ?>
	.widget-title, .news-scroll span, .flexslider, .issue-vertical, .issue-title
		 {
		background: <?php echo get_option('content-title-background'); ?>
	}
	<?php endif; ?>


	<?php if( !empty( $mim_issue_style['content-title-background'] ) ): ?>
	.content, .widget {
		border-color: <?php echo $mim_issue_style['content-title-background']; ?>
	}
	<?php endif; ?>

	/* for homepage */
	<?php if( !empty( $mim_issue_style['hp_content-title-background'] ) ): ?>
	.home .widget-title, .flexslider, .issue-vertical, .home .issue-title
		 {
		background: <?php echo get_option('hp_content-title-background'); ?>
	}
	<?php endif; ?>


	<?php if( !empty( $mim_issue_style['hp_content-title-background'] ) ): ?>
	.home .content, .home .widget {
		border-color: <?php echo $mim_issue_style['hp_content-title-background']; ?>
	}
	<?php endif; ?>
	/* for homepage end */

	<?php if( !empty( $mim_issue_style['content_font_color'] ) ): ?>
	 .date, .copyright,.news-info .meta span, .service-container span, p, .entry-content.style1, .entry-content.style2, .entry-content.style3, footer .introduction, .tweets ul li, ul.contactus, .thin-footer, .news-scroll, .issue-title {
		color: <?php echo $mim_issue_style['content_font_color']; ?>	!important;
	}
	<?php endif; ?>

	/* for homepage */
	<?php if( !empty( $mim_issue_style['hp_content_font_color'] ) ): ?>
	 .home .issue-title, .home p, .home .date, .home .widget .textwidget {
		color: <?php echo $mim_issue_style['hp_content_font_color']; ?>	!important;
	}
	<?php endif; ?>
	/* for homepage end */

	<?php if( !empty( $mim_issue_style['post-caption-background'] ) ): ?>
	.news-scroll, .small-thumb .thumbnail .caption, .entry-content.style1
	{
		background: <?php echo $mim_issue_style['post-caption-background']; ?>	!important;
	}
	<?php endif; ?>

	/* for homepage */

	<?php if( !empty( $mim_issue_style['hp_post-caption-background'] ) ): ?>
	.banner-cont, .issue-vertical li.even, .home .small-thumb .thumbnail .caption, .home .entry-content.style1
	{
		background: <?php echo $mim_issue_style['hp_post-caption-background']; ?>	!important;
	}
	<?php endif; ?>

	/* for homepage end */
	/* typography */

	<?php if( !empty( $mim_issue_style['font_heading'] ) ): ?>
	 h1, h2, h3, h4, h5, h6, .contact-info, .issue-title, .info-title, .contact-info p b, .contact-info p strong, .navbar-toggle {
		font-family: <?php echo $mim_issue_style['font_heading']; ?> , sans-serif !important;
	}
	<?php endif; ?>

	<?php if( !empty( $mim_issue_style['font_content'] ) ): ?>
	 body, a, .ra-title, p, .error, .success, .comment-form, label, .submit, .button{
		font-family: <?php echo $mim_issue_style['font_content']; ?> , sans-serif !important;
	}
	<?php endif; ?>

	<?php $mim_issue_header_img = esc_url( get_theme_mod( 'header_bg_image' ) );
	if ( !empty($mim_issue_header_img ) ) : ?>
	header {
		background: url(<?php echo $mim_issue_header_img;  ?>) no-repeat scroll 0 0 / cover;

	}
	<?php endif; ?>

	<?php $mim_issue_footer_img = esc_url( get_theme_mod( 'footer_bg_image' ) );
	if ( !empty($mim_issue_footer_img ) ) : ?>
	.fat-footer {
		background: url(<?php echo $mim_issue_footer_img;  ?>) no-repeat scroll 0 0 / cover;
	}
	<?php endif; ?>
</style>
