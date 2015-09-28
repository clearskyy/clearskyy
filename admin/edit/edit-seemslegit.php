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
	
	$set_ragequit = $con ->prepare(
		'SELECT `content` FROM `seemslegit` WHERE `title` = ?'
	);
	$set_ragequit -> bind_param("s", $title);
	$set_ragequit -> execute();
	$set_ragequit -> bind_result($content);
	$set_ragequit -> store_result();
	$set_ragequit -> fetch();
	
	$set_imgSrc = $con ->prepare(
		'SELECT `imgSrc` FROM `seemslegit` WHERE `title` = ?'
	);
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute();
	$set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();
	$set_imgSrc -> fetch();
	
	$set_imgAlt = $con ->prepare(
		'SELECT `imgAlt` FROM `seemslegit` WHERE `title` = ?'
	);
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();
	$set_imgAlt -> fetch();
	
	$set_imgTitle = $con ->prepare(
		'SELECT `imgTitle` FROM `seemslegit` WHERE `title` = ?'
	);
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();
	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();
	$set_imgTitle -> fetch();
	
	$sidebarGET = $con ->prepare(
		'SELECT `sidebar` FROM `seemslegit` WHERE `title` = ?'
	);
	$sidebarGET -> bind_param("s", $title);
	$sidebarGET -> execute();
	$sidebarGET -> bind_result($sidebar);
	$sidebarGET -> store_result();
	$sidebarGET -> fetch();

	$setID = $con->prepare(
		'SELECT `id` FROM `seemslegit` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($id);
	$setID -> store_result();
	$setID -> fetch();
	
	$setID = $con->prepare(
		'SELECT `url` FROM `seemslegit` WHERE `title` = ?'
	);
	$setID -> bind_param("s", $title);
	$setID -> execute();
	$setID -> bind_result($url);
	$setID -> store_result();
	$setID -> fetch();
	
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `seemslegit` WHERE `id` = ?");
	$embedGET -> bind_param("s",$id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

?>

<!doctype html><html><head>
<!-- edit review page for clearskky.net by nate seymour  -->
<?php require '../../crumpocolypse/create-header.php' ?>

<title>Edit <?php echo $title; ?> | clearskyy</title>
</head><body>

<?php include '../../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">
			<h2>Edit Seems Legit</h2>
	
		<div id="avatar">
			<h2>Editing as <?php echo $user; ?>

			<h1><?php echo $title; ?></h1>
		</div>
		
		<form action="/admin/update/update-seemslegit.php" method="post" enctype="multipart/form-data">
		
			<h2>embed </h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<?php echo htmlspecialchars($embed); ?>" />
			
			<h2>image</h2>
			
			<input type="text" name="imgSrc" placeholder="place image url here" value="<?php echo htmlspecialchars($imgSrc); ?>" />
			
			<br />
			
			<input type="text" name="imgAlt" placeholder="describe the image briefly" value="<?php echo htmlspecialchars($imgAlt); ?>" /> 
			
			<br />
			
			<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" value="<?php echo htmlspecialchars($imgTitle); ?>" /> 
			
			<br />
			
			<h2>Seems Legit title</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<?php echo htmlspecialchars($title); ?>" /> 
			
			<br />
			
			
			<h2>Write..</h2>
			<p>Edit your Seems Legit here </p>
			<textarea name="review" class="ckeditor" placeholder="type up your review in here. (required)" ><?php echo htmlspecialchars($content); ?></textarea> 
			<br />
			<p>Edit your sidebar here</p>
			<textarea name="sidebar" class="ckeditor" ><?php echo htmlspecialchars($sidebar); ?></textarea> 
			
			<input type="hidden" name="id" value="<?php echo $id ?>" />
			<input type="hidden" name="url" value="<?php echo $url  ?>" />
			
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

</div>

</body></html>