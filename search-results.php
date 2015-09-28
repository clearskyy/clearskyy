<?php 
session_start();
//checks if a user is logged in.
if( isset( $_SESSION["user"] )){
	$user = $_SESSION["user"];
}
?>

<!doctype html>
<html>
	<head>
		<!-- FAVICON -->
		<link rel="icon" type="image/png" href="./crumpocolypse/img/tinylogo16.png">
		<!-- jQUERY SCRIPTS  -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="./crumpocolypse/js/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="crumpocolypse/nexus.js"></script>
		<script type="text/javascript" src="crumpocolypse/effects.js"></script>
		<script type="text/javascript" src="crumpocolypse/jquery.autosize-min.js"></script>
		<!-- CSS -->
		<link type="text/css" rel="stylesheet" href="crumpocolypse/super-cool-style-bro.css" />
		<link type="text/css" rel="stylesheet" href="crumpocolypse/js/jquery.bxslider.css" />
		<!-- title and meta data - device width to check screen size -->
		<title>clearskyy</title>
		<meta name="viewport" content="width=device-width" />
		<meta name="description" content="clearskyy is dedicated to providing you with reviews, stories, tutorials and overly opinionated rants that you might enjoy.">
		<meta name="google-site-verification" content="2DMYY1MuzFoeDSXZraKovWvT9JyKvEzJb3ZixB_65vQ" />
	</head>
	<body>
		<!-- NAVIGATION MENU -->
		<? include_once 'crumpocolypse/menu.php' ?>

		<!-- WHOLE PAGE CONTAINER -->
		<div id="nexus">
			
			<!-- LEFT SIDE CONTAINER -->
			<div id="wrap-left">
				
				<script>
				  (function() {
					var cx = '015820512616906527070:taeklbcpm6o';
					var gcse = document.createElement('script');
					gcse.type = 'text/javascript';
					gcse.async = true;
					gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
						'//www.google.com/cse/cse.js?cx=' + cx;
					var s = document.getElementsByTagName('script')[0];
					s.parentNode.insertBefore(gcse, s);
				  })();
				</script>
				<gcse:searchresults-only></gcse:searchresults-only>
				
			</div>
			<!-- End of #wrap-left -->
	
			<!-- Right side of layout -->
			<div id="sidebar">
				<? include_once 'crumpocolypse/articles.php'; ?>
			</div>
		</div>
		<!-- End of #nexus -->

		<!-- footer -->
		<? include_once 'crumpocolypse/caboose.php' ?>

<!-- 
         ,,                                                                   
       `7MM                                   `7MM                            
         MM                                     MM                            
 ,p6"bo  MM  .gP"Ya   ,6"Yb.  `7Mb,od8 ,pP"Ybd  MM  ,MP'`7M'   `MF'`7M'   `MF'
6M'  OO  MM ,M'   Yb 8)   MM    MM' "' 8I   `"  MM ;Y     VA   ,V    VA   ,V  
8M       MM 8M""""""  ,pm9MM    MM     `YMMMa.  MM;Mm      VA ,V      VA ,V   
YM.    , MM YM.    , 8M   MM    MM     L.   I8  MM `Mb.     VVV        VVV    
 YMbmd'.JMML.`Mbmmd' `Moo9^Yo..JMML.   M9mmmP'.JMML. YA.    ,V         ,V     
                                                           ,V         ,V      
                                                        OOb"       OOb"       
clearskyy.net by nate seymour  
-->	
	</body>
</html>