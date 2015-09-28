<?php
session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	
	ob_start();
	
	include_once '../assets/db/connect.php';
	
	//check to see if user is admin or not.
	$adminCHECK = $con->prepare ("SELECT `admin` FROM `users` WHERE `username` = ? AND `admin`= 1");
	$adminCHECK -> bind_param("s",$user);
	$adminCHECK -> execute();	$adminCHECK->bind_result($adminYN); 
	$adminCHECK -> store_result(); $adminCHECK->fetch();
	
	if($adminYN != 1){
		header("location:http://clearskyy.net/dropdead/login/");
	}
	
} 
else {
	header("location:http://clearskyy.net/dropdead/login/");
}

?>

<!doctype html><html><head>
<!-- register page for clearskky.net by nate seymour  -->
<?php require 'header.php' ?>
<title>register | clearskyy</title>
</head><body>

<?php include '../assets/menu.php' ?>

<div id="nexus">
<div class="nexusCenter">
	<form method="post" action="submit-register.php" name="register">

		<table border="0" cellpadding="6" rules="none">
		<tr><td><input type="text" name="un" placeholder="username" /></td></tr>
		<tr><td><input type="text" name="pw" placeholder="password" /></td></tr>
		<tr><td><input type="email" name="em" placeholder="email" /></td></tr>
		<tr><td><input type="text" name="ad" placeholder="admin" /></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><input type="submit" name="submit" value="submit registration" /></td></tr>
		</table>
		</form>

	</div>
	
</div>

<div class="nexusRight">

</div>

</div>

</body></html>
