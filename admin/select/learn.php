<?php

session_start();
if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user ." is logged in";
} 
else {
	$user = "";
	$_SESSION['referer'] = "http://clearskyy.net/admin";
	header("location:../crumpocolypse/login.php");
}

//connect to database using mysqli
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$query = "SELECT * FROM learn";
	$result = $con->query($query);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
?>

		<div id="avatar">

			<h2>SELECT LEARN</h2>
		
			<table>
			<?php
			foreach($rows as $row){
				echo '<tr>
						<td style="text-align:left;">'.$row["title"].'</td>
						<td style="text-align:right;">'; 
					echo date("F/j/Y", strtotime($row["date"]));
						echo '</td>
						<td><form action="/admin/edit/edit-learn.php" method="post"><input type="hidden" name="title" value="'.$row["title"].'" /><input type="submit" name="submit" id="submit" value="Edit" style="width:100%;" /></form></td>
					</tr>';
			}
			?>
		</table>

		</div>
		