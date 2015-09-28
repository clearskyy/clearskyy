<?PHP
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$a_id ="11";
	include_once "get.php"

?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> audio for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
	<? require "../crumpocolypse/header.php"; ?>
	<title><? echo $title; ?> | clearskyy</title>
	</head><body>
<!--
<? include_once "../crumpocolypse/sig.php"; ?>
-->
	<? include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>audio #<? echo $a_id; ?></h3>
				</div>
					<p id="date"><? echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<? echo $embed; ?>
					
					<h1><a href="<? echo $titleLink; ?>" target="_blank"><? echo $title; ?></a></h1>
				</div>
			</div>
			
			
			<div class="content">
				 
				<? echo $content; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php" target="_blank"><? echo $author; ?></a></h2></blockquote>
			</div>
			
			
			<div class="content">
				<? include "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<? echo $sidebarCrap ?>
			<br />
			<? include "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<? include "../crumpocolypse/caboose.php"; ?>
	</body></html>