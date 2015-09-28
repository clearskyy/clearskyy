<?php
ob_start();
session_start();
if($_SESSION['referrer'] == ""){
	$_SESSION['referrer'] = "http://clearskyy.net/dropdead/";
}
$_SERVER['HTTP_REFERER'] = $_SESSION['referrer'];

	include_once "../assets/db/connect.php";

?>

<!doctype html><html><head>
	<? require 'header.php' ?>
<title>check login | clearskyy </title>
</head><body>
	<? include '../assets/menu.php' ?>
	
<div id="nexus">
	<div id="nexusCenter">

	<?
		if(isset($_POST['submit'])){
	
			$un = mysqli_real_escape_string($con,$_POST['un']);
			$pw = mysqli_real_escape_string($con, $_POST['pw']);
			
			if($un && $pw){
				$stmt = "SELECT * FROM `users` WHERE `username`='".$un."'";
				$query = mysqli_query($con,$stmt) or die (mysqli_error($con));
				
				$checkUser= mysqli_num_rows($query);
				
				if($checkUser != 1){
					$error = "your username does not exist, please contact an administrator about creating your account.";
					echo '<h2>'.$error.'</h2>
							<a href="http://clearskyy.net/dropdead/login/">Go back to login page</a>
						';
				}
				
				while($row = mysqli_fetch_array($query)){
					$pw = MD5($pw);
					$checkPass = $row['password'];
					
					if($pw == $checkPass){
						setcookie("user",$un,time()+7200);
						$_SESSION['user'] = $un;
						$_SESSION['start'] = time();
						$_SESSION['expire'] = $_SESSION['start'] + (60*60*60);
						header("location: http://clearskyy.net/dropdead/");
						exit();
					
					}
					else{
						header("location: http://clearskyy.net/dropdead/login/dun-fucked-up.php");
					}
				}
			}else{
				$error = "You forgot to enter your username or password.";
				echo '<h2>'.$error.'</h2>
						<a href="http://clearskyy.net/dropdead/login/">Go back to login page</a>
					';
			}
		}
	?>
	
	</div>
	
	<div id="nexusRight">
	
	</div>
	
</div>

</body></html>