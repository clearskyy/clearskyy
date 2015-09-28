<?php
session_cache_limiter("private_no_expire");
session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/learn/insert-learn.php";
	header("location:../crumpocolypse/login.php");
}
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
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
		"INSERT INTO learn (title, content, url, date, author_id, imgSrc, imgAlt, imgTitle, sidebar, c_id) VALUES (?, ?, ?,NOW(), ?, ?, ?, ?, ?, ?)" 
	);
	$title = $_POST['title'];
	$imgSrc = $_POST['imgSrc'];
	$imgAlt = $_POST['imgAlt'];
	$imgTitle = $_POST['imgTitle'];
	$sidebar = $_POST['sidebar'];
	$cid = $_POST['cid'];
	$dateTime = date("l, F d, Y h:i a");
	$content = $_POST['content'];
	$url = strtolower($title);
	$url = explode(' ', $url);
	$url = implode('-', $url);
	$url = "http://clearskyy.net/learn/$url.php";
	
	$statement -> bind_param("sssissssi",$title, $content, $url, $id, $imgSrc, $imgAlt, $imgTitle, $sidebar, $cid);
	$statement -> execute();
	
	//variables pulled from create-learn
	$author = $_POST['author'];
	
	//learn id 
	$learnID = $con->prepare ("SELECT id FROM learn WHERE title = ?");
	$learnID -> bind_param("s",$title);
	$learnID->execute();	$learnID -> bind_result($l_id);
	$learnID -> store_result(); $learnID -> fetch();
	
	
	//start taking in code for learn page
	ob_start();
	
	echo'<?php
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$l_id ="'; echo $l_id; echo '";';
	echo'
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `learn` WHERE `id` = ?");
	$titleGET -> bind_param("s",$l_id);
	$titleGET -> execute();	$titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM learn WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT username FROM users WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//imgSrc
	$set_imgSrc = $con ->prepare("SELECT `imgSrc` FROM `learn` WHERE `title` = ?");
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute(); $set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();	$set_imgSrc -> fetch();
	//imgAlt
	$set_imgAlt = $con ->prepare("SELECT `imgAlt` FROM `learn` WHERE `title` = ?");
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();	$set_imgAlt -> fetch();
	//imgTitle
	$set_imgTitle = $con ->prepare("SELECT `imgTitle` FROM `learn` WHERE `title` = ?");
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();	$set_imgTitle -> fetch();
	//content
	$learnGET = $con->prepare ("SELECT `content` FROM `learn` WHERE `id` = ?");
	$learnGET -> bind_param("s",$l_id);
	$learnGET -> execute();	$learnGET->bind_result($content); 
	$learnGET -> store_result(); $learnGET->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `learn` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$l_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();
	//date
	$dateGET = $con->prepare ("SELECT `date` FROM `learn` WHERE `id` = ?");
	$dateGET -> bind_param("s",$l_id);
	$dateGET -> execute();	$dateGET->bind_result($date); 
	$dateGET -> store_result(); $dateGET->fetch();
	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <? echo $title; ?> learn for clearskyy.net by <? echo $fn ." ". $ln; ?> -->
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
					<h3>Lesson #<? echo $l_id; ?></h3>
				</div>
					<p id="date"><? echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" width="40%" />
				 		
					<h1><? echo $title; ?></h1>
				</div>
				 
				<? echo $content; ?>
				 
			<blockquote><h2>author:&nbsp; <a href="../profiles/<? echo $author; ?>.php"><? echo $author; ?></a></h2></blockquote>
			</div>
			
			
			<div class="content">
				<? include_once "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<? echo $sidebarCrap; ?>
			<br />
			<? include_once "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<? include_once "../crumpocolypse/caboose.php"; ?>
	</body></html>';

	$out = ob_get_contents();
	ob_end_clean();
	//finsih taking in code for learn page
	
	//make page url from title
	$title = strtolower($title);
	$title = str_replace('/','-',$title);
	$title = str_replace('?','-',$title);
	$title = str_replace('#','-',$title);
	$title = explode(' ', $title);
	$title = implode('-', $title);
	
	//write it to a file
	file_put_contents("../../learn/".$title.".php",$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created learn page
	header("location:$url");

?>