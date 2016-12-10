<?php
/**
 * Customizer functionality
 *
 * @package Manage Issue Based Magazine
 * @author PurpleMAD
 * @link http://www.purplemad.ca/
 * @copyright Copyright (C) 2015  PurpleMAD
 * @license http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 */

function mim_issue_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here
   $wp_customize->remove_section('title_tagline');



/**----------------------------------------------------------------
*
* Colors Section (for whole site except homepage)
*
-------------------------------------------------------------------*/

$mim_issue_colors = array();

$mim_issue_colors[] = array(
  'slug'=>'bodybg_color',
  'default' => '#ffffff',
  'label' => __('Body Background Color', 'mim-issue'),

);

$mim_issue_colors[] = array(
  'slug'=>'headerbg_color',
  'default' => '#222',
  'label' => __('Header Background Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'primary_footerbg_color',
  'default' => '#222',
  'label' => __('Primary Footer Background Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'secondary_footerbg_color',
  'default' => '#e84855',
  'label' => __('Secondary Footer Background Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'menubg_color',
  'default' => '#e84855',
  'label' => __('Menu Background Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'menu_color',
  'default' => '#ffffff',
  'label' => __('Menu Font Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'hover_menu_font_color',
  'default' => '#ffffff',
  'label' => __('Hover Menu Font Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'hover_menu_bg_color',
  'default' => '#222',
  'label' => __('Hover Menu Background  Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'breadcrumb_bg_color',
  'default' => '#222',
  'label' => __('Breadcrumb Background Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'link_color',
  'default' => '#a8a8a8',
  'label' => __('Link Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'link_hover_color',
  'default' => '#e84855',
  'label' => __('Link Hover Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'header_social_bg_color',
  'default' => '#fff',
  'label' => __('Header Social Background Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'pagination_color',
  'default' => '#222',
  'label' => __('Pagination Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'title_font_color',
  'default' => '#ffffff',
  'label' => __('Heading Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'sub_title_font_color',
  'default' => '#e84855',
  'label' => __('Sub Heading Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'content-title-background',
  'default' => '#222',
  'label' => __('Content Title Background Color', 'mim-issue')
);


$mim_issue_colors[] = array(
  'slug'=>'content_font_color',
  'default' => '#a8a8a8',
  'label' => __('Content Color', 'mim-issue')
);

$mim_issue_colors[] = array(
  'slug'=>'post-caption-background',
  'default' => '#333',
  'label' => __('Post Caption Background Color', 'mim-issue')

);

$wp_customize->add_section( 'colors', array(
	'title' => __( 'Theme Colors', 'mim-issue' ),
	'priority' => 3,
) );

foreach( $mim_issue_colors as $mim_issue_color ) {

  $wp_customize->add_setting(
    $mim_issue_color['slug'], array(
      'default' => $mim_issue_color['default'],
      'sanitize_callback' => 'sanitize_hex_color',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      $mim_issue_color['slug'],
      array('label' => $mim_issue_color['label'],
      'section' => 'colors',
      'settings' => $mim_issue_color['slug'])
    )
  );
}

$wp_customize->add_setting( 'header_bg_image',
	    array ( 'default' => '',
	    'sanitize_callback' => 'esc_url_raw'
	 ));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_bg_image', array(
    'label'    => __( 'Header Background Image', 'mim-issue' ),
    'description' => __ ('Set header background image. If set, it will overwrite header background color in theme colors.', 'mim-issue'),
    'section'  => 'colors',
    'settings' => 'header_bg_image',
) ) );

$wp_customize->add_setting( 'footer_bg_image',
	    array ( 'default' => '',
	    'sanitize_callback' => 'esc_url_raw'
	 ));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
    'label'    => __( 'Footer Background Image', 'mim-issue' ),
    'description' => __ ('Set footer background image. If set, it will overwrite footer background color in theme colors.', 'mim-issue'),
    'section'  => 'colors',
    'settings' => 'footer_bg_image',
) ) );

/**----------------------------------------------------------------
*
* Colors Section (for homepage)
*
-------------------------------------------------------------------*/

$mim_issue_hp_colors = array();

$mim_issue_hp_colors[] = array(
  'slug'=>'hp_link_color',
  'default' => '#a8a8a8',
  'label' => __('Link Color', 'mim-issue')
);

$mim_issue_hp_colors[] = array(
  'slug'=>'hp_link_hover_color',
  'default' => '#e84855',
  'label' => __('Link Hover Color', 'mim-issue')
);


$mim_issue_hp_colors[] = array(
  'slug'=>'hp_title_font_color',
  'default' => '#ffffff',
  'label' => __('Heading Color', 'mim-issue')
);

$mim_issue_hp_colors[] = array(
  'slug'=>'hp_sub_title_font_color',
  'default' => '#e84855',
  'label' => __('Sub Heading Color', 'mim-issue')
);

$mim_issue_hp_colors[] = array(
  'slug'=>'hp_content-title-background',
  'default' => '#222',
  'label' => __('Content Title Background Color', 'mim-issue')
);


$mim_issue_hp_colors[] = array(
  'slug'=>'hp_content_font_color',
  'default' => '#a8a8a8',
  'label' => __('Content Color', 'mim-issue')
);

$mim_issue_hp_colors[] = array(
  'slug'=>'hp_post-caption-background',
  'default' => '#333',
  'label' => __('Post Caption Background Color', 'mim-issue')

);

$wp_customize->add_section( 'hp_colors', array(
	'title' => __( 'Homepage Colors', 'mim-issue' ),
	'priority' => 3,
) );

foreach( $mim_issue_hp_colors as $mim_issue_hp_color ) {

  $wp_customize->add_setting(
    $mim_issue_hp_color['slug'], array(
      'default' => $mim_issue_hp_color['default'],
      'sanitize_callback' => 'sanitize_hex_color',
      'type' => 'option',
      'capability' => 'edit_theme_options'
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      $mim_issue_hp_color['slug'],
      array('label' => $mim_issue_hp_color['label'],
      'section' => 'hp_colors',
      'settings' => $mim_issue_hp_color['slug'])
    )
  );
}

/**----------------------------------------------------------------
*
* Logo and Favicon Section
*
-------------------------------------------------------------------*/
	$wp_customize->add_section( 'logo_favicon_section' , array(
    'title'       => __( 'Logo & Favicon', 'mim-issue' ),
    'description' => __( 'Upload a Logo and a Favicon to be displayed in your theme', 'mim-issue' ),
    'priority' => 2
) );

	$wp_customize->add_setting( 'logo_text', array(
	 'default' => '',
	 'sanitize_callback' => 'mim_issue_sanitize_textarea',
	 'capability' => 'edit_theme_options'
	 ) );
	$wp_customize->add_control( 'logo_text', array(
	 'label' => __( 'Brand Name','mim-issue' ),
	 'section' => 'logo_favicon_section',
	 'type' => 'text'
	 ) );


	$wp_customize->add_setting( 'issue_logo',
	    array ( 'default' => '',
	    'sanitize_callback' => 'esc_url_raw'
	 ));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'issue_logo', array(
    'label'    => __( 'Logo', 'mim-issue' ),
    'section'  => 'logo_favicon_section',
    'settings' => 'issue_logo',
) ) );


    $wp_customize->add_setting( 'issue_favicon',
        array ( 'default' => '',
	    'sanitize_callback' => 'esc_url_raw'
    ));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'issue_favicon', array(
    'label'    => __( 'Favicon', 'mim-issue' ),
    'section'  => 'logo_favicon_section',
    'settings' => 'issue_favicon',
) ) );


/**----------------------------------------------------------------
*
* Typography Section
*
-------------------------------------------------------------------*/

$wp_customize->add_section( 'font' , array(
    'title'      => __('Typography', 'mim-issue'),
    'priority'   => 3,
));


$wp_customize->add_setting( 'font_heading', array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'mim_issue_sanitize_font_scheme',
	) );

	$wp_customize->add_control( 'font_heading', array(
		'label'    => __( 'Heading Font', 'mim-issue' ),
		'section'  => 'font',
		'type'     => 'select',
		'choices'  => mim_issue_get_font_scheme_choices(),
	) );



$wp_customize->add_setting( 'font_content', array(
		'default'           => 'Source Sans Pro',
		'sanitize_callback' => 'mim_issue_sanitize_font_scheme',
	) );

	$wp_customize->add_control( 'font_content', array(
		'label'    => __( 'Content Font', 'mim-issue' ),
		'section'  => 'font',
		'type'     => 'select',
		'choices'  => mim_issue_get_font_scheme_choices(),
	) );



/**--------------------------------------------------------------------
*
* General
*
-----------------------------------------------------------------------*/

$wp_customize->add_section( 'general_section' , array(
    'title'       => __( 'General', 'mim-issue' ),
    'description' => __ ('Set general settings from here.', 'mim-issue'),
    'priority' => 4
) );


$wp_customize->add_setting( 'hide_breadcrumbs_from_bar',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
     ));

$wp_customize->add_control( 'hide_breadcrumbs_from_bar', array(
    'type' => 'checkbox',
    'label' => __ ( 'Hide Breadcrumbs','mim-issue'),
    'section' => 'general_section',
    'description' => __ ('Check this to hide breadcrumbs', 'mim-issue'),
));


$wp_customize->add_setting( 'hide_comments',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
     ));

$wp_customize->add_control( 'hide_comments', array(
    'type' => 'checkbox',
    'label' => __('Hide Comments', 'mim-issue'),
    'section' => 'general_section',
    'description' => __ ('Check this to hide WordPress commenting system', 'mim-issue'),
));

$wp_customize->add_setting( 'hide_author_bio',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
     ));

