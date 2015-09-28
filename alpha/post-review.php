<?php

	// connect to the database server
	mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("c0nn3ction f4i13d");

	// open to the database
	mysql_select_db("clearskyy_regalia") or die ("d4t4b4s3 c0u1dn't 83 53l3ct3d");
	
	$title = $_POST['title'];
	$author = $_POST['author'];
	$fn = mysql_query("SELECT FirstName WHERE UserName ='$author'");
	$fn = mysql_query("SELECT LastName WHERE UserName ='$author'");
	$dateTime = date("Y-m-d h:i");
	$imgSrc = $_POST['imgSrc'];
	$imgAlt = $_POST['imgAlt'];
	$imgTitle = $_POST['imgTitle'];
	$titleLink = $_POST['titleLink'];
	$review = $_POST['review'];

	ob_start();
	
	//code to generate page.
	
?>
	<!doctype html><html><head>
	<?php echo "<!-- " .$title. " review for clearskyy.net by ". $fn ." ". $ln ." -->"; ?>
	<?php require '../crumpocolypse/header.php'; ?>
	<title>$title</title>
	</head><body>
	
	<?php include '../crumpocolypse/menu.php'; ?>
	
	<div id="nexus">
		<div id="wrap-left">
			<div class="content">
				<div class="type-ribbon">
					<h3>Review</h3>
				</div>
				<?php echo '<p id="date">'.$dateTime.'</p>
				 <div id="avatar">
					<img src="'.$imgSrc.'" alt="'.$imgAlt.'" title="'.$imgTitle.'" />
				 		
					<h1><a href="'.$titleLink.'">'.$title.'</a></h1>
				</div>
			</div>
			
			
			<div class="content-'.$author.'">
				 '.$review.'
				<p><em>written</em>: by <a href="../profiles/'.$author.'.php">'.$author.'</a></p>
			</div>'
			?>
		</div>
		
		<div id="sidebar">
			<?php include '../crumpocolypse/articles.php' ?>
		</div>
	
	
	</div>
	
	</body></html>
<?php
		
	$out = ob_get_contents();
	ob_end_clean();

	$title = strtolower($title);
	$title = explode(' ', $title);
	$title = implode('-', $title);
	//write it to a file
	file_put_contents("$title.php",$out);
	header("location:$title.php");

?>