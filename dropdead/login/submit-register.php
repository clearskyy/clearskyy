<?php

include_once '../assets/db/connect.php';

//insert values into users table
	$statement = $con->prepare( 
		"INSERT INTO users (username, password, email, admin) VALUES (?, ?, ?, ?)" 
	);
	
	$input_em = $_POST['em'];
	$input_un = $_POST['un'];
	$input_pw = $_POST['pw'];
	$input_ad = $_POST['ad'];

	$em = $con->real_escape_string($input_em);
	$un = $con->real_escape_string($input_un);
	$pw = $con->real_escape_string($input_pw);
	$ad = $con->real_escape_string($input_ad);
	
	$pw = MD5($pw);
	
	$statement -> bind_param("sssi",$un,$pw,$em,$ad);
	$statement -> execute();
 
echo "username: " . $un . "<br/>password: " . $pw . "<br />email: " . $em . "<br />admin (1:yes, 0:no): " . $ad . "<br/>";

?>