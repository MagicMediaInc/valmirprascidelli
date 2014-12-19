$(function(){
	$(".candidato").on("click",function(e){
		alert($(this).attr("data-candidato"));
	})
	$("#loading").hide();
	$(document).ajaxStart(function() {
  		$( "#loading" ).show();
	});
	$(document).ajaxStop(function() {
  		$( "#loading" ).hide();
	});
	$("#participe").on("submit",function(e){
		e.preventDefault();
		datos=$(this).serialize()
		$.ajax({
			url: '/participe',
			type: 'POST',
			data: datos,
			success:function(res){

				$("#response").html("sua mensagem foi enviada com sucesso! "+ res).show(300).delay(2000).fadeOut(900);
				$('#participe')[0].reset();
			},
			error:function(e) {
				console.log("el error es "+ JSON.stringify(e))		
			}
		})
		
	})
	$("#contato").on("submit",function(e){
		e.preventDefault();
		datos=$(this).serialize()
		$.ajax({
			url: '/contato',
			type: 'POST',
			data: datos,
			success:function(res){

				$("#response").html("sua mensagem foi enviada com sucesso! "+ res).show(300).delay(2000).fadeOut(900);
				$('#contato')[0].reset();
			},
			error:function(e) {
				console.log("el error es "+ JSON.stringify(e))		
			}
		})
		
	})
	function replaeLinks(text)
    {
      var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
      return text.replace(exp,"<a href='$1' target='_new'>$1</a>"); 
    }
	$.getJSON('../../plugin_tweets/index2.php',{format: "json"},function(data) {
		console.log("Hola Mundo");
		data.forEach(function(datos) {
			 /* iterate through array or object */
			 console.log(datos.tweet)
			 $("#tweets").append('<i class="twt">"'+replaeLinks(datos.tweet)+'"</i>')
			 console.log($("#tweets").children("i").length)
		});

		$('#tweets i.twt:gt(0)').hide();
		var total = $('#tweets i.twt').length;
	    var twt = 0;
	    setInterval(function(){
	    	
	    	twt++;
	    	if(twt == total) twt = 0;
	    	$('#tweets i.twt:lt('+twt+')').fadeOut(0);
	    	$('#tweets i.twt:gt('+twt+')').fadeOut(0);
	    	$('#tweets i.twt:eq('+(twt)+')').fadeIn(400);
	     }, 4000);
		//$("#tweets").appendTo('<p>'++'</p>')	
	});
	$('.multiple-items').slick({
		  infinite: true,
		  slidesToShow: 4,
		  slidesToScroll: 4,
		  autoplay: true,
  		  autoplaySpeed: 5000
		});
	// $('#carousel').flexslider({
 //        animation: "slide",
 //        controlNav: true,
 //        animationLoop: true,
 //        slideshow: true,
 //        prevText: "",
 //        minItems: 1,
 //        maxItems: 4, 
 //        nextText: "",
 //        itemWidth: 120,
 //        itemMargin: 0,
 //      });
	$(".banner-rotator").wtRotator({
					width:825,
					height:300,
					button_width:24,
					button_height:24,
					button_margin:5,
					auto_start:true,
					delay:5000,
					transition:"random",
					transition_speed:800,
					cpanel_position:"inside",
					cpanel_align:"BR",
					timer_align:"top",
					display_thumbs:true,
					display_dbuttons:true,
					display_playbutton:true,
					display_numbers:true,
					display_timer:true,
					mouseover_pause:false,
					cpanel_mouseover:false,
					text_mouseover:false,
					text_effect:"fade",
					text_sync:true,
					tooltip_type:"image",
					shuffle:false,
					block_size:75,
					vert_size:55,
					horz_size:50,
					block_delay:25,
					vstripe_delay:75,
					hstripe_delay:180					
				});



	$('#slider div.banner-element:gt(0)').hide();
    $('#paginator div.element:gt(0)').css({ 'background' : '#d1d3d4'});
    $('#paginator div.element:lt(0)').css({ 'background' : '#d1d3d4'});
    $('#paginator div.element:eq(0)').css({ 'background' : '#c52d16'});
    var total = $('#slider div.banner-element').length;
    var i = 0;
    setInterval(function(){
    	
    	i++;
    	if(i == total) i = 0;
    	$('#slider div.banner-element:lt('+i+')').fadeOut(0);
    	$('#slider div.banner-element:gt('+i+')').fadeOut(0);
    	$('#slider div.banner-element:eq('+(i)+')').fadeIn(1000);
	    $('#paginator div.element:gt('+i+')').css({ 'background' : '#d1d3d4'});
	    $('#paginator div.element:lt('+i+')').css({ 'background' : '#d1d3d4'});
	    $('#paginator div.element:eq('+i+')').css({ 'background' : '#c52d16'});
     }, 10000);

			$("#coin-slider").coinslider({ width:955, height: 255,delay: 5000 });

})