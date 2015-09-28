<?PHP
	session_start();
	
	include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connect.php';
	
	$profileID = 1;
	
	//username
	$usernameGET = $con->prepare ("SELECT `username` FROM `users` WHERE `id` = ?");
	$usernameGET -> bind_param("i",$profileID);
	$usernameGET -> execute();	$usernameGET->bind_result($username); 
	$usernameGET -> store_result(); $usernameGET->fetch();
	
	//bio
	$bioGET = $con->prepare ("SELECT `bio` FROM `users` WHERE `id` = ?");
	$bioGET -> bind_param("i",$profileID);
	$bioGET -> execute();	$bioGET->bind_result($bio); 
	$bioGET -> store_result(); $bioGET->fetch();
	
?>

<!doctype html>
<html>
	<head>
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/header.php'; ?>
		<title>DROPD34D | <? echo $username; ?></title>
	</head>
	<body>
		
		<? include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/menu.php'; ?>
		
		<div id="nexus">
			<h1 id="pageTitle"><? echo $username ?></h1>
			
			<div class="nexusCenter">
		
				<?
				//bio
				if($bio){
				
					echo'<h2 style="border-bottom: 1px solid #ccc;">Bio</h2>'.$bio; 
				 }
				 
				 //status update
				 include_once $_SERVER["DOCUMENT_ROOT"] . '/crumpocolypse/time2str.php'; 
				 
				 
				 $likeCountTOTAL = 0;
				 $dislikeCountTOTAL = 0;
				 
				$query = "SELECT * FROM `statuses` WHERE `userID` = $profileID";
				if($result = $con -> query($query)){
				
				echo '<h2 style="border-bottom: 1px solid #ccc;">Status Update</h2>';
				 
					 while($row = $result -> fetch_array()){
						$rows[] = $row;
					 }
					 
					 foreach(array_reverse($rows) as $row){
						echo '
						<div class="statusBox">
							<div class="statusHeader">
								<div class="statusHeaderLeft">
								 &nbsp;
								</div>
								<div class="statusHeaderRight">
									'.time2str($row['timestamp']).'
								</div>
							</div>
							<div class="statusContent">
								'.$row['update'].'
							</div>
							<div class="statusHeader">
								<div class="statusHeaderLeft">';
								
								$statusID = $row['id'];
								
								$likeQUERY = "SELECT * FROM `likes` WHERE `vote` = `1`";
								if($likeRESULT = $con -> query($likeQUERY)){
									while($likeROW = $likeRESULT -> fetch_array()){
										$likeROWS[] = $likeROW;
									}
									foreach($likeROWS as $likeROW){
										if($likeROW['statusID'] == $statusID){
											$likeCountTOTAL++;
										}
									}
								}
								
								echo "like:".$likeCountTOTAL."&nbsp;";
								
								$dislikeQUERY = "SELECT * FROM `likes` WHERE `vote` = `2`";
								if($dislikeRESULT = $con -> query($dislikeQUERY)){
									while($dislikeROW = $dislikeRESULT -> fetch_array()){
										$dislikeROWS[] = $dislikeROW;
									}
									foreach($dislikeROWS as $dislikeROW){
										if($dislikeROW['statusID'] == $statusID){
											$dislikeCountTOTAL++;
										}
									}
								}
								
								echo "dislike:".$dislikeCountTOTAL."&nbsp;";
								
								$likeCHECK = $con -> prepare("SELECT COUNT(*) FROM `likes` WHERE statusID = ? AND remoteAddress = ?"); 
								$likeCHECK -> bind_param("is",$row['id'],$_SERVER['REMOTE_ADDR']); 
								$likeCHECK -> execute();  $likeCHECK -> bind_result($likeCheckCOUNT); 
								$likeCHECK -> store_result();  $likeCHECK -> fetch(); 
								
								echo "count:".$likeCheckCOUNT."&nbsp;";
								
								if($likeCheckCOUNT == 0){
									echo '<a href="#">like</a> &nbsp; <a href="#">dislike</a>';
								}
								elseif($likeCheckCOUNT == 1){
								
									if($likeCountTOTAL == 0 && $dislikeCountTOTAL == 1){
										echo '<a href="#">like</a> &nbsp; <a href="#">1 dislike</a>';
									}
									elseif($likeCountTOTAL == 0 && $dislikeCountTOTAL > 1){
										echo '<a href="#">like</a> &nbsp; <a href="#">'.$dislikeCountTOTAL.' dislikes</a>';
									}
									elseif($likeCountTOTAL == 1 && $dislikeCountTOTAL == 0){
										echo '<a href="#">1 like</a> &nbsp; <a href="#">dislike</a>';
									}
									elseif($likeCountTOTAL == 1 && $dislikeCountTOTAL == 1){
										echo '<a href="#">1 like</a> &nbsp; <a href="#">dislike</a>';
									}
									elseif($likeCountTOTAL == 1 && $dislikeCountTOTAL > 1){
										echo '<a href="#">'.$likeCountTOTAL.' likes</a> &nbsp; <a href="#">'.$dislikeCountTOTAL.' dislikes</a>';
									}
									elseif($likeCountTOTAL > 1 && $dislikeCountTOTAL == 0){
										echo '<a href="#">'.$likeCountTOTAL.' likes</a> &nbsp; <a href="#">dislike</a>';
									}
									elseif($likeCountTOTAL > 1 && $dislikeCountTOTAL == 1){
										echo '<a href="#">'.$likeCountTOTAL.' likes</a> &nbsp; <a href="#">1 dislike</a>';
									}
									elseif($likeCountTOTAL > 1 && $dislikeCountTOTAL > 1){
										echo '<a href="#">'.$likeCountTOTAL.' likes</a> &nbsp; <a href="#">'.$dislikeCountTOTAL.' dislikes</a>';
									}
									
								}
									
						echo'		</div>
							</div>
						</div>';
					 }
				}
				 
				 ?>
				
			
			</div>
			
			<div class="nexusRight">
				<img src="images/dead150.png" alt="deadz" align="right" class="DP150" />
				<div class="loginInfo">
					Not Logged In.
					<br />
					<br />
					
					<?
					
					echo '<table>
							<tr>
								<th>Game</th>
								<th>Handle</th>
							</tr>
					';
					
					$query = "SELECT * FROM `userGameData` WHERE `userID` = $profileID";
					$result = $con -> query ($query);
					
					while ($row = $result->fetch_array()){
						$rows[] = $row;
					}
					
					foreach($rows as $row){				
						
						include_once $_SERVER["DOCUMENT_ROOT"] . '/dropdead/assets/db/connectRegalia.php';
						
						//gameID
						$gameIDGET = $con->prepare ("SELECT `name` FROM `game` WHERE `id` = ?");
						$gameIDGET -> bind_param("i",$row['gameID']);
						$gameIDGET -> execute();	$gameIDGET->bind_result($gameTitle); 
						$gameIDGET -> store_result(); $gameIDGET->fetch();
						
						if($row['gameUsername']){
							echo
							'
							<tr>
								<td>'.$gameTitle.'</td>
								<td>'.$row['gameUsername'].'</td>
							</tr>
							';
						}
					}
					
					echo '</table>';
					
					?>
					
					<!--
					<table>
						<tr>
							<th>Game</th>
							<th>Handle</th>
						</tr>
						<tr>
							<td>Origin</td> 
							<td>clearskyy </td>
						</tr>
						<tr>
							<td>PlanetSide</td> 
							<td>NeitoShimoa </td>
						</tr>
						<tr>
							<td>PSN</td> 
							<td>clearskyyXx </td>
						</tr>
						<tr>
							<td>Spiral Knights</td> 
							<td>NeitoShimoa </td>
						</tr>
						<tr>
							<td>Steam</td> 
							<td>clearskyy </td>
						</tr>
						<tr>
							<td>World of Tanks</td>
							<td>clearskyy</td>
						</tr>
					</table>
					-->
				</div>
			</div>
		</div>
	</body>
</html>