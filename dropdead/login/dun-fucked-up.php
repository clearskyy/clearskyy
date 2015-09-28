<?php 
	//DUN FUCKED UP
	session_start();
	$_SERVER['HTTP_REFERER'] = $_SESSION['referrer'];
?>

<!doctype html><html><head>
	<?php require 'header.php' ?>
<title>check login | DropD34D </title>
</head><body>
	<?php include '../assets/menu.php' ?>
	
<div id="nexus">
	<div class="nexusCenter">
		<h2 style="text-align:center;">Ya Dun Fucked Up </h2>
		
		<p style="text-align:center;">Either your username or password was wrong, either way, try that again.</p>

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