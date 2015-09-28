<?php
//create an audio article // admin panel

session_start();
if(isset( $_SESSION['user'])) { 
	$user = $_SESSION['user']; 

	include '../../crumpocolypse/dbCon.php';
	
	$userz = "SELECT * FROM users";
	$uzresult = $con -> query($userz);
	while($uzrow = $uzresult->fetch_array()){ $uzrows[] = $uzrow; }
	$isUser = 0;
	foreach ($uzrows as $uzrow){
		if($user == $uzrow['username']){ $isUser = 1; }
	}
	if($isUser == 1){ 
		$_SESSION['referer'] = "http://clearskyy.net/";
		header("location:http://clearskyy.net"); 
	}
	
}
else {
	$_SESSION['referer'] = "http://clearskyy.net/";
	header("location:http://clearskyy.net");
}

?>
<!doctype html><html><head>

<? require "../../crumpocolypse/create-header.php"; 
	echo '<title>'.$user.'::admin panel | clearskyy</title>';
?>
</head><body>
<!--
<? include_once '../../crumpocolypse/sig.php' ?>
-->
<? include_once '../../crumpocolypse/menu.php' ?>

<div id="nexus">
	<div id="wrap-left">
		<div class="content">
				<div class="type-ribbon">
					<h3>Write a audio page</h3>
				</div>
				
				<form action="/admin/insert/insert-audio.php" method="post" enctype="multipart/form-data">
					
					<h2>audio embed</h2>
					<input type="text" name="embed" placeholder="place audio embed code here" />
					<br />
					<h2>title</h2>
					<input type="text" name="title" placeholder="Page Title (required)" required /> <br />
					<input type="text" name="titleLink" placeholder="link to item under review (link to amazon or whatever)" /> <br />
					<h2>article</h2>
					<textarea name="content" >&nbsp;</textarea> <br />
					<h2>sidebar</h2>
					<textarea name="sidebar" >
						<table border="2" cellpadding="6">
							<tr class="th-main"><th colspan="2">the deets </th></tr>
							<tr>
								<td> </td>
								<td> </td>
							</tr>
							<tr>
								<td> </td>
								<td> </td>
							</tr>
						</table>
					</textarea> <br />
					<input type="submit" name="submit" id="submit" />
				</form>
		</div>
	</div>
</div>

</body>
</html>

	