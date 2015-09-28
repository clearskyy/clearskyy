<?php
session_start();
if( isset( $_SESSION["user"] )){ $user = $_SESSION["user"];} 

include_once '../crumpocolypse/dbCon.php'
?>

<!doctype html><html><head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>
	<? include_once '../crumpocolypse/header.php' ?>
<title>vote.php</title></head><body>

<?php include_once '../crumpocolypse/menu.php' ?>

<div id="nexus">
<div id="wrap-left">


	
		<div class="non-semantic-protector">
		<h1 class="ribbon">
		  <strong class="ribbon-content">Rank Our Reviews</strong>
		</h1>
		</div>
	
		<form name="voteform" method="post" action="cast-vote.php">
	
			<table id="voting" align="center">
			
			<?

			$review_query = "SELECT * FROM reviews ORDER BY date DESC";
			$review_result = $con->query($review_query);
			while($row = $review_result->fetch_array()){ $review_rows[] = $row; }

			$i = 1;

			foreach($review_rows as $row){
				$post_url = $row['url'];
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
								echo '<td><span class="neg">'.$votes.'</span></td>';
							}else{
								echo '<td><span class="pos">'.$votes.'</span></td>';
							}
							
						
						$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
						$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
						$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
						$didTheyVote -> fetch();
						
						if($didTheyCount > 0){
							echo '<td>&nbsp;</td><td>&nbsp;</td>';
						}else{
						
						echo'
							
						<td>
							<a href="#!" class="upvote">
								<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
								<input type="hidden" value="'.$row['url'].'" class="URL" />
								<input type="hidden" value="u" class="upOrDown" />
								<input type="hidden" name="vote" class="voteValue" />	
								<input type="hidden" name="posturl" class="postURL" />
							</a>
						</td>
						<td>
							<a href="#!" class="downvote">
								<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
								<input type="hidden" value="'.$row['url'].'" class="URL" />
								<input type="hidden" value="d" class="upOrDown" />
								<input type="hidden" name="vote" class="voteValue" />	
							<input type="hidden" name="posturl" class="postURL" />
							</a>
						</td>';
						
						}
						
						echo'
						<td>
							<a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a>
						</td>
						
					</tr>
					
					
					';
						
					$i++;
			}

			?>

			</table>

		</form>
	
	
</div>
	<div id="sidebar">
	<form name="voteform2" method="post" action="cast-vote.php">
	<table id="voting" align="center">
			
			<?

			$review_query = "SELECT * FROM reviews ORDER BY date DESC";
			$review_result = $con->query($review_query);
			while($row = $review_result->fetch_array()){ $review_rows[] = $row; }

			$i = 1;

			foreach($review_rows as $row){
				$post_url = $row['url'];
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
								echo '<td><span class="neg">'.$votes.'</span></td>';
							}else{
								echo '<td><span class="pos">'.$votes.'</span></td>';
							}
							
						
						$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
						$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
						$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
						$didTheyVote -> fetch();
						
						if($didTheyCount > 0){
							echo '<td>&nbsp;</td><td>&nbsp;</td>';
						}else{
						
						echo'
							
						<td>
							<a href="#!" class="upvote2">
								<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
								<input type="hidden" value="'.$row['url'].'" class="URL" />
								<input type="hidden" value="u" class="upOrDown" />
								<input type="hidden" name="vote" class="voteValue" />	
								<input type="hidden" name="posturl" class="postURL" />
							</a>
						</td>
						<td>
							<a href="#!" class="downvote2">
								<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
								<input type="hidden" value="'.$row['url'].'" class="URL" />
								<input type="hidden" value="d" class="upOrDown" />
								<input type="hidden" name="vote" class="voteValue" />	
								<input type="hidden" name="posturl" class="postURL" />
							</a>
						</td>';
						
						}
						
						echo'
						<td>
							<a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a>
						</td>
						
					</tr>
					
					
					';
						
					$i++;
			}

			?>

			</table>

			
			
		</form>	
	
	</div>
	
</div>

<?php include_once '../crumpocolypse/caboose.php' ?>
	
	

	
	
</body></html>