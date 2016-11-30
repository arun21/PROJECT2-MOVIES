<?php
/**
* Index.php
*
* Index file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php get_header(); ?>
<main class="index clearfix">
	<?php the_post(); ?>
		<?php $page = get_query_var('paged'); ?>
		<h1 class="title"><?php _e('Page ', 'nuovo'); echo $page; ?></h1>
	<?php rewind_posts(); ?>
	<?php while(have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('story clearfix'); ?>>
			<?php if (has_post_thumbnail()) { ?>
				<div class="featured-photo-area">
					<div class="featured-photo">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('archive'); ?></a>
						<span class="comments"><span class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
					</div>
				</div>
			<?php } ?>
			<header class="entry-header">
				<h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h5 class="meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?> <?php _e('on', 'nuovo');?> <?php the_time('F j, Y'); ?>
				<?php if (is_category() == false) { ?>
					<br /><?php _e('Posted in: ', 'nuovo'); ?><?php the_category(', '); ?>
				<?php } ?>
				</h5>
			</header>
			<?php the_excerpt(); ?>
		</article>
	<?php endwhile; ?>
	<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<?php next_posts_link(__('<div class="next-posts">Older Posts&rsaquo;&rsaquo;</div>', 'nuovo')); ?>
		<?php previous_posts_link(__('<div class="previous-posts">&lsaquo;&lsaquo;Newer Posts</div>', 'nuovo')); ?>
	<?php } ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
