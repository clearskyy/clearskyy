<?php
//admin panel

session_start();
if(isset( $_SESSION['user'])) { 
	$user = $_SESSION['user']; 

	include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/dbCon.php';
	
	$isUser = 0;
	
	$userz = "SELECT * FROM users";
	$uzresult = $con -> query($userz);
	
	while($uzrow = $uzresult->fetch_array()){ 
		$uzrows[] = $uzrow; 
	}
	
	foreach ($uzrows as $uzrow){
		if($user == $uzrow['username']){ 
			$isUser = 1; $isAdmin = $uzrow['isadmin']; 
		}
	}
	
	if($isUser == 1 & $isAdmin == 0){ 
		$_SESSION['referer'] = "http://clearskyy.net/";
		header("location:http://clearskyy.net"); 
	}
	
} else {
	$_SESSION['referer'] = "http://clearskyy.net/";
	header("location:http://clearskyy.net");
}

	include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/connect.php';
	
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
<!doctype html>
<html>
	<head>
		<? require "../crumpocolypse/ahead.php"; ?>
		<title>Admin Panel | clearskyy</title>
	</head>
	<body>
<!--
<? include_once '../crumpocolypse/sig.php' ?>
-->
<? include_once '../crumpocolypse/menu.php' ?>

<div id="nexus">
	<div id="wrap-left" >
		<div class="type-ribbon">
			<h3>Supreme Leader <? echo $user; ?>, awaiting your command.</h3>
		</div>
		<div class="content" style="overflow:hidden;">
			
			
			<div style="width:18%;float:left;">
					
				<table class="adminTable">
					<tr>
						<td>
							<h2>create</h2>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-editorial.php">editorial</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-learn.php" >learn</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-review.php">review</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-story.php">story</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-video.php">video</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-audio.php">audio</a>
						</td>
					</tr>
					<tr>
						<td>
							<a href="create/create-game.php">game</a>
						</td>
					</tr>
				</table>
				
				<table class="adminTable">
					<tr>
						<td>
							<h2>edit</h2>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editEditorial">editorial</a>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editLearn">learn</a>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editReview">review</a>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editStories">story</a>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editVideo">video</a>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editAudio">audio</a>
						</td>
					</tr>
					<tr>
						<td>
							<a id="editGame">game</a>
						</td>
					</tr>
				</table>
			
			</div>
			<div style="width:81%;float:left;">
				<div id="workstation">&nbsp;</div>
			</div>
		</div>
		
		<div class="type-ribbon">
			<h3>Admin Notes/To-Do List</h3>
		</div>
		
		<?
			include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/time2str.php';
					
			//Admin Notes Feed
					
				$notesQUERY = "SELECT * FROM `admin-notes` ORDER BY id DESC";
				$notesRESULT = $con -> query($notesQUERY);
					
					while($row = $notesRESULT->fetch_array()){
						$notesROWS[] = $row;
					}
					
					foreach($notesROWS as $row){
					
						echo '
							<div class="content">
								<p class="timestamp">'.time2str($row['postdate']).'</p>';
					
						$text = $row['note'];
					
						echo '<p>'.strip_tags($text).'</p>
							</div>';
					}
		?>
		
	</div>
	<!--Endof wrap-left -->
	
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
<? include $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/caboose.php'; ?>
</body></html>
