<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	

	$gameID = $_POST['id'];
	
	
	require $_SERVER["DOCUMENT_ROOT"] . "/games/select.php";
	include $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/connect.php";
 
?>

<!doctype html>
<html>
	<head>
		<title><? echo $name; ?> | clearskyy</title>
	</head>
	<body>
	
		<!--
		<? include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/sig.php"; ?>
		-->
			<div id="wrap-left">
				<div class="content">
				
					<h1 style="text-align:center;"><? echo $name; ?></h1>
				
				
					<table style="border:none;">
					<? include_once $_SERVER["DOCUMENT_ROOT"] . "/games/gamePageTABLE.php"; ?>
					
				</div>
			</div>

	</body>
</html>