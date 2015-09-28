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

//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	
	
	
	$title = $_POST['title'];
	$old_title = $_POST['title'];
	
	$set_content = $con ->prepare(
		'SELECT `content` FROM `videos` WHERE `title` = ?'
	);
	$set_content -> bind_param("s", $title);
	$set_content -> execute();
	$set_content -> bind_result($content);
	$set_content -> store_result();
	$set_content -> fetch();
	
	
	$set_titleLink = $con ->prepare(
		'SELECT `titleLink` FROM `videos` WHERE `title` = ?'
	);
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute();
	$set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();
	$set_titleLink -> fetch();
	
	$sidebarGET = $con ->prepare(
		'SELECT `sidebar` FROM `videos` WHERE `title` = ?'
	);
	$sidebarGET -> bind_param("s", $title);
	$sidebarGET -> execute();
	$sidebarGET -> bind_result($sidebar);
	$sidebarGET -> store_result();
	$sidebarGET -> fetch();

	$setID = $con->prepare(
		'SELECT `id` FROM `videos` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($id);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `url` FROM `videos` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($url);
	$setID -> store_result();
	$setID -> fetch();
	
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `videos` WHERE `title` = ?");
	$embedGET -> bind_param("s",$title);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

?>

<!doctype html><html><head>
<!-- edit video page for clearskky.net by nate seymour  -->
<?php require '../../crumpocolypse/create-header.php' ?>

<title>Edit <?php echo $title; ?> | clearskyy</title>
</head><body>

<?php include '../../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">

		<div id="avatar">
		<h2>Editing as <?php echo $user; ?>

		<h1><?php echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-video.php" method="post" enctype="multipart/form-data">
			
			<h2>embed </h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<?php echo htmlspecialchars($embed); ?>" />
			
			<br />
			
			<h2>title</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<?php echo htmlspecialchars($title); ?>" /> 
			
			<br />
			
			<input type="text" name="titleLink" placeholder="link to item under video (link to amazon or whatever)" value="<?php echo htmlspecialchars($titleLink); ?>" /> 
			
			<br />
			
			<h2>write..</h2>
			<textarea name="content" placeholder="type up your video commentary in here. (required)" ><?php echo htmlspecialchars($content); ?></textarea> 
			<br />
			<h2>sidebar</h2>
			<textarea name="sidebar"><?php echo htmlspecialchars($sidebar); ?></textarea> 
			
			<input type="hidden" name="id" value="<?php echo $id ?>" />
			<input type="hidden" name="url" value="<?php echo $url  ?>" />
			
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

</div>
</body></html>