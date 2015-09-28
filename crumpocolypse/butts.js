$(document).ready(function(){

	$('.upvote').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform.submit(); });
	$('.downvote').click(function() { $('#postURL').val($(this).children('.URL').val());$('#voteValue').val($(this).children('.upOrDown').val());voteform.submit();	});
	
	$('.upvote3').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform3.submit(); });
	$('.downvote3').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform3.submit();	});
	$('.upvote4').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform4.submit(); });
	$('.downvote4').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform4.submit();	});
	$('.upvote5').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform5.submit(); });
	$('.downvote5').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform5.submit();	});
	$('.upvote6').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform6.submit(); });
	$('.downvote6').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform6.submit();	});
	$('.upvote7').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform7.submit(); });
	$('.downvote7').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform7.submit();	});
	$('.upvote8').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform8.submit(); });
	$('.downvote8').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform8.submit();	});
	$('.upvote9').click(function() {	$('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform9.submit(); });
	$('.downvote9').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform9.submit();	});
	
	$('.pos').css("color", "#09c");
	$('.neg').css("color", "#faa");
	
	var urlz = $('.postURL').val($(this).children('.URL').val());
	var votez = $('.voteValue').val($(this).children('.upOrDown').val());
	
	$('.upvote2').click(function() {
		$.post("cast-vote.php",
			{
				posturl:urlz,
				vote:votez
			},
			function(data,status){ 
				alert("Data: " + data + "\nStatus: " + status);
			});	
	});
	
	$('.downvote2').click(function() { $('.postURL').val($(this).children('.URL').val());$('.voteValue').val($(this).children('.upOrDown').val());voteform2.submit();	});
	
	//selectnav.js
	selectnav('navi', {
		activeclass: 'act',
		nested: false,
		label: false
	});
	
	//ultra nav
	$('#nav ul li ul').hide();
	
	$('#nav ul li').hover(
	  function(){
		$(this).children('ul').slideDown(200);
		
		$(this).css({
		  "background-color" : "#222"
		});
	  }, 
	  
	  function(){
		
		$(this).children('ul').fadeOut();
	  }
	);
	
	//sticky nav
	var $window = $(window),
		$stickyEl = $('#nav'),
		elTop = $stickyEl.offset().top;
		
	$window.scroll(function() {
		$stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);

	});
	
	
	//admin menu
	$('#create').hide();
	$('#edit').hide();

	$('#create-instance').click(function(){
		$('#create').slideDown();
		$('#edit').fadeOut();
	});

	$('#create').click(function(){
	   $(this).fadeOut(); 
	});

	$('#edit-instance').click(function(){
	   $('#edit').slideDown();
	   $('#create').fadeOut();
	});

	$('#edit').click(function(){
	   $(this).fadeOut(); 
	});
	
	//admin menu functions
	$('#admin').on("click","#createEditorial",function(){
		$('#workstation').load('create/create-editorial.php');
	});
	
	$('#admin').on("click","#createLearn",function(){
		$('#workstation').load('create/create-learn.php');
	});
	
	$('#admin').on("click","#createReview",function(){
		$('#workstation').load('create/create-review.php');
	});
	
	$('#admin').on("click","#createRagequit",function(){
		$('#workstation').load('create/create-ragequit.php');
	});
	
	$('#admin').on("click","#createSeemsLegit",function(){
		$('#workstation').load('create/create-seemslegit.php');
	});
	
	$('#admin').on("click","#createAudio",function(){
		$('#workstation').load('create/create-audio.php');
	});
	
	$('#admin').on("click","#createVideo",function(){
		$('#workstation').load('create/create-video.php');
	});
	
	$('#admin').on("click","#createWT",function(){
		$('#workstation').load('create/create-wt.php');
	});
	
	$('#admin').on("click","#createStories",function(){
		$('#workstation').load('create/create-story.php');
	});
	
	$('#admin').on("click","#editAudio",function(){
		$('#workstation').load('select/audio.php');
	});
	
	$('#admin').on("click","#editEditorial",function(){
		$('#workstation').load('select/editorial.php');
	});
	
	$('#admin').on("click","#editLearn",function(){
		$('#workstation').load('select/learn.php');
	});
	
	$('#admin').on("click","#editRagequit",function(){
		$('#workstation').load('select/ragequit.php');
	});
	
	$('#admin').on("click","#editReview",function(){
		$('#workstation').load('select/review.php');
	});
	
	$('#admin').on("click","#editSeemslegit",function(){
		$('#workstation').load('select/seemslegit.php');
	});
	
	$('#admin').on("click","#editVideo",function(){
		$('#workstation').load('select/video.php');
	});
	
	$('#admin').on("click","#editWT",function(){
		$('#workstation').load('select/wt.php');
	});
	
	$('#admin').on("click","#editStories",function(){
		$('#workstation').load('select/story.php');
	});
	
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

	 $('textarea').autosize();
	 
	
});
