<?php
/**
* Single.php
*
* Single post file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php get_header(); ?>
<main class="post-single">
	<?php while(have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('single-story'); ?>>
			<header class="entry-header">
				<?php if ( nuovo_get_featured_area( $post->ID, 'single-post' ) ) { ?>
					<div class="featured-photo">
						<?php echo nuovo_get_featured_area( $post->ID, 'single-post' ); ?>
					</div>
				<?php } ?>
				<h3 class="headline"><?php the_title(); ?></h3>
			</header>
			<?php echo nuovo_post_details(true); ?>
			<?php echo nuovo_get_content( $post->ID ); ?>
			<?php echo nuovo_post_details(false); ?>
			<?php if (esc_attr(get_theme_mod('nuovo-post-navigation'))) { ?>
				<?php $prevPost = get_previous_post();?>
				<?php $nextPost = get_next_post();?>
				<div class="post-pagination clearfix">
					<?php if ($prevPost) { previous_post_link( '<div class="previous-post">' . get_the_post_thumbnail($prevPost->ID) . '<h3 class="paginate-title">&laquo;&laquo; %link</h3></div>', '%title' ); } ?>
					<?php if ($nextPost) { next_post_link( '<div class="next-post">' . get_the_post_thumbnail($nextPost->ID) . '<h3 class="paginate-title">%link &raquo;&raquo;</h3></div>', '%title' ); } ?>
				</div>
			<?php } ?>
			<?php echo nuovo_author_bio(); ?>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
