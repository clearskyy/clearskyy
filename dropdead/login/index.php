<?php 
	//LOGIN INDEX
	session_start();
	$_SERVER['HTTP_REFERER'] = $_SESSION['referer'];
?>

<!doctype html><html><head>
	<?php require 'header.php' ?>
<title>Login | DropD34D </title>
</head><body>
	<?php include '../assets/menu.php' ?>
	
<div id="nexus">
	<div class="nexusCenter">
		<h2 style="text-align:center;">Login Portal </h2>

		<form method="post" action="check-login.php" name="check-login">
			<p style="text-align:center;">
				<input type="text" name="un" placeholder="username" /> 
				<br />
				<input type="password" name="pw" placeholder="password" />
				<br /><br />
				<input type="submit" name="submit" value="Prepare to Drop" />
			</p>
		</form>
	</div>
	
	<div class="nexusRight">
		<h2>Login to DropD34D</h2>
		<p>
			Use the form to log in and gain access to clan member functions. <br />
		</p>
		<p>
			New user registration, coming soon.
		</p>
	</div>
	
</div>
</body></html>