<?php

// connect to the database server
$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$slquery = "SELECT * FROM seemslegit ORDER BY date DESC";
	
	$slresult = $con->query($slquery);
	
	while($slrow = $slresult->fetch_array()){
		$slrows[] = $slrow;
	}

?>

<!doctype html>
<html>
	<head>
	<!-- REVIEW INDEX - tutorial listing page for clearskky.net by nate seymour  -->
	<? require '../crumpocolypse/header.php' ?>
	<title>seems legit | clearskyy</title>
	</head>
	<body>

	<? include '../crumpocolypse/menu.php' ?>

	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Seems Legit</h3>
				</div>
				<br />
				<table cellpadding="6"  border="2" id="voting">
					<tr>
						<th colspan="2">2013</th>
					</tr>
					<?
					foreach($slrows as $slrow){
						echo '<tr>
							<td><a href="'.$slrow['url'].'"><h2>'.$slrow['title'].'</h2></a></td>
							<td>'.date("F j, Y", strtotime($slrow['date'])).'</td>
						</tr>';
					}
					?>
					<tr class="th-main">
						<th colspan="2">Gaming Peripherals</th>
					</tr>
					<tr>
						<td><a href="kombatman-controller.php">Kombatman 1337 BattleArena Controller</a></td>
						<td>March 7, 2013</td>
					</tr>
				</table>
				
			</div>
			<!-- End of "content" -->
	
		</div>
		<!-- End of "wrap-left" -->
	
		<div id="sidebar">
			<? include '../crumpocolypse/articles.php' ?>
		</div>
		<!-- End of "sidebar" -->

	</div>
	<!-- End of Nexus -->

	<? include '../crumpocolypse/caboose.php' ?>
	
	</body>
</html>