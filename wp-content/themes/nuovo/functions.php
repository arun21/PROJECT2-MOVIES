<?php
/**
* Functions.php
*
* This is the functions.php file. Custom functions referenced in the theme templates are defined here.
*
* @author Jacob Martella
* @package Nuovo
* @version 2.3
*
* Table of Contents
* I. Theme Setup Functions
* II. Header Functions
* III. Single Post Functions
* IV. Archive Functions
* V. Comments Functions
* VI. Author Functions
* VII. Other Functions
*/
/**
* I. Theme Setup Functions
*/
//* Setup the theme after installation and activation
function nuovo_setup() {
	//* Add support and Register the Two Menus
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu', 'nuovo' ),
			'main-menu' => __( 'Main Menu', 'nuovo' )
		)
	);

	//* Add Support for Custom Background
	$custom_background_args = array(
		'default-color' => '000000',
	);
	add_theme_support( 'custom-background', $custom_background_args );

	//* Add Support for Custom Header
	$args = array(
		'flex-width' 	=> true,
		'width'	=> 530,
		'flex-height'	=> true,
		'height'	=> 150,
		'default-image' => '',
		'default-text-color'     => '777777',
		'upload'	=> true,
	);
	add_theme_support('custom-header', $args);

	//* Add Support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'post' ) );

	//* Add Image Sizes
	add_image_size('single-post', 630, 315);
	add_image_size('archive', 630, 315);
	add_image_size('slideshow', 630, 315);
	add_image_size('latest', 120, 60);

	//* Add support for editor styles
	add_editor_style();

	//* Add Support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	//* Add in the text domain
	load_theme_textdomain('nuovo', get_template_directory() . '/languages');

	//* Add support for title tag
	add_theme_support('title-tag');

	//* Add Support for Post Formats
	add_theme_support(
		'post-formats', array(
			'image',
			'video'
		)
	);

}
add_action('after_setup_theme', 'nuovo_setup');

//* Set the Maximum Content Width
if ( ! isset( $content_width ) )
 $content_width = 640;

//* Register the sidebar
function nuovo_sidebar() {
	register_sidebar(array(
		'name'=> __('Sidebar', 'nuovo'),
		'id' => 'sidebar-1',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget' => '</p> </div>',
		'before_title' => '<div class="widget-title-bg"><h3 class="widget-title">',
		'after_title' => '</h3></div><p class="widget-body">'
	));
}
add_action('widgets_init', 'nuovo_sidebar');

//* Load the theme options
require_once(get_template_directory() . '/admin/theme-options.php');

/**
* Returns a custom read more link when the_excerpt() is used. This function is used in conjunction with the excerpt_more WordPress hook.
*
* @return string, the text to be displayed for the read more link
*/
function nuovo_read_more($more) {
	return '...<div class="read-more"><a href="' . get_the_permalink(get_the_ID()) . '">' . __('Continue Reading&rsaquo;&rsaquo;', 'nuovo') . '</a></div>';
}
add_action('excerpt_more', 'nuovo_read_more');

/**
* Returns a custom length for the post excerpt
*
* @return int, length of excerpt
*/
function nuovo_custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'nuovo_custom_excerpt_length', 999 );

