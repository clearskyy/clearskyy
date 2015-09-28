<?php

	ob_start();
	session_cache_limiter('private_no_expire');
	session_start();

	if( isset( $_SESSION['user'] )){
		$user = $_SESSION['user'];
		$message =  $user ." is logged in";
	} 
	else {
		$user = "";
		$_SESSION['referer'] = "http://clearskyy.net/reviews/insert-review.php";
		header("location:../crumpocolypse/login.php");
	}
	
	include $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	
	//add a point for posting
	$points = $posts = 0;
	
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
		"INSERT INTO reviews (title, data, url, date, author_id, imgSrc, imgAlt, imgTitle, titleLink, embed, c_id) VALUES (?, ?, ?,NOW(), ?, ?, ?, ?, ?, ?, ?)" 
	);
	$title = $_POST['title'];
	$embed = $_POST['embed'];
	$imgSrc = $_POST['imgSrc'];
	$imgAlt = $_POST['imgAlt'];
	$imgTitle = $_POST['imgTitle'];
	$titleLink = $_POST['titleLink'];
	$cid = $_POST['cid'];
	$dateTime = date("l, F d, Y h:i a");
	$review = $_POST['review'];
	$url = strtolower($title);
	$url = explode(' ', $url);
	$url = implode('-', $url);
	$url = "http://clearskyy.net/reviews/$url.php";
	
	$statement -> bind_param("sssisssssi",$title, $review, $url, $id, $imgSrc, $imgAlt, $imgTitle, $titleLink, $embed, $cid);
	$statement -> execute();
	
	//review id 
	$review_id = $con->prepare ("SELECT `id` FROM `reviews` WHERE url = ?");
	$review_id -> bind_param("s",$url);
	$review_id->execute();	$review_id -> bind_result($r_id);
	$review_id -> store_result(); $review_id -> fetch();
	
	
	//start taking in code for review page
	
	echo'<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$r_id ="'; echo $r_id; echo '";';
	echo'
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
					<img src="<? echo $imgSrc; ?>" alt="<? echo $imgAlt; ?>" title="<? echo $imgTitle; ?>" width="40%" />
				 	<br />
					<? echo $embed; ?>
					
					<h1><a href="<? echo $titleLink; ?>" ><? echo $title; ?></a></h1>
				</div>
				 
				<? echo $review; ?>
				 
			<blockquote>
				<h2>
					<? $gravatar_link = "http://www.gravatar.com/avatar/" . md5($author_email); ?>
						<img src="<? echo $gravatar_link ?>" />;
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
	</body></html>';

	$out = ob_get_contents();
	ob_end_clean();
	//finish taking in code for review page
	
	//make page URL from title
	$title = strtolower($title);
	$title = str_replace('/','-',$title);
	$title = str_replace('?','-',$title);
	$title = str_replace('#','-',$title);
	$title = str_replace(':','-',$title);
	$title = explode(' ', $title);
	$title = implode('-', $title);
	
	//write it to a file
	file_put_contents("../../reviews/".$title.".php",$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created review page
	header("location:$url");

?>