<?php
	ob_start();
	session_cache_limiter('private_no_expire');
	session_start();

	if( isset( $_SESSION['user'] )){
		$user = $_SESSION['user'];
		$message =  $user ." is logged in";
	} else {
		$user = "";
		header("location:../crumpocolypse/login.php");
	}
	
	include $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	
	//add a point for posting
	$points = 0;
	$posts = 0;
	
	$pointsGET = $con -> prepare("SELECT points FROM users WHERE username = ?");
	$pointsGET -> bind_param("s",$user); $pointsGET -> execute();
	$pointsGET -> bind_result($points); $pointsGET -> store_result();
	$pointsGET -> fetch();
	
	$postsGET = $con -> prepare("SELECT posts FROM users WHERE username = ?");
	$postsGET -> bind_param("s",$user); $postsGET -> execute();
	$postsGET -> bind_result($posts); $postsGET -> store_result();
	$postsGET -> fetch();
	
	$points++;
	$posts++;
	
	$pointsSET = $con -> prepare("UPDATE users SET points = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$points,$user); $pointsSET -> execute();
	
	$pointsSET = $con -> prepare("UPDATE users SET posts = ? WHERE UserName = ?");
	$pointsSET ->bind_param("is",$posts,$user); $pointsSET -> execute();
	
	//retrieving author id so that it can be inserted into database
	$set_id = $con -> prepare(
		"SELECT `id` FROM `users` WHERE `username` = ?"
	);
	$set_id -> bind_param("s",$user);
	$set_id -> execute();
	$set_id -> bind_result($id);
	$set_id -> store_result();
	$set_id -> fetch();
	
	$name = $_POST['name'];
	$description = $_POST['desc'];
	$quickReview = $_POST['quickie'];
	$review = $_POST['review'];
	$score = $_POST['score'];
	$matureRating = $_POST['mrating'];
	$price = $_POST['price'];
	$platform = $_POST['platform'];
	$picture = $_POST['picture'];
	$developer = $_POST['developer'];
	$publisher = $_POST['publisher'];
	$releaseDate = $_POST['rdate'];
	$website = $_POST['website'];
	$creator = $_POST['creator'];
	$genre = $_POST['genre'];
	$director = $_POST['director'];
	$programmer = $_POST['programmer'];
	$writer = $_POST['writer'];
	$series = $_POST['series'];
	$engine = $_POST['engine'];
	$mode = $_POST['mode'];
	$distribution = $_POST['distribution'];
	$controllerSupport = $_POST['cSupport'];
	$os = $_POST['os'];
	$processor = $_POST['processor'];
	$mem = $_POST['memory'];
	$graphics = $_POST['graphics'];
	$directX = $_POST['directX'];
	$net = $_POST['network'];
	$hd = $_POST['hardDrive'];

	$url = strtolower($name);
	$url = str_replace('/','-',$url);
	$url = str_replace('?','-',$url);
	$url = str_replace('#','-',$url);
	$url = str_replace(':','-',$url);
	$url = explode(' ', $url);
	$url = implode('-', $url);
	$game_title = $url;
	$url = "http://clearskyy.net/games/$url.php";

	//set values into database
	$statement = $con->prepare("INSERT INTO `game` (`name`, `desc`, `quickie`, `review`, `score`, `mrating`, `price`, `platform`, `picture`, `developer`, `publisher`, `rdate`, `website`, `creator`, `genre`, `director`, `programmer`, `writer`, `series`, `engine`, `mode`, `distribution`, `cSupport`, `url`, `os`, `processor`, `memory`, `graphics`, `directX`, `network`, `hardDrive`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$statement -> bind_param("ssssissssssssssssssssssssssssss", $name, $description, $quickReview, $review, $score, $matureRating, $price, $platform, $picture, $developer, $publisher, $releaseDate, $website, $creator, $genre, $director, $programmer, $writer, $series, $engine, $mode, $distribution, $controllerSupport, $url, $os, $processor, $mem, $graphics, $directX, $net, $hd);
	$statement -> execute();
	
	//variables pulled from create-review
	$author = $_POST['author'];
	
	//review id 
	$review_id = $con->prepare ("SELECT `id` FROM `game` WHERE `url` = ?");
	$review_id -> bind_param("s",$url);
	$review_id->execute();	$review_id -> bind_result($gameID);
	$review_id -> store_result(); $review_id -> fetch();
	
	
	//start taking in code for review page
	
	echo'<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$gameID ="'.$gameID.'";
	
	
	require $_SERVER["DOCUMENT_ROOT"] . "/games/select.php";
	include "../crumpocolypse/connect.php";
 
?>

<!doctype html>
<html>
	<head>
		<? include_once "../crumpocolypse/header.php";  ?>
		<title><? echo $name; ?> | clearskyy</title>
	</head>
	<body>
	
		<!--
		<? include_once "../crumpocolypse/sig.php"; ?>
		-->
		<? include_once "../crumpocolypse/menu.php"; ?>

		<div id="nexus">
			<div id="wrap-left">
				<div class="content">
				
					<h1 style="text-align:center;"><? echo $name; ?></h1>
				
				
					<table style="border:none;">
					<? include_once "gamePageTABLE.php"; ?>
					
				</div>
				
			</div>
		</div>
	
		<? include_once "../crumpocolypse/caboose.php"; ?>

	</body>
</html>';


	$out = ob_get_contents();
	ob_end_clean();
	//finish taking in code for review page
	
	//write it to a file
	file_put_contents("/home/seymounj/clearskyy.net/games/".$game_title.".php",$out);
	
	//close connection to database
	mysqli_close($con);
	
	//redirect to newly created review page
	header("location:$url");

?>