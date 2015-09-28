object(mysqli_stmt)#6 (9) {
  ["affected_rows"]=>
  int(0)
  ["insert_id"]=>
  int(0)
  ["num_rows"]=>
  int(0)
  ["param_count"]=>
  int(24)
  ["field_count"]=>
  int(0)
  ["errno"]=>
  int(0)
  ["error"]=>
  string(0) ""
  ["sqlstate"]=>
  string(5) "00000"
  ["id"]=>
  int(6)
}
Error:Column 'programmer' cannot be null<?PHP
	session_cache_limiter("private_no_expire");
	session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 
	
	ob_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . "/crumpocolypse/dbCon.php";
	
	$r_id ="0";
	
	
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