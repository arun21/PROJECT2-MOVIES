jQuery(document).ready(function($) {
	$('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 10px auto; display: block; text-align: center;" href="http://issuemagazineplus.com/documentation-category/issuemag-theme/" class="button" target="_blank">{documentation}</a>'.replace( '{documentation}', topbtns.documentation ) );
 	$('.wp-full-overlay-sidebar-content').prepend('<a style="width: 80%; margin: 10px auto; display: block; text-align: center;" href="http://issuemagazineplus.com/downloads/issuemag-pro-theme/" class="button" target="_blank">{pro}</a>'.replace( '{pro}', topbtns.pro ) );
});
