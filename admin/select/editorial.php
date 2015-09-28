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

	include_once $_SERVER['DOCUMENT_ROOT'].'/crumpocolypse/dbCon.php';
	
	$query = "SELECT * FROM editorials ORDER BY `date` DESC";
	$result = $con->query($query);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
?>
		<div id="avatar">

		<h2>select editorial</h2>
		
		<table>
			<?php
			foreach($rows as $row){
				echo '<tr>
						<td style="text-align:left;">'.$row["title"].'</td>
						<td style="text-align:right;">'; 
					echo date("F/j/Y", strtotime($row["date"]));
						echo '</td>
						<td><form action="/admin/edit/edit-editorial.php" method="post"><input type="hidden" name="title" value="'.$row["title"].'" /><input type="submit" name="submit" id="submit" value="Edit" style="width:100%;" /></form></td>
					</tr>';
			}
			?>
		</table>
		
		</div>