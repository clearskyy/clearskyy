<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/walkthru/edit-wt.php";
	header("location:../../crumpocolypse/login.php");
}

//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$title = $_POST['title'];
	$old_title = $_POST['title'];
	
	$set_review = $con ->prepare(
		'SELECT `content` FROM `wt` WHERE `title` = ?'
	);
	$set_review -> bind_param("s", $title);
	$set_review -> execute();
	$set_review -> bind_result($content);
	$set_review -> store_result();
	$set_review -> fetch();
	
	$set_imgSrc = $con ->prepare(
		'SELECT `imgSrc` FROM `wt` WHERE `title` = ?'
	);
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute();
	$set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();
	$set_imgSrc -> fetch();
	
	$set_imgAlt = $con ->prepare(
		'SELECT `imgAlt` FROM `wt` WHERE `title` = ?'
	);
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();
	$set_imgAlt -> fetch();
	
	$set_imgTitle = $con ->prepare(
		'SELECT `imgTitle` FROM `wt` WHERE `title` = ?'
	);
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();
	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();
	$set_imgTitle -> fetch();
	
	$set_titleLink = $con ->prepare(
		'SELECT `titleLink` FROM `wt` WHERE `title` = ?'
	);
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute();
	$set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();
	$set_titleLink -> fetch();
	
	$sidebarGET = $con ->prepare(
		'SELECT `sidebar` FROM `wt` WHERE `title` = ?'
	);
	$sidebarGET -> bind_param("s", $title);
	$sidebarGET -> execute();
	$sidebarGET -> bind_result($sidebar);
	$sidebarGET -> store_result();
	$sidebarGET -> fetch();

	$setID = $con->prepare(
		'SELECT `id` FROM `wt` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($id);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `url` FROM `wt` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($url);
	$setID -> store_result();
	$setID -> fetch();
	
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `wt` WHERE `id` = ?");
	$embedGET -> bind_param("s",$r_id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

?>

<!doctype html><html><head>
<!-- edit review page for clearskky.net by nate seymour  -->
<? require '../../crumpocolypse/create-header.php' ?>

<title>Edit <? echo $title; ?> | clearskyy</title>
</head><body>

<? include_once '../../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">

		<div id="avatar">
		<h2>Editing as <? echo $user; ?>

		<h1><? echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-wt.php" method="post" enctype="multipart/form-data">
			
			<h2>walkthrough video embed </h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<? echo htmlspecialchars($embed); ?>" />
			
			<h2>walkthrough image</h2>
			
			<input type="text" name="imgSrc" placeholder="place image url here" value="<? echo htmlspecialchars($imgSrc); ?>" /> 
			
			<br />
			
			<input type="text" name="imgAlt" placeholder="describe the image briefly" value="<? echo htmlspecialchars($imgAlt); ?>" /> 
			
			<br />
			
			<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" value="<? echo htmlspecialchars($imgTitle); ?>" /> 
			
			<br />
			
			<h2>title</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<? echo htmlspecialchars($title); ?>" /> 
			
			<br />
			
			<input type="text" name="titleLink" placeholder="link to item under review (link to amazon or whatever)" value="<? echo htmlspecialchars($titleLink); ?>" /> 
			
			<br />
			
			<h2>edit</h2>
			<textarea name="content" class="ckeditor" rows="20" placeholder="type up your review in here. (required)" ><? echo htmlspecialchars($content); ?></textarea> 
			<br />
			<h2>sidebar</h2>
			<textarea name="sidebar" class="ckeditor" rows="20" ><? echo htmlspecialchars($sidebar); ?></textarea> 
			
			<input type="hidden" name="id" value="<? echo $id ?>" />
			<input type="hidden" name="url" value="<? echo $url  ?>" />
			
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

</div>
</body></html>