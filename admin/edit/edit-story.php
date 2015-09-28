<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/admin";
	header("location:../../crumpocolypse/login.php");
}

	include_once $_SERVER["DOCUMENT_ROOT"]."/crumpocolypse/dbCon.php";
	
	$title = $_POST['title'];
	$old_title = $_POST['title'];
	
	$set_ragequit = $con ->prepare(
		'SELECT `content` FROM `stories` WHERE `title` = ?'
	);
	$set_ragequit -> bind_param("s", $title);
	$set_ragequit -> execute();
	$set_ragequit -> bind_result($content);
	$set_ragequit -> store_result();
	$set_ragequit -> fetch();
	
	$set_imgSrc = $con ->prepare(
		'SELECT `imgSrc` FROM `stories` WHERE `title` = ?'
	);
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute();
	$set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();
	$set_imgSrc -> fetch();
	
	$set_imgAlt = $con ->prepare(
		'SELECT `imgAlt` FROM `stories` WHERE `title` = ?'
	);
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();
	$set_imgAlt -> fetch();
	
	$set_imgTitle = $con ->prepare(
		'SELECT `imgTitle` FROM `stories` WHERE `title` = ?'
	);
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();
	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();
	$set_imgTitle -> fetch();
	
	$sidebarGET = $con ->prepare(
		'SELECT `sidebar` FROM `stories` WHERE `title` = ?'
	);
	$sidebarGET -> bind_param("s", $title);
	$sidebarGET -> execute();
	$sidebarGET -> bind_result($sidebar);
	$sidebarGET -> store_result();
	$sidebarGET -> fetch();

	$setID = $con->prepare(
		'SELECT `id` FROM `stories` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($id);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `url` FROM `stories` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($url);
	$setID -> store_result();
	$setID -> fetch();
	
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `stories` WHERE `id` = ?");
	$embedGET -> bind_param("s",$id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

?>

<!doctype html><html><head>
<!-- edit review page for clearskky.net by nate seymour  -->
<?php require $_SERVER["DOCUMENT_ROOT"].'/crumpocolypse/create-header.php'; ?>

<title>Edit <? echo $title; ?> | clearskyy</title>
</head><body>

<? include_once $_SERVER["DOCUMENT_ROOT"].'/crumpocolypse/menu.php'; ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">

		<div id="avatar">
		<h2>Editing as <? echo $user; ?>

		<h1><? echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-story.php" method="post" enctype="multipart/form-data">
		
			<h2>embed </h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<? echo htmlspecialchars($embed); ?>" />
			
			<h2>image</h2>
			
			<input type="text" name="imgSrc" placeholder="place image url here" value="<? echo htmlspecialchars($imgSrc); ?>" />
			
			<br />
			
			<input type="text" name="imgAlt" placeholder="describe the image briefly" value="<? echo htmlspecialchars($imgAlt); ?>" /> 
			
			<br />
			
			<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" value="<? echo htmlspecialchars($imgTitle); ?>" /> 
			
			<br />
			
			<h2>title</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<? echo htmlspecialchars($title); ?>" /> 
			
			<br />
			
			
			<h2>Content</h2>
			<textarea name="review" placeholder="type up your review in here. (required)" ><? echo htmlspecialchars($content); ?></textarea> 
			<h2>sidebar</h2>
			<textarea name="sidebar" ><? echo htmlspecialchars($sidebar); ?></textarea> 
			
			<input type="hidden" name="id" value="<? echo $id ?>" />
			<input type="hidden" name="url" value="<? echo $url  ?>" />
			
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

</div>
</body></html>