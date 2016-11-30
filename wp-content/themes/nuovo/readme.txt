=== Nuovo WordPress Theme ===
Contributors: Jacob Martella
Tags: two-columns,right-sidebar,custom-background,custom-header,featured-images,theme-options
Requires at least: 4.0
Tested up to: 4.6
Stable tag: 2.3.1

== Description ==
Nuovo gives the user almost complete control over the look and feel of his or her website. Users can select the color theme they want, what posts they want to show up in the homepage slider as well as in four separate areas on the homepage and can display the social media links they want in the header — all from the Customizer. Nuovo is also responsive, making it look good on any device with no extra work required.

== Installation ==
= Via WordPress Admin =
- From your sites admin, go to Themes > Install Themes.
- In the search box, type 'Nuovo' and press enter.
- Locate the entry for 'Nuovo' (there should be only one) and click the 'Install' link.
- When installation is finished, click the 'Activate' link.

= Manual Install =
- Download the file from the theme page.
- Unzip the file.
- Using an FTP client (I recommend FireZilla), upload the 'nuovo' file to your Wordpress theme folder. Make sure the file you upload simply says 'Nuovo' with no numbers after it. Otherwise, it won't work.
- Go into your Wordpress Admin, navigate to 'Appearance > Themes'.
- Find the Giornalismo listing on this page and click 'Activate'.

== Features ==
= Customizable Homepage =
One of the biggest features that Nuovo has is a customizable homepage. Users can select what category shows up in the featured post slider as well as how many posts are shown. The recommended practice is to create a top story or featured category and use that to control which exact posts show up in the slider. Also, users can select up to four categories that show up on the homepage underneath the slider. The number of posts in each section can be any number, but for the best look, it's recommended that the number of posts be a multiple of three.

= Responsive =
As with all modern themes these days, Nuovo is completely responsive. This means that the user's site will look good on all devices with no work from the user required.

= Editor Styles =
Know how your post is going to look before you actually publish it with editor styles. In the post editor, all of the fonts, html tags and images will be styled exactly like they will on the website.

= Photos =
Nuovo is very dependent on featured photos and it's recommended that every post have a featured photo. For the best results, featured photos need to be at least 630px by 315px. Even better are featured photos that are larger than that and maintain the 2:1 ratio.

Normal photos that are in the body of the post need to be no bigger than 280px for best results on small screen sizes.

