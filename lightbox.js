		$(document).ready(function(){
			$("a#single").fancybox();
			
			$("a.if").fancybox({
				'type'			:	'iframe',
				'transitionIn'	:	'fade',
				'width'			:	'90%',
				'height'		:	'90%',
				'overlayShow'	:	false
			
			});
			
			$("a#inline").fancybox({
				'type'			: 	'inline',
				'transitionIn'	:	'fade',
				'overlayShow'	:	false
			});
		});