$wp_customize->add_control( 'hide_author_bio', array(
    'type' => 'checkbox',
    'label' => __ ('Hide Author Bio','mim-issue'),
    'section' => 'general_section',
    'description' => __ ('Check this to hide author biography under post content','mim-issue'),
));




/**--------------------------------------------------------------------
*
* Ad Section
*
-----------------------------------------------------------------------*/
$wp_customize->add_section( 'ad_section' , array(
    'title'       => __( 'Ad Section', 'mim-issue' ),
    'description' => __ ('Set ad settings from here.','mim-issue'),
    'priority' => 5
) );

$wp_customize->add_setting( 'header_ad',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
));

$wp_customize->add_control( 'header_ad', array(
    'type' => 'checkbox',
    'label' => __ ('Show Ad in Header Area','mim-issue'),
    'section' => 'ad_section',
    'description' => __ ('Check this to show your ad in header area','mim-issue'),
));

$wp_customize->add_setting( 'header_ad_content', array(
 'default' => '',
 'sanitize_callback' => 'mim_issue_sanitize_textarea',
 'capability' => 'edit_theme_options'
 ) );
$wp_customize->add_control( 'header_ad_content', array(
 'label' => __ ('Header Area Ad Content','mim-issue'),
 'section' => 'ad_section',
 'type' => 'textarea'
 ) );



