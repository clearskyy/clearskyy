<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$r_id ="105";
	include_once "get.php";

?>
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
					<? echo $embed; ?>
					
					<h1><a href="<? echo $titleLink; ?>" ><? echo $title; ?></a></h1>
				</div>
				 
				<? echo $review; ?>
				 
			<blockquote>
				<h2>
					<?
						$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($author_email);
						echo '<img src="' . $gravatar_link . '" />';
					?>
					<a href="../profiles/<? echo $author; ?>.php"><? echo $author; ?></a>
				</h2>
			</blockquote>
			
			<? include_once "js-share.php"; ?>
			
			</div>
			
			
			<div class="content">
				<? include "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<? include "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<? include "../crumpocolypse/caboose.php"; ?>
	</body></html>