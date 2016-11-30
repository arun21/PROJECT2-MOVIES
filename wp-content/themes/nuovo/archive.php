<?php
/**
* Archive.php
*
* Archive file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php get_header(); ?>
<main class="index clearfix">
	<?php the_post(); ?>
		<?php the_archive_title('<h1 class="title">', '</h1>'); ?>
	<?php rewind_posts(); ?>
	<?php while(have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('story clearfix'); ?>>
			<?php if ( nuovo_get_featured_area( $post->ID, 'archive' ) ) { ?>
				<div class="featured-photo-area">
					<div class="featured-photo">
						<a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'archive' ); ?></a>
						<span class="comments"><span class="photo-post-details-links"><?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
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
		<?php next_posts_link('<div class="next-posts">' . __('Older Posts&rsaquo;&rsaquo;', 'nuovo') . '</div>'); ?>
		<?php previous_posts_link('<div class="previous-posts">' . __('&lsaquo;&lsaquo;Newer Posts', 'nuovo') . '</div>'); ?>
	<?php } ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
