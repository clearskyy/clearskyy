<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/ragequit/update-ragequit.php";
	header("location:../crumpocolypse/login.php");
}
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$imgSrc = $_POST['imgSrc'];
	$imgAlt = $_POST['imgAlt'];
	$imgTitle = $_POST['imgTitle'];
	$title = $_POST['title'];
	$sidebar = $_POST['sidebar'];
	$review = $_POST['review'];
	$id = $_POST['id'];
	$url = $_POST['url'];
	$cid = $_POST['cid'];
	
	//add a point for updating
	$points=0;
	$edits=0;
	
	$pointsGET = $con -> prepare("SELECT points FROM users WHERE UserName = ?");
	$pointsGET -> bind_param("s",$user); $pointsGET -> execute();
	$pointsGET -> bind_result($points); $pointsGET -> store_result();
	$pointsGET -> fetch();
	
	$editsGET = $con -> prepare("SELECT edits FROM users WHERE UserName = ?");
	$editsGET -> bind_param("s",$user); $editsGET -> execute();
	$editsGET -> bind_result($edits); $editsGET -> store_result();
	$editsGET -> fetch();
	
	$points++;
	$edits++;
	
	$pointsSET = $con -> prepare("UPDATE users SET points = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$points,$user); $pointsSET -> execute();
	
	$editsSET = $con -> prepare("UPDATE users SET edits = ? WHERE UserName = ?");
	$editsSET ->bind_param("is",$edits,$user); $editsSET -> execute();
	
	//retrieving author id so that it can be inserted into database
	$updateTitle = $con -> prepare(
		"UPDATE `ragequit` SET `title`= ? WHERE `id` = ?"
	);
	
	$updateTitle -> bind_param("ss",$title,$id);
	$updateTitle -> execute();
	
	$updateContent = $con -> prepare(
		"UPDATE `ragequit` SET `content`= ? WHERE `id` = ?"
	);
	$updateContent -> bind_param("ss",$review,$id);
	$updateContent -> execute();

	$updateImgSrc = $con -> prepare(
		"UPDATE `ragequit` SET `imgSrc`= ? WHERE `id` = ?"
	);
	$updateImgSrc -> bind_param("ss",$imgSrc,$id);
	$updateImgSrc -> execute();

	$updateImgAlt = $con -> prepare(
		"UPDATE `ragequit` SET `imgAlt`= ? WHERE `id` = ?"
	);
	$updateImgAlt -> bind_param("ss",$imgAlt,$id);
	$updateImgAlt -> execute();
	
	$updateImgTitle = $con -> prepare(
		"UPDATE `ragequit` SET `imgTitle`= ? WHERE `id` = ?"
	);
	$updateImgTitle -> bind_param("ss",$imgTitle,$id);
	$updateImgTitle -> execute();
	
	
	$updateSidebar = $con -> prepare(
		"UPDATE `ragequit` SET `sidebar`= ? WHERE `id` = ?"
	);
	$updateSidebar -> bind_param("ss",$sidebar,$id);
	$updateSidebar -> execute();
	
	$updateCid = $con -> prepare(
		"UPDATE `editorials` SET `c_id`= ? WHERE `id` = ?"
	);
	$updateCid -> bind_param("is",$cid,$id);
	$updateCid -> execute();
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created review page
	header("location:$url");

?>