//toggle
jQuery(document).ready(function() {
	jQuery("#sub_nav").on("click", function() {
		jQuery("#toggle_menu").slideToggle();
	});
});


//PAGETOP
	jQuery(document).ready(function() {
		jQuery('#page_top a').smoothScroll();
	});


/*
//ラジオボタン・チェックボックス・セレクトボックスをオリジナルに
	jQuery(document).ready(function() {
	jQuery('.fmselect').customSelect();
});
*/


//fixheight

jQuery(document).ready(function(){
	jQuery(".fixHeight").fixHeight();
});
