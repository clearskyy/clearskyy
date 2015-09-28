<?PHP

session_start();

if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user;
} else {
	$message = 'you are currently not logged in.';
	$user = "";
}

?>