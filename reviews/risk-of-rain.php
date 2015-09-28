<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$r_id ="93";
	
	include_once "get.php";

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> review for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
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
					<h3>Review #<? echo $r_id; ?></h3>
				</div>
					<p id="date"><? echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" width="40%" />
				 	<br />
					<? echo $embed; ?>
					
					<h1><a href="<? echo $titleLink; ?>" target="_blank"><? echo $title; ?></a></h1>
				</div>
				 
				<? echo $review; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php" target="_blank"><? echo $author; ?></a></h2></blockquote>
				<? include_once "js-share.php"; ?>
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