//* Enqueue the scripts for the theme
function nuovo_scripts() {
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('nuovo-cycle', get_template_directory_uri() . '/js/nuovo-cycle.js');
	if (is_home()) {
		wp_enqueue_script( 'nuovo-home-scripts', get_template_directory_uri() . '/js/nuovo-slider.js' );
	}
	wp_enqueue_script( 'nuovo-main-menu', get_template_directory_uri() . '/js/nuovo-menu.js' );
	wp_enqueue_style( 'nuovo-styesheet', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'nuovo-tablet-styesheet', get_template_directory_uri() . '/css/tablet.css' );
	wp_enqueue_style( 'nuovo-mobile-styesheet', get_template_directory_uri() . '/css/mobile.css' );
	$color = esc_attr(get_theme_mod('nuovo-color-theme'));
	if ($color != '') {
		if (get_theme_mod('nuovo-color-theme') != 'default') {
			wp_enqueue_style('nuovo-'. $color, get_template_directory_uri() . '/css/nuovo-' . $color . '.css');
		}
	}
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('nuovo-pt-sans-narrow', '//fonts.googleapis.com/css?family=PT+Sans+Narrow:700&subset=cyrillic,latin');
	wp_enqueue_style('nuovo-lato', '//fonts.googleapis.com/css?family=Lato:100,300,400,700');
  	wp_enqueue_style('nuovo-oswald', '//fonts.googleapis.com/css?family=Oswald:400,700,300');
  	wp_enqueue_style('nuovo-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,700');
  	wp_enqueue_style('nuovo-source-sans', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700');
}
add_action( 'wp_enqueue_scripts', 'nuovo_scripts' );

/**
* Returns the slug for a given category
*
* @param int, category id
* @return string, category slug
*/
function nuovo_get_cat_slug($cat_id) {
    $cat_id = (int)$cat_id;
    $category = get_category($cat_id);
    return $category->slug;
}
/**
* II. Header Functions
*/
/**
* Returns the HTML to make sure the menu containers display correctly.
*
* @return string, HTML to control the menu containers
*/
function nuovo_menu_containers() {
  $menus = wp_get_nav_menus();
  $output = '';
  foreach ($menus as $menu){
    $name = strtolower($menu->name);
    $name = str_replace(" ", "-", $name);
    $output .= '<style type="text/css">.top-menu .menu-' . $name . '-container, .main-menu .menu-' . $name . '-container{width: 980px;margin: auto;} @media only screen and (max-width: 979px) and (min-width: 700px) {.top-menu .menu-' . $name . '-container, .main-menu .menu-' . $name . '-container{width: 700px;margin: auto;min-height:39px;max-height:78px;}} @media only screen and (max-width: 699px) and (min-width: 650px) {.top-menu .menu-' . $name . '-container, .main-menu .menu-' . $name . '-container{width: 650px;margin: auto;clear:both;}} @media only screen and (max-width: 320px) { mobile-main-menu .menu-' . $name . '-container{width: 100%;margin: auto;min-height:39px;max-height:78px;}}</style>';
  }
  return $output;
}

/**
* Returns the HTML for the masthead
*
* @return string, HTML for the masthead
*/
function nuovo_header() {
	$html = '<section class="header">';
	$html .= '<div class="masthead">';
	if(get_header_image()) {
		$html .= '<a href="' . esc_url(get_home_url()) . '"><img src="' . get_header_image() . '" height="' .   get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="" /></a>';
	} else {
		$html .= '<h1 class="site-title"><a href="' . esc_url(get_home_url()) . '">' . get_bloginfo('name') . '</a></h1>';
		$html .= '<h2 class="site-description"><a href="' . esc_url(get_home_url()) . '">' .  get_bloginfo('description') . '</a></h2>';
	}
	$html .= '</div>';
	$html .= nuovo_social_media_links();
  	$html .= '</section>';
	return $html;
}

/**
* Returns a special class to break the linke
*
* @param int, the count of how many links are active
* @return string, the break-line class if needed
*/
function nuovo_social_next_line($count) {
	$links = array('nuovo-facebook', 'nuovo-twitter', 'nuovo-googleplus', 'nuovo-youtube', 'nuovo-linkedin', 'nuovo-instagram', 'nuovo-tumblr', 'nuovo-pinterest');
	$num_links = 1;
	foreach ($links as $link) {
		if (esc_attr(get_theme_mod($link)) != '') {
			$num_links = $num_links + 1;
		}
	}
	if ($count == (intval($num_links / 2)) + 1) {
		$class = 'social-break';
	} else {
		$class = '';
	}
	return $class;
}

/**
* Returns social links and images based on theme options
*
* Goes through the social media theme options and adds an image and a link to that social media site if there is an option value for it
* @return string, the images and links for each social media site
*/
function nuovo_social_media_links() {
  $html = '';
  $count = 0;
  $html = '<div class="social-links">';
  if (esc_attr(get_theme_mod('nuovo-facebook')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="facebook-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-facebook')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/facebook.png" width="60px" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-twitter')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="twitter-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-twitter')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/twitter.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-googleplus')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="google-plus-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-googleplus')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/googleplus.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-youtube')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="youtube-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-youtube')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/youtube.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-linkedin')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="linkedin-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-linkedin')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/linkedin.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-instagram')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="instagram-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-instagram')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/instagram.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-tumblr')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="tumblr-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-tumblr')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/tumblr.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-pinterest')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="pinterest-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-pinterest')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/pinterest.png" width="60" /></a></div>';
  }
  if (esc_attr(get_theme_mod('nuovo-rss-feed')) != '') {
  	$count = $count + 1;
  	$html .= '<div class="rss-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . esc_attr(get_theme_mod('nuovo-rss-feed')) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/rss.png" width="60" /></a></div>';
  } else {
  	$count = $count + 1;
    $html .= '<div class="rss-social nuovo-social-link ' . nuovo_social_next_line($count) . '"><a href="' . get_feed_link( 'rss' ) . '" target="_blank"><img src="' . get_template_directory_uri() . '/images/rss.png" width="60" /></a></div>';
  }
  $html .= '</div>';
  return $html;
}
/**
* III. Single Post Functions
*/
/**
* Returns the HTML string for the story details based off of the parameter for normal style or mobile
*
* @param boolean, true if normal, false if mobile
* @return string, HTML for the post details
*/
function nuovo_post_details($placement) {
	$html = '';
	//* Check to see if the it's the normal details section or the mobile section
	if ($placement == true) {
		$class = 'post-meta clearfix';
	} else {
		$class = 'mobile-post-meta clearfix';
	}
	//* Get the number of comments
	$num_comments = get_comments_number(get_the_ID());
	if ($num_comments == 0) {
		$comments = __('0 Comments', 'nuovo');
	} elseif ($num_comments == 1) {
		$comments = __('1 Comment', 'nuovo');
	} else {
		$comments = $num_comments . __(' Comments', 'nuovo');
	}
	if (comments_open() == false) {
		$comments = __('Comments Off', 'nuovo');
	}
	//* Get the tags
	$tags = get_the_tags();
	$tags_section = '';
	if ($tags) {
		foreach($tags as $tag) {
			$tags_section .= $tag->name . '<br />';
		}
	}
	rtrim($tags_section, '<br />');
	//* Put the HTML string together
	$html .= '<aside class=' . $class . '>';
	$html .= '<div class="row"><h5 class="text">' . date_i18n( get_option( 'date_format' ), strtotime(get_the_date())) . '</h5></div>';
	$html .= '<div class="row"><h5 class="text">' . __('Written By: ', 'nuovo') . get_the_author_link() . '</h5></div>';
	$html .= '<div class="row"><h5 class="text">' . $comments . '</h5></div>';
	$html .= '<div class="row"><h5 class="text"> ' . get_the_category_list(', ') . '</h5></div>';
	$html .= '<div class="row"><h5 class="text">' . __('Tags: ', 'nuovo') . '<br />' . $tags_section . '</h5></div>';
	$html .= '</aside>';

	return $html;
}
/**
* IV. Archive Functions
*/
/**
* Returns the custom output for the archive page titles using the get_the_archive_title filter.
*
* @return string, HTML for archive page title
*/
function nuovo_archive_title($title) {
  if (is_day()) {
    $title = __('Archives for ', 'nuovo') . get_the_time('F j, Y');
  }
  else if (is_month()) {
    $title = __('Archives for ', 'nuovo') . get_the_time('F Y');
  }
  else if (is_year()) {
    $title = __('Archives for ', 'nuovo') . get_the_time('Y');
  }
  else if (is_category()) {
    $title = single_cat_title('', false);
  }
  else if (is_search()) {
    $title = __('Search results for ', 'nuovo') . get_search_query();
  }
  else if (is_tag()) {
    $title = single_tag_title('', false);
  }
  else {
    $page = get_query_var('paged');
    $title = __('Page ', 'nuovo') . $page;
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'nuovo_archive_title');
/**
 * Returns the text of the post without the first embedded video, which has already been pulled out for display.
 *
 * @param $post_id
 * @return string, the content without the first embedded video
 */
function nuovo_get_content($post_id) {

	$post = get_post($post_id);
	$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
	$embeds = get_media_embedded_in_content( $content );

	if ( has_post_format( 'image' ) ) {
		$content = preg_replace( "/<img[^>]+\>/i", "", $content, 1 );
		return $content;
	} elseif ( has_post_format( 'video' ) ) {
		if ( ! empty( $embeds ) ) {
			//check what is the first embed containg video tag, youtube or vimeo
			foreach ( $embeds as $embed ) {
				if ( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
					$content = str_replace( $embed, "", $content );
					return $content;
				}
			}

		} else {
			//No video embedded found
			return $content;
		}
	} else {
		return $content;
	}

}
/**
 * Returns the first video embed in a post for display
 *
 * @param int, post id
 * @return string, link for first embeded video
 */
function nuovo_get_first_embed_media($post_id) {

	$post = get_post($post_id);
	$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
	$embeds = get_media_embedded_in_content( $content );

	if( !empty($embeds) ) {
		//check what is the first embed containg video tag, youtube or vimeo
		foreach( $embeds as $embed ) {
			if( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) ) {
				return $embed;
			}
		}

	} else {
		//No video embedded found
		return false;
	}

}
function nuovo_get_featured_area( $post_id, $size ) {
	$html = '';

	if ( has_post_format( 'image' ) ) {
		if ( has_post_thumbnail() ) {
			$html .= get_the_post_thumbnail( get_the_ID(), $size );
		} else {
			$media = get_attached_media( 'image', get_the_ID() );
			foreach ( $media as $image ) {
				$html .= '<img src="' . esc_url( $image->guid ) . '" />';
				break;
			}
		}
	} elseif ( has_post_format( 'video' ) ) {
		$html .= nuovo_get_first_embed_media( get_the_ID() );
	} else {
		if ( has_post_thumbnail() ) {
			$html .= get_the_post_thumbnail( get_the_ID(), $size );
		}
	}

	return $html;
}
/**
* V. Comments Functions
*/
/**
* Sets up the custom comments template
*/
function nuovo_advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='75'); ?>
       <div class="comment-meta"<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s', 'nuovo'), get_comment_author_link()) ?></a></div>
       <small><?php printf(__('%1$s at %2$s', 'nuovo'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)', 'nuovo'),'  ','') ?></small>
     </div>
     <div class="clear"></div>

     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.', 'nuovo') ?></em>
       <br />
     <?php endif; ?>

     <div class="comment-text">
         <?php comment_text() ?>
     </div>

   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	   <?php nuovo_delete_comment_link(get_comment_ID()); ?>
   </div>
   <div class="clear"></div>
</li>
<?php }
function nuovo_delete_comment_link($id) {
  if (current_user_can('edit_posts')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">' . __('del', 'nuovo') .' </a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">' . __('spam', 'nuovo') . '</a>';
  }
}
/**
* VI. Author Functions
*/
/**
* Returns the HTML for the author bio area
*
* @return string, HTML for the author bio area
*/
function nuovo_author_bio() {
	$html = '<section class="author-bio clearfix">';
	if (get_avatar(get_the_author_meta('email'))) {
		$html .= '<div class="mug-shot">' . get_avatar(get_the_author_meta('email'), $size = 96) . '</div>';
	}
	$html .= '<h3 class="title">' . __('About ', 'nuovo') . get_the_author_meta('display_name') . '</h3>';
	$html .= '<p class="bio">' . get_the_author_meta('description') . '</p>';
	$html .= '</section>';
	return $html;
}
/**
* VII. Other Functions
*/
/**
* Returns the location of the custom index template
*
* @return string, path to custom index template
*/
function nuovo_change_page_two( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('index.php'));
    }
    return $template;
}
add_action('template_include','nuovo_change_page_two');
?>
