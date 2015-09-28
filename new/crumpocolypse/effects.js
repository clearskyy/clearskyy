$(document).ready(function(){
	
	//"search bar"
	$('#download').hover(function(){
		$('#search').stop().animate({
			width : '175px'
		},200);
		$('#search').focus();
	});

	
	$('#search').focusout(function(){
		$(this).animate({
			width : '0px'
		},200);
	
	});
	
	//coding highlights hiding and showing
	$('#highlight > div').hide();
	
	$('.expand').click(function(){
		$('#highlight > div').hide();
		$('#highlight > div').toggle();
	});
	
	$('.hide').click(function(){
		$('#highlight > div').hide();
	});
	
	$('h4').click(function(){
		$(this).next().animate({'height':'toggle'}, 1000, 'easeOutExpo');
	});
	
	//secondary links
		$('#thosedamnprojectlinks').hide();
		$('#thosedamncontactlinks').hide();
	
		//project
	$('#thosedamnlinks td:nth-child(3)').hover(
		function(){
			$('#thosedamncontactlinks').hide();
			$('#thosedamnprojectlinks').show();
	});
	
	$('#thosedamnprojectlinks').hover(function(){
		$(this).show();
	},function() {
		$(this).hide();
	});
		
	
		//contact
	$('#thosedamnlinks td:last-child').hover(
		function(){
			$('#thosedamnprojectlinks').hide();
			$('#thosedamncontactlinks').show();
	});
	
	$('#thosedamncontactlinks').hover(function(){
		$(this).show();
	},function() {
		$(this).hide();
	});

	 $('textarea').autosize();
	
});
