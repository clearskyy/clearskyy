<?PHP 
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	}
	
	ob_start(); 

	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$l_id ="2";
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
	//author ID
	$authorGET = $con -> prepare ("SELECT author_id FROM learn WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT UserName FROM Contribooter WHERE id = ?");
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
?>

<!doctype html>
<html>
	<head>
		<!-- label tag tutorial page for clearskky.net by nate seymour  -->
		<? require '../crumpocolypse/header.php' ?>
		<link href="../crumpocolypse/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="../crumpocolypse/google-code-prettify/prettify.js"></script>
		<title><? echo $title; ?> | clearskyy</title>
	</head>
	<body onload="prettyPrint()">

	<? include '../crumpocolypse/menu.php' ?>

	<div id="nexus">
		<div id="wrap-left">

			<div class="content">
				<div class="type-ribbon">
					<h3>Lesson #<?php echo $l_id; ?></h3>
				</div>
				<p id="date"><?php echo date("F j, Y",strtotime($date)); ?></p>

				<div id="avatar">
					<img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>" title="<?php echo $imgTitle; ?>" width="40%" />
				 		
					<h1><?php echo $title; ?></h1>
				</div>

				<? echo $content ?>

				<blockquote><h2>author:&nbsp;<? echo '<a href="'.$_SERVER["DOCUMENT ROOT"].'/profiles/'.$author.'.php">'.$author; ?></a></h2></blockquote>

			</div>
			<div class="content">
				<? include '../crumpocolypse/livefyre.php' ?>
			</div>
			<!-- End of "content" -->

		</div>
		<!-- End of 'wrap-left' -->

			<div id="sidebar">
				<? include '../crumpocolypse/articles.php' ?>
			</div>
			<!-- End of "sidebar" -->

		</div>
		<!-- End of Nexus -->

		<? include '../crumpocolypse/caboose.php' ?>
	</body>
</html>