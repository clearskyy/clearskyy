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
		<link rel="apple-touch-icon" sizes="57x57" href="./crumpocolypse/img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="./crumpocolypse/img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="./crumpocolypse/img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="./crumpocolypse/img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="./crumpocolypse/img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="./crumpocolypse/img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="./crumpocolypse/img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="./crumpocolypse/img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="./crumpocolypse/img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="./crumpocolypse/img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./crumpocolypse/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="./crumpocolypse/img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./crumpocolypse/img/favicon-16x16.png">
		<link rel="manifest" href="./crumpocolypse/img/manifest.json">
		<meta charset="UTF-8">
		<meta name="msapplication-TileColor" content="#32456D">
		<meta name="msapplication-TileImage" content="../crumpocolypse/img/ms-icon-144x144.png">
		<meta name="theme-color" content="#32456D">
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
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
				
				<!-- IMAGE SLIDER -->
				<ul class="bxslider" style="margin:0">
					
					<li style="left:0"><a href="http://www.bungie.net/en/Clan/Detail/346926"><img src="http://clearskyy.net/crumpocolypse/upload/dropdead_destiny.png" /></a></li>
					
					<li style="left:0;"><a href="http://www.clearskyy.net/editorial/pica-pic.php"><img src="http://clearskyy.net/crumpocolypse/upload/picapic.png" title="click here to find out more about digitized handheld games free to play online" /></a></li>
					
					<li style="left:0;"><img src="crumpocolypse/img/slider-image-3.png" title="give your kitty a break and chill with us" /></li>
					
					<li style="left:0;"><img src="crumpocolypse/img/slider-image-1.png" /></li>
				</ul>
				
				<!-- MAIN FEEDS -->
				<?
					//handles date for posts
					include 'crumpocolypse/time2str.php';
					
					//Reviews Feed
					
					//query that pulls 3 reviews
					$review_query = "SELECT * FROM reviews ORDER BY id DESC LIMIT 3";
					$reviews_result = $con -> query($review_query);
					
						while($row = $reviews_result->fetch_array()){
							$reviews_rows[] = $row;
						}
						
						foreach($reviews_rows as $row){
							
							//stores review content in $text
							$text = $row['data'];
							
							//checks to see if $text is less than 350 characters
							if ( 1000 > (strlen($text)) ) {
								echo $text; 
							}else{
								//$text is higher than 350 characters so we cut the content to nearest word after 350 characters.
								//string position looks for a space around the 1000 character position in the string.
								$text = mb_substr($text, 0, strpos($text,' ',1000));
							}
							
							//Review feed item structure
							echo '<div class="frontpage-content">
									<p class="timestamp">'.time2str($row['date']).'</p>
									
									<h1 class="front-page-header">
										<a href="'.$row['url'].'" class="content-header-link">'.$row['title'].'</a>
									</h1>
									
									<p class="front-page-preview">'.strip_tags($text).'... </p>
									
									<div class="read-more">
										<a href="'.$row['url'].'" >Read More</a></p> 
									</div>
								</div>';

						}
					
					//Editorial Feed
					
					//pulls 3 editorials from the editorials table orders them from most recent
					$editorial_query = "SELECT * FROM editorials ORDER BY id DESC LIMIT 3"; 
					$editorial_result = $con -> query($editorial_query); 
					
					//fetches content according to query
					while($row = $editorial_result->fetch_array()){
						$editorial_rows[] = $row; 
					}
						
						foreach($editorial_rows as $row){
							
							//storing editorial content in $text
							$text = $row['content'];  
						
							//checking to see if editorial content is less than 350
							if ( 1000 > (strlen($text)) ) {
								echo $text;
							} else {
								//cuts content to nearest word to 350 for preview
								$text = mb_substr($text, 0, strpos($text,' ',1000));
							}
							
							//Editorial feed content structure
							echo '<div class="frontpage-content">
									<p class="timestamp">'.time2str($row['date']).'</p>
									
									<h1 class="front-page-header" >
										<a href="'.$row['url'].'" class="content-header-link">'.$row['title'].'</a>
									</h1>
									
									<p class="front-page-preview">'.strip_tags($text).'... </p>
									
									<div class="read-more">
										<a href="'.$row['url'].'">Read More</a>
									</div>
								</div>'; 
						}
				?>
				
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