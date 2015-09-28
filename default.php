<?php 
session_start();
if( isset( $_SESSION["user"] )){
	$user = $_SESSION["user"];
}
 
?>

<!doctype html><html><head>

<link rel="icon" type="image/png" href="./crumpocolypse/img/tinylogo16.png">
<!-- jquery nonsense -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="./crumpocolypse/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="crumpocolypse/nexus.js"></script>
<script type="text/javascript" src="crumpocolypse/effects.js"></script>
<script type="text/javascript" src="crumpocolypse/jquery.autosize-min.js"></script>
<!-- CSS -->
<link type="text/css" rel="stylesheet" href="crumpocolypse/super-cool-style-bro.css" />
<link type="text/css" rel="stylesheet" href="crumpocolypse/js/jquery.bxslider.css" />
<meta name="viewport" content="width=device-width" />


<title>welcome | clearskyy</title>
<meta name="description" content="clearskyy is dedicated to providing you with tutorials, stories, reviews and overly opinionated rants that you'll love.">
<meta name="google-site-verification" content="2DMYY1MuzFoeDSXZraKovWvT9JyKvEzJb3ZixB_65vQ" />
</head><body>

<? include 'crumpocolypse/menu.php'; ?>

<? include 'crumpocolypse/time2str.php'; ?>

<div id="nexus">
<div id="wrap-left">
	
	<!--<div class="content">
		<h2 style="color:#222;text-align:center;">REVIEWS</h2>
	</div>-->
	<?
		
		$review_query = "SELECT * FROM reviews ORDER BY id DESC LIMIT 3";
			$reviews_result = $con -> query($review_query);
		
			while($row = $reviews_result->fetch_array())
			{
				$reviews_rows[] = $row;
			}
			
			foreach($reviews_rows as $row)
			{
			
				echo '
					<div class="content" style="margin:0 5% 0 0;overflow:hidden;width:31%;float:left;clear:right;height:30em;text-align:center;">
					<p class="timestamp">'.time2str($row['date']).'</p>
					<p>&nbsp;</p>
					<img src="'.$row['imgSrc'].'" class="frontpage-image" />
					<h2><a href="'.$row['url'].'" class="content-header-link" target="_blank" style="color:#FFF;">'.$row['title'].'</a></h2>
					';
			
				$text = $row['data'];
			
				if ( $length > (strlen($text)) ) {
					echo $text;
				}else 
				{
					$text = mb_substr($text, 0, strpos($text, ' ', 350));
				}
			
				echo '<p class="front-page-preview" style="text-align:left;">'.strip_tags($text).'... </p>
					<div class="read-more">
						<a href="'.$row['url'].'" target="_blank">Read More</a>
					</div>		
				</div>';

			}
			?>
		<!--<div class="content">
			<h2>Editorials</h2>
		</div>-->
			<?
		
		$editorial_query = "SELECT * FROM editorials ORDER BY id DESC LIMIT 3";
			$editorial_result = $con -> query($editorial_query);
		
			while($row = $editorial_result->fetch_array()){
				$editorial_rows[] = $row;
			}
			
			foreach($editorial_rows as $row)
			{
				//upvote, downvote shit
				$up = "u"; $down = "d"; $post_url = $row['url'];
				
				$d_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
				$d_count->bind_param("ss",$post_url,$down); $d_count->execute(); $d_count->bind_result($dvotes); $d_count->store_result(); $d_count->fetch();
				
				$u_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
				$u_count->bind_param("ss",$post_url,$up); $u_count->execute(); $u_count->bind_result($uvotes); $u_count->store_result(); $u_count->fetch();
				
				$votes = $uvotes - $downvotes;
				
				$dtv = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
				$dtv->bind_param("ss",$post_url,$SERVER['REMOTE_ADDR']); $dtv->execute(); $dtv->bind_result($dtc); $dtv->store_result(); $dtv->fetch();
				
				//editorial feed
			
				echo '<div class="content" style="margin:0;overflow:hidden;">
						
						<p class="timestamp">';
							if( $dvotes > $uvotes ){
								echo '<td><span class="neg">'.$votes.'</span></td></tr>';
							}else{
								echo '<td><span class="pos">'.$votes.'</span></td></tr>';
							}
							
							if($dtc == 1){
								echo '&nbsp;';
							}else{
								echo '
									<a href="#!" class="upvote">
										Upvote
										<input type="hidden" value="'.$row['url'].'" class="URL" />
										<input type="hidden" value="u" class="upOrDown" />
										<input type="hidden" name="vote" class="voteValue" />	
										<input type="hidden" name="posturl" class="postURL" />
									</a>
									<a href="#!" class="upvote">
										Downvote
										<input type="hidden" value="'.$row['url'].'" class="URL" />
										<input type="hidden" value="d" class="upOrDown" />
										<input type="hidden" name="vote" class="voteValue" />	
										<input type="hidden" name="posturl" class="postURL" />
									</a>';
							}
							echo time2str($row['date']);
						echo '</p>
						<h1 align="center" ><a href="'.$row['url'].'" class="content-header-link" target="_blank">'.$row['title'].'</a></h1>';
			
				$text = $row['content'];
			
				if ( $length > (strlen($text)) ) {
					echo $text;
				}else 
				{
					$text = mb_substr($text, 0, strpos($text,' ',350));
				}
			
				echo '<p class="front-page-preview2">'.strip_tags($text).'... </p>
				
					<div class="read-more2">
						<a href="'.$row['url'].'" target="_blank">Read More</a>
					</div>
						</div>';

			}
			?>
	
</div>
<!-- End of "wrap-left" -->
	


	<div id="sidebar">
		<ul class="bxslider" style="margin:0">
			<li style="left:0;"><img src="crumpocolypse/img/slider-image-1.png" /></li>
			
			<li style="left:0;"><a href="http://www.clearskyy.net/editorial/pica-pic.php" target="_blank"><img src="http://clearskyy.net/crumpocolypse/upload/picapic.png" title="click here to find out more about digitized handheld games free to play online" /></a></li>
			
			<li style="left:0;"><a href="http://www.clearskyy.net/reviews/metro:-last-light.php" target="_blank"><img src="http://clearskyy.net/crumpocolypse/upload/metrolastlightslide.png" title="NexusSloth fills us in on some details of the new Metro game" /></a></li>
			
			<li style="left:0;"><a href="http://www.clearskyy.net/reviews/hawken.php" target="_blank"><img src="crumpocolypse/img/slider-image-4.png" title="click here to learn more about this exciting mech FPS" /></a></li>
			
			<li style="left:0;"><img src="crumpocolypse/img/slider-image-3.png" title="give your kitty a break and chill with us" /></li>
		</ul>
		
		<br />
		
		<?
			include 'crumpocolypse/articles.php';
		?>
		
		
	</div>
	
	<!-- End of "sidebar" -->

	
</div>
<!-- End of Nexus -->

	<?php include 'crumpocolypse/caboose.php' ?>

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
clearskky.net by nate seymour  
-->	
<body></html>