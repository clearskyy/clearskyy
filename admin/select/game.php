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

	include_once $_SERVER["DOCUMENT_ROOT"].'/crumpocolypse/dbCon.php';
	
	$query = "SELECT * FROM `game` ORDER BY `name` ASC";
	$result = $con->query($query);
	
	while($row = $result->fetch_array()){
		$rows[] = $row;
	}
?>

	<div id="avatar">
	<h2>Select Review</h2>
			
			<table>
			<?
				foreach($rows as $row){
					echo '<tr>
						<td style="text-align:left;">'.$row["name"].'</td>
						<td>
							<form action="/admin/edit/edit-game.php" method="post">
								<input type="hidden" name="name" value="'.$row["name"].'" />
								<input type="hidden" name="id" value="'.$row["id"].'" />
								<input type="submit" name="submit" id="submit" value="Edit" style="width:100%;" />
							</form>
						</td>
					</tr>';
				}
			?>
			</table>
		
	</div>