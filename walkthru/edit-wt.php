<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/walkthrough/edit-wt.php";
	header("location:../crumpocolypse/login.php");
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
<?php require '../crumpocolypse/header.php' ?>

<link rel="stylesheet" href="../crumpocolypse/alohaeditor/aloha/css/aloha.css" type="text/css" />
<script src="../crumpocolypse/alohaeditor/aloha/lib/require.js"></script>
<script src="../crumpocolypse/alohaeditor/aloha/lib/aloha.js" data-aloha-plugins="common/ui,common/format,common/highlighteditables,common/link,common/table,common/image,common/list"></script>

<title>Edit <?php echo $title; ?> | clearskyy</title>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">

		<div class="type-ribbon">
			<h3>Edit Walkthrough</h3>
		</div>
		<div id="avatar">
		<h2>Editing as <?php echo $user; ?>

		<h1><?php echo $title; ?></h1>
		</div>
		
	</div>
	
	<div class="content">
		<form action="update-wt.php" method="post" enctype="multipart/form-data">
			
			<h2>walkthrough video embed </h2>
			
			<input type="text" name="embed" placeholder="place embed code here" value="<?php echo htmlspecialchars($embed); ?>" />
			
			<h2>walkthrough image</h2>
			
			<input type="text" name="imgSrc" placeholder="place image url here" value="<?php echo htmlspecialchars($imgSrc); ?>" />
			
			<input type="text" name="imgAlt" placeholder="describe the image briefly" value="<?php echo htmlspecialchars($imgAlt); ?>" /> 
			
			<br />
			
			<input type="text" name="imgTitle" placeholder="where did you get the image from? (ex: 'source: google.com')" value="<?php echo htmlspecialchars($imgTitle); ?>" /> 
			
			<br />
			
			<h2>walkthrough title</h2>
			
			<input type="text" name="title" placeholder="Page Title (required)" required value="<?php echo htmlspecialchars($title); ?>" /> 
			
			<br />
			
			<input type="text" name="titleLink" placeholder="link to item under review (link to amazon or whatever)" value="<?php echo htmlspecialchars($titleLink); ?>" /> 
			
			<br />
			
			<h2>write..</h2>
			<p>edit your waklthrough here </p>
			<textarea name="content"   placeholder="type up your review in here. (required)" ><?php echo htmlspecialchars($content); ?></textarea> 
			<br />
			<p>edit your sidebar here</p>
			<textarea  name="sidebar"  ><?php echo htmlspecialchars($sidebar); ?></textarea> 
			
			<input type="hidden" name="id" value="<?php echo $id ?>" />
			<input type="hidden" name="url" value="<?php echo $url  ?>" />
			
			<input type="submit" name="submit" id="submit" />
		</form>
	</div>
	
</div>

</div>
<script type="text/javascript">
Aloha.ready( function(){
	Aloha.jQuery('textarea').aloha();
});
</script>
</body></html>