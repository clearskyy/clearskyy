<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$e_id ="11";
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `editorials` WHERE `id` = ?");
	$titleGET -> bind_param("s",$e_id);
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
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM editorials WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT UserName FROM Contribooter WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//imgSrc
	$set_imgSrc = $con ->prepare("SELECT `imgSrc` FROM `editorials` WHERE `title` = ?");
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute(); $set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();	$set_imgSrc -> fetch();
	//imgAlt
	$set_imgAlt = $con ->prepare("SELECT `imgAlt` FROM `editorials` WHERE `title` = ?");
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();	$set_imgAlt -> fetch();
	//imgTitle
	$set_imgTitle = $con ->prepare("SELECT `imgTitle` FROM `editorials` WHERE `title` = ?");
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();	$set_imgTitle -> fetch();
	//learn id from database
	$learn_id = $con->prepare ("SELECT id FROM editorials WHERE url = ?");
	$learn_id -> bind_param("s",$url);
	$learn_id->execute();	$learn_id -> bind_result($e_id);
	$learn_id -> store_result(); $learn_id -> fetch();
	//content
	$learnGET = $con->prepare ("SELECT `content` FROM `editorials` WHERE `id` = ?");
	$learnGET -> bind_param("s",$e_id);
	$learnGET -> execute();	$learnGET->bind_result($content); 
	$learnGET -> store_result(); $learnGET->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `editorials` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$e_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();
	//date
	$dateGET = $con->prepare ("SELECT `date` FROM `editorials` WHERE `id` = ?");
	$dateGET -> bind_param("s",$e_id);
	$dateGET -> execute();	$dateGET->bind_result($date); 
	$dateGET -> store_result(); $dateGET->fetch();

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <?php echo $title; ?> editorial for clearskyy.net by <?php echo $fn ." ". $ln; ?> -->
	<?php require "../crumpocolypse/header.php"; ?>
	<title><?php echo $title; ?> | clearskyy</title>
	</head><body>
	
	<?php include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Editorial #<?php echo $e_id; ?></h3>
				</div>
					<p id="date"><?php echo date("F j, Y",strtotime($date)); ?></p>
				 <div id="avatar">
					<img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>" title="<?php echo $imgTitle; ?>" width="40%" />
				 		
					<h1><?php echo $title; ?></h1>
				</div>
			</div>
			
			
			<div class="content-<?php echo $author; ?>">
				 
				<?php echo $content; ?>
				 
			<p><em>written by</em>: <a href="../profiles/<?php echo $author; ?>.php" target="_blank"><?php echo $author; ?></a></p>
			</div>
			
			
			<div class="content">
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