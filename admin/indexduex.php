<?php
//admin panel

session_start();
if(isset( $_SESSION['user'])) { 
	$user = $_SESSION['user']; 

	// connect to the database server
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
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

	// connect to the database server
	$con=mysqli_connect("mysql.clearskyy.net","contribooter","P4s5w0rd","clearskyy_regalia");
	// Check connection
	if (mysqli_connect_errno())	{ die(mysqli_connect_error()); }
	
	$idGET = $con -> prepare("SELECT id FROM Contribooter WHERE UserName = ?");
	$idGET -> bind_param("s",$user); $idGET -> execute();
	$idGET -> bind_result($id); $idGET -> store_result();
	$idGET -> fetch();
	
	$pointsGET = $con -> prepare("SELECT Points FROM Contribooter WHERE id = ?");
	$pointsGET -> bind_param("s",$id); $pointsGET -> execute();
	$pointsGET -> bind_result($points); $pointsGET -> store_result();
	$pointsGET -> fetch();
	  
	$postsGET = $con -> prepare("SELECT posts FROM Contribooter WHERE id = ?");
	$postsGET -> bind_param("s",$id); $postsGET -> execute();
	$postsGET -> bind_result($posts); $postsGET -> store_result();
	$postsGET -> fetch();
	  
	$editsGET = $con -> prepare("SELECT edits FROM Contribooter WHERE id = ?");
	$editsGET -> bind_param("s",$id); $editsGET -> execute();
	$editsGET -> bind_result($edits); $editsGET -> store_result();
	$editsGET -> fetch();
	
	$pquery = "SELECT * FROM Contribooter ORDER BY Points DESC";
	$presult = $con->query($pquery);
	while($prow = $presult->fetch_array()){
		$prows[] = $prow;
	}
	
	$poquery = "SELECT * FROM Contribooter ORDER BY posts DESC";
	$poresult = $con->query($poquery);
	while($porow = $poresult->fetch_array()){
		$porows[] = $porow;
	}
	
	$equery = "SELECT * FROM Contribooter ORDER BY edits DESC";
	$eresult = $con->query($equery);
	while($erow = $eresult->fetch_array()){
		$erows[] = $erow;
	}
	
?>
<!doctype html><html><head>

<? require "../crumpocolypse/ahead2.php"; 
	echo '<title>'.$user.'::admin panel | clearskyy</title>';
?>
</head><body>
<!--
<? include_once '../crumpocolypse/sig.php' ?>
-->
<? include_once '../crumpocolypse/menu.php' ?>

<div id="nexus">
	<div id="wrap-left">
		<div class="content">
			<h2>welcome back, <? echo $user; ?>.</h2>
			
			<div id="admin">
				<ul>
				  <li>
					<a id="create-instance">create</a>
				  </li>
				  <li>
					<a id="edit-instance">edit</a>
				  </li>
				</ul>
				<br />
				<ul id="create">
				   <li><a id="createEditorial">editorial</a></li>
				   <li><a id="createLearn" >learn</a></li>
				  <li><a id="createReview">review</a></li>
				  <li><a id="createRagequit">ragequit</a></li>
				  <li><a id="createSeemsLegit">seems legit</a></li>
				  <li><a id="createStories">story</a></li>
				  <li><a id="createVideo">video</a></li>
				  <li><a href="create/create-audio.php">audio</a></li>
				  <li><a id="createWT">walkthrough</a></li>
				</ul>
				<ul id="edit">
				   <li><a id="editEditorial">editorial</a></li>
				   <li><a id="editLearn">learn</a></li>
				  <li><a id="editReview">review</a></li>
				  <li><a id="editRagequit">ragequit</a></li>
				  <li><a id="editSeemslegit">seems legit</a></li>
				  <li><a id="editStories">story</a></li>
				  <li><a id="editVideo">video</a></li>
				  <li><a id="editAudio">audio</a></li>
				  <li><a id="editWT">walkthrough</a></li>
				</ul>
			
			</div>
		</div>
		
		<div class="content">
			<div contenteditable="true"> </div>
			<textarea class="ckeditor" name="ballocks"></textarea>
		</div>
		
		<div id="workstation">&nbsp;</div>

	</div>
	
	<div id="sidebar">
		
		<table border="2" cellpadding="5">
			<tr><th>helpful shit</th></tr>
			<tr><th><a href="upload.php" target="_blank">image uploader</a></th></tr>
		</table>
		<br />
		<table border="2" cellpadding="5">
			<tr><th colspan="2"><? echo $user ?></th></tr>
			<tr>
				<td>Posts</td>
				<td><? echo $posts ?></td>
			</tr>
			<tr>
				<td>Edits</td>
				<td><? echo $edits ?></td>
			</tr>
			<tr>
				<td>Points</td>
				<td><? echo $points ?></td>
			</tr>
		</table>
		<br />
		<table border="2" cellpadding="5">
			<tr><th colspan="2">Points by User</th></tr>
			<? 
				foreach ($prows as $prow){
				echo '<tr>
						<td>'.$prow['UserName'].'</td>
						<td>'.$prow['Points'].'</td>
					</tr>'; 
				}
			?>
		</table>
		<br />
		<table border="2" cellpadding="5">
			<tr><th colspan="2">Posts by User</th></tr>
			<? 
				foreach ($porows as $porow){
				echo '<tr>
						<td>'.$porow['UserName'].'</td>
						<td>'.$porow['posts'].'</td>
					</tr>'; 
				}
			?>
		</table>
		<br />
		<table border="2" cellpadding="5">
			<tr><th colspan="2">Edits by User</th></tr>
			<? 
				foreach ($erows as $erow){
				echo '<tr>
						<td>'.$erow['UserName'].'</td>
						<td>'.$erow['edits'].'</td>
					</tr>'; 
				}
			?>
		</table>
	</div>
</div>
<? include_once '../crumpocolypse/caboose.php' ?>
</body></html>