$wp_customize->add_setting( 'content_ad',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
));

$wp_customize->add_control( 'content_ad', array(
    'type' => 'checkbox',
    'label' => __ ('Show Ad in Content Area', 'mim-issue'),
    'section' => 'ad_section',
    'description' => __ ('Check this to show your ad in content area','mim-issue'),
));


$wp_customize->add_setting( 'content_ad_content', array(
 'default' => '',
 'sanitize_callback' => 'mim_issue_sanitize_textarea',
 'capability' => 'edit_theme_options'
 ) );
$wp_customize->add_control( 'content_ad_content', array(
 'label' => __ ('Content Area Ad Content','mim-issue'),
 'section' => 'ad_section',
 'type' => 'textarea'
 ) );

/**----------------------------------------------------------------------------
*
* Social icons
*
------------------------------------------------------------------------------*/

$wp_customize -> add_section( 'social_icon_link', array(
	'title' => __( 'Social Icons','mim-issue' ),
	'description' => __('Type your social links here','mim-issue'),
	'priority' => 6
));

$wp_customize->add_setting( 'header_social_checkbox',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
));

$wp_customize->add_control( 'header_social_checkbox', array(
    'type' => 'checkbox',
    'label' => __ ('Show Social Icons in Header','mim-issue'),
    'section' => 'social_icon_link',
    'description' => __ ('Check this to show your social icons in header', 'mim-issue'),
));

$wp_customize->add_setting( 'footer_social_checkbox',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
));

$wp_customize->add_control( 'footer_social_checkbox', array(
    'type' => 'checkbox',
    'label' => __ ('Show Social Icons Footer', 'mim-issue'),
    'section' => 'social_icon_link',
    'description' => __ ('Check this to show your social icons in footer','mim-issue'),
));

$wp_customize->add_setting( 'twitter_url', array(
 'sanitize_callback' => 'esc_url',
 'capability' => 'edit_theme_options'
 ) );
 $wp_customize->add_control( 'twitter_url', array(
 'label' => __ ('Twitter Profile','mim-issue'),
 'section' => 'social_icon_link',
 'type' => 'text'
 ) );

$wp_customize->add_setting( 'facebook_url', array(
 'sanitize_callback' => 'esc_url',
 'capability' => 'edit_theme_options'
 ) );
 $wp_customize->add_control( 'facebook_url', array(
 'label' => __ ('Facebook Profile','mim-issue'),
 'section' => 'social_icon_link',
 'type' => 'text'
 ) );

