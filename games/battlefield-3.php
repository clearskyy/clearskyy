<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$gameID ="23";
	
	
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
</html>