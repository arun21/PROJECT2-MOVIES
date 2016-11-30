<?php
/**
* Home.php
*
* Home page file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*/
?>
<?php get_header(); ?>
<!--Begin Featured Post Slideshow-->
<section class="slideshow-area clearfix">
	<div class="slideshow-nav">
		<div class="slideshow-next"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slideshow-arrow-right.png" alt="slideshow-arrow-right" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshow-arrow-right-hover.png'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshow-arrow-right.png'" /></a></div>
		<div class="slideshow-previous"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slideshow-arrow-left.png" alt="slideshow-arrow-left" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshow-arrow-left-hover.png'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshow-arrow-left.png'" /></a></div>
		<div class="slideshow clearfix">
			<?php
				$slideshow_args = array(
					'posts_per_page' => esc_attr(get_theme_mod('nuovo-slideshow-count')),
					'category_name' => get_cat_name(esc_attr(get_theme_mod('nuovo-slideshow-category'))),
					'orderby' => 'date',
					'order' => 'DES'
				);
				$slideshow = new WP_Query($slideshow_args);
				if ($slideshow->have_posts()) : while ($slideshow->have_posts()) : $slideshow->the_post(); ?>
				<article class="slide">
					<div class="slide-photo">
						<a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'slideshow' ); ?></a>
					</div>
					<div class="slide-panel">
						<h3 class="slide-panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="slide-panel-meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?><br />
						<?php _e('Posted in: ', 'nuovo'); ?><?php _e('Posted in: ', 'nuovo'); ?><?php single_cat_title(); ?> &bull; <?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comment', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Off', 'nuovo')); ?></p>
						<hr />
						<?php the_excerpt(); ?>
					</div>
				</article>
			<?php endwhile;?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!--End Featured Post Slideshow-->