$wp_customize->add_setting( 'googleplus_url', array(
 'sanitize_callback' => 'esc_url',
 'capability' => 'edit_theme_options'
 ) );
 $wp_customize->add_control( 'googleplus_url', array(
 'label' => __ ('Google+ Profile','mim-issue'),
 'section' => 'social_icon_link',
 'type' => 'text'
 ) );

$wp_customize->add_setting( 'linkedin_url', array(
 'sanitize_callback' => 'esc_url',
 'capability' => 'edit_theme_options'
 ) );
 $wp_customize->add_control( 'linkedin_url', array(
 'label' => __ ('LinkedIn Profile','mim-issue'),
 'section' => 'social_icon_link',
 'type' => 'text'
 ) );


$wp_customize->add_setting( 'blogger_url', array(
 'sanitize_callback' => 'esc_url',
 'capability' => 'edit_theme_options'
 ) );
 $wp_customize->add_control( 'blogger_url', array(
 'label' => __ ('Blogger Profile','mim-issue'),
 'section' => 'social_icon_link',
 'type' => 'text'
 ) );

 $wp_customize->add_setting( 'vimeo_url', array(
 'sanitize_callback' => 'esc_url',
 'capability' => 'edit_theme_options'
 ) );
 $wp_customize->add_control( 'vimeo_url', array(
 'label' => __ ('Vimeo Profile','mim-issue'),
 'section' => 'social_icon_link',
 'type' => 'text'
 ) );


/*----------------------------------------------------------------------------
*
* Footer Section
*
------------------------------------------------------------------------------*/

$wp_customize->add_section( 'footer_section' , array(
    'title'       => __( 'Footer Section', 'mim-issue' ),
    'description' => __('Set footer settings from here.','mim-issue' ),
    'priority' => 8
) );

$wp_customize->add_setting( 'about_magazine_checkbox',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
));

$wp_customize->add_control( 'about_magazine_checkbox', array(
    'type' => 'checkbox',
    'label' => __('Show About Magazine','mim-issue' ),
    'section' => 'footer_section',
    'description' => __('Check this to show about magazine','mim-issue' ),
));

$wp_customize->add_setting( 'about_magazine_title', array(
 'default' => '',
 'sanitize_callback' => 'sanitize_text_field',
 'capability' => 'edit_theme_options'
 ) );

$wp_customize->add_control( 'about_magazine_title', array(
 'label' => __('Title','mim-issue' ),
 'section' => 'footer_section',
 'type' => 'text'
 ) );



$wp_customize->add_setting( 'about_magazine_content',
	array(
	 'default' => '',
	 'sanitize_callback' => 'mim_issue_sanitize_textarea',
	 'capability' => 'edit_theme_options'
	 ));


$wp_customize->add_control( 'about_magazine_content', array(
 'label' => __('About Magazine Content','mim-issue' ),
 'section' => 'footer_section',
 'type' => 'textarea',
 'description' => __('Write something about your magazine here','mim-issue' ),
 ) );

$wp_customize->add_setting( 'footer_address_checkbox',
     array(
        'default' => '',
        'sanitize_callback' => 'mim_issue_sanitize_checkbox_field',
));

$wp_customize->add_control( 'footer_address_checkbox', array(
    'type' => 'checkbox',
    'label' => __('Show Footer Address', 'mim-issue' ),
    'section' => 'footer_section',
    'description' => __('Check this to show address in footer','mim-issue' ),
));


$wp_customize->add_setting( 'footer_address',
	array(
	 'default' => '',
	 'sanitize_callback' => 'mim_issue_sanitize_textarea',
	 'capability' => 'edit_theme_options'
	 ));

$wp_customize->add_control( 'footer_address', array(
 'label' => 'Footer Address',
 'section' => __('footer_section','mim-issue' ),
 'type' => 'textarea',
 'description' => __('Write your address here','mim-issue' ),
 ) );


$wp_customize->add_setting( 'footer_text',
	array(
	 'default' => '',
	 'sanitize_callback' => 'mim_issue_sanitize_textarea',
	 'capability' => 'edit_theme_options'
	 ));

$wp_customize->add_control( 'footer_text', array(
 'label' => __('Footer Text','mim-issue' ),
 'section' => 'footer_section',
 'type' => 'textarea'
 ) );



}

add_action( 'customize_register', 'mim_issue_customize_register' );

