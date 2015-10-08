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
				<div class="content">
					<div class="type-ribbon">
						<h3>
							GITHUB TEST - HOPES AND DREAMS BEING SHATTERED - Pick a game, nigga.
						</h3>
					</div>

				
				<?
				
					//query that pulls 3 games
						$game_query = "SELECT * FROM game ORDER BY name ASC";
						$game_result = $con -> query($game_query);

							while($row = $game_result->fetch_array()){
								$game_rows[] = $row;
							}

							foreach($game_rows as $row){

								//game list formatting
								echo '<h2>
											<a href="#" value="'.$row['id'].'" class="gameLink">'.$row['name'].'</a>
									</h2>';
							}
	
				?>
				
				</div>
				
			</div>
			<!-- End of #wrap-left -->
	
			<!-- Right side of layout -->
			<div id="sidebar">
				<? 

					include_once 'crumpocolypse/articles.php';
				?>
				
						
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

<script language="javascript">
							
	$('.gameLink').on("click", function(){
		
		var gid = $(this).attr("value");
		
		$.post("game.php", { id: gid }, function(result){ 
			$("#wrap-left").html(result)
		});
	});
				
</script>
	
	</body>
</html>