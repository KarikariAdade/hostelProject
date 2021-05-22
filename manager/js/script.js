// (function($) {
	
// 	"use strict";
	
// })(window.jQuery);

$(document).ready(function (){
	if($('.main-header .nav-toggler .toggler-btn').length){
		$('.main-header .nav-toggler .toggler-btn').on('click', function(e) {
			e.preventDefault();
			$(this).toggleClass('active');
			$('body').toggleClass('side-content-visible');
		});
		$('.hidden-bar .cross-icon').on('click', function(e) {
			e.preventDefault();
			$('body').removeClass('side-content-visible');
			$(".main-header .nav-toggler .toggler-btn").removeClass('active');
		});
	}

	//Custom Seclect Box
	if($('.custom-select-box').length){
		$('.custom-select-box').selectmenu().selectmenu('menuWidget').addClass('overflow');
	}

	//Tabs Box
	if($('.tabs-box').length){
		$('.tabs-box .tab-buttons .tab-btn').on('click', function(e) {
			e.preventDefault();
			var target = $($(this).attr('data-tab'));
			
			if ($(target).is(':visible')){
				return false;
			}else{
				target.parents('.tabs-box').find('.tab-buttons').find('.tab-btn').removeClass('active-btn');
				$(this).addClass('active-btn');
				target.parents('.tabs-box').find('.tabs-content').find('.tab').fadeOut(0);
				target.parents('.tabs-box').find('.tabs-content').find('.tab').removeClass('active-tab');
				$(target).fadeIn(300);
				$(target).addClass('active-tab');
			}
		});
	}

	 // Dropzone initialization
    Dropzone.autoDiscover = false;
    $(function () {
        $("div#myDropZone").dropzone({
            url: "includes/add-picture.php",
            addRemoveLinks:true
        });
    });
})