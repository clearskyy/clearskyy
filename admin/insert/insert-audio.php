<?php
session_cache_limiter('private_no_expire');
session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/admin";
	header("location:../crumpocolypse/login.php");
}

	ob_start();
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	//add a point for posting
	$points=0;
	$posts = 0;
	
	$pointsGET = $con -> prepare("SELECT points FROM users WHERE UserName = ?");
	$pointsGET -> bind_param("s",$user); $pointsGET -> execute();
	$pointsGET -> bind_result($points); $pointsGET -> store_result();
	$pointsGET -> fetch();
	
	$postsGET = $con -> prepare("SELECT posts FROM users WHERE UserName = ?");
	$postsGET -> bind_param("s",$user); $postsGET -> execute();
	$postsGET -> bind_result($posts); $postsGET -> store_result();
	$postsGET -> fetch();
	
	$points++;
	$posts++;
	
	$pointsSET = $con -> prepare("UPDATE users SET points = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$points,$user); $pointsSET -> execute();
	
	$pointsSET = $con -> prepare("UPDATE users SET posts = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$posts,$user); $pointsSET -> execute();
	
	//retrieving author id so that it can be inserted into database
	$set_id = $con -> prepare(
		"SELECT `id` FROM `Contribooter` WHERE `UserName` = ?"
	);
	$set_id -> bind_param("s",$user);
	$set_id -> execute();
	$set_id -> bind_result($id);
	$set_id -> store_result();
	$set_id -> fetch();
	
	//set values into database
	$statement = $con->prepare( 
		"INSERT INTO audio (title, content, url, date, author_id, titleLink, sidebar, embed) VALUES (?, ?, ?,NOW(), ?, ?, ?, ?)" 
	);
	$title = $_POST['title'];
	$embed = $_POST['embed'];
	$titleLink = $_POST['titleLink'];
	$sidebar = $_POST['sidebar'];
	$dateTime = date("l, F d, Y h:i a");
	$content = $_POST['content'];
	$url = strtolower($title);
	$url = explode(' ', $url);
	$url = implode('-', $url);
	$url = "http://clearskyy.net/audio/$url.php";
	
	$statement -> bind_param("sssisss",$title, $content, $url, $id, $titleLink, $sidebar, $embed);
	$statement -> execute();
	
	//variables pulled from create-audio
	$author = $_POST['author'];
	
	//audio id 
	$audio_id = $con->prepare ("SELECT id FROM audio WHERE url = ?");
	$audio_id -> bind_param("s",$url);
	$audio_id->execute();	$audio_id -> bind_result($a_id);
	$audio_id -> store_result(); $audio_id -> fetch();
	
	
	//start taking in code for audio page
	
	echo'<?php
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$a_id ="'; echo $a_id; echo '";';
	echo'
	include_once "get.php";

	
	include "../crumpocolypse/connect.php"; ?>
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
					
					<h1><a href="<? echo $titleLink; ?>" ><? echo $title; ?></a></h1>
				</div>
			</div>
			
			
			<div class="content">
				 
				<? echo $content; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php" ><? echo $author; ?></a></h2></blockquote>
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
	</body></html>';

	$out = ob_get_contents();
	ob_end_clean();
	//finsih taking in code for audio page
	
	//make page url from title
	$title = strtolower($title);
	$title = str_replace('/','-',$title);
	$title = str_replace('?','-',$title);
	$title = str_replace('#','-',$title);
	$title = explode(' ', $title);
	$title = implode('-', $title);
	
	//write it to a file
	file_put_contents("../../audio/".$title.".php",$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created audio page
	header("location:$url");

?>