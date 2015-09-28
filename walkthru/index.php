<?php

	include_once '../crumpocolypse/dbCon.php';
	
	$query = "SELECT * FROM wt ORDER BY date DESC";
	
	$wtresult = $con->query($query);
	
	while($wtrow = $wtresult->fetch_array()){
		$wtrows[] = $wtrow;
	}
?>	


<!doctype html>
<html>
	<head>
		<title>walkthroughs | clearskyy</title>
		<!-- WALKTHROUGH INDEX - tutorial listing page for clearskky.net by nate seymour  -->

		<? require "../crumpocolypse/header.php"; ?>

	</head>
	<body>
		<? include "../crumpocolypse/menu.php"; ?>
 
		<div id="nexus">
			<div id="wrap-left">
				<div class="content">
					<div class="type-ribbon">
						<h3>Walkthroughs</h3>
					</div>
					<br />
					<table cellpadding="6"  border="2" id="voting">
						<tr class="th-main">
							<th>Game</th>
							<th>Date started </th>
						</tr>
						<?
						foreach($wtrows as $wtrow){
							echo '<tr>
							<td><a href="'.$wtrow['url'].'"><h2>'.$wtrow['title'].'</h2></a></td>
							<td>'.date("F j, Y",strtotime($wtrow['date'])).'</td>
						</tr>';
						}
						?>
					</table>
				</div>
				<!-- End of "content" -->
	
			</div>
			<!-- End of "wrap-left" -->
	
			<div id="sidebar">
			<? include "../crumpocolypse/articles.php"; ?>

			</div>
			<!-- End of "sidebar" -->

		</div>
		<!-- End of Nexus -->

	<? include "../crumpocolypse/caboose.php"; ?>
	</body>
</html>