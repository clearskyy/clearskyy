$(document).ready(function(){
	
	$('#highlight > div').hide();
	$('.hide').click(function(){
		$('#highlight > div').hide();
	});
	$('h4').click(function(){
	$(this).next().animate({'height':'toggle'}, 1000, 'easeOutExpo');
	});
	
	$('#goaway1').click(function(){
		$(this).attr('value','bye');
		$('#smll1').fadeOut();
	});

	$('#goaway2').click(function(){
		$(this).attr('value','bye');
		$('#smll2').fadeOut();
	});
	
	$('#nav').localScroll();
	
 $(window).scroll(function(){ 
      $('#nav').stop().animate({top:$(document).scrollTop()},200,"swing");
  });

	$("#slideshow").css("overflow", "hidden");
	
	$("ul#slides").cycle({
		fx: 'fade',
		pause: 1,
		prev: '#prev',
		next: '#next'
	});
	
	$("#slideshow").hover(function() {
    	$("ul#nav").fadeIn();
  	},
  		function() {
    	$("ul#nav").fadeOut();
  	});
	
	$("div.smll2").hover(function() {
		$(this).animate({
			fontSize: "80%"
		},150);},
		function(){
		$(this).animate({
			fontSize: "70%"
		},150);}
	);
	
/*
	$('.qb').hover(function(){
		$(this).stop().animate({
			marginLeft: '100px'
		},1000);
	},function(){
		$(this).stop().animate({
			marginLeft: '20px'
		},1000);
	});
	

	$('.qb2').hover(function(){
		$(this).animate({
			marginLeft: '325px'
		},1000);
	});
*/
});
