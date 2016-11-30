<?php
/**
* Page.php
*
* Page template file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php get_header(); ?>
	<main class="page-single">
		<?php while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php comments_template(); ?>
			</div>
			<?php wp_link_pages(); ?>
		<?php endwhile; ?>
	</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
