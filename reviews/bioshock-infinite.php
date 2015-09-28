<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$r_id ="69";
	
	include_once "get.php";
	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <?php echo $title; ?> review for clearskyy.net by <?php echo $fn ." ". $ln; ?> -->
	<?php require "../crumpocolypse/header.php"; ?>
	<title><?php echo $title; ?> | clearskyy</title>
	</head><body>
	
	<?php include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Review #<?php echo $r_id; ?></h3>
				</div>
					<p id="date"><?php echo $dateTime; ?></p>
				 <div id="avatar">
					<img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>" title="<?php echo $imgTitle; ?>" width="40%" />
				 	<br />
					<?php echo $embed; ?>
					
					<h1><a href="<?php echo $titleLink; ?>" target="_blank"><?php echo $title; ?></a></h1>
				</div>
				 
				<?php echo $review; ?>
				 
			<p><em>written by</em>: <a href="../profiles/<?php echo $author; ?>.php" target="_blank"><?php echo $author; ?></a></p>
				<? include_once "js-share.php"; ?>
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