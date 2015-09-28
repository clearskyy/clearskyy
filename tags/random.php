<?php

session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 

// connect to the database server
$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
?>

<!doctype html><html><head><title>Random | clearskyy</title>
<!-- random listing page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
</head><body>

<?php include_once '../crumpocolypse/menu.php' ?>

<div id="nexus">
	<div id="wrap-left">
		<div class="content">
		
			<h2 align="center">random</h2>
			
			<table cellpadding="4" border="2">
			<?
				echo '<tr><th colspan="2">editorials</th></tr>';
				//query that grabs the rows and columns from editorials that have the proper category id
				$perGET = $con->prepare("SELECT title,date,url FROM `editorials` WHERE `c_id` = 7 ORDER BY date ASC");
				$perGET->execute();
				$perGET->bind_result($title,$date,$url);
				while($perResult = $perGET->fetch()){
					echo '<tr><td><a href="'.$url.'" target="_blank">'.$title.'</a></td><td>'.date('F j, Y', strtotime($date)).'</td></tr>';
				}
				
				echo '<tr><th colspan="2">reviews</th></tr>';
				//query that grabs the rows and columns from editorials that have the proper category id
				$perGET = $con->prepare("SELECT title,date,url FROM `reviews` WHERE `c_id` = 7 ORDER BY date ASC");
				$perGET->execute();
				$perGET->bind_result($title,$date,$url);
				while($perResult = $perGET->fetch()){
					echo '<tr><td><a href="'.$url.'" target="_blank">'.$title.'</a></td><td>'.date('F j, Y', strtotime($date)).'</td></tr>';
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