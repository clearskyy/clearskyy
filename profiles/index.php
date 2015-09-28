<?php

session_start();
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 

// connect to the database server
$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$pquery = "SELECT * FROM Contribooter ORDER BY id ASC";
	
	$presult = $con->query($pquery);
	
	while($prow = $presult->fetch_array()){
		$prows[] = $prow;
	}

?>
<!doctype html><html><head><title>profiles | clearskyy</title>
<!-- editorials listing page for clearskky.net by nate seymour  -->
<?php require '../crumpocolypse/header.php' ?>
</head><body>

<?php include '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">

<div class="content">
	<div class="type-ribbon">
		<h3>Meet the Cast </h3>
	</div>
	<br />
	<table cellpadding="6"  border="2">
		<tr class="th-main">
			<th>Contributor</th>
			<th>Topics</th>
		</tr>
<?
		foreach($prows as $prow){
			echo '<tr><td><a href="'.$prow['UserName'].'.php">'.$prow['UserName'].'</a></td><td>'.$prow['topics'].'</td></tr> ';
		}
?>

	</table>
</div>
<!-- End of "content" -->	
</div>
<!-- End of "wrap-left" -->

<div id="sidebar">
	<?php include '../crumpocolypse/articles.php' ?>
	<?php include '../crumpocolypse/twitter.php' ?>
</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->

	<?php include '../crumpocolypse/caboose.php' ?>
<body></html>