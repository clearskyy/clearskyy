<?php
	ob_start();
	session_start();

	if($_SESSION['referrer'] == ""){
		$_SESSION['referrer'] = "http://clearskyy.net/dropdead/";
	}

	$_SERVER['HTTP_REFERER'] = $_SESSION['referrer'];

	// connect to the database server
	mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("connection failed");

	// open to the database
	mysql_select_db("clearskyy_dropdead") or die ("database couldn't be selected");

	$input_un = $_POST['un'];
	$input_pw = $_POST['pw'];

	$un = mysql_real_escape_string($input_un);
	$pw = mysql_real_escape_string($input_pw);
 
	//select all records from Contribooter where username and password are the same
	$result = mysql_query("SELECT * FROM Contribooter WHERE UserName='$un' AND PassWord=MD5('$pw')") or die ("couldn't find contribooter");
	$altresult = mysql_query("SELECT * FROM users WHERE username='$un' AND password=MD5('$pw')") or die ("couldn't find user");

	$count = mysql_num_rows($result); //count 1 if admin
	$altcount = mysql_num_rows($altresult); //count 1 if reg user


?>

<!doctype html><html><head>
	<?php require 'header.php' ?>
<title>check login | clearskyy </title>
</head><body>
	<?php include 'menu.php' ?>
	
<div id="nexus">
	<div id="nexusLeft">

		<div class="nexusCenter">
			<?php
				if($count == 1){
					echo "LOGIN SUCCESSFUL";
					$_SESSION['user'] = $un;
					header("location: http://clearskyy.net/admin");
				}elseif($altcount == 1){
					echo "LOGIN SUCCESSFUL";
					$_SESSION['user'] = $un;
					header("location: ".$_SERVER['HTTP_REFERER']);
				}else{
					echo 'SOMETHING WENT WRONG <br /><a href="login.php">go back</a>';	
				}
			?>
		</div>
	
	</div>
	
</div>

</body></html>