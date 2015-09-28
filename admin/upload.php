<?php

session_start();
if(isset( $_SESSION['user'])) { 
	$user = $_SESSION['user']; 

	// connect to the database server
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$isUser = 0;
	
	$userz = "SELECT * FROM users";
	$uzresult = $con -> query($userz);
	
	while($uzrow = $uzresult->fetch_array()){ 
		$uzrows[] = $uzrow; 
	}
	
	foreach ($uzrows as $uzrow){
		if($user == $uzrow['username']){ 
			$isUser = 1; $isAdmin = $uzrow['isadmin']; 
		}
	}
	
	if($isUser == 1 & $isAdmin == 0){ 
		$_SESSION['referer'] = "http://clearskyy.net/";
		header("location:http://clearskyy.net"); 
	}
	
} else {
	$_SESSION['referer'] = "http://clearskyy.net/";
	header("location:http://clearskyy.net");
}

?>

<!doctype html><html><head><? require "../crumpocolypse/ahead.php"; ?><title>file upload | clearskyy</title></head><body>

<div id="nexus">
	<div id="left-wrap">
		<p>&nbsp;</p>
		<form action="upload_file.php" method="post" enctype="multipart/form-data">
			<label for="file">File:</label>
			<input type="file" name="file" id="file"><br>
			<input type="submit" name="submit" value="Submit" style="width:5em;">
		</form>
	</div>
</div>
</body></html>