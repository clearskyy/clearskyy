<?php
	session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message = 'Hi! ' . $user .' <br />
	<form action="logout.php">
		<input type="submit" value="log out" />
	</form>';
	
	
} 
else {
	$message = 'you are currently not logged in. <br/>
		<a href="main-login.php">click here to login</a>
	';
	$user = "";
}
?>
<!doctype html><html><head><title>test | login</title>

</head><body>
<?php echo $message; ?>
</body></html>