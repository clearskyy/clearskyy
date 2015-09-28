
<?php

// connect to the database server
mysql_connect("mysql.clearskyy.net","contribooter","P4s5w0rd") or die ("c0nn3ction f4i13d");

// open to the database
mysql_select_db("clearskyy_regalia") or die ("d4t4b4s3 c0u1dn't 83 53l3ct3d");

//select all records from Contribooter
$result = mysql_query("SELECT * FROM Contribooter") or die ("c0u1dn't s313ct fr0m t4bl3 C0ntrib00t3r");

$input_fn = $_POST['fn'];
$input_ln = $_POST['ln'];
$input_em = $_POST['em'];
$input_un = $_POST['un'];
$input_pw = $_POST['pw'];

$fn = mysql_real_escape_string($input_fn);
$ln = mysql_real_escape_string($input_ln);
$em = mysql_real_escape_string($input_em);
$un = mysql_real_escape_string($input_un);
$pw = mysql_real_escape_string($input_pw);
 
echo $fn . "<br />" . $ln . "<br />" . $em . "<br />" . $un . "<br />";

$result = mysql_query("INSERT INTO `clearskyy_regalia`.`Contribooter` (`FirstName`, `LastName`, `Email`, `UserName`, `PassWord`, `Points`, `DateCreated`) VALUES ('$fn', '$ln', '$em', '$un', MD5('$pw'), '0', NOW());");

?>