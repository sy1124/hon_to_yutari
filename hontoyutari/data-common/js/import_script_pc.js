//PAGETOP
jQuery(document).ready(function() {
	jQuery('#page_top a').smoothScroll();
});


//fixheight

jQuery(document).ready(function(){
	jQuery(".fixHeight").fixHeight();
});


//プレイスホルダーIE8対応

jQuery(function()
{
    jQuery('.shop_search').ahPlaceholder({
          placeholderColor : '#948472',
          likeApple : false
     });
});
jQuery(function()
{
    jQuery('.search_keyword').ahPlaceholder({
          placeholderColor : '#231815',
          likeApple : false
     });
});
jQuery(function()
{
    jQuery('.contact_form').ahPlaceholder({
          placeholderColor : '#000000',
          likeApple : false
     });
});

//toggle
/*jQuery(function(){
	jQuery("#category_menu .ttl").on("click", function() {
		jQuery(this).next().slideToggle();
		jQuery(this).toggleClass("active");     //追加した一文
	});
});*/

//TOKINO accordion menu
/*	jQuery(function(){

		//オブジェクトを保存
		var accordionItem=jQuery('#category_menu');
		//一旦全部消す
		accordionItem.find('div').hide();

		//active要素を指定して開く
		var no=0;
		//accordionItem.find('h3').eq(no).addClass('active').next('div').show();

		//click-action
		accordionItem.find('h3').click(function () {

			//slide
			jQuery(this).next('div').slideToggle("fast")
			.siblings('div:visible').slideUp("fast");
			//activeクラス切り替え
			jQuery(this).toggleClass('active');
			jQuery(this).siblings('h3').removeClass('active');

		});

		//hover-toggle
		accordionItem.find('h3').hover(function () {

			//toggle hoveredクラス
			jQuery(this).toggleClass('hovered');

		});
	});
*/
