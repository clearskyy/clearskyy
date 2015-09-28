<?php
	session_start();
	
	if( isset( $_SESSION["user"] )){
		$user = $_SESSION["user"];
	} 

	include_once '../crumpocolypse/dbCon.php';
	
	$aquery = "SELECT * FROM audio ORDER BY date DESC";
	
	$aresult = $con->query($aquery);
	
	while($arow = $aresult->fetch_array()){
		$arows[] = $arow;
	}
?>	

<!doctype html>
<html>
	<head>
		<title>audio | clearskyy</title>
<!-- AUDIO INDEX - tutorial listing page for clearskky.net by nate seymour  -->
<? require "../crumpocolypse/header.php"; ?>

	</head>
	<body>

		<? include_once "../crumpocolypse/menu.php"; ?>

		<div id="nexus">
			<div id="wrap-left">
				<div class="content">
					<div class="type-ribbon">
						<h3>Audio</h3>
					</div>
					<br />
					<table cellpadding="6"  border="2" id="voting">
						<tr>
							<th colspan="4">2013</th>
						</tr>
						<?
						foreach($arows as $arow){
							
							$post_url = $arow['url'];
							$up = "u";
							$down = "d";
							$downvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? AND vote.vote = ?");
							$downvote_count -> bind_param("ss",$post_url,$down); $downvote_count -> execute();
							$downvote_count -> bind_result($downvotes); $downvote_count -> store_result();
							$downvote_count -> fetch();
							$upvote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and vote.vote = ?");
							$upvote_count -> bind_param("ss",$post_url,$up); $upvote_count -> execute();
							$upvote_count -> bind_result($upvotes); $upvote_count -> store_result();
							$upvote_count -> fetch();

							$votes = $upvotes - $downvotes;

							echo '
								<tr>';
										if( $downvotes > $upvotes ){
											echo '<td align="center"><span class="neg">'.$votes.'</span></td>';
										}else{
											echo '<td align="center"><span class="pos">'.$votes.'</span></td>';
										}


									$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
									$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
									$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
									$didTheyVote -> fetch();

									if($didTheyCount > 0){
										echo '<td>&nbsp;&nbsp;</td>';
									}else{

									echo'

									<td align="center">
										<a href="#!" class="upvote">
											<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
											<input type="hidden" value="'.$arow['url'].'" class="URL" />
											<input type="hidden" value="u" class="upOrDown" />
											<input type="hidden" name="vote" class="voteValue" />	
											<input type="hidden" name="posturl" class="postURL" />
										</a>
										<a href="#!" class="downvote">
											<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
											<input type="hidden" value="'.$arow['url'].'" class="URL" />
											<input type="hidden" value="d" class="upOrDown" />
											<input type="hidden" name="vote" class="voteValue" />	
										<input type="hidden" name="posturl" class="postURL" />
										</a>
									</td>';

									}
							
							echo '
									<td><a href="'.$arow['url'].'"><h2>'.$arow['title'].'</h2></a></td>
									<td>'.date("F j, Y",strtotime($arow['date'])).'</td>
								</tr>';
						}
						?>
						
					</table>
					
				</div>
	<!-- End of "content" -->
	
</div>
<!-- End of "wrap-left" -->
	
<div id="sidebar">
	<? include "../crumpocolypse/articles.php"; ?>

</div>
<!-- End of "sidebar" -->

</div>
<!-- End of Nexus -->
	
	<? include "../crumpocolypse/caboose.php"; ?>
	
<body>
</html>';