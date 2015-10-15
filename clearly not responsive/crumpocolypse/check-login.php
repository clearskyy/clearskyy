<?php
	session_start();
	//NOTE: I am doing this on a clean install Windows WAMPServer where this is default your server set up may be different.
	ob_start();
	$host="mysql.clearskyy.net"; 		//hostname
	$username="clearskyy"; 			//MySQL username
	$password="Boredom00"; 			//MySQL password
	//$password = sha1($password, true);
	//$password = sha1($password, false);
	//$password = strtoupper($password);
	//$password = "*" . $password;
	//echo $password . "<br />";
	//this will be the same if you have been following the tutorial.
	$db_name="_regalia";		//database name
	$tbl_name="users";	//table name
	
	//connect to the server and select the database
	$mysqli = new mysqli($host, $username,$password, $db_name);
	//$mysqli = new mysqli('localhost', 'my_user', 'my_password', 'my_db');


	
	//pass username and password sent from form to variables
	$inputUsername = $_POST['inputUsername'];
	$inputPassword = $_POST['inputPassword'];
	
	//echo "raw password: " . $inputPassword . "<br />";
	
	//To protect MySQL injection; this is used to make data safe before sending query to MySQL
	//$inputUsername = stripslashes($inputUsername);
	//$inputPassword = stripslashes($inputPassword);
	//$inputUsername = mysqli_real_escape_string($mysqli,$inputUsername);
	$inputPassword = md5($inputPassword);
	$sql = "SELECT * FROM $tbl_name WHERE username=$inputUsername and password=$inputPassword";
	if($stmt = mysqli_prepare($mysqli, $sql)){
		/* execute query */
		mysqli_stmt_execute($stmt);
		/* store result */
		mysqli_stmt_store_result($stmt);
		
		//mysql_num_row is counting how many table rows fit the query
		$count = mysqli_stmt_num_rows($stmt);
		
	}
	
	printf("number of rows: %d.<br/>", $count);
	
	//if result matched $inputUsername and $inputPassword, table row must be 1 row, unmatched returns 0.
	if ($count == 1){
		//register $inputUsername and $inputPassword and redirect to file 'login-successful.php'
		$_SESSION['user'] = $inputUsername;
		$_SESSION['pass'] = $inputPassword;
		header('Location: '.$_SERVER['PHP_SELF']);  
	}
	else{ 
		echo "wrong username or password<br/>";
		//echo "$inputUsername <br/>";
		//echo "$inputPassword";
	}
	ob_end_flush();
	$stmt->close;
	$mysqli->close();
?>