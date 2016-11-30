<?php
/**
* 404.php
*
* 404 template file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php get_header(); ?>
	<main class="post-404">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="not-found">
				<img src="<?php echo get_template_directory_uri(); ?>/images/not-found.png" width="400">
			</div>
			<div class="mobile-not-found">
				<img src="<?php echo get_template_directory_uri(); ?>/images/not-found.png" width="250">
			</div>
			<p><?php echo __('We\'re sorry, but the post or page you are looking for is not here. It may have been removed before you got here or you have a bad link. You can either go back to the ', 'nuovo') . '<a href="' . esc_url(home_url()) . '">' . __('homepage', 'nuovo') . '</a> ' . __(' or use the search form below to find another post.', 'nuovo'); ?></p>
			<?php get_search_form(); ?>
		</div><!--End Post Class-->
		<?php wp_link_pages(); ?>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
