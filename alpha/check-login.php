
<?php

// connect to the database server
mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("c0nn3ction f4i13d");

// open to the database
mysql_select_db("clearskyy_regalia") or die ("d4t4b4s3 c0u1dn't 83 53l3ct3d");

$input_un = $_POST['un'];
$input_pw = $_POST['pw'];

$un = mysql_real_escape_string($input_un);
$pw = mysql_real_escape_string($input_pw);
 
//select all records from Contribooter where username and password are the same
$result = mysql_query("SELECT * FROM Contribooter WHERE UserName='$un' AND PassWord=MD5('$pw')") or die ("c0u1dn't s313ct fr0m t4bl3 C0ntrib00t3r");

$count = mysql_num_rows($result);


?>
<!doctype html><html><head>
	<?php require '../crumpocolypse/header.php' ?>
<title>check login | clearskyy </title>
</head><body>
	<?php include '../crumpocolypse/menu.php' ?>
	
<div id="nexus">
	<div id="wrap-left">

		<div class="content">
			<?php
				if($count == 1){
					echo "10gin 2ucc322fu1";
					$SESSION['user'] = $un;
				}else{
					echo 's0m3thing w3nt wr0ng <br /><a href="login.php">go back</a>';	
				}
			?>
		</div>
	
	</div>
	
	<div id="sidebar">
	
	</div>
	
</div>

</body></html>