/*
Enqueue Script for top buttons
*/
if ( ! function_exists( 'mim_issue_customizer_controls' ) ){
	function mim_issue_customizer_controls(){


		wp_enqueue_script( 'mim_issue_customizer_top_buttons', MIM_ISSUE_THEME_URI .'/js/theme-customizer-top-buttons.js', false, MIM_ISSUE_THEME_VERSION, true  );

		wp_localize_script( 'mim_issue_customizer_top_buttons', 'topbtns', array(
			'pro' => esc_html__( 'Buy our PRO version', 'mim-issue' ),
            'documentation' => esc_html__( 'Documentation', 'mim-issue' )
		) );
	}
}//end if function_exists
add_action( 'customize_controls_enqueue_scripts', 'mim_issue_customizer_controls' );


/**
 * Register font schemes for Issue theme.
 *
 *
 * @since Issue 1.0
 *
 * @return array An associative array of font scheme options.
 */
function mim_issue_get_font_schemes () {
	return array(
	        'Times New Roman' => 'Times New Roman',
            'Arial'     => 'Arial',
            'Courier New'   => 'Courier New',
			'Open Sans' => 'Open Sans',
			'Slabo'		=> 'Slabo',
			'Roboto'	=> 'Roboto',
			'Oswald'	=> 'Oswald',
			'Lato'		=> 'Lato',
			'Source Sans Pro' => 'Source Sans Pro',
			'Raleway' => 'Raleway',
			'PT Sans'	=> 'PT Sans',
			'Open Sans Condensed' => 'Open Sans Condensed',
			'Droid Sans' => 'Droid Sans',
			'Montserrat' => 'Montserrat',
			'Merriweather' => 'Merriweather',
			'Lora'		=> 'Lora',
			'Arimo'		=> 'Arimo',
			'Bitter'	=> 'Bitter',
			'Lobster'	=> 'Lobster',
			'Indie Flower' => 'Indie Flower',
			'Oxygen'	=> 'Oxygen'
	);

}


if ( ! function_exists( 'mim_issue_get_font_scheme_choices' ) ) :
/**
 * Returns an array of font scheme choices registered for Issue.
 *
 * @since Issue 1.0
 *
 * @return array Array of font schemes.
 */
 function mim_issue_get_font_scheme_choices() {
	$mim_issue_font_schemes = mim_issue_get_font_schemes();
	$mim_issue_font_scheme_control_options = array();

	foreach ( $mim_issue_font_schemes as $mim_issue_font_scheme => $mim_issue_value ) {
		$mim_issue_font_scheme_control_options[ $mim_issue_font_scheme ] = $mim_issue_value;
	}

	return $mim_issue_font_scheme_control_options;
}
endif; // mim_issue_get_font_scheme_choices

if ( ! function_exists( 'mim_issue_sanitize_font_scheme' ) ) :
/**
 * Sanitization callback for font schemes.
 *
 * @since Issue 1.0
 *
 * @param string $mim_issue_value font scheme name value.
 * @return string font scheme name.
 */
function mim_issue_sanitize_font_scheme( $mim_issue_value ) {
	$mim_issue_font_schemes = mim_issue_get_font_scheme_choices();

	if ( ! array_key_exists( $mim_issue_value, $mim_issue_font_schemes ) ) {
		$mim_issue_value = 'Source Sans Pro';
	}

	return $mim_issue_value;
}
endif; // mim_issue_sanitize_font_scheme


if ( ! function_exists( 'mim_issue_sanitize_checkbox_field' ) ) :
/**
 * Sanitization callback for checkbox field.
 *
 * @param string $mim_issue_input of checkbox .
 * @return string if checkbox input is a 1 returns one and If the input is anything else at all, the function returns a blank string .
 */
function mim_issue_sanitize_checkbox_field( $mim_issue_input ) {
	if ( $mim_issue_input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
endif; // mim_issue_sanitize_checkbox_field

if ( ! function_exists( 'mim_issue_sanitize_textarea' ) ) :
/**
 * Sanitization callback for textarea field.
 *
 * @param string $mim_issue_text of textarea .
 * @return string
 */
function mim_issue_sanitize_textarea( $mim_issue_text ) {
	$mim_issue_value = wp_kses_post( $mim_issue_text );
	return $mim_issue_value;
}
endif; // mim_issue_sanitize_textarea

//Add Customise css into header part
if ( ! function_exists( 'mim_issue_customizer_css' ) ) :
function mim_issue_customizer_css() {

   require get_template_directory() . '/inc/customize-style.php';
}
endif; // mim_issue_customizer_css
add_action( 'wp_head', 'mim_issue_customizer_css' );
?>
