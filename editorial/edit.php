<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/editorial/edit.php";
	header("location:../crumpocolypse/login.php");
}

//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$query = "SELECT * FROM editorials";
	$result = $con->query($query);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
?>

<!doctype html><html><head>
<!-- edit editorial page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>

<title>Edit Editorial | clearskyy</title>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">
	<div class="content">

		<div class="type-ribbon">
			<h3>Edit Editorial</h3>
		</div>
		<div id="avatar">
		<h2>Editing as <?php echo $user; ?>

		<h2>Pick editorial to edit</h2>
		
		<form action="edit-editorial.php" method="post">
		<select name="title">
			<?php
			foreach($rows as $row){
				echo '<option value="'.$row["title"].'" >'.$row["title"].'</option>';
			}
			?>
		<select>
		<br />
		<input type="submit" name="submit" id="submit" />
		
		</form>
		
		</div>
		
	</div>