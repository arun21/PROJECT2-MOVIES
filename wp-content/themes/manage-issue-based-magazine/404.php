<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
*/

get_header(); ?>
<!-- 404 section -->
 <div class="container">
    <section class="about-section page-not">
      <div class="title-area">
        <div class="page-not-found text-center">
            <i class="fa fa-warning fa-2x"></i>
        	<span><?php _e( '404' , 'mim-issue' ); ?></span>
        </div>
        <p class="section-sub-text"><?php _e( 'Sorry, It appears the page you were looking for does not exist anymore or might have been moved.</br>Would you like to go to  <a href="' .site_url().  '">homepage</a> instead?' , 'mim-issue' );?></p>
     	</div>
    </section>
</div>
<!-- 404 section end -->
<?php get_footer(); ?>
