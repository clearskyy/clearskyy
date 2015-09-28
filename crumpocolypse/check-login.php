<?PHP
//CHECK LOGIN
ob_start();
session_start();

// connect to the database server
mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("connection failed");

// open to the database
mysql_select_db("clearskyy_regalia") or die ("database couldn't be selected");

$input_un = $_POST['un'];
$input_pw = $_POST['pw'];

$un = mysql_real_escape_string($input_un);
$pw = mysql_real_escape_string($input_pw);
 
//select all records from Contribooter where username and password are the same
$result = mysql_query("SELECT * FROM users WHERE username='$un' AND password=MD5('$pw')") or die ("couldn't find user");

$count = mysql_num_rows($result); //count 1 if user


?>
<!doctype html>
<html>
	<head>
		<?php require '../crumpocolypse/header.php' ?>
		<title>check login | clearskyy </title>
	</head>
	<body>
		<?php include '../crumpocolypse/menu.php' ?>
	
		<div id="nexus">
			<div id="wrap-left">

				<div class="content">
					<?php
						if($count == 1){
							echo "LOGIN SUCCESSFUL";
							$_SESSION['user'] = $un;
	
							if($_SESSION['loginREFERER'] == "http://clearskyy.net/dropdead/"){
								header("location: http://clearskyy.net/dropdead/");
							}else{
								header("location: http://clearskyy.net/admin");
							}
						}else{
							echo '<h2>LOGIN UNSUCCESSFUL</h2> <a href="login.php">Click back to login page</a>';	
						}
					?>
				</div>
	
			</div>
	
		</div>

	</body>
</html>