<!--Begin Home Posts Section-->
<div class="home-posts-area clearfix">
	<!--Begin First Post Section-->
	<?php if ((esc_attr(get_theme_mod('nuovo-category-one')) != '') and (esc_attr(get_theme_mod('nuovo-category-one')) != 'none')) { $cat_one = esc_attr(get_theme_mod('nuovo-category-one')); } else { $cat_one = ''; }
	if (esc_attr(get_theme_mod('nuovo-category-one-count'))) { $cat_one_count = esc_attr(get_theme_mod('nuovo-category-one-count')); } else { $cat_one_count = 3; } ?>
	<section class="first-section home-section <?php if ((esc_attr(get_theme_mod('nuovo-category-one')) != '') and (esc_attr(get_theme_mod('nuovo-category-one')) != 'none')) { echo 'category-' . nuovo_get_cat_slug($cat_one); } ?>">
		<h3 class="section-head"><?php if ((esc_attr(get_theme_mod('nuovo-category-one')) != '') and (esc_attr(get_theme_mod('nuovo-category-one')) != 'none')) { echo get_cat_name($cat_one); } ?></h3>
		<div class="section-wrap">
			<?php
				$section_one_args = array(
					'posts_per_page' => $cat_one_count,
					'category_name' => get_cat_name($cat_one),
					'orderby' => 'date',
					'order' => 'DES'
				);
				$section_one = new WP_Query($section_one_args);
				if ($section_one->have_posts()) : while ($section_one->have_posts()) : $section_one->the_post();
			?>
				<article <?php post_class('home-post'); ?>>
					<header class="post-header">
						<?php if ( nuovo_get_featured_area( $post->ID, 'archive' ) ) { ?>
							<div class="home-photo">
								<a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'archive' ); ?></a>
								<span class="comments"><p class="photo-post-details-links"><?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
							</div>
						<?php } ?>
						<h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?></p>
					</header>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; endif; ?>
		</div>
		<?php if ($cat_one != '') { ?>
			<a class="view-all" href="index.php?cat=<?php echo $cat_one; ?>"><?php _e('View All &rsaquo;&rsaquo;', 'nuovo'); ?></a>
		<?php } ?>
	</section>
	<?php if ((esc_attr(get_theme_mod('nuovo-category-two')) != '') and (esc_attr(get_theme_mod('nuovo-category-two')) != 'none')) { ?>
		<?php if ((esc_attr(get_theme_mod('nuovo-category-two')) != '') and (esc_attr(get_theme_mod('nuovo-category-two')) != 'none')) { $cat_two = esc_attr(get_theme_mod('nuovo-category-two')); } else { $cat_two = ''; }
		if (esc_attr(get_theme_mod('nuovo-category-two-count'))) { $cat_two_count = esc_attr(get_theme_mod('nuovo-category-two-count')); } else { $cat_two_count = 3; } ?>
		<section class="second-section home-section <?php echo 'category-' . nuovo_get_cat_slug($cat_two); ?>">
			<h3 class="section-head"><?php echo get_cat_name($cat_two); ?></h3>
			<div class="section-wrap">
				<?php
					$section_two_args = array(
						'posts_per_page' => $cat_two_count,
						'category_name' => get_cat_name($cat_two),
						'orderby' => 'date',
						'order' => 'DES'
					);
					$section_two = new WP_Query($section_two_args);
					if ($section_two->have_posts()) : while ($section_two->have_posts()) : $section_two->the_post();
				?>
					<article <?php post_class('home-post'); ?>>
						<header class="post-header">
							<?php if ( nuovo_get_featured_area( $post->ID, 'archive' ) ) { ?>
								<div class="home-photo">
									<a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'archive' ); ?></a>
									<span class="comments"><p class="photo-post-details-links"><?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
								</div>
							<?php } ?>
							<h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?></p>
						</header>
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; endif; ?>
			</div>
			<?php if ($cat_two != '') { ?>
				<a class="view-all" href="index.php?cat=<?php echo $cat_two; ?>"><?php _e('View All &rsaquo;&rsaquo;', 'nuovo'); ?></a>
			<?php } ?>
		</section>
	<?php } ?>
	<?php if ((esc_attr(get_theme_mod('nuovo-category-three')) != '') and (esc_attr(get_theme_mod('nuovo-category-three')) != 'none')) { ?>
		<?php if ((esc_attr(get_theme_mod('nuovo-category-three')) != '') and (esc_attr(get_theme_mod('nuovo-category-three')) != 'none')) { $cat_three = esc_attr(get_theme_mod('nuovo-category-three')); } else { $cat_three = ''; }
		if (esc_attr(get_theme_mod('nuovo-category-three-count'))) { $cat_three_count = esc_attr(get_theme_mod('nuovo-category-three-count')); } else { $cat_three_count = 3; } ?>
		<section class="third-section home-section <?php echo 'category-' . nuovo_get_cat_slug($cat_three); ?>">
			<h3 class="section-head"><?php echo get_cat_name($cat_three); ?></h3>
			<div class="section-wrap">
				<?php
					$section_three_args = array(
						'posts_per_page' => $cat_three_count,
						'category_name' => get_cat_name($cat_three),
						'orderby' => 'date',
						'order' => 'DES'
					);
					$section_three = new WP_Query($section_three_args);
					if ($section_three->have_posts()) : while ($section_three->have_posts()) : $section_three->the_post();
				?>
					<article <?php post_class('home-post'); ?>>
						<header class="post-header">
							<?php if ( nuovo_get_featured_area( $post->ID, 'archive' ) ) { ?>
								<div class="home-photo">
									<a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'archive' ); ?></a>
									<span class="comments"><p class="photo-post-details-links"><?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
								</div>
							<?php } ?>
							<h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?></p>
						</header>
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; endif; ?>
			</div>
			<?php if ($cat_three != '') { ?>
				<a class="view-all" href="index.php?cat=<?php echo $cat_three; ?>"><?php _e('View All &rsaquo;&rsaquo;', 'nuovo'); ?></a>
			<?php } ?>
		</section>
	<?php } ?>
	<?php if ((esc_attr(get_theme_mod('nuovo-category-four')) != '') and (esc_attr(get_theme_mod('nuovo-category-four')) != 'none')) { ?>
		<?php if ((esc_attr(get_theme_mod('nuovo-category-four')) != '') and (esc_attr(get_theme_mod('nuovo-category-four')) != 'none')) { $cat_four = esc_attr(get_theme_mod('nuovo-category-four')); } else { $cat_four = ''; }
		if (esc_attr(get_theme_mod('nuovo-category-four-count'))) { $cat_four_count = esc_attr(get_theme_mod('nuovo-category-four-count')); } else { $cat_four_count = 3; } ?>
		<section class="fourth-section home-section <?php echo 'category-' . nuovo_get_cat_slug($cat_four); ?>">
			<h3 class="section-head"><?php echo get_cat_name($cat_four); ?></h3>
			<div class="section-wrap">
				<?php
					$section_four_args = array(
						'posts_per_page' => $cat_four_count,
						'category_name' => get_cat_name($cat_four),
						'orderby' => 'date',
						'order' => 'DES'
					);
					$section_four = new WP_Query($section_four_args);
					if ($section_four->have_posts()) : while ($section_four->have_posts()) : $section_four->the_post();
				?>
					<article <?php post_class('home-post'); ?>>
						<header class="post-header">
							<?php if ( nuovo_get_featured_area( $post->ID, 'archive' ) ) { ?>
								<div class="home-photo">
									<a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'archive' ); ?></a>
									<span class="comments"><p class="photo-post-details-links"><?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
								</div>
							<?php } ?>
							<h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?></p>
						</header>
						<?php the_excerpt(); ?>
					</article>
				<?php endwhile; endif; ?>
			</div>
			<?php if ($cat_four != '') { ?>
				<a class="view-all" href="index.php?cat=<?php echo $cat_four; ?>"><?php _e('View All &rsaquo;&rsaquo;', 'nuovo'); ?></a>
			<?php } ?>
		</section>
	<?php } ?>
	<?php if (esc_attr(get_theme_mod('nuovo-latest-posts-count')) > 0) { ?>
		<section class="latest-posts-section home-section">
			<div class="section-wrap">
				<h3 class="latest-posts-title"><?php _e('Latest Posts', 'nuovo'); ?></h3>
				<?php
					$latest_posts_args = array(
						'posts_per_page' => esc_attr(get_theme_mod('nuovo-latest-posts-count')),
						'orderby' => 'date',
						'order' => 'DES'
					);
					$latest_posts = new WP_Query($latest_posts_args);
					if ($latest_posts->have_posts()) : while ($latest_posts->have_posts()) : $latest_posts->the_post();
				?>
					<article class="latest-posts clearfix">
						<?php if ( nuovo_get_featured_area( $post->ID, 'latest' ) ) { ?>
							<div class="latest-posts-photo"><a href="<?php the_permalink(); ?>"><?php echo nuovo_get_featured_area( $post->ID, 'archive' ); ?></a></div>
						<?php } ?>
						<div class="latest-posts-headline-area">
							<h5 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> &bull; <?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?> &bull; <?php echo date_i18n( get_option( 'date_format' ), strtotime(get_the_date())); ?> &bull; <?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comment', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Closed', 'nuovo')); ?></h5>
						</div>
					</article>
				<?php endwhile; ?>
				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
					<?php next_posts_link('<span class="next-posts">' . __('Next Posts&rsaquo;&rsaquo;', 'nuovo') . '</span>'); ?>
				<?php } ?>
				<?php endif; ?>
			</div>
		</section>
	<?php } ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
