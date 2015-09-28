<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$v_id ="3";
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `videos` WHERE `id` = ?");
	$titleGET -> bind_param("s",$v_id);
	$titleGET -> execute();	$titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//first name
	$get_fn = $con -> prepare ("SELECT FirstName FROM Contribooter WHERE UserName = ?");
	$get_fn -> bind_param("s", $user);
	$get_fn -> execute(); $get_fn -> bind_result($fn);
	$get_fn -> store_result(); $get_fn -> fetch();
	//last name
	$get_ln = $con -> prepare ("SELECT LastName FROM Contribooter WHERE UserName = ?");
	$get_ln -> bind_param("s", $user);
	$get_ln -> execute(); $get_ln -> bind_result($ln);
	$get_ln -> store_result(); $get_ln -> fetch();
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM videos WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT UserName FROM Contribooter WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//titleLink
	$set_titleLink = $con ->prepare("SELECT `titleLink` FROM `videos` WHERE `title` = ?");
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute(); $set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();	$set_titleLink -> fetch();
	//video
	$videoi = $con->prepare ("SELECT `content` FROM `videos` WHERE `id` = ?");
	$videoi -> bind_param("s",$v_id);
	$videoi -> execute();	$videoi->bind_result($content); 
	$videoi -> store_result(); $videoi->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `videos` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$v_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `videos` WHERE `id` = ?");
	$embedGET -> bind_param("s",$v_id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> video for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
	<? require "../crumpocolypse/header.php"; ?>
	<title><? echo $title; ?> | clearskyy</title>
	</head><body>
	
	<? include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Video #<? echo $v_id; ?></h3>
				</div>
					<p id="date"><? echo $dateTime; ?></p>
				 <div id="avatar">
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" width="40%" />
				 	<br />
					<? echo $embed; ?>
					
					<h1><a href="<? echo $titleLink; ?>" target="_blank"><? echo $title; ?></a></h1>
				</div>
				 
				<? echo $content; ?>
				 
			<blockquote><h2>author:&nbsp;<? echo '<a href="'.$_SERVER["DOCUMENT ROOT"].'/profiles/'.$author.'.php">'.$author; ?></a></h2></blockquote>
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