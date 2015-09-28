<?php

session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 

	include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
?>

<!doctype html><html><head><title>MySQL | clearskyy</title>
<!-- MySQL listing page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
</head><body>

<?php include_once '../crumpocolypse/menu.php' ?>

<div id="nexus">
	<div id="wrap-left">
		<div class="content">
		
			<h2 align="center">MySQL</h2>
			
			<table cellpadding="4" border="2">
			<?
				//query that grabs the rows and columns from editorials that have the proper category id
				$editorialGET = $con->prepare("SELECT title,date,url FROM `editorials` WHERE `c_id` = 25 ORDER BY date ASC");
				$editorialGET->execute();
				$editorialGET->bind_result($title,$date,$url);
				if ($editorialGET != NULL){
					echo '<tr><th colspan="2">Editorials</th></tr>';
					while($perResult = $editorialGET->fetch()){
						echo '<tr><td><a href="'.$url.'" target="_blank">'.$title.'</a></td><td>'.date('F j, Y', strtotime($date)).'</td></tr>';
					}
				}
			
				//query that grabs the rows and columns from editorials that have the proper category id
				$reviewsGET = $con->prepare("SELECT title,date,url FROM `reviews` WHERE `c_id` = 25 ORDER BY date ASC");
				$reviewsGET->execute();
				$reviewsGET->bind_result($title,$date,$url);
				if ($reviewsGET != NULL){
					echo '<tr><th colspan="2">Reviews</th></tr>';
					while($perResult = $reviewsGET->fetch()){
						echo '<tr><th colspan="2">reviews</th></tr><tr><td><a href="'.$url.'" target="_blank">'.$title.'</a></td><td>'.date('F j, Y', strtotime($date)).'</td></tr>';
					}
				}
				
				//query that grabs the rows and columns from editorials that have the proper category id
				$perGET = $con->prepare("SELECT title,date,url FROM `learn` WHERE `c_id` = 25 ORDER BY date ASC");
				$perGET->execute();
				$perGET->bind_result($title,$date,$url);
				if($perGET != NULL){
					echo '<tr><th colspan="2">Tutorials</th></tr>';
					while($perResult = $perGET->fetch()){
						echo '<tr><td><a href="'.$url.'" target="_blank">'.$title.'</a></td><td>'.date('F j, Y', strtotime($date)).'</td></tr>';
					}
				}
				
				
			?>
			</table>
		
		</div>
		<!--endof CONTENT-->
		
	</div>
	<!--endof WRAPLEFT-->
	
	
	<div id="sidebar">
		<?
			include_once '../crumpocolypse/articles.php'
		?>
	</div>
	<!--endof SIDEBAR-->
</div>
<!--endof NEXUS-->

<? include_once '../crumpocolypse/caboose.php' ?>

</body></html>