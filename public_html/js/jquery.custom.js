(function($){
	
	"use strict";

	$('#shortlinks li a, #about').tooltip();
	$('input').placeholder();
	
	$('input').focus(function(){
		$('.newsletter-fill').addClass('active');
		$('.email-txt').attr('placeholder','Enter your email address here');
		$('.subscribe-btn').show();
	});
		
	$('.fa-times').click(function(){
	  $('input[type="email"]').val('');
	  $('.newsletter-fill').removeClass('active');
	  $('.email-txt').attr('placeholder','Subscribe to our Newsletter');
	  $('.subscribe-btn').hide();
	  
	});

})(jQuery);

