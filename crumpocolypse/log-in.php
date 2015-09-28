
<?php

if( isset( $_SESSION['user'] )){
	$user = $_SESSION['user'];
	$message =  $user;
	echo $user;
} 
else {
	echo '<form name="form1" method="post" action="../crumpocolypse/check-login.php">
		<table border="0" cellpadding="3" cellspacing="0" style="float:right;">
			<tr>
				<td><input name="inputUsername" type="text" id="inputUsername" placeholder="Username" /></td>
				<td><input name="inputPassword" type="password" id="inputPassword" placeholder="Password" /></td>
				<td><input type="submit" name="submit" value="login" /></td>
			</tr>
		</table>
	</form>';
}

?>