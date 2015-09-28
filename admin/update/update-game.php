<?PHP

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	header("location:../crumpocolypse/login.php");
}
	
	//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$id = $_POST['id'];
	$name = $_POST['name'];
	$quickie = $_POST['quickie'];
	$review = $_POST['review'];
	$desc = $_POST['desc'];
	$score = $_POST['score'];
	$mrating = $_POST['mrating'];
	$price = $_POST['price'];
	$plat = $_POST['platform'];
	$pic = $_POST['picture'];
	$dev = $_POST['developer'];
	$pub = $_POST['publisher'];
	$rdate = $_POST['rdate'];
	$web = $_POST['website'];
	$creator = $_POST['creator'];
	$genre = $_POST['genre'];
	$dir = $_POST['director'];
	$pro = $_POST['programmer'];
	$writer = $_POST['writer'];
	$series = $_POST['series'];
	$engine = $_POST['engine'];
	$mode = $_POST['mode'];
	$dis = $_POST['distribution'];
	$cS = $_POST['cSupport'];
	$url = $_POST['url'];
	$os = $_POST['os'];
	$proc = $_POST['processor'];
	$mem = $_POST['memory'];
	$gfx = $_POST['graphics'];
	$dX = $_POST['directX'];
	$net = $_POST['network'];
	$hd = $_POST['hardDrive'];
	
	//add a point for updating
	$points = 0;
	$edits = 0;
	
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
	
	//update everything
	
	$updateNAME = $con -> prepare("UPDATE `game` SET `name`= ? WHERE `id` = ?");
	$updateNAME -> bind_param("ss",$name,$id); $updateNAME -> execute();
	
	$updateQR = $con -> prepare("UPDATE `game` SET `quickie`= ? WHERE `id` = ?");
	$updateQR -> bind_param("ss",$quickie,$id); $updateQR -> execute();

	$updateR = $con -> prepare("UPDATE `game` SET `review`= ? WHERE `id` = ?");
	$updateR -> bind_param("ss",$review,$id); $updateR -> execute();

	$updateDESC = $con -> prepare("UPDATE `game` SET `desc`= ? WHERE `id` = ?");
	$updateDESC -> bind_param("ss",$desc,$id); $updateDESC -> execute();

	$updateSCORE = $con -> prepare("UPDATE `game` SET `score`= ? WHERE `id` = ?");
	$updateSCORE -> bind_param("ss",$score,$id); $updateSCORE -> execute();

	$updateMRATING = $con -> prepare("UPDATE `game` SET `mrating`= ? WHERE `id` = ?");
	$updateMRATING -> bind_param("ss",$mrating,$id); $updateMRATING -> execute();

	$updatePRICE = $con -> prepare("UPDATE `game` SET `price`= ? WHERE `id` = ?");
	$updatePRICE -> bind_param("ss",$price,$id); $updatePRICE -> execute();

	$updatePLATFORM = $con -> prepare("UPDATE `game` SET `platform`= ? WHERE `id` = ?");
	$updatePLATFORM -> bind_param("ss",$plat,$id); $updatePLATFORM -> execute();

	$updatePICTURE = $con -> prepare("UPDATE `game` SET `picture`= ? WHERE `id` = ?");
	$updatePICTURE -> bind_param("ss",$pic,$id); $updatePICTURE -> execute();

	$updateDEVELOPER = $con -> prepare("UPDATE `game` SET `developer`= ? WHERE `id` = ?");
	$updateDEVELOPER -> bind_param("ss",$dev,$id); $updateDEVELOPER -> execute();

	$updatePUBLISHER = $con -> prepare("UPDATE `game` SET `publisher`= ? WHERE `id` = ?");
	$updatePUBLISHER -> bind_param("ss",$pub,$id); $updatePUBLISHER -> execute();
	
	$updateRDATE = $con -> prepare("UPDATE `game` SET `rdate`= ? WHERE `id` = ?");
	$updateRDATE -> bind_param("ss",$rdate,$id); $updateRDATE -> execute();

	$updateWEBSITE = $con -> prepare("UPDATE `game` SET `website`= ? WHERE `id` = ?");
	$updateWEBSITE -> bind_param("ss",$web,$id); $updateWEBSITE -> execute();

	$updateCREATOR = $con -> prepare("UPDATE `game` SET `creator`= ? WHERE `id` = ?");
	$updateCREATOR -> bind_param("ss",$creator,$id); $updateCREATOR -> execute();

	$updateGENRE = $con -> prepare("UPDATE `game` SET `genre`= ? WHERE `id` = ?");
	$updateGENRE -> bind_param("ss",$genre,$id); $updateGENRE -> execute();

	$updateDIRECTOR = $con -> prepare("UPDATE `game` SET `director`= ? WHERE `id` = ?");
	$updateDIRECTOR -> bind_param("ss",$dir,$id); $updateDIRECTOR -> execute();

	$updatePROGRAMMER = $con -> prepare("UPDATE `game` SET `programmer`= ? WHERE `id` = ?");
	$updatePROGRAMMER -> bind_param("ss",$pro,$id); $updatePROGRAMMER -> execute();

	$updateWRITER = $con -> prepare("UPDATE `game` SET `writer`= ? WHERE `id` = ?");
	$updateWRITER -> bind_param("ss",$writer,$id); $updateWRITER -> execute();

	$updateSERIES = $con -> prepare("UPDATE `game` SET `series`= ? WHERE `id` = ?");
	$updateSERIES -> bind_param("ss",$series,$id); $updateSERIES -> execute();

	$updateENGINE = $con -> prepare("UPDATE `game` SET `engine`= ? WHERE `id` = ?");
	$updateENGINE -> bind_param("ss",$engine,$id); $updateENGINE -> execute();

	$updateMODE = $con -> prepare("UPDATE `game` SET `mode`= ? WHERE `id` = ?");
	$updateMODE -> bind_param("ss",$mode,$id); $updateMODE -> execute();

	$updateDISTRIBUTION = $con -> prepare("UPDATE `game` SET `distribution`= ? WHERE `id` = ?");
	$updateDISTRIBUTION -> bind_param("ss",$dis,$id); $updateDISTRIBUTION -> execute();

	$updateCS = $con -> prepare("UPDATE `game` SET `cSupport`= ? WHERE `id` = ?");
	$updateCS -> bind_param("ss",$cS,$id); $updateCS -> execute();

	$updateURL = $con -> prepare("UPDATE `game` SET `url`= ? WHERE `id` = ?");
	$updateURL -> bind_param("ss",$url,$id); $updateURL -> execute();

	$updateOS = $con -> prepare("UPDATE `game` SET `os`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$os,$id); $updateOS -> execute();
	
	$updateOS = $con -> prepare("UPDATE `game` SET `processor`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$proc,$id); $updateOS -> execute();

	$updateOS = $con -> prepare("UPDATE `game` SET `memory`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$mem,$id); $updateOS -> execute();

	$updateOS = $con -> prepare("UPDATE `game` SET `graphics`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$gfx,$id); $updateOS -> execute();

	$updateOS = $con -> prepare("UPDATE `game` SET `directX`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$dX,$id); $updateOS -> execute();

	$updateOS = $con -> prepare("UPDATE `game` SET `network`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$net,$id); $updateOS -> execute();

	$updateOS = $con -> prepare("UPDATE `game` SET `hardDrive`= ? WHERE `id` = ?");
	$updateOS -> bind_param("ss",$hd,$id); $updateOS -> execute();

	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created review page
	header("location:$url");

?>