= Menus =
Nuovo comes with two menu areas, plus a mobile menu on smaller screen sizes. The top menu is optional and can be either shown or hidden via the 'General Settings' area of the Customizer. When set to be displayed, the top menu shows right above the header, as the name implies. The main menu is always shown and is displayed between the header and the main area on the page. The mobile menu displays on screen sizes smaller than 700px and shows both menus (though it will not display the top menu if it's hidden).

= Custom Header =
Nuovo also supports a custom header to be shown instead of the site title and description if the user wishes. The best size for the header is 530px by 150px.

= Custom Background =
Finally, Nuovo supports a custom background that can either be a photo or color background. Do note that backgrounds, particualry photo backgrounds do not scroll down the page on tablets or mobile devices as they do on a desktop browser.

= Single Post Navigation =
It's now easier for your readers to move between posts with single post navigation beneath each post.

== How To's ==
= Setting up a Child Theme =
When customizing a theme, the best practice is to create a child theme. This way, when you update the parent theme, all of your changes will still remain intact. Creating a child theme is very simple if you use the steps below.
- Using your preferred FTP client, navigate to the "themes" directy inside the "wp-content" directory and create a directory titled "nuovo-child".
- Once there, create a style.css file and add the following lines of code in there and save.
	`/*
	Theme Name: Nuovo Child
	Description: Child theme for Nuovo theme
	Author: <Your Name>
	Template: nuovo
	*/`
- Then create a functions.php file and add the following code and save.
	`<?php function nuovo_child_theme_styles() {
		wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() . '/style.css' );
	}
	add_action( 'wp_enqueue_scripts', 'nuovo_child_theme_styles' ); ?>`

== Support ==
If you have a question, need to report a bug to be fixed or have a feature request for a future version, email me at jacob.martella@att.net or fill out the form on the theme page (http://jacobmartella.com/nuovo-wordpress-theme).

== Changelog ==
= 2.3 =
- Added support for image and video post formats.
- Tested for WordPress 4.6.

= 2.2 =
- Eliminated the hard coded date format to allow users to pick how the date is displayed and made sure that the date translates.
- Wrapped custom functions in 'if(functions_exists())' statement to make it easier to customize with a child theme.
- Tested for WordPress 4.5.

= 2.1 =
- Remove the <hr> tags in the archive pages.
- Added screen reader text classes.
- Added single post navigation.
- Fixed issue with translations and HTML tags.
- Tested to make sure it works with WordPress 4.4.

= 2.0.2 =
- Fixed: Issue with the first category number of posts option calling the wrong sanitation function.

= 2.0.1 =
- Updated all of the HTML to be compatible with HTML5.
- Added Pinterest, Instagram and Tumblr social media links.
- Made all of the social media links square images.
- Made numerous changes to the fonts to look a little bit more modern.
- Organized the functions.php file to make it easier to read.
- Moved the tablet and mobile style sheets to a separate file each and enqueued them in functions.php
- Moved the menus into one menu when screen size drops to below 700px.
- Simplified the each of the color style sheets.

= 1.1.1 =
- Fixed: Issue with top menu always showing in mobile version.
- A new version to fix numerous styles and re-write code is in the works as well.

= 1.1.0 =
- Hid the overflow if images went outside of their containers.
- Added image sizes for featured images on the home page.
- Fixed an issue with the home posts sections where the incorrect number of posts showing up.
- Made sure posts on the home page fit into equal rows.
- Added 'clearfix' class to author bio.
- Extended the slide panel width for the featured post slider for the tablet sizes.
- Made social media images fit on one line in the tablet and mobile version.
- Added vector social media images in the header.

= 1.0.16 =
- Initial release to the WordPress theme directory.

== License ==
GNU General Public License
http://www.gnu.org/licenses/gpl.html

= Photo License =
Except where otherwise noted, all photos in the screenshot are also licensed under the GNU General Public License. Copyright 2015 Jacob Martella

= jQuery Cycle License =
The jQuery Cycle plugin used in this theme was created by Mike Alsup and is dual licensed under the MIT and GPL licenses.
http://jquery.malsup.com/license.html

= Google Fonts License =
Lato-Light.ttf: Copyright (c) 2010-2011 by tyPoland Lukasz Dziedzic (team@latofonts.com) with Reserved Font Name "Lato". Licensed under the SIL Open Font License, Version 1.1.
Lato-Regular.ttf: Copyright (c) 2010-2011 by tyPoland Lukasz Dziedzic (team@latofonts.com) with Reserved Font Name "Lato". Licensed under the SIL Open Font License, Version 1.1.
Lato-Bold.ttf: Copyright (c) 2010-2011 by tyPoland Lukasz Dziedzic (team@latofonts.com) with Reserved Font Name "Lato". Licensed under the SIL Open Font License, Version 1.1.
Oswald-Regular.ttf: Copyright (c) 2011-2012, Vernon Adams (vern@newtypography.co.uk), with Reserved Font Names 'Oswald'
Oswald-Bold.ttf: Copyright (c) 2011-2012, Vernon Adams (vern@newtypography.co.uk), with Reserved Font Names 'Oswald'
PT_Sans-Narrow-Web-Regular.ttf: Copyright © 2009 ParaType Ltd. All rights reserved.
PT_Sans-Narrow-Web-Bold.ttf: Copyright © 2009 ParaType Ltd. All rights reserved.
Roboto-Light.ttf: Copyright 2011 Google Inc. All Rights Reserved.
Roboto-Regular.ttf: Copyright 2011 Google Inc. All Rights Reserved.
Roboto-Bold.ttf: Copyright 2011 Google Inc. All Rights Reserved.
SourceSansPro-Regular.ttf: Copyright 2010, 2012 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name 'Source'. All Rights Reserved. Source is a trademark of Adobe Systems Incorporated in the United States and/or other countries.
SourceSansPro-Semibold.ttf: Copyright 2010, 2012 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name 'Source'. All Rights Reserved. Source is a trademark of Adobe Systems Incorporated in the United States and/or other countries.
SourceSansPro-Bold.ttf: Copyright 2010, 2012 Adobe Systems Incorporated (http://www.adobe.com/), with Reserved Font Name 'Source'. All Rights Reserved. Source is a trademark of Adobe Systems Incorporated in the United States and/or other countries.
