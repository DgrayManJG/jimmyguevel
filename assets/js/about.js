$(document).ready(function () {
    $('div.picture').fadeIn(1000).removeClass('picture');
    $('div.text').fadeIn(3000).removeClass('text');
    $('div.skill-bar').fadeIn(5000).removeClass('skill-bar');
});

jQuery(document).ready(function(){
	jQuery('.skillbar').each(function(){
		jQuery(this).find('.skillbar-bar').animate({
			width:jQuery(this).attr('data-percent')
		},6000);
	});
});