
	<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$l_id ="0";
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `learn` WHERE `id` = ?");
	$titleGET -> bind_param("s",$l_id);
	$titleGET -> execute();	$titleGET->bind_result($title); 
	$titleGET -> store_result(); $titleGET->fetch();
	//first name
	$get_fn = $con -> prepare ("SELECT FirstName FROM Contribooter WHERE UserName = ?");
	$get_fn -> bind_param("s", $user);
	$get_fn -> execute(); $get_fn -> bind_result($fn);
	$get_fn -> store_result(); $get_fn -> fetch();
	//last name
	$get_ln = $con -> prepare ("SELECT LastName FROM Contribooter WHERE UserName = ?");
	$get_ln -> bind_param("s", $user);
	$get_ln -> execute(); $get_ln -> bind_result($ln);
	$get_ln -> store_result(); $get_ln -> fetch();
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
	//learn id from database
	$learn_id = $con->prepare ("SELECT id FROM learn WHERE url = ?");
	$learn_id -> bind_param("s",$url);
	$learn_id->execute();	$learn_id -> bind_result($l_id);
	$learn_id -> store_result(); $learn_id -> fetch();
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

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <?php echo $title; ?> learn for clearskyy.net by <?php echo $fn ." ". $ln; ?> -->
	<?php require "../crumpocolypse/header.php"; ?>
	<title><?php echo $title; ?> | clearskyy</title>
	</head><body>
	
	<?php include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Lesson #<?php echo $l_id; ?></h3>
				</div>
					<p id="date"><?php echo $dateTime; ?></p>
				 <div id="avatar">
					<img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>" title="<?php echo $imgTitle; ?>" width="40%" />
				 		
					<h1><?php echo $title; ?></h1>
				</div>
			</div>
			
			
			<div class="content-<?php echo $user; ?>">
				 
				<?php echo $content; ?>
				 
			<p><em>written</em>: by <a href="../profiles/<?php echo $user; ?>.php" target="_blank"><?php echo $user; ?></a></p>
			</div>
			
			
			<div class="content">
				<small>only Firefox, Chrome, and IE8+ can use livefyre :c </small>
				<?php include "../crumpocolypse/livefyre.php"; ?>
			</div>
			
		</div>
		
		<div id="sidebar">
			<?php echo $sidebarCrap ?>
			<br />
			<?php include "../crumpocolypse/articles.php"; ?>
		</div>
	
	
	</div>
	
	<?php include "../crumpocolypse/caboose.php"; ?>
	</body></html>