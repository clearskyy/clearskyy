<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/walkthrough/insert-wt.php";
	header("location:../crumpocolypse/login.php");
}
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	//add a point for posting
	$points=0;
	$posts = 0;
	
	$pointsGET = $con -> prepare("SELECT Points FROM Contribooter WHERE UserName = ?");
	$pointsGET -> bind_param("s",$user); $pointsGET -> execute();
	$pointsGET -> bind_result($points); $pointsGET -> store_result();
	$pointsGET -> fetch();
	
	$postsGET = $con -> prepare("SELECT posts FROM Contribooter WHERE UserName = ?");
	$postsGET -> bind_param("s",$user); $postsGET -> execute();
	$postsGET -> bind_result($posts); $postsGET -> store_result();
	$postsGET -> fetch();
	
	$points++;
	$posts++;
	
	$pointsSET = $con -> prepare("UPDATE Contribooter SET Points = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$points,$user); $pointsSET -> execute();
	
	$pointsSET = $con -> prepare("UPDATE Contribooter SET posts = ? WHERE UserName = ?");
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
		"INSERT INTO wt (title, content, url, date, author_id, imgSrc, imgAlt, imgTitle, titleLink, sidebar, embed) VALUES (?, ?, ?,NOW(), ?, ?, ?, ?, ?, ?, ?)" 
	);
	$title = $_POST['title'];
	$embed = $_POST['embed'];
	$imgSrc = $_POST['imgSrc'];
	$imgAlt = $_POST['imgAlt'];
	$imgTitle = $_POST['imgTitle'];
	$titleLink = $_POST['titleLink'];
	$sidebar = $_POST['sidebar'];
	$dateTime = date("l, F d, Y h:i a");
	$content = $_POST['content'];
	$url = strtolower($title);
	$url = explode(' ', $url);
	$url = implode('-', $url);
	$url = "http://clearskyy.net/walkthrough/$url.php";
	
	$statement -> bind_param("sssissssss",$title, $content, $url, $id, $imgSrc, $imgAlt, $imgTitle, $titleLink, $sidebar, $embed);
	$statement -> execute();
	
	
	//ftp log in
	$ftp_server = "situla.dreamhost.com";
	$ftp_username = "seymounj";
	$ftp_password = "Saka50n";

	//set up connection to ftp
	$conn_id = ftp_connect($ftp_server) or die("could no connect to ftp server");
	
	//login to ftp
	if(@ftp_login($conn_id, $ftp_username, $ftp_password))
		{echo "connected to ftp \n";
		}else{ echo "could not connect to ftp \n"; }
		
 
	
	$file = $_FILES["file"]["name"];
	$remote_file_path = "../crumpocolypse/img/".$file;

	ftp_put($conn_id, $remote_file_path, $file, FTP_ASCII);

	ftp_close($conn_id);

	
	//variables pulled from create-walkthrough
	$author = $_POST['author'];
	
	//walkthrough id 
	$wtID = $con->prepare ("SELECT id FROM wt WHERE url = ?");
	$wtID -> bind_param("s",$url);
	$wtID->execute();	$wtID -> bind_result($wt_id);
	$wtID -> store_result(); $wtID -> fetch();
	
	
	//start taking in code for walkthrough page
	ob_start();
	
	echo'
	<?php
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$wt_id ="'; echo $wt_id; echo '";';
	echo'
	//title
	$titleGET = $con->prepare ("SELECT `title` FROM `wt` WHERE `id` = ?");
	$titleGET -> bind_param("s",$wt_id);
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
	$authorGET = $con -> prepare ("SELECT author_id FROM wt WHERE title = ?");
	$authorGET -> bind_param("s", $title);
	$authorGET -> execute(); $authorGET -> bind_result($author_id);
	$authorGET -> store_result(); $authorGET -> fetch();
	//author username
	$usernameGET = $con -> prepare ("SELECT UserName FROM Contribooter WHERE id = ?");
	$usernameGET -> bind_param("s", $author_id);
	$usernameGET -> execute(); $usernameGET -> bind_result($author);
	$usernameGET -> store_result(); $usernameGET -> fetch();
	//imgSrc
	$set_imgSrc = $con ->prepare("SELECT `imgSrc` FROM `wt` WHERE `title` = ?");
	$set_imgSrc -> bind_param("s", $title);
	$set_imgSrc -> execute(); $set_imgSrc -> bind_result($imgSrc);
	$set_imgSrc -> store_result();	$set_imgSrc -> fetch();
	//imgAlt
	$set_imgAlt = $con ->prepare("SELECT `imgAlt` FROM `wt` WHERE `title` = ?");
	$set_imgAlt -> bind_param("s", $title);
	$set_imgAlt -> execute();
	$set_imgAlt -> bind_result($imgAlt);
	$set_imgAlt -> store_result();	$set_imgAlt -> fetch();
	//imgTitle
	$set_imgTitle = $con ->prepare("SELECT `imgTitle` FROM `wt` WHERE `title` = ?");
	$set_imgTitle -> bind_param("s", $title);
	$set_imgTitle -> execute();	$set_imgTitle -> bind_result($imgTitle);
	$set_imgTitle -> store_result();	$set_imgTitle -> fetch();
	//titleLink
	$set_titleLink = $con ->prepare("SELECT `titleLink` FROM `wt` WHERE `title` = ?");
	$set_titleLink -> bind_param("s", $title);
	$set_titleLink -> execute(); $set_titleLink -> bind_result($titleLink);
	$set_titleLink -> store_result();	$set_titleLink -> fetch();
	//walkthrough id from database
	$walkthrough_id = $con->prepare ("SELECT id FROM wt WHERE url = ?");
	$walkthrough_id -> bind_param("s",$url);
	$walkthrough_id->execute();	$walkthrough_id -> bind_result($wt_id);
	$walkthrough_id -> store_result(); $walkthrough_id -> fetch();
	//walkthrough
	$walkthroughi = $con->prepare ("SELECT `content` FROM `wt` WHERE `id` = ?");
	$walkthroughi -> bind_param("s",$wt_id);
	$walkthroughi -> execute();	$walkthroughi->bind_result($content); 
	$walkthroughi -> store_result(); $walkthroughi->fetch();
	//sidebarCrap
	$sidebarGET = $con->prepare ("SELECT `sidebar` FROM `wt` WHERE `id` = ?");
	$sidebarGET -> bind_param("s",$wt_id);
	$sidebarGET -> execute();	$sidebarGET->bind_result($sidebarCrap); 
	$sidebarGET -> store_result(); $sidebarGET->fetch();
	//embed
	$embedGET = $con->prepare ("SELECT `embed` FROM `wt` WHERE `id` = ?");
	$embedGET -> bind_param("s",$wt_id);
	$embedGET -> execute();	$embedGET->bind_result($embed); 
	$embedGET -> store_result(); $embedGET->fetch();

	
	include "../crumpocolypse/connect.php"; ?>
	<!doctype html><html><head>
	<!-- <?php echo $title; ?> walkthrough for clearskyy.net by <?php echo $fn ." ". $ln; ?> -->
	<?php require "../crumpocolypse/header.php"; ?>
	<title><?php echo $title; ?> | clearskyy</title>
	</head><body>
	
	<?php include "../crumpocolypse/menu.php"; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Walkthrough #<?php echo $wt_id; ?></h3>
				</div>
					<p id="date"><?php echo $dateTime; ?></p>
				 <div id="avatar">
					<img src="<?php echo $imgSrc; ?>" alt="<?php echo $imgAlt; ?>" title="<?php echo $imgTitle; ?>" width="40%" />
				 	<br />
					<?php echo $embed; ?>
					
					<h1><a href="<?php echo $titleLink; ?>" target="_blank"><?php echo $title; ?></a></h1>
				</div>
			</div>
			
			
			<div class="content-<?php echo $author; ?>">
				 
				<?php echo $content; ?>
				 
			<p><em>written by</em>: <a href="../profiles/<?php echo $author; ?>.php" target="_blank"><?php echo $author; ?></a></p>
			</div>
			
			
			<div class="content">
			<div class="type-ribbon">
				<h3>only Firefox, Chrome, and IE8+ can use livefyre :c </h3>
				</div>
				<br />
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
	</body></html>';

	$out = ob_get_contents();
	ob_end_clean();
	//finsih taking in code for walkthrough page
	
	//make page url from title
	$title = strtolower($title);
	$title = explode(' ', $title);
	$title = implode('-', $title);
	
	//write it to a file
	file_put_contents($title.".php",$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created walkthrough page
	header("location:$url");

?>