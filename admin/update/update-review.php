<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/reviews/update-review.php";
	header("location:../crumpocolypse/login.php");
}
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$embed = $_POST['embed'];
	$imgSrc = $_POST['imgSrc'];
	$imgAlt = $_POST['imgAlt'];
	$imgTitle = $_POST['imgTitle'];
	$title = $_POST['title'];
	$titleLink = $_POST['titleLink'];
	$review = $_POST['review'];
	$id = $_POST['id'];
	$url = $_POST['url'];
	$cid= $_POST['cid'];
	
	//add a point for updating
	$points=0;
	$edits=0;
	
	$pointsGET = $con -> prepare("SELECT Points FROM Contribooter WHERE UserName = ?");
	$pointsGET -> bind_param("s",$user); $pointsGET -> execute();
	$pointsGET -> bind_result($points); $pointsGET -> store_result();
	$pointsGET -> fetch();
	
	$editsGET = $con -> prepare("SELECT edits FROM Contribooter WHERE UserName = ?");
	$editsGET -> bind_param("s",$user); $editsGET -> execute();
	$editsGET -> bind_result($edits); $editsGET -> store_result();
	$editsGET -> fetch();
	
	$points++;
	$edits++;
	
	$pointsSET = $con -> prepare("UPDATE Contribooter SET Points = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$points,$user); $pointsSET -> execute();
	
	$editsSET = $con -> prepare("UPDATE Contribooter SET edits = ? WHERE UserName = ?");
	$editsSET ->bind_param("is",$edits,$user); $editsSET -> execute();
	
	//retrieving author id so that it can be inserted into database
	$updateReview = $con -> prepare(
		"UPDATE `reviews` SET `title`= ? WHERE `id` = ?"
	);
	
	$updateReview -> bind_param("ss",$title,$id);
	$updateReview -> execute();
	
	$updateReview = $con -> prepare(
		"UPDATE `reviews` SET `data`= ? WHERE `id` = ?"
	);
	$updateReview -> bind_param("ss",$review,$id);
	$updateReview -> execute();

	$updateImgSrc = $con -> prepare(
		"UPDATE `reviews` SET `imgSrc`= ? WHERE `id` = ?"
	);
	$updateImgSrc -> bind_param("ss",$imgSrc,$id);
	$updateImgSrc -> execute();

	$updateImgAlt = $con -> prepare(
		"UPDATE `reviews` SET `imgAlt`= ? WHERE `id` = ?"
	);
	$updateImgAlt -> bind_param("ss",$imgAlt,$id);
	$updateImgAlt -> execute();
	
	$updateImgTitle = $con -> prepare(
		"UPDATE `reviews` SET `imgTitle`= ? WHERE `id` = ?"
	);
	$updateImgTitle -> bind_param("ss",$imgTitle,$id);
	$updateImgTitle -> execute();
	
	$updateTitleLink = $con -> prepare(
		"UPDATE `reviews` SET `titleLink`= ? WHERE `id` = ?"
	);
	$updateTitleLink -> bind_param("ss",$titleLink,$id);
	$updateTitleLink -> execute();
	
	$updateEmbed = $con -> prepare(
		"UPDATE `reviews` SET `embed`= ? WHERE `id` = ?"
	);
	$updateEmbed -> bind_param("ss",$embed,$id);
	$updateEmbed -> execute();
	
	$updateEmbed = $con -> prepare(
		"UPDATE `reviews` SET `c_id`= ? WHERE `id` = ?"
	);
	$updateEmbed -> bind_param("ii",$cid,$id);
	$updateEmbed -> execute();
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created review page
	header("location:$url");

?>