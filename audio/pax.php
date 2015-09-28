<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$a_id ="2";

	include_once "get.php";

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <?php echo $title; ?> audio for clearskyy.net by <?php echo $fn ." ". $ln; ?> -->
	<?php require "../crumpocolypse/header.php"; ?>
	<title><?php echo $title; ?> | clearskyy</title>
	</head><body>
	
	<?php include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>audio #<?php echo $a_id; ?></h3>
				</div>
					<p id="date"><?php echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<?php echo $embed; ?>
					
					<h1><a href="<?php echo $titleLink; ?>" target="_blank"><?php echo $title; ?></a></h1>
				</div>
			</div>
			
			
			<div class="content">
				 
				<?php echo $content; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php" target="_blank"><? echo $author; ?></a></h2></blockquote>
			</div>
			
			
			<div class="content">
				<?php include "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<?php echo $sidebarCrap ?>
			<br />
			<?php include "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<?php include "../crumpocolypse/caboose.php"; ?>
	</body></html>