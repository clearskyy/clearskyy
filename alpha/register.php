<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  "'. $user . ' is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/alpha/register.php";
	header("location:../crumpocolypse/login.php");
}

// connect to the database server
mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("c0nn3ction f4i13d");

// open to the database
mysql_select_db("clearskyy_regalia") or die ("d4t4b4s3 c0u1dn't 83 53l3ct3d");

$result = mysql_query("SELECT * FROM Contribooter") or die ("c0u1dn't s313ct fr0m t4bl3 C0ntrib00t3r");

?>

<!doctype html><html><head>
<!-- register page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
<title>register | clearskyy</title>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">


		<form method="post" action="submit-register.php" name="register">

		<table border="0" cellpadding="6" rules="none">
		<tr><td><input type="text" name="fn" placeholder="first name" /></td></tr>
		<tr><td><input type="text" name="ln" placeholder="last name" /></td></tr>
		<tr><td><input type="email" name="em" placeholder="email" /></td></tr>
		<tr><td><input type="text" name="un" placeholder="username" /></td></tr>
		<tr><td><input type="password" name="pw" placeholder="password" /></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><input type="submit" name="submit" value="submit registration" /></td></tr>
		</table>
		</form>

	</div>
	
</div>

<div id="sidebar">

</div>

</div>

</body></html>
