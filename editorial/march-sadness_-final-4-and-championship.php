<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$e_id ="12";
	include_once "get.php";

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <?php echo $title; ?> editorial for clearskyy.net by <?php echo $fn ." ". $ln; ?> -->
	<?php require "../crumpocolypse/header.php"; ?>
	<title><?php echo $title; ?> | clearskyy</title>
	</head><body>
	
	<?php include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Editorial #<?php echo $e_id; ?></h3>
				</div>
					<p id="date"><?php echo $dateTime; ?></p>
				 <div id="avatar">
					<img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>" title="<?php echo $imgTitle; ?>" width="40%" />
				 		
					<h1><?php echo $title; ?></h1>
				</div>
			</div>
			
			
			<div class="content">
				 
				<?php echo $content; ?>
				 
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