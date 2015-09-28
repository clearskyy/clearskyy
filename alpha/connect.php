
<?php

// connect to the database server
mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("c0nn3ction f4i13d");

// open to the database
mysql_select_db("clearskyy_regalia") or die ("d4t4b4s3 c0u1dn't 83 53l3ct3d");

//select all records from Contribooter
$result = mysql_query("SELECT * FROM Contribooter") or die ("c0u1dn't s313ct fr0m t4bl3 C0ntrib00t3r");

while($row = mysql_fetch_array($result)){
	echo $row['FirstName'] . " - " . $row['LastName'];
	echo "<br />";
}

?>