<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/videos/update-video.php";
	header("location:../crumpocolypse/login.php");
}
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$embed = $_POST['embed'];
	$title = $_POST['title'];
	$titleLink = $_POST['titleLink'];
	$sidebar = $_POST['sidebar'];
	$content = $_POST['content'];
	$id = $_POST['id'];
	$url = $_POST['url'];
	
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
	$updatevideo = $con -> prepare(
		"UPDATE `videos` SET `title`= ? WHERE `id` = ?"
	);
	
	$updatevideo -> bind_param("ss",$title,$id);
	$updatevideo -> execute();
	
	$updatevideo = $con -> prepare(
		"UPDATE `videos` SET `content`= ? WHERE `id` = ?"
	);
	$updatevideo -> bind_param("ss",$content,$id);
	$updatevideo -> execute();
	
	$updateTitleLink = $con -> prepare(
		"UPDATE `videos` SET `titleLink`= ? WHERE `id` = ?"
	);
	$updateTitleLink -> bind_param("ss",$titleLink,$id);
	$updateTitleLink -> execute();
	
	$updateSidebar = $con -> prepare(
		"UPDATE `videos` SET `sidebar`= ? WHERE `id` = ?"
	);
	$updateSidebar -> bind_param("ss",$sidebar,$id);
	$updateSidebar -> execute();
	
	$updateEmbed = $con -> prepare(
		"UPDATE `videos` SET `embed`= ? WHERE `id` = ?"
	);
	$updateEmbed -> bind_param("ss",$embed,$id);
	$updateEmbed -> execute();
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created video page
	header("location:$url");

?>