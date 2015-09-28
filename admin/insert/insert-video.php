<?php
session_cache_limiter("private_no_expire");
session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/videos/insert-video.php";
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
		"INSERT INTO videos (title, content, url, date, author_id, titleLink, sidebar, embed, c_id) VALUES (?, ?, ?,NOW(), ?, ?, ?, ?, ?)" 
	);
	$title = $_POST['title'];
	$embed = $_POST['embed'];
	$titleLink = $_POST['titleLink'];
	$sidebar = $_POST['sidebar'];
	$dateTime = date("l, F d, Y h:i a");
	$content = $_POST['content'];
	$cid = $_POST['category'];
	$url = strtolower($title);
	$url = explode(' ', $url);
	$url = implode('-', $url);
	$url = "http://clearskyy.net/videos/$url.php";
	
	$statement -> bind_param("sssisssi",$title, $content, $url, $id, $titleLink, $sidebar, $embed, $cid);
	$statement -> execute();
	
	//variables pulled from create-video
	$author = $_POST['author'];
	
	//video id 
	$video_id = $con->prepare ("SELECT id FROM videos WHERE url = ?");
	$video_id -> bind_param("s",$url);
	$video_id->execute();	$video_id -> bind_result($v_id);
	$video_id -> store_result(); $video_id -> fetch();
	
	
	//start taking in code for video page
	ob_start();
	
	echo'<?php
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$v_id ="'; echo $v_id; echo '";';
	echo'
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `videos` WHERE `id` = ?");
	$titleGET -> bind_param("s",$v_id);
	$titleGET -> execute();	$titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM videos WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT username FROM users WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//titleLink
	$set_titleLink = $con ->prepare("SELECT `titleLink` FROM `videos` WHERE `title` = ?");
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute(); $set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();	$set_titleLink -> fetch();
	//video id from database
	$video_id = $con->prepare ("SELECT id FROM videos WHERE url = ?");
	$video_id -> bind_param("s",$url);
	$video_id->execute();	$video_id -> bind_result($v_id);
	$video_id -> store_result(); $video_id -> fetch();
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
	//date
	$dateGET = $con->prepare ("SELECT `date` FROM `videos` WHERE `id` = ?");
	$dateGET -> bind_param("s",$v_id);
	$dateGET -> execute();	$dateGET->bind_result($date); 
	$dateGET -> store_result(); $dateGET->fetch();

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> video for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
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
					<h3>Video #<? echo $v_id; ?></h3>
				</div>
					<p id="date"><? echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" width="40%" />
				 	<br />
					<? echo $embed; ?>
					
					<h1><a href="<? echo $titleLink; ?>" target="_blank"><? echo $title; ?></a></h1>
				</div>
				 
				<? echo $content; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php"><? echo $author; ?></a></h2></blockquote>
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
	//finsih taking in code for video page
	
	//make page url from title
	$title = strtolower($title);
	$title = str_replace('/','-',$title);
	$title = str_replace('?','-',$title);
	$title = str_replace('#','-',$title);
	$title = str_replace('"','-',$title);
	$title = explode(' ', $title);
	$title = implode('-', $title);
	
	//write it to a file
	file_put_contents("../../videos/".$title.".php",$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created video page
	header("location:$url");

?>