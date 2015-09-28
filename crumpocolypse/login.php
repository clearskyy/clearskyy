<?php 
	session_start();
	$_SESSION['loginREFERER'] = $_SERVER['HTTP_REFERER'];
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
					<h2 style="text-align:center;" >Admin Portal </h2>

					<form method="post" action="check-login.php" name="check-login" style="text-align:center;">
						<p>
							<input type="text" name="un" placeholder="username" /> 
						</p>
						<p>
							<input type="password" name="pw" placeholder="password" />
						</p>
						<p>
							<input type="submit" name="submit" value="jack in" class="jackIn" />
						</p>
					</form>
				</div>
			</div>

			<div id="sidebar">
				<div class="content">
					<h2>If you're not an admin, kindly fuck off.</h2>
					<p>
						Use the form to log in and be transferred into the admin panel. <br />
					</p>
				</div>
			</div>
		</div>
		
	</body>
</html>