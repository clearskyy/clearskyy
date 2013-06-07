<?php
session_start();
if( isset( $_SESSION["user"] )){ $user = $_SESSION["user"];} 

include_once '../crumpocolypse/dbCon.php'
?>

<!doctype html><html><head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>

	<title>vote.php</title>
</head><body>
	<form name="voteform" method="post" action="cast-vote.php">
		
		<table>
		
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
				<tr>
					<td>';
						if( $downvotes > $upvotes ){
							echo '<span class="neg">'.$votes.'</span></td>';
						}else{
							echo '<span class="pos">'.$votes.'</span></td>';
						}
						
					
					$didTheyVote = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ? and user_id = ?");
					$didTheyVote -> bind_param("ss",$post_url,$_SERVER['REMOTE_ADDR']); $didTheyVote -> execute();
					$didTheyVote -> bind_result($didTheyCount); $didTheyVote -> store_result();
					$didTheyVote -> fetch();
					
					if($didTheyCount == 1){
						echo '<td>&nbsp;</td><td>&nbsp;</td>';
					}else{
					
					echo'
						
					<td>
						<a href="#" class="upvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triUp.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="u" class="upOrDown" />
						</a>
					</td>
					<td>
						<a href="#" class="downvote">
							<img src="http://clearskyy.net/crumpocolypse/upload/triDown.png" />
							<input type="hidden" value="'.$row['url'].'" class="URL" />
							<input type="hidden" value="d" class="upOrDown" />
						</a>
					</td>';
					
					}
					
					echo'
					<td>
						<a href="'.$row['url'].'">'.$row['title'].'</a>
					</td>
					
				</tr>
				
				
				';
					
				$i++;
		}

		?>

		</table>

		
	<input type="hidden" name="vote" id="voteValue" />	
	<input type="hidden" name="posturl" id="postURL" />	
	</form>
	
	<script>
	$(document).ready(function(){
		$('.upvote').click(function() {
			$('#postURL').val($(this).children('.URL').val());
			$('#voteValue').val($(this).children('.upOrDown').val());
			voteform.submit();
		});
					
		$('.downvote').click(function() {
			$('#postURL').val($(this).children('.URL').val());
			$('#voteValue').val($(this).children('.upOrDown').val());
			voteform.submit();
		});
		
		$('.pos').css("color", "#09c");
		$('.neg').css("color", "#d00");
	});
	</script>

</body></html>
