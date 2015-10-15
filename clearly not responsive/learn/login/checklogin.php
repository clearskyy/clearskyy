

<?php
	session_start();
	//NOTE: I am doing this on a clean install Windows WAMPServer where this is default your server set up may be different.
	ob_start();
	$host="localhost"; 		//hostname
	$username=""; 			//MySQL username
	$password=""; 			//MySQL password
	//this will be the same if you have been following the tutorial.
	$db_name="test";		//database name
	$tbl_name="members";	//table name
	
	//connect to the server and select the database
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select database");
	
	//pass username and password sent from form to variables
	$inputUsername = $_POST['inputUsername'];
	$inputPassword = $_POST['inputPassword'];
	
	//To protect MySQL injection; this is used to make data safe before sending query to MySQL
	$inputUsername = stripslashes($inputUsername);
	$inputPassword = stripslashes($inputPassword);
	$inputUsername = mysql_real_escape_string($inputUsername);
	$inputPassword = mysql_real_escape_string($inputPassword);
	$sql = "SELECT * FROM $tbl_name WHERE username='$inputUsername' and password='$inputPassword'";
	$result = mysql_query($sql);
	
	//mysql_num_row is counting how many table rows fit the query
	$count = mysql_num_rows($result);
	
	//if result matched $inputUsername and $inputPassword, table row must be 1 row, unmatched returns 0.
	if ($count == 1){
		//register $inputUsername and $inputPassword and redirect to file 'login-successful.php'
		$_SESSION['user'] = $inputUsername;
		$_SESSION['pass'] = $inputPassword;
		header("location:login-successful.php");
	}
	else{ 
		echo "wrong username or password";
	}
	ob_end_flush();
?>