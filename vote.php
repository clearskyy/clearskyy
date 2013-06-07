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
			$vote_count = $con->prepare("SELECT COUNT(*) FROM vote WHERE post_id = ?");
			$vote_count -> bind_param("s",$post_url); $vote_count -> execute();
			$vote_count -> bind_result($votes); $vote_count -> store_result();
			$vote_count -> fetch();
				 
			echo '
				<tr>
					<td>'.$votes.'</td>
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
							<input type="hidden" value="u" class="upOrDown" />
						</a>
					</td>
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
	});
	</script>

</body></html>
