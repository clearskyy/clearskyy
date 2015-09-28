<?php
	session_cache_limiter("private_no_expire");
	session_start();
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$e_id ="37";
	include_once "get.php";

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> editorial for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
	<? require "../crumpocolypse/header.php"; ?>
	<title><? echo $title; ?> | clearskyy</title>
	</head><body>
<!--
<? include_once "../crumpocolypse/sig.php"; ?>
-->
	<? include_once "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Editorial #<? echo $e_id; ?></h3>
				</div>
					<p id="date"><? echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<? echo $embed; ?>
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" style="width:50%;" />
				 		
					<h1><? echo $title; ?></h1>
				</div>
				 
				<?php echo $content; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php"><? echo $author; ?></a></h2></blockquote>
				
				<? include_once "../reviews/js-share.php"; ?>
				
			</div>
			
			
			<div class="content">
				<? include_once "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<? echo $sidebarCrap ?>
			<br />
			<? include_once "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<? include "../crumpocolypse/caboose.php"; ?>
	</body>
</html>