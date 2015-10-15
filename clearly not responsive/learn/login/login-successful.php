
<?php
//check if session is not registered, redirect back to main page.
//make sure this snippet is the first few lines of the page.

session_start();
if( !isset( $_SESSION['user'] )){
	header("location:main-login.php");
}
?>

<!doctype html><html><head><title>Login Success!</title>
</head><body>

Login Successful<br />
<a href="test.php">try going to this page</a>

</body></html>