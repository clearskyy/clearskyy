$(document).ready(function(){

	$('.upvote').click(function() {	
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform.submit(); 
	});
	
	$('.upvote2').click(function() { 
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform2.submit(); 
	});
	
	$('.upvote3').click(function() {	
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform3.submit(); 
	});
	
	$('.upvote4').click(function() { 
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform4.submit(); 
	});
	
	$('.upvote5').click(function() { 
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform5.submit(); 
	});
	
	$('.upvote6').click(function() {
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform6.submit(); 
	});
	
	$('.upvote7').click(function() {	
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform7.submit(); 
	});
	
	$('.upvote8').click(function() { 
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform8.submit(); 
	});
	
	$('.upvote9').click(function() { 
		$('.postURL').val($(this).children('.URL').val()); 
		$('.voteValue').val($(this).children('.upOrDown').val()); 
		voteform9.submit(); 
	});
	
	$('.pos').css("color", "#5d82cf");
	
	//selectnav.js
	selectnav('navi', {
		activeclass: 'act',
		nested: false,
		label: false
	});
	
	/* ultra nav
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
	
	*/
	
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
	
	
	$('#editAudio').click(function(){
		$('#workstation').load('select/audio.php');
	});
	
	$('#editEditorial').click(function(){
		$('#workstation').load('select/editorial.php');
	});
	
	$('#editLearn').click(function(){
		$('#workstation').load('select/learn.php');
	});
	
	$('#editRagequit').click(function(){
		$('#workstation').load('select/ragequit.php');
	});
	
	$('#editReview').click(function(){
		$('#workstation').load('select/review.php');
	});
	
	$('#editSeemslegit').click(function(){
		$('#workstation').load('select/seemslegit.php');
	});
	
	$('#editVideo').click(function(){
		$('#workstation').load('select/video.php');
	});
	
	$('#editWT').click(function(){
		$('#workstation').load('select/wt.php');
	});
	
	$('#editStories').click(function(){
		$('#workstation').load('select/story.php');
	});
	
	$('#editGame').click(function(){
		$('#workstation').load('select/game.php');
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

	 $('textarea').autosize();
	
	function windowPopup(url, width, height){
		//calculate the position of the popup so it's centered on the screen
		var left = (screen.width / 2) - (width / 2),
			top = (screen.height / 2) - (height /2);
		
		window.open(
			url,
			"",
			"menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left
		);
	}
	
	$('.js-social-share').click(function(e){
		e.preventDefault();
		
		windowPopup($(this).attr("href"), 500, 300);
	});
	
	//var jsSocialShares = document.querySelectorAll(".js-social-share");
	//if (jsSocialShares) {
	//	[].forEach.call(jsSocialShares, function(anchor){
	//		anchor.addEventListener("click", function(e){
	//			e.preventDefault();
				
	//			windowPopup(this.href, 500,300);
	//		});
	//	});
	//}